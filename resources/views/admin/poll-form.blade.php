@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">{{ $page_title }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.polls.update', $poll->id) }}">
            @csrf

            <div class="form-group">
                <label for="name">Nom du vote</label>
                <input type="text"
                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                       value="{{ old('name', $poll->name) }}"
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
                          required>{{ old('description', $poll->description) }}</textarea>
                @if($errors->has('description'))<span class="invalid-feedback" role="alert">{{ $errors->first('description') }}</span>@endif
            </div>

            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="starts_at">Date de début</label>
                        <input type="text"
                               class="form-control{{ $errors->has('starts_at') ? ' is-invalid' : '' }}"
                               value="{{ old('starts_at', $poll->starts_at ? $poll->starts_at->format(\App\Models\Poll::DATE_FORM_FORMAT) : '') }}"
                               id="starts_at"
                               name="starts_at">
                        @if($errors->has('starts_at'))<span class="invalid-feedback" role="alert">{{ $errors->first('starts_at') }}</span>@endif
                    </div>
                </div>

                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="ends_at">Date de fin</label>
                        <input type="text"
                               class="form-control{{ $errors->has('ends_at') ? ' is-invalid' : '' }}"
                               value="{{ old('ends_at', $poll->ends_at ? $poll->ends_at->format(\App\Models\Poll::DATE_FORM_FORMAT) : '') }}"
                               id="ends_at"
                               name="ends_at">
                        @if($errors->has('ends_at'))<span class="invalid-feedback" role="alert">{{ $errors->first('ends_at') }}</span>@endif
                    </div>
                </div>
            </div>

            <p class="text-left mt-4">
                <button type="submit" class="btn btn-primary">Enregistrer</button>


            </p>
        </form>
    </div>
</div>
@endsection

@section('sidebar')
<div class="card mb-4">
    <h2 class="card-header">Actions</h2>
    <div class="card-body">
        @if($poll->is_proposed)
        <a href="{{ route('admin.polls.clear-supports', $poll->id) }}" class="btn btn-outline-danger btn-block">
            Effacer les soutiens <span class="badge badge-light">{{ $poll->supports_count }}</span>
        </a>
        @endif

        @if($poll->is_current)
        <a href="{{ route('admin.polls.clear-answers', $poll->id) }}" class="btn btn-outline-danger btn-block">
            Effacer les réponses <span class="badge badge-light">{{ $poll->answers_count }}</span>
        </a>
        @endif

        <a href="{{ route('admin.polls.delete', $poll->id) }}" class="btn btn-outline-danger btn-block">
            Effacer le vote
        </a>
    </div>
</div>
@endsection
