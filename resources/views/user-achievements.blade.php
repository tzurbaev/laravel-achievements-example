@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div>
                            <span class="pull-left">Your achievements</span>
                            <span class="pull-right">You have {{ $points }} achievement points</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <h3 style="margin-bottom: 40px;">Achievements</h3>
                        @foreach ($userAchievements as $achievement)
                            @include('achievements.item')
                        @endforeach

                        @foreach ($achievements as $achievement)
                            @include('achievements.item')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
