@extends('layouts.app')



@section('sub-header')
    <h3 class="p-4 bg-primary text-light text-uppercase fw-bold m-0" id="wantedModalLabel">
        Recherches — La jökullite : un minéral perturbant la magie démoniaque
    </h3>
@endsection

@php
$n_figures = 1;
$n_tableaux = 1;
@endphp

@section('content')

<div class="text-justify bg-filter" style="font-family: 'Quicksand', 'sans-serif';">
    <div class="row">
        <p>
            <img src="{{ URL::asset('/storage/pictures/ressources/sciences/jokullite.jpg') }}" class="me-4" style="max-width: 200px; float: left;">
            La roche Jökullite a été trouvée en Antarctique, au Nord-Est de la chaîne Pensacoloa. L'énergie démoniaque en présence de cette roche est perturbée mais la caractérisation de cette perturbation n'est pas unique. De nombreux effets ont été observés et ont pu être mis en lien avec la forme des particules qui composent la roche extraite (cf. <span class="fw-bold"><a href="#effects-table">Tableau 1</a></span> en bas de l'article). Combinés intelligement, ces effets pourraient répondre à différents besoins des agents de l'Ordre. Malheureusement, deux problèmes principaux empêchent pour l'instant la fabrication de tels outils : il est impossible de prévoir avec certitude tous les effets possible d'une pierre extraite et il est impossible de reproduire les effets d'un échantillon à partir d'un autre. Tant que ces verrous persisteront, aucune production ne sera envisagée.
        </p>
    </div>

    <div class="row">
        <h3>Chercheurs de l'Ordre</h3>
        <div class="row text-center align-items-start gx-2">
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/agents/Jökull_Péturson_1.jpg') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Jökull Péturson<br>(Islande)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/agents/Tom_Peary_1.jpg') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Tom Peary<br>(Etats-Unis)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/agents/Jaipreet_Khushminder_1.jpg') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Jaipreet Khushminder<br>(Pakistan)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/agents/Adrian_Altmas_1.jpg') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Adrian Altmas<br>(Grande-Bretagne)</figcaption>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <h3>Propriétés</h3>
            <p>
                La jökullite a des propriétés particulières sur les énergies démoniaques. En la présence de la roche, ces énergies sont perturbées et altérées de différentes manières. C'est la structure minéralogique des différents minéraux composant la roche qui définit cette perturbation. Les effets peuvent influer la puissance (annulation, affaiblissement, amplification), la trajectoire (attirance, repoussement, déviation), le profil de l'énergie (fragmentation, mélange, filtre) et probablement d'autres pas encore clairement identifiés.
            </p>

            <div id="drug-percentages"></div>

            <h3>Caractérisation</h3>
            <p>
                Plusieurs techniques d'analyses minérales ont été utilisées pour caractériser la roche, autant sur sa cristallographie que sur sa composition chimique (spectrométrie au rayons X, spectrométrie de masse, microsonde de Castaing, ablation laser, etc.). Ces techniques ne permettent pas l'identification d'énergies démoniaques ou spirituelles. Le <span data-bs-toggle="tooltip" title="Diagramme obtenu par diffraction des rayons X envoyés sur le minéral réduit en poudre">diffractogramme</span> de la poudre de jökullite est donné ci-dessous, obtenu par un diffractomètre de rayon X.
            </p>
            <figure class="figure">
                <img src="{{ URL::asset('/storage/pictures/ressources/sciences/jokullite_diffractogram.png') }}" class="img-fluid">
                <figcaption class="figure-caption"><span class="fw-bold">Figure {{$n_figures++}}</span> – Diffractogramme de la jökullite</figcaption>
            </figure>
            <p>
                Aucune particularité dans ce profil ne semble expliquer l'influence de la jökullite sur les énergies démoniaques. De plus, la nature même de la pierre empêche une quelconque analyse par des procédés magiques.
            </p>

            <h3>Analyse d'un échantillon</h3>
            <p>
                Pour comprendre l'effet d'un échantillon brut extrait du gisement, les méthodes classiques de pétrographie sur couches minces ne suffisent pas. En effet, il faudrait réussir à faire un schéma complet de la roche, dans toute sa structuration interne et non pas seulement en surface. L'équipe de recherche a mis en place un dispositif permettant de soumettre la roche à de très faibles flux d'énergie démoniaque, concentrés, et de capter les flux résultants dans toutes les directions. Ce dispositif complexe peut être comparé à un gonioréflectomètre si on fait l'analogie avec des flux lumineux. Il a donc été appelé <span class="fw-bold">gonio-energia-daemo-mètre</span> (abbrégé GEDM), dont le schéma est présenté ci-dessous.
            </p>
            <figure class="figure">
                <img src="{{ URL::asset('/storage/pictures/ressources/sciences/GEDM.svg') }}" class="img-fluid">
                <figcaption class="figure-caption"><span class="fw-bold">Figure {{$n_figures++}}</span> – Schéma d'un gonio-energia-daemo-mètre</figcaption>
            </figure>
            <p>
                Chaque échantillon peut ainsi être analysé et ses effets peuvent être déduits grâce à un très grand nombre de données : pour un unique type de flux fixé, nous bombardons l'échantillon sur plus de 300 000 directions différentes (données par une triangulation de Delaunay de la sphère), et pour chaque direction nous récupérons le flux renvoyé dans plus de 300 000 directions. Cela donne, pour un type de flux, environ <span class="fw-bold">10 milliards de données</span>. Et cette opération est à répéter pour chaque type de flux d'énergie démoniaque souhaité.
            </p>
        </div>
        <div class="col-lg-6">
            <h3>Gisement</h3>
            <p>
                Un seul gisement est aujourd'hui connu. Il se trouve dans une succession de cavités souterraines dont les parois sont consitutées à plus de 80% de Jökullite. Ces grottes s'étendent sur environ 2 kilomètres de long et une profondeur de 500 mètres, soit environ <span class="fw-bold">1 kilomètre cube de roche</span>.
            </p>
            <p>
                Le contact entre le gisement de jökullite et les <span data-bs-toggle="tooltip" title="Roches dans lesquelles a pris place un massif intrusif ou un filon">roches encaissantes</span> est très net et n'a pas l'air naturel. Ce qui pourrait indiquer que ce gisement a été créé pour recouvrir une zone très spécifique. De plus, la présence d'autant de roche devrait normalement correspondre à des milliers d'années de trasnformation géologique. Or le gisement est trop propre et aucun impact sur le paysage environnant n'a été remarqué, renforçant l'hypothèse d'une création soudaine.
            </p>
            <p>
                <img src="{{ URL::asset('/storage/pictures/ressources/sciences/antarctic_demon.jpg') }}" class="ms-2" style="max-width: 100px; float: right;">
                Le gisement possède pour l'instant une seule entrée physique. Mais des entités sur le plan démoniaque ont déjà ouvert des portails jusqu'aux grottes, laissant passer des démons mineurs qui s'attaquent ensuite à la roche. Ils ne représentent pas une menace importante et se contentent de faibles attaques désordonnées et répétées. Leur présence et attaques continues sur la roche posent cependant des questions.
            </p>

            <h3>Exploitation et objectifs</h3>
            <p>
                La jökullite est très clairement une roche aux propriétés intéressantes. La difficulté de l'exploitation de cette roche réside dans la partie manufacture et contrôle des effets. Bien que des combinaisons de cristaux puissent amener très certainement à un effet spécifique, ceux-ci ne peuvent être extraits, taillés et reconstitués avec assez de précision et reproductabilité pour concevoir des outils efficaces et sûrs. En effet, la roche possède plusieurs <span data-bs-toggle="tooltip" title="Aptitude de certains minéraux à se fracturer selon des surfaces planes dans des directions privilégiées lorsqu'ils sont soumis à un effort mécanique">clivages</span> , imparfaits, très difficile à obtenir sans l'utilisation d'un microscope optique en <span data-bs-toggle="tooltip" title="Toutes les ondes ont la même polarisation, elles oscillent dans la même direction">lumière polarisée</span>. Parmi les minéraux de la roche, certains ont des clivages connus (<span data-bs-toggle="tooltip" title="Une direction de clivage dominante <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/Planes_parallel.svg/300px-Planes_parallel.svg.png' width='50'>">basal</span>, <span data-bs-toggle="tooltip" title="Deux directions de clivages dominantes <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Cuboid_no_label.svg/240px-Cuboid_no_label.svg.png' width='50'>">prismatique</span> et <span data-bs-toggle="tooltip" title="Trois directions de clivage qui ne se coupent pas à 90° <img src='https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Rhombohedron.svg/1200px-Rhombohedron.svg.png' width='50'>">rhomboèdrique</span>), mais des clivages qui ne se retrouvent sur aucune roche terrestre ont également été observés (autres <span data-bs-toggle="tooltip" title="<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Triangular_prism.svg/langfr-800px-Triangular_prism.svg.png' width='50'>">prismes</span> et <span data-bs-toggle="tooltip" title="<img src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Square_pyramid.png/280px-Square_pyramid.png' width='50'>">pyramides</span>). Ceci en fait une roche très particulière et <span class="fw-bold">possiblement d'origine d'un plan non terrestre</span>.
            </p>
            <p>
                Un grand intérêt de cette roche serait de pouvoir combiner des composants de manière contrôlée afin de créer des "<span class="fw-bold">super-composants</span>" aux effets bien définis. Pour bien saisir l'importance d'une telle recherche, voici un exemple : l'annulation de tout sort.
            </p>
            <div class="row align-items-center">
                <figure class="figure col-md-6">
                    <img src="{{ URL::asset('/storage/pictures/ressources/sciences/jokullite_annulation.png') }}" class="img-fluid">
                    <figcaption class="figure-caption"><span class="fw-bold">Figure {{$n_figures++}}</span> – Super-composant annulant la magie. Taille estimée d'ordre de grandeur de 1mm</figcaption>
                </figure>
                <div class="col-md-6">
                    <p>
                        En agençant correctement des composants tubulaires qui ont pour effet de focaliser l'énergie (en bleu sur le schéma), il est possible recouvrir correctement la sphère des directions d'où peut arriver un sort et de concentrer l'énergie en un seul point. Si ce point central est constitué d'un composant annulant la magie (en rouge), alors tout flux capté par les tubes extérieurs subira cette annulation finale. De plus, une gaine faite de tubulaires annulant les effets des composants proches (en vert) peut être créée autour de ces "tunnels" focalisateurs pour éviter les interactions non désirées entre composants.
                    </p>
                </div>
            </div>
            <p>
                Un tel super-composant peut ensuite être répété de manière ordonnée pour créer un matériau qui sera ensuite utilisé, par exemple, dans les armures des Chasseurs, les protégeants ainsi des sorts démoniaques. Bien évidemment, un unique composant de quelques micromètres ne peut pas annuler à lui seul un sort complet. C'est <span class="fw-bold">la combinaison intelligente de plusieurs de ces super-composants</span> qui permettra d'atteindre l'effet désiré.
            </p>
            <div class="text-center">
                <figure class="figure">
                    <img src="{{ URL::asset('/storage/pictures/ressources/sciences/jokullite_annulation_repeat.png') }}" class="img-fluid" style="max-width: 300px;">
                    <figcaption class="figure-caption"><span class="fw-bold">Figure {{$n_figures++}}</span> – Combinaison de super-composants pour créer une barrière annulant la magie</figcaption>
                </figure>
            </div>
        </div>
    </div>

    <div class="row">
        <h3>Caractéristiques morphologiques</h3>
        <div class="table-responsive-lg">
            <table class="table table-striped align-middle text-start" id="effects-table">
                <caption class="figure-caption"><span class="fw-bold">Tableau {{$n_tableaux++}}</span> – Caractéristiques morphologiques des composants minéraux et effets induits. Les mesures sont en micromètre (&mu;m).</caption>
                <thead class="table-dark">
                    <tr>
                        <th scope="col" colspan="3">Forme des composants minéraux</th>
                        <th scope="col">Longueur</th>
                        <th scope="col">Diamètre externe /<br>Largeur</th>
                        <th scope="col">Epaisseur de la paroi /<br>Epaisseur</th>
                        <th scope="col">Effets sur la magie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="3"><img src="{{ URL::asset('/storage/pictures/ressources/sciences/mineral-tubular.jpg') }}" class="img-fluid grayscale" width="100"></td>
                        <th scope="row" rowspan="3">Tubulaire</th>
                        <td>courte</td>
                        <td>5 – 100</td>
                        <td>3 – 15</td>
                        <td>1 – 5</td>
                        <td>Focalisation, attraction</td>
                    </tr>
                    <tr>
                        <td>moyenne</td>
                        <td>50 – 150</td>
                        <td>3 – 7</td>
                        <td>1 – 3</td>
                        <td>Annulation des effets proches</td>
                    </tr>
                    <tr>
                        <td>longue</td>
                        <td>90 – 300</td>
                        <td>4 – 15</td>
                        <td>1 – 10</td>
                        <td>Amplification</td>
                    </tr>
                    <tr>
                        <td rowspan="3"><img src="{{ URL::asset('/storage/pictures/ressources/sciences/mineral-lamellar.jpg') }}" class="img-fluid grayscale" width="100"></td>
                        <th scope="row" rowspan="3">Lamellaires</th>
                        <td>fine</td>
                        <td>20 – 230</td>
                        <td>15 – 50</td>
                        <td>1 – 5</td>
                        <td>Déstructuration</td>
                    </tr>
                    <tr>
                        <td>normale</td>
                        <td>20 – 230</td>
                        <td>10 – 50</td>
                        <td>2 – 10</td>
                        <td>Duplication</td>
                    </tr>
                    <tr>
                        <td>épaisse</td>
                        <td>10 – 200</td>
                        <td>10 – 30</td>
                        <td>3 – 15</td>
                        <td>Atténuation</td>
                    </tr>
                    <tr>
                        <td rowspan="3"><img src="{{ URL::asset('/storage/pictures/ressources/sciences/mineral-spheroidal.jpg') }}" class="img-fluid grayscale" width="100"></td>
                        <th scope="row" rowspan="3">Sphéroïdale</th>
                        <td>petite</td>
                        <td>10 – 100</td>
                        <td>10 – 100</td>
                        <td>10 – 100</td>
                        <td>Dispersion, explosion</td>
                    </tr>
                    <tr>
                        <td>moyenne</td>
                        <td>50 – 200</td>
                        <td>50 – 200</td>
                        <td>50 – 200</td>
                        <td>Déviation, repoussement</td>
                    </tr>
                    <tr>
                        <td>grosse</td>
                        <td>100 – 300</td>
                        <td>100 – 300</td>
                        <td>100 – 300</td>
                        <td>Annulation</td>
                    </tr>
                    <tr>
                        <td><img src="{{ URL::asset('/storage/pictures/ressources/sciences/mineral-polygonal.jpg') }}" class="img-fluid grayscale" width="100"></td>
                        <th scope="row" rowspan="1" colspan="2">Polygonale</th>
                        <td>3 – 500</td>
                        <td>3 – 500</td>
                        <td>3 – 500</td>
                        <td>Divers</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection



@section('scripts')

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl, {html: true}))
</script>
    
@endsection