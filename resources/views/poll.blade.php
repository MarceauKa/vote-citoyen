@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <h2>
            Sondage n°{{ $poll->id }}
            <div class="float-right">
                @if($poll->is_ended)
                    <span class="badge badge-secondary badge-pill">
                        Sondage terminé
                    </span>
                @else
                    <span class="badge badge-info badge-pill">
                        Termine dans {{ $poll->ends_at->diffForHumans() }}
                    </span>
                @endif
            </div>
        </h2>

        <div class="card border-primary my-4">
            <div class="card-body">
                <p class="card-text lead">
                    {{ $poll->name }}
                </p>
                <p class="card-text text-justify">
                    {{ $poll->description }}
                </p>
            </div>
        </div>

        <div class="card border-primary my-4">
            <div class="card-header">
                Mon vote
            </div>
            <div class="card-body">
                @guest
                    <div class="alert alert-info">
                        Vous devez être connecté à votre compte pour voter.<br><a href="{{ route('login') }}" class="alert-link">Connexion</a>
                    </div>
                @elseif($answer)
                    <div class="card-text">
                        Vous avez voté <strong>{{ $answer->content == 'yes' ? 'POUR' : 'CONTRE' }}</strong>
                        le <strong>{{ $answer->created_at->format('d/m/Y à H\hi') }}</strong>.
                    </div>
                @else
                    <form action="{{ route('answer.store', [$poll->id]) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-outline-success">
                                    <input type="radio" name="content" id="contentYes" autocomplete="off" value="yes"> Je vote POUR
                                </label>
                                <label class="btn btn-outline-danger">
                                    <input type="radio" name="content" id="contentNo" autocomplete="off" value="no"> Je vote CONTRE
                                </label>
                            </div>
                            @if ($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1">
                                <label class="form-check-label" for="consent">J'accepte d'envoyer mon vote et qu'il ne sera pas modifiable.</label>
                            </div>
                            @if ($errors->has('consent'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('consent') }}</strong>
                            </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Envoyer mon vote</button>
                    </form>
                @endguest
            </div>
        </div>

        <div class="card border-primary my-4">
            <div class="card-header">
                Résultats
            </div>
            <div class="card-body">
                @if($poll->is_ended)
                    <div class="alert alert-warning">
                        Affichage des résultats en cours de construction.
                    </div>
                @else
                    <div class="alert alert-info">
                        Les résultats seront publiés à la clôture du sondage.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
