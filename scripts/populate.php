<?php
require "vendor/autoload.php";

// Weapons
GetData("DATA/EQUIPMENT/weapon_equip.ini", "weapon_equip", "gun");
GetData("DATA/EQUIPMENT/weapon_equip.ini", "weapon_equip", "munition");
GetData("DATA/EQUIPMENT/weapon_equip.ini", "weapon_equip", "explosion");
GetData("DATA/EQUIPMENT/weapon_equip.ini", "weapon_equip", "motor");

// Ships
GetData("DATA/EQUIPMENT/goods.ini", "goods", "good");
GetData("DATA/SHIPS/shiparch.ini", "shiparch", "ship");
GetData("DATA/EQUIPMENT/engine_equip.ini", "engine_equip", "engine");
GetData("DATA/EQUIPMENT/misc_equip.ini", "misc_equip", "power");

// Gets data of $type from $file and uploads it to the database
function GetData($file, $filename, $type)
{
    // Establishes a connection to the database
    $mdb = new MongoDB\Client("mongodb://localhost:27017");

    $i = 0;
    $ini = "";
    $file = fopen($file, "r");

    // Replaces the $type section headers with incremental integers and creates a new ini string
    while (! feof($file))
    {
        $line = fgets($file);
        if (stripos($line, "[".$type."]") !== false)
        {
            $line = "[".$i."]\n";
            $i++;
            $ini .= $line;
        }
        else
        {
            $ini .= $line;
        }
    }
    fclose($file);

    // Remove objects with non-integer keys from the array
    $arr = parse_ini_string($ini, true);
    foreach ($arr as $key => $value)
    {
        if (gettype($key) !== "integer")
        {
            unset($arr[$key]);
        }
    }

    foreach ($arr as &$item)
    {
        foreach ($item as &$value)
        {
            if (strpos($value, ",") !== false)
            {
                $value = explode(",", $value);
            }
        }
    }

    // Drops the collection and reinserts the array objects
    $col = $mdb->selectCollection("disco_db", $filename.".".$type);
    $col->drop();
    $result = $col->insertmany($arr);
    printf("Inserted %d document(s) to ".$filename.".".$type."</br>", $result->getInsertedCount());
}