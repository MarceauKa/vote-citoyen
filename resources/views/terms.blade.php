@extends('layouts.app')

@section('content')
    <div class="col-md-8">
        <div class="card border-primary">
            <div class="card-header">{{ $page_title }}</div>
            <div class="card-body">
                <h4>1. Soutiens, votes et résultats</h4>

                <p class="text-justify">
                    Lors d'un soutien ou d'une réponse à un vote, les résultats sont rendus public.
                </p>

                <p class="text-justify">
                    Est rendu public : votre prénom, la première lettre de votre nom, votre tranche d'âge,
                    votre catégorie socio-professionnelle, votre numéro de département, votre genre, les 2 premiers blocs de votre adresse IP, la date de votre vote (ou soutien).
                </p>

                <p class="text-justify">
                    N'est PAS rendu public : votre adresse email, votre nom de famille, votre date de naissance, votre adresse IP complète, votre code postal.
                </p>

                <p class="text-justify">
                    Toute réponse à un vote ou soutien à un vote ne peut être ni modifiée, ni supprimée.
                </p>

                <h4>2. Données personnelles et confidentialité</h4>

                <p class="text-justify">
                    Ce site n'utilise aucun traqueur d'analyse du traffic et n'utilise aucun traqueur publicitaire.
                    Les données recueillies sur vous sont uniquement celles que vous fournissez lors de votre inscription, des soutiens que vous apportez et les votes auxquels vous répondez.
                    Aucune donnée n'est transmise à des tiers.
                </p>

                <p class="text-justify">
                    Vous pouvez à tout moment demander la suppression de vos données par simple demande via notre formulaire de contact.
                </p>

                <h3>3. Responsabilité de l'utilisateur</h3>

                <p class="text-justify">
                    L'utilisateur est autorisé à proposer des votes et à commenter ses réponses aux votes. L'utilisateur s'engage à ne pas créer de abusivement des
                    propositions, de plus, il s'engage à ne poster aucun contenu à caractère diffamatoire, injurieux, délictuel, commercial, publicitaire, prospectif.
                </p>

                <h3>4. Responsabilité du site</h3>

                <p class="text-justify">
                    Dans les limites autorisées par la loi, Vote-citoyen, ses administrateurs et ses gestionnaires, ne seront en aucun cas responsables envers qui que ce soit
                    de pertes directes ou indirectes, de coûts, de réclamations, de frais ou de dommages de quelque nature que ce soit, contractuels ou délictuels, négligence comprise,
                    résultant d'une autre manière de - ou liés à - l'utilisation de ces pages web, même si Vote-citoyen a été informée des possibilités de tels dommages.
                </p>

                <h4>5. Hébergement et développement</h4>

                <p class="text-justify">
                    Ce site est hébergé chez <a href="https://www.soyoustart.com/fr/" rel="nofollow">So You Start</a>, filliale de OVH (424 761 419 00045).
                    Il est développé par <a href="https://twitter.com/MarceauKa" rel="nofollow">Marceau Casals</a>
                    et le code source est entièrement disponible sur <a href="https://github.com/MarceauKa/vote-citoyen" rel="nofollow">GitHub</a>.
                </p>

                <h4>6. Crédits</h4>

                <p class="text-justify">
                    Photo de fond du site par <a href="https://pixabay.com/fr/users/ericniequist-2224533/" rel="nofollow">@ericniequist</a>.
                </p>
            </div>
        </div>
    </div>
@endsection
