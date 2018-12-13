@extends('layouts.app')

@section('content')
<div class="col-md-8 my-4">
    <div class="card">
        <div class="card-header">
            Mon compte
            <a href="{{ route('account.delete') }}" class="btn btn-sm btn-outline-danger float-right">Supprimer mon compte</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.update') }}">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <input type="text"
                                   class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}"
                                   value="{{ old('firstname', $user->firstname) }}"
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
                                   value="{{ old('lastname', $user->lastname) }}"
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
                                   value="{{ old('postcode', $user->postcode) }}"
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
                                   value="{{ old('birthdate', $user->birthdate) }}"
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
                                    <option value="{{ $key }}"{{ old('gender', $user->gender) == $key ? ' selected' : '' }}>{{ $value }}</option>
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
                                            <option value="{{ $child->id }}"{{ old('social_category_id', $user->social_category_id) == $child->id ? ' selected' : '' }}>{{ $child->name }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @if($errors->has('social_category_id'))<span class="invalid-feedback" role="alert">{{ $errors->first('social_category_id') }}</span>@endif
                        </div>
                    </div>
                </div>

                <p class="text-left mt-4">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer les modifications</button>
                </p>
            </form>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">Modifier mon mot de passe</div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.password') }}#password" id="password">
                @method('PUT')
                @csrf

                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="current_pass">Mot de passe actuel</label>
                            <input type="password"
                                   class="form-control{{ $errors->has('current_pass') ? ' is-invalid' : '' }}"
                                   id="current_pass"
                                   name="current_pass"
                                   required>
                            @if($errors->has('current_pass'))<span class="invalid-feedback" role="alert">{{ $errors->first('current_pass') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="new_pass">Nouveau mot de passe</label>
                            <input type="password"
                                   class="form-control{{ $errors->has('new_pass') ? ' is-invalid' : '' }}"
                                   id="new_pass"
                                   name="new_pass"
                                   required>
                            @if($errors->has('new_pass'))<span class="invalid-feedback" role="alert">{{ $errors->first('new_pass') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="new_pass_confirmation">Confirmer le mot de passe</label>
                            <input type="password"
                                   class="form-control{{ $errors->has('new_pass_confirmation') ? ' is-invalid' : '' }}"
                                   id="new_pass_confirmation"
                                   name="new_pass_confirmation"
                                   required>
                        </div>
                    </div>
                </div>

                <p class="text-left mt-4">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer le mot de passe</button>
                </p>
            </form>
        </div>
    </div>

    <div class="card my-4">
        <div class="card-header">Modifier mon adresse email</div>

        <div class="card-body">
            <form method="POST" action="{{ route('account.email') }}#email" id="email">
                @method('PUT')
                @csrf
                
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="current_email">Email actuel</label>
                            <input type="text" readonly class="form-control-plaintext" id="current_email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="new_email">Nouvel email</label>
                            <input type="email"
                                   class="form-control{{ $errors->has('new_email') ? ' is-invalid' : '' }}"
                                   id="new_email"
                                   name="new_email"
                                   required>
                            @if($errors->has('new_email'))<span class="invalid-feedback" role="alert">{{ $errors->first('new_email') }}</span>@endif
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="new_email_confirmation">Confirmer l'email</label>
                            <input type="email"
                                   class="form-control{{ $errors->has('new_email_confirmation') ? ' is-invalid' : '' }}"
                                   id="new_email_confirmation"
                                   name="new_email_confirmation"
                                   required>
                        </div>
                    </div>
                </div>

                <p class="text-left mt-4">
                    <button type="submit" class="btn btn-outline-primary">Enregistrer l'adresse email</button>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
