@extends('layouts.app')

@section('content')
<div class="col-12">
    <div class="card my-4">
        <h2 class="card-header">
            Votes en cours
        </h2>
        <div class="card-body">
            @if($current_polls->isEmpty())
                <div class="alert alert-info">Il n'y a aucun vote en cours.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($current_polls as $poll)
                            <tr>
                                <td><a href="{{ $poll->url }}">{{ $poll->name }}</a></td>
                                <td>Se termine {{ $poll->ends_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card my-4">
        <h2 class="card-header">
            Votes à venir
        </h2>
        <div class="card-body">
            @if($pending_polls->isEmpty())
                <div class="alert alert-info">Il n'y a aucun vote à venir.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($pending_polls as $poll)
                            <tr>
                                <td><a href="{{ $poll->url }}">{{ $poll->name }}</a>
                                <td>Commence {{ $poll->starts_at->diffForHumans() }}</td>
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
    <div class="card my-4">
        <h2 class="card-header">
            Votes proposés
            <a href="{{ route('proposal.create') }}" class="btn btn-sm btn-success float-right">Proposer un vote</a>
        </h2>
        <div class="card-body">
            @if($proposed_polls->isEmpty())
                <div class="alert alert-info">Aucun vote n'a été proposé.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($proposed_polls as $poll)
                            <tr>
                                <td><a href="{{ $poll->url }}">{{ $poll->name }}</a></td>
                                <td>Proposé {{ $poll->created_at->diffForHumans() }}</td>
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
    <div class="card my-4">
        <h2 class="card-header">
            Votes terminés
        </h2>
        <div class="card-body">
            @if($ended_polls->isEmpty())
                <div class="alert alert-info">Aucun vote n'a été terminé.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                        @foreach($ended_polls as $poll)
                            <tr>
                                <td><a href="{{ $poll->url }}">{{ $poll->name }}</a></td>
                                <td>Terminé {{ $poll->ends_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
