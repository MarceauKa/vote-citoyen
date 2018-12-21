<div class="card my-4">
    <h2 class="card-header">Informations</h2>

    <div class="card-body">
        <dl class="row">
            <dt class="col-12">Statut</dt>
            <dd class="col-12">{{ $poll->status_name }}</dd>

            <dt class="col-12">Vote proposé le</dt>
            <dd class="col-12">{{ $poll->created_at->format('d/m/Y') }}</dd>

            <dt class="col-12">Vote proposé par</dt>
            <dd class="col-12">{{ $poll->owner ? $poll->owner->fullname : '-' }}</dd>

            <dt class="col-12">Nombre de soutiens</dt>
            <dd class="col-12">{{ $poll->supports_count }}</dd>

            @if($poll->has_dates)
                <dt class="col-12">Début du vote</dt>
                <dd class="col-12">{{ $poll->starts_at->format('d/m/Y à H\hi') }}</dd>

                <dt class="col-12">Fin du vote</dt>
                <dd class="col-12">{{ $poll->ends_at->format('d/m/Y à H\hi') }}</dd>
            @endif
        </dl>
    </div>
</div>