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
        </div>
        @if($errors->has('content'))
            <span class="invalid-feedback" role="alert">{{ $errors->first('content') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="consent" class="d-block">Conditions</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="consent" id="consent" value="1">
            <label class="form-check-label" for="consent">J'accepte d'envoyer mon vote et qu'il ne sera pas modifiable.</label>
        </div>
        @if($errors->has('consent'))
            <span class="invalid-feedback" role="alert">{{ $errors->first('consent') }}</span>
        @endif
    </div>

    @include('partials.form-captcha')

    <button type="submit" class="btn btn-primary">Envoyer mon vote</button>
</form>