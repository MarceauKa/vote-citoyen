<div class="form-group">
    <label for="captcha" class="captcha">Code de sécurité</label>
    <div class="row">
        <div class="col-12 col-sm-3">
            <img src="{{ captcha_src() }}" alt="Code de sécurité" class="img-fluid mb-1">
        </div>
        <div class="col-12 col-sm-6">
            <input type="text"
                   class="form-control{{ $errors->has('captcha') ? ' is-invalid' : '' }}"
                   name="captcha" id="captcha"
                   placeholder="Recopier le code ci-contre"
                   required>
            @if($errors->has('captcha'))<span class="invalid-feedback" role="alert">{{ $errors->first('captcha') }}</span>@endif
        </div>
    </div>
</div>