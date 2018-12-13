@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card border-primary">
        <div class="card-header">{{ $page_title }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Adresse email</label>
                    <input type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           value="{{ old('email') }}"
                           id="email"
                           name="email"
                           aria-describedby="emailHelp"
                           placeholder="Ex : emmanuel@elysee.fr"
                           required>
                    <small id="emailHelp" class="form-text text-muted">Votre adresse email ne sera jamais communiquée.</small>
                    @if($errors->has('email'))<span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>@endif
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                   value="{{ old('firstname') }}"
                                   id="firstname"
                                   name="firstname"
                                   placeholder="Ex : Emmanuel"
                                   required>
                            @if($errors->has('firstname'))<span class="invalid-feedback" role="alert">{{ $errors->first('firstname') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="lastname">Nom</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}"
                                   value="{{ old('lastname') }}"
                                   id="lastname"
                                   name="lastname"
                                   placeholder="Ex : Macron"
                                   required>
                            @if($errors->has('lastname'))<span class="invalid-feedback" role="alert">{{ $errors->first('lastname') }}</span>@endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="postcode">Code postal</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}"
                                   value="{{ old('postcode') }}"
                                   id="postcode"
                                   name="postcode"
                                   placeholder="Ex : 75000"
                                   required>
                            @if($errors->has('postcode'))<span class="invalid-feedback" role="alert">{{ $errors->first('postcode') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="birthdate">Date de naissance</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                   value="{{ old('birthdate') }}"
                                   id="birthdate"
                                   name="birthdate"
                                   placeholder="Ex : 21/12/1977"
                                   required>
                            @if($errors->has('birthdate'))<span class="invalid-feedback" role="alert">{{ $errors->first('birthdate') }}</span>@endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="gender">Genre</label>
                            <select name="gender" id="gender" class="form-control" required>
                                @foreach($form_genders as $key => $value)
                                    <option value="{{ $key }}"{{ old('gender') == $key ? ' selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gender'))<span class="invalid-feedback" role="alert">{{ $errors->first('gender') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="social_category_id">Catégorie sociale</label>
                            <select name="social_category_id" id="social_category_id" class="form-control" required>
                                @foreach($form_categories as $parent)
                                    <optgroup label="{{ $parent->name }}">
                                    @foreach($parent->subCategories as $child)
                                        <option value="{{ $child->id }}"{{ old('social_category_id') == $child->id ? ' selected' : '' }}>{{ $child->name }}</option>
                                    @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @if($errors->has('social_category_id'))<span class="invalid-feedback" role="alert">{{ $errors->first('social_category_id') }}</span>@endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <label for="password">Mot de passe</label>
                        <input type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               id="password"
                               name="password"
                               required>
                        @if($errors->has('password'))<span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>@endif
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <label for="password_confirmation">Confirmation mot de passe</label>
                        <input type="password"
                               class="form-control"
                               id="password_confirmation"
                               name="password_confirmation"
                               required>
                    </div>
                </div>

                @include('partials.form-captcha')

                <div class="form-group mt-4">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               id="cgu"
                               name="cgu"
                               required>
                        <label class="form-check-label" for="cgu"{{ old('cgu') == 1 ? ' checked' : '' }}>
                            J'accepte les <a href="#" target="_blank">conditions générales d'utilisation</a>.
                        </label>
                    </div>
                    @if($errors->has('cgu'))<span class="invalid-feedback" role="alert">{{ $errors->first('cgu') }}</span>@endif
                </div>

                <p class="text-left mt-4">
                    <button type="submit" class="btn btn-primary">Confirmer mon inscription</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
