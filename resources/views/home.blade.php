@extends('layouts.app')

@section('content')
<div class="col-12">
    <h2 class="text-center mb-4">Sondages en cours</h2>

    @if($polls->isEmpty())
        <p class="text-center text-muted">Aucun sondage pour le moment.</p>
    @else

    @endif

    <p class="text-center mt-4">
        <a href="#" class="btn btn-primary">Proposer un sondage</a>
    </p>
</div>
@endsection
