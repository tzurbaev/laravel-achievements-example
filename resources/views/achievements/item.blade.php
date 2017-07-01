<div class="panel panel-{{ $achievement->completed() ? 'primary' : 'default' }}">
    <div class="panel-heading">
        <div>
            <span class="pull-left"><strong>{{ $achievement->name }}</strong></span>
            <span class="pull-right"><strong>{{ $achievement->points }} Points</strong></span>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        {{ $achievement->description }}
    </div>
    <div class="panel-footer">
        @if ($achievement->completed())
            Completed at {{ $achievement->pivot->completed_at }}
        @else
            Not Completed
        @endif
    </div>
</div>
