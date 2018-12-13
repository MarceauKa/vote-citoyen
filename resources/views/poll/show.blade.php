@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>
            Vote n°{{ $poll->id }}
            <small>
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

        <div class="card my-4">
            <div class="card-body">
                <h4 class="card-title">{{ $poll->name }}</h4>
                <p class="card-text text-justify">
                    {{ $poll->description }}
                </p>
                @if($poll->has_dates)
                <p class="card-text mt-4 text-right text-muted">
                    <small>Début du vote le <em>{{ $poll->starts_at->format('d/m/Y à H\hi') }}</em>, fin du vote le <em>{{ $poll->ends_at->format('d/m/Y à H\hi') }}</em></small>
                </p>
                @endif
            </div>
        </div>

        @if(! $poll->is_proposed && ! $poll->is_ended)
        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">Voter</h5>

                @guest
                    <div class="alert alert-info">
                        Vous devez être connecté à votre compte pour voter. <a href="{{ route('login') }}" class="alert-link">Connexion</a>
                    </div>
                @elseif($answer)
                    <div class="alert alert-success">
                        Vous avez voté <strong>{{ $answer->content == 'yes' ? 'POUR' : 'CONTRE' }}</strong>
                        le <strong>{{ $answer->created_at->format('d/m/Y à H\hi') }}</strong>.
                    </div>
                @elseif($poll->is_pending)
                    <div class="alert alert-info">
                        Le vote débutera le <strong>{{ $poll->starts_at->format('d/m/Y à H\hi') }}</strong>.
                    </div>
                @elseif($poll->is_current)
                    @include('poll.partials.form')
                @endguest
            </div>
        </div>
        @endif

        @if($poll->is_current || $poll->is_ended)
        <div class="card my-4">
            <div class="card-body">
                <h5 class="card-title">Résultats</h5>
                @if($poll->is_ended)
                    <div class="alert alert-warning">
                        Affichage des résultats en cours de construction.
                    </div>
                @else
                    <div class="alert alert-info">
                        Les résultats seront publiés à la clôture du vote.
                    </div>
                @endif
            </div>
        </div>
        @endif
    </div>
@endsection
