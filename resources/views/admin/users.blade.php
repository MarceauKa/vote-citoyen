@extends('layouts.admin')

@section('content')
<div class="card">
    <h2 class="card-header">{{ $page_title }}</h2>
    <div class="card-body">
        @if($users->isEmpty())
            <div class="alert alert-info">Aucun utilisateur.</div>
        @else
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Nom complet</th>
                            <th>Date de naissance</th>
                            <th>Code postal</th>
                            <th>Email</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->fullname }}</td>
                        <td>{{ $user->birthdate }}</td>
                        <td>{{ $user->postcode }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">Modifier</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $users->links() }}
        @endif
    </div>
</div>
@endsection