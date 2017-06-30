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
                        @if (count($achievements) > 0)
                            <h3 style="margin-bottom: 40px;">Completed Achievements</h3>
                            @foreach ($achievements as $achievement)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div>
                                            <span class="pull-left"><strong>{{ $achievement->name }}</strong></span>
                                            <span class="pull-right"><strong>{{ $achievement->points }} Points</strong></span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-body">
                                        <p>{{ $achievement->description }}</p>
                                    </div>
                                    <div class="panel-footer">
                                        <p>Earned at {{ $achievement->pivot->completed_at }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>You have no Achievements.</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
