<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    public function listFighters()
    {
        $lfs = DB::collection('shiparch.ship')
        ->where('ship_class', '0')
        ->where('type', 'FIGHTER')
        ->where('nickname', 'like', 'dsy%')
        ->get();

        $hfs = DB::collection('shiparch.ship')
        ->where('ship_class', '1')
        ->where('type', 'FIGHTER')
        ->where('nickname', 'like', 'dsy%')
        ->get();

        $vhfs = DB::collection('shiparch.ship')
        ->where('ship_class', '3')
        ->where('type', 'FIGHTER')
        ->where('nickname', 'like', 'dsy%')
        ->get();

        $packages = DB::collection('goods.good')
        ->where('category', 'ship')
        ->get();

        $hulls = DB::collection('goods.good')
        ->where('category', 'shiphull')
        ->get();
        
        return view('ships.fighters', compact('lfs', 'hfs', 'vhfs'));
    }

    public function select($id)
    {
        $ship = DB::collection('shiparch.ship')
        ->where('nickname', $id)
        ->get();
        
        return view('ships.ship', compact('ship'));
    }
}
