<div class="card my-4">
    <div class="card-body">
        <h5 class="card-title">Voter</h5>

        @guest
            <div class="alert alert-info">
                Vous devez être connecté à votre compte pour voter. <a href="{{ route('login') }}" class="alert-link">Connexion</a>
            </div>
        @elseif($answer)
            <div class="alert alert-success">
                Vous avez voté <strong>{{ $answer->content == 'yes' ? 'POUR' : 'CONTRE' }}</strong>
                le <strong>{{ $answer->created_at->format('d/m/Y à H\hi') }}</strong>.
            </div>
        @else
            <form action="{{ route('answer.store', [$poll->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="content" class="d-block">Réponse</label>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-outline-success">
                            <input type="radio" name="content" id="contentYes" autocomplete="off" value="yes"> Je vote POUR
                        </label>
                        <label class="btn btn-outline-danger">
                            <input type="radio" name="content" id="contentNo" autocomplete="off" value="no"> Je vote CONTRE
                        </label>
                        <label class="btn btn-outline-secondary">
                            <input type="radio" name="content" id="contentNo" autocomplete="off" value="none"> Je vote BLANC
                        </label>
                    </div>
                    @if($errors->has('content'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('content') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="comment" class="d-block">Commentaire (facultatif)</label>
                    <textarea name="comment" id="comment" rows="3" class="form-control">{{ old('comment') }}</textarea>
                    @if($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('comment') }}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="consent" class="d-block">Conditions</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1">
                        <label class="form-check-label" for="consent">J'accepte d'envoyer mon vote : il sera public, anonymisé et non modifiable.</label>
                    </div>
                    @if($errors->has('consent'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('consent') }}</span>
                    @endif
                </div>

                @include('partials.form-captcha')

                <button type="submit" class="btn btn-primary">Envoyer mon vote</button>
            </form>
        @endguest
    </div>
</div>