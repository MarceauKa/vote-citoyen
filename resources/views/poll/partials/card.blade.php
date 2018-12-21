<div class="card my-4">
    <h2 class="card-header">
        Vote n°{{ $poll->id }}
        <small class="float-right">
            @if($poll->is_ended)
                <span class="badge badge-secondary badge-pill">Vote terminé</span>
            @elseif($poll->is_current)
                <span class="badge badge-info badge-pill">Termine {{ $poll->ends_at->diffForHumans() }}</span>
            @elseif($poll->is_pending)
                <span class="badge badge-info badge-pill">Commence {{ $poll->ends_at->diffForHumans() }}</span>
            @else
                <span class="badge badge-warning">Vote proposé</span>
            @endif
        </small>
    </h2>

    <div class="card-body">
        <h4 class="card-title">
            {{ $poll->name }}
        </h4>

        <p class="card-text text-justify">
            {{ $poll->description }}
        </p>
    </div>
</div>