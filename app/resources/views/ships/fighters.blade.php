@extends('layouts/app')

@section('content')

<div class="container">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="lf-tab" data-toggle="tab" href="#lf" role="tab" aria-controls="lf" aria-selected="true">Light Fighters</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="hf-tab" data-toggle="tab" href="#hf" role="tab" aria-controls="hf" aria-selected="false">Heavy Fighters</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="vhf-tab" data-toggle="tab" href="#vhf" role="tab" aria-controls="vhf" aria-selected="false">Very Heavy Fighters</a>
        </li>
        </ul>
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="lf" role="tabpanel" aria-labelledby="lf-tab">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Hit Points</th>
                        <th scope="col">Power</th>
                        <th scope="col">Bots/Bats</th>
                        <th scope="col">Turn Rate</th>
                        <th scope="col">Time to 90%</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lfs as $lf)
                    <tr>
                        <th scope="row"><a href="/ship/{{$lf['nickname']}}">{{$lf['nickname']}}</a></th>
                        <td>{{$lf['hit_pts']}}</td>
                        <td>todo</td>
                        <td>{{$lf['nanobot_limit'].' / '.$lf['shield_battery_limit']}}</td>
                        <td>{{number_format(rad2deg($lf['steering_torque'][0]/$lf['angular_drag'][0]), 2)}}</td>
                        <td>{{number_format($lf['rotation_inertia'][0] / ($lf['angular_drag'][0] * M_LOG10E), 4)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="hf" role="tabpanel" aria-labelledby="hf-tab">
        <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Hit Points</th>
                        <th scope="col">Power</th>
                        <th scope="col">Bots/Bats</th>
                        <th scope="col">Turn Rate</th>
                        <th scope="col">Time to 90%</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hfs as $hf)
                    <tr>
                        <th scope="row"><a href="/ship/{{$hf['nickname']}}">{{$hf['nickname']}}</a></th>
                        <td>{{$hf['hit_pts']}}</td>
                        <td>todo</td>
                        <td>{{$hf['nanobot_limit'].' / '.$hf['shield_battery_limit']}}</td>
                        <td>{{number_format(rad2deg($hf['steering_torque'][0]/$hf['angular_drag'][0]), 2)}}</td>
                        <td>{{number_format($hf['rotation_inertia'][0] / ($hf['angular_drag'][0] * M_LOG10E), 4)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane fade" id="vhf" role="tabpanel" aria-labelledby="vhf-tab">
        <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Hit Points</th>
                        <th scope="col">Power</th>
                        <th scope="col">Bots/Bats</th>
                        <th scope="col">Turn Rate</th>
                        <th scope="col">Time to 90%</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vhfs as $vhf)
                    <tr>
                        <th scope="row"><a href="/ship/{{$vhf['nickname']}}">{{$vhf['nickname']}}</a></th>
                        <td>{{$vhf['hit_pts']}}</td>
                        <td>todo</td>
                        <td>{{$vhf['nanobot_limit'].' / '.$vhf['shield_battery_limit']}}</td>
                        <td>{{number_format(rad2deg($vhf['steering_torque'][0]/$vhf['angular_drag'][0]), 2)}}</td>
                        <td>{{number_format($vhf['rotation_inertia'][0] / ($vhf['angular_drag'][0] * M_LOG10E), 4)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection