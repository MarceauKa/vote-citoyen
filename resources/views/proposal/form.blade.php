@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card border-primary">
        <div class="card-header">{{ $page_title }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('proposal.store') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nom du vote</label>
                    <input type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           value="{{ old('name') }}"
                           id="name"
                           name="name"
                           required>
                    @if($errors->has('name'))<span class="invalid-feedback" role="alert">{{ $errors->first('name') }}</span>@endif
                </div>

                <div class="form-group">
                    <label for="description">Description du vote</label>
                    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                              name="description"
                              id="description"
                              rows="10"
                              required>{{ old('description') }}</textarea>
                    @if($errors->has('description'))<span class="invalid-feedback" role="alert">{{ $errors->first('description') }}</span>@endif
                </div>

                @include('partials.form-captcha')

                <p class="text-left mt-4">
                    <button type="submit" class="btn btn-primary">Envoyer ma proposition</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
