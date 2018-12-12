@extends('layouts.app')

@section('content')
<h2 class="my-4">A la une</h2>

<div class="col-12 my-4">
    @if($polls->isEmpty())
        <p class="text-center text-muted">Il n'y a aucun sondage en cours :(</p>

        <p class="text-center mt-4">
            <a href="#" class="btn btn-success">Proposer un sondage</a>
        </p>
    @else
        <div class="card-columns">
            @foreach($polls as $poll)
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $poll->name }}</h5>
                        <a href="{{ $poll->url }}" class="btn btn-outline-primary">Voir</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Se termine dans {{ $poll->ends_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<h2 class="my-4">Tous les sondages</h2>

<div class="col-12 my-4">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card border-success text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Une idée de sondage ?</h5>
                    <a href="#" class="btn btn-outline-success">Proposer un sondage</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card text-center border-secondary mb-4">
                <div class="card-body">
                    <h5 class="card-title">Sondages terminés</h5>
                    <a href="#" class="btn btn-outline-secondary">
                        Voir les sondages terminés ({{ $count_ended_polls }})
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card text-center border-secondary mb-4">
                <div class="card-body">
                    <h5 class="card-title">Sondages proposés</h5>
                    <a href="#" class="btn btn-outline-secondary">
                        Voir les sondages proposés ({{ $count_pending_polls }})
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
