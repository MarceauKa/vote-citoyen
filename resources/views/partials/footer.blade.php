<footer class="footer py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="lead">
                    <img src="/favicon.png" alt="Logo" class="img-fluid mr-2" style="max-height: 24px; vertical-align: top;" />
                    <strong>{{ config('app.name') }}</strong>
                </p>
                <p class="text-muted">
                    Tout droits réservés
                </p>
            </div>

            <div class="col-md-9 text-muted">
                <ul class="list-unstyled">
                    <li><a href={{ route('register') }}>Inscription</a> / <a href="{{ route('login') }}">Connexion</a></li>
                    <li><a href="{{ route('proposal.create') }}">Proposer un vote</a></li>
                    <li><a href="{{ route('terms') }}">Conditions générales d'utilisation</a></li>
                    <li><a href="https://github.com/MarceauKa/vote-citoyen" target="_blank">Code source</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>