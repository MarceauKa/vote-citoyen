@extends('layouts.admin')

@section('content')
<div class="card">
    <h2 class="card-header">{{ $page_title }}</h2>
    <div class="card-body">
        @if($polls->isEmpty())
            <div class="alert alert-info">Aucun vote.</div>
        @else
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Soutiens</th>
                            <th>Votes</th>
                            <th>Statut</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($polls as $poll)
                    <tr>
                        <td>{{ str_limit($poll->name, 60) }}</td>
                        <td>{{ $poll->supports_count }}</td>
                        <td>{{ $poll->answers_count }}</td>
                        <td>{{ $poll->status_name }}</td>
                        <td>
                            <a href="{{ route('admin.polls.edit', $poll->id) }}"
                               class="btn btn-sm btn-outline-primary">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $polls->links() }}
        @endif
    </div>
</div>
@endsection