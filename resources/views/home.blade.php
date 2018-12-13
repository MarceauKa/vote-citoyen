@extends('layouts.app')

@section('content')
<div class="col-12 my-4">
    <h2 class="my-4">Votes en cours</h2>

    @if($current_polls->isEmpty())
        <p class="lead text-muted">Il n'y a aucun vote en cours :(</p>
    @else
        <div class="card-columns">
            @foreach($current_polls as $poll)
                <div class="card border-primary text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $poll->name }}</h5>
                        <a href="{{ $poll->url }}" class="btn btn-outline-primary">Voir</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Se termine {{ $poll->ends_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="col-12 my-4">
    <h2 class="my-4">Votes à venir</h2>

    @if($pending_polls->isEmpty())
        <p class="lead text-muted">Il n'y a aucun vote à venir.</p>
    @else
        <div class="card-columns">
            @foreach($pending_polls as $poll)
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">{{ $poll->name }}</h5>
                        <a href="{{ $poll->url }}" class="btn btn-outline-primary">Voir</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Commence {{ $poll->starts_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<div class="col-12 my-4">
    <h2 class="my-4">Propositions et archives</h2>

    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card border-success">
                <div class="card-header">
                    Votes proposés
                    <a href="{{ route('proposal.create') }}" class="btn btn-sm btn-success float-right">Proposer un vote</a>
                </div>
                <div class="card-body">
                    @if($proposed_polls->isEmpty())
                        <p class="card-text">Aucun vote n'a été proposé.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                @foreach($proposed_polls as $poll)
                                <tr>
                                    <td>{{ $poll->name }}</td>
                                    <td>{{ $poll->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ $poll->url }}" class="btn btn-sm btn-outline-success">Voir</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card border-secondary">
                <div class="card-header">
                    Votes terminés
                </div>
                <div class="card-body">
                    @if($ended_polls->isEmpty())
                        <p class="card-text">Aucun vote n'a été terminé.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                @foreach($ended_polls as $poll)
                                    <tr>
                                        <td>{{ $poll->name }}</td>
                                        <td>{{ $poll->ends_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ $poll->url }}" class="btn btn-sm btn-outline-secondary">Voir</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
