@extends('layouts.app')



@section('sub-header')
    <h3 class="p-4 bg-primary text-light text-uppercase fw-bold m-0">
        Rapport — Surnaturel dans le trafic de drogues
    </h3>
@endsection


@section('content')

<div class="row text-justify bg-filter" style="font-family: 'Quicksand', 'sans-serif';">
    <div class="col-lg-6">
        <h3>Nouvelles drogues</h3>
        <p>
            Depuis le début de l'année 2021, de nombreuses nouvelles substances sont apparues dans le trafic de drogues. Dans le rapport de l'USCC de Novembre 2020, les drogues "Autres" représentaient seulement 3.70% du total du trafic contre 8.2% à la fin de Janvier 2021. En quelques dizaines de jours seulement, ce <span class="fw-bold">taux a très fortement augmenté</span>. Ces nouvelles drogues sont très variées, souvent en très faibles quantités et ne semblent pas être produites pour de la grande distribution mondiale (pour l'instant).
        </p>
        <div id="drug-percentages"></div>

        <h3>Ressources</h3>
        <h5>Equipe</h5>
        <p>
            Une cellule particulière du WeMAD a été mise en place à la frontière avec le Mexique d'où proviennent ces drogues. Celle-ci est dirigée par le Chasseur <span class="fw-bold">Benito Quevedo</span>, ancien membre des Forces Spéciales de l'Armée de terre américaine spécialisé dans le démentèlement de trafics de drogue provenant du Mexique. Il est secondé par le Chasseur <span class="fw-bold">Rubben Sutton</span>, ancien collègue de Benito. Ces deux spécialistes de la question des trafics de drogues ont sous leurs ordres quatre autres Chasseurs détachés spécialement pour cette tâche.
        </p>
        <div class="d-flex justify-content-center">
            <div class="card border-0 m-2" style="background-color: transparent;">
                <img src="{{ URL::asset('/storage/pictures/agents/Benito_Quevedo_1.jpg') }}" class="card-img-top rounded-0" style="max-width: 200px">
                <div class="card-body text-center fst-italic p-1">Benito Quevedo</div>
            </div>
            <div class="card border-0 m-2" style="background-color: transparent;">
                <img src="{{ URL::asset('/storage/pictures/agents/Rubben_Sutton_1.jpg') }}" class="card-img-top rounded-0" style="max-width: 200px">
                <div class="card-body text-center fst-italic p-1">Rubben Sutton</div>
            </div>
        </div>
        <h5>Financement</h5>
        <p>
            L'Etat des Etats-Unis d'Amérique a débloqué un fond d'urgence de <span class="fw-bold">500 millions de dollars</span> pour les efforts de contrôle des drogues surnaturelles couvrant l'identification, la recherche, la prévention, le traitement, l'interdiction, les opérations internationales et l'application de la loi.
        </p>

        <h3>Actions</h3>
        <p>
            Pour le moment, l'équipe réalise principalement un travail de surveillance et de renseignement. La problématique des drogues surnaturelles n'est pas encore bien cernée et les d'outils spécifiques à celle-ci sont en cours de développement. La rencontre entre le Monde Caché et le monde des cartels se fait très probablement à la source de ceux-ci est n'est donc pas accessible. <span class="fw-bold">Deux missions principales</span> sont à réaliser en parallèles :
            <ul>
                <li><span class="fw-bold">Identifier des individus</span> liés à ce nouveau réseau qui se développe (travailleurs, revendeurs, fournisseurs de services, officiels corrompus, gestionnaire de laboratoire, etc.) et qui sont au courant de la nature surnaturelle de leurs produits ;</li>
                <li><span class="fw-bold">Comprendre la magie utilisée</span> dans ces différentes drogues et essayer de la manipuler pour remonter jusqu'à la source de la drogue.</li>
            </ul>
        </p>
        <p>
            Bien que l'action principale se déroule à la frontière avec le Mexique et dans les territoires Mexicains, il est important de surveiller l'évolution de la distribution de ces nouvelles drogues sur l'ensemble du territoire. Chaque agence des Etats-Unis devra donc assurer un effort dans la lutte contre cette nouvelle menace. <span class="fw-bold">Les informations obtenues devront immédiatement être remontées à l'équipe de Benito Quevedo</span> qui se chargera de tout superviser.
        </p>
        <p>
            Il est possible que les criminels à l'origine de ces drogues ne soient pas au courant de l'existence de l'Ordre. Cela donne un avantage à l'organisation du WeMAD puisque les traffiquants ne s'attendront pas à être opposés à des spécialistes du domaines. Par conséquent, <span class="fw-bold">la discrétion quant à l'existence du WeMAD reste primordiale</span>. Jusqu'à ordres contraires, les Chasseurs en capacité d'arrêter un criminel liés à ces activités ne doivent le faire qu'avec la certitude de réussir sans ébruiter le secret.
        </p>
    </div>
    <div class="col-lg-6">
        <h3>Effets observés</h3>
        <p>
           La création d'une liste des effets observés a été entamée. Cependant, il est très complexe d'isoler un effet d'une drogue présente en faible quantité, en assurant une absence de biais vis-à-vis du consommateur et de ses faiblesses psychologiques déjà présentes. De ce fait, la liste ci-dessous n'est ni complète, ni certaine.
        </p>
        <h5>Effets recherchés par les consommateurs</h5>
        <div class="row text-start align-items-start">
            <ul class="col-sm-4">
                <li>Hallucinations</li>
                <li>Fort aphrodisiaque</li>
                <li>Euphorie</li>
                <li>Emotions positives</li>
                <li>Engourdissement</li>
            </ul>
            <ul class="col-sm-8">
                <li>Rush d'adrénaline</li>
                <li>Hallucinations ou rêves collectifs</li>
                <li>Douleurs plaisantes (difficile à décrire)</li>
                <li>Anti-douleurs</li>
            </ul>
        </div>
        <h5>Effets négatifs secondaires</h5>
        <div class="row text-start align-items-start">
            <ul class="col-sm-4">
                <li>Arrêt cardiaque</li>
                <li>Arrêt respiratoire</li>
                <li>Paralysie</li>
                <li>Folie</li>
                <li>Crises de violence</li>
                <li>Dépression</li>
            </ul>
            <ul class="col-sm-8">
                <li>Douleurs fantômes persistentes</li>
                <li>Changements de personnalité</li>
                <li>Forte et rapide dépendance</li>
                <li>Changement de pigmentation (sang, iris, cheveux)</li>
                <li>Perte d'un ou plusieurs sens</li>
            </ul>
        </div>

        <div id="drug-deaths"></div>

        <h3>Compréhension & Connaissances</h3>
        <p>
            La nouveauté de ces nouvelles drogue, leur grande variété et leur faible représentation, ne permettent malheureusement pas de bien saisir l'ampleur de cette nouvelle distribution.
            <ul>
                <li><span class="fw-bold">Origine du surnaturel</span> : inconnue (esprit ? démoniaque ? féérique ?) ;</li>
                <li><span class="fw-bold">Méthodes de synthèse</span> : inconnues ;</li>
                <li><span class="fw-bold">Degré de maîtrise des traffiquants</span> : inconnu (si faible, gros risques d'erreurs et de manipulation par des créatures cachées mal intentionnées) ;</li>
                <li><span class="fw-bold">Addiction aux substances</span> : inconnue pour la plupart (quelques cas d'addictions rapides) ;</li>
                <li><span class="fw-bold">Méthodes pour détecter la drogue</span> : en recherche.</li>
            </ul>
        </p>

        <h3>Implications prévisionnelles</h3>
        <p>
            <ul>
                <li><span class="fw-bold">War on Drugs</span> : complications pour l'effort de lutte contre les drogues, impossibilité de détecter ces nouvelles substances, augmentation du budget pour développer de nouvelles contre-techniques, mise en place d'actions conjointes entre les Forces Spéciales et le WeMAD ;</li>
                <li><span class="fw-bold">Monde Caché</span> : exploitation de créatures cachées, dangers causés par l'igorance, <span class="fw-bold text-danger">révélation du Monde Caché</span> ;</li>
                <li><span class="fw-bold">Internet</span> : apparition des drogues surnaturelles sur le marché du darknet, diffusion rapide de l'information ;</li>
                <li><span class="fw-bold">Cartels</span> : accaparation probable du monopole pour le cartel maîtrisant le surnaturel (suspicion : <span class="fw-bold">cartel de Tamaulipas</span>, dirigé par Lobo Cortes), augmentation des violences inter-cartels ;</li>
                <li><span class="fw-bold">Justice pénale</span> : impossibilité de condamner pour l'utilisation du surnaturel (car ignorance des Tomes de l'Equilibre) ;</li>
                <li><span class="fw-bold">Système de santé</span> : apparitions de cas médicaux incompréhensibles pour la science ;</li>
                <li><span class="fw-bold">Autres</span> (à étudier) : écologique, communautés locales, conflits mondiaux, ...</li>
            </ul>
        </p>

        <h3>Notes</h3>
        <p>
            <img src="{{ URL::asset('/storage/pictures/wanted/Clayton_Moore.jpg') }}" class="me-3 mt-2" style="height: 150px; min-width: 150px; object-fit: cover; float: left;">
            L'humain <a href="{{ url('wanted/claytonmoore') }}">Clayton Moore</a>, alias "Le Doc", est ajouté à la liste des fugitifs les plus recherchés du WeMAD. Il est recherché pour avoir synthétisé différentes substances à partir de magies surnaturelles. Bien qu'il n'ait montré aucune affiliation à un cartel, ses activités illégales pourraient y être liées. De plus, des connaissances sur la synthèses de tels produits sont devenues un besoin critique.
        </p>
        <p>
            <img src="{{ URL::asset('/storage/pictures/ressources/drugs/pink_powder.jpg') }}" class="ms-3" width="150" style="float: right;">
            Le 19/06/2020, une drogue démoniaque est apparue sur le plan terrestre, apportée par l'altéré <a href="{{ url('wanted/basrielnix') }}">Basriel Nix</a>. Elle était en quantité limitée et n'a été utilisée que sur un groupe de quelques personnes sans être intégrée à un réseau de distribution. Depuis, cette drogue a été impliquée dans 4 autres affaires aux Etats-Unis. Elle permet à un démon d'imposer un contrôle mental sans limite au consommateur.
        </p>
    </div>
</div>

@endsection



@section('scripts')

<script>
    var Plotly = window.Plotly;
    var config = {
        displayModeBar: false,
        responsive: true
    }
    
    var data = [{
        type: 'pie',
        values: [50, 20, 17, 14, 8, 3, 10],
        labels: ['Methamphetamine', 'Cocaïne', 'Cannabis', 'Héroïne', 'Crack', 'Oxycodone', 'Autre'],
        marker: {
            line: {
                color: 'white',
                width: 3
            }
        },
        sort: false,
        rotation: 180,
        direction: 'clockwise',
        textinfo: "label+percent",
        hoverinfo: 'label+percent',
        textposition: "outside",
        automargin: true
    }];
    var layout = {
        paper_bgcolor: 'transparent',
        plot_bgcolor: 'transparent',
        font: {
            size: 15,
            family: '"Quicksand", "sans-serif"'
        },
        margin: {
            b: 0, t: 0,
        },
        showlegend: false,
        colorway: ['#650c05', '#871007', '#e01204', '#f33c2e', '#fb6359', '#ea9292', '#f2c1c0', '#fed4d2']
    };
    Plotly.newPlot('drug-percentages', data, layout, config);
    

    //y = Array.from({length: 13}, () => 200 + Math.floor(Math.random() * 800))
    //console.log(y)
    var data = [
    {
        type: 'scatter',
        name: 'Toutes les drogues',
        x: [...Array(13).keys()],
        y: [5725, 5825, 5862, 5160, 5392, 5738, 5539, 5366, 5772, 5462, 5054, 5952, 7129],
    },
    {
        type: 'scatter',
        name: 'Autres',
        x: [...Array(13).keys()],
        y: [536, 688, 428, 506, 376, 618, 784, 459, 579, 556, 502, 876, 1485],
    }];
    var layout = {
        height: 300,
        paper_bgcolor: 'transparent',
        plot_bgcolor: 'transparent',
        font: {
            size: 12,
            family: '"Quicksand", "sans-serif"'
        },
        title: {
            text:'Nombre de morts par mois'
        },
        xaxis: {
            tickmode: 'array',
            tickvals: [...Array(13).keys()],
            ticktext: ['01/21', '02/21', '03/21', '04/21', '05/21', '06/21', '07/21', '08/21', '09/21', '10/21', '11/21', '12/21', '01/22']
        },
        yaxis: {
            range: [0, 10000]
        },
        margin: {
            pad: 10, b: 60, t: 60,
        },
        showlegend: true,
        legend: {
            x: 0.1,
            y: 1,
            itemclick: false,
            itemdoubleclick: false
        }
    };
    Plotly.newPlot('drug-deaths', data, layout, config);

</script>
    
@endsection