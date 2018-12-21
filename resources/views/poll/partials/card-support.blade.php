<div class="card my-4">
    <div class="card-body">
        <h5 class="card-title">Soutenir</h5>

        @guest
            <div class="alert alert-info">
                Vous devez être connecté à votre compte pour pouvoir soutenir ce vote. <a href="{{ route('login') }}" class="alert-link">Connexion</a>
            </div>
        @elseif($answer)
            <div class="alert alert-success">
                Vous avez apporté votre soutien à ce vote le <strong>{{ $support->created_at->format('d/m/Y à H\hi') }}</strong>.
            </div>
        @else
            <form action="{{ route('support.store', [$poll->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="consent" class="d-block">Conditions</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1">
                        <label class="form-check-label" for="consent">J'accepte d'envoyer mon soutien : il sera public et non modifiable.</label>
                    </div>
                    @if($errors->has('consent'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('consent') }}</span>
                    @endif
                </div>

                @include('partials.form-captcha')

                <button type="submit" class="btn btn-primary">Envoyer mon soutien</button>
            </form>
        @endguest
    </div>
</div>