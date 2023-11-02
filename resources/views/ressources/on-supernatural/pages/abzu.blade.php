@extends('layouts.app')



@section('sub-header')
    <h3 class="p-4 bg-primary text-light text-uppercase fw-bold m-0">
        Raport — L'Abzu, le domaine du monde des esprits
    </h3>
@endsection

@php
$n_figures = 1;
$n_tableaux = 1;
@endphp

@section('content')

<div class="text-justify bg-filter" style="font-family: 'Quicksand', 'sans-serif';">
    <div class="row">
        <h3>Rapport réalisé par :</h3>
        <div class="row text-center align-items-start gx-2">
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/profile-unknown.png') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">M. Enkh Amgalan<br>(Mongolie)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/profile-unknown.png') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Joseph Sankawulo<br>(Libéria)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/profile-unknown.png') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Amos Adeniyi<br>(Bénin)</figcaption>
            </div>
            <div class="col">
                <img src="{{ URL::asset('/storage/pictures/profile-unknown.png') }}" class="rounded-circle" style="height: 200px; width:200px; object-fit: cover;">
                <figcaption class="fst-italic p-1">Makana Phothisarath<br>(Laos)</figcaption>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-6">
            <h5>Note sur le vocabulaire</h5>
            <p>
                Le lexique spécifique créé pour décrire le Monde des Esprits et ses habitants est basé sur le summérien, la plus ancienne langue écrite connue et possiblement la plus ancienne langue connue. Ce choix est motivé par l'ancienneté du Monde des Esprits qui était présent à l'époque (IV<sup>ème</sup> et III<sup>ème</sup> millénaires avant J.-C.), ainsi que par la mythologie summérienne dont de nombreux principes sont comparables à nos connaissances actuelles. Certaines hypothèses avancent que la société summérienne a été une des premières civilisation à prendre conscience de l'Abzu et à le manipuler. Dans le rapport, les termes spécifique au Monde des Esprits et provenant du summérien sont écrits sous la forme suivante :
                <div class="text-center"><span class="fw-bold">&lt;Terme français&gt;</span> / <span class="fw-bold">&lt;Terme summérien&gt;</span> ("<span class="font-italic">&lt;traduction du summérien&gt;</span>")</div>
            </p>
            <p>
                Sur un autre point, la terminologie du Monde Caché utilise le terme "esprit" pour désigner n'importe quel être résidant (ou devant résider) de l'autre côté du Voile. Par extension, il désigne aujourd'hui l'essence immatériel d'un invidu qui quitte son corps lors de sa mort et se dirige vers le Plan Démoniaque, s'arrêtant parfois dans le Monde des Esprits. Hors de la terminologie du Monde Caché telle que définie par l'Ordre, cette essence correspond plutôt à l'<span class="font-italic">âme</span>, au sein de laquelle le terme <span class="font-italic">esprit</span> désigne parfois une composante.
            </p>

            <h3>L'Abzu</h3>

            <h4>Constitution d'une âme</h4>
            <p>
                Pour rappel, l'esprit d'un humain est consitué de trois composantes abstraites qui définissent sa personnalité, ses envies, ses connaissances, en somme son identité spirituelle. Bien qu'elles soient entrelacées entre elles, il est généralement plus facile de déconstruire un esprit selon cette partition et de garder connectées les énergies d'une même composante. De nombreuses théories proposent une séparation de l'esprit (ou de l'âme) en trois parties, plusieurs rapprochement peuvent être trouvés entre celles-ci et la séparation pratique proposée par l'Ordre :
                <ul>
                    <li>
                        La <span class="fw-bold">Raison</span> / <span class="fw-bold">Taltal</span> ("<span class="font-italic">connaissance, expérience, sagesse</span>"). Elle contient les connaissances, les souvenirs, la logique, etc.
                    </li>
                    <li>
                        La <span class="fw-bold">Volonté</span> / <span class="fw-bold">Lipi&scaron;</span> ("<span class="font-italic">noyau, c&oelig;ur, courage, colère</span>"). Elle contient les émotions, les sentiments, les peurs, le courage, etc.
                    </li>
                    <li>
                        L'<span class="fw-bold">Appétit</span> / <span class="fw-bold">Áá&scaron;</span> ("<span class="font-italic">ce dont on a besoin</span>"). Il contient les envies, les désirs, les passions, etc.
                    </li>
                </ul>
            </p>

            <h4>L'énergie spirituelle</h4>
            <p>
                La matière du Monde des Esprits est constituée de fragments d'esprits, de morceaux détachés pouvant être associés à la Raison, la Volonté ou l'Appétit. Elle forme l'<span class="fw-bold">Etendue</span> / l'<span class="fw-bold">Abzu</span> ("<span class="font-italic">mer de connaissances</span>", dans les croyances summériennes le terme désigne la zone d'eau pure entre le netherworld et la terre).
            </p>
            <p>
                Cette matière se renouvelle grâce aux humains. Tous ces concepts sont "copiés" dans le Monde des Esprits à plusieurs occasions :
                <ul>
                    <li>
                        lors des rêves ou des cauchemars, des esprits récupèrent les informations détenues par un humain. Ce sont les <span class="fw-bold">Enseignants / Zugia</span> ("celui qui rapporte la connaissance")
                    </li>
                    <li>
                        lors de la mort d'esprits qui détenaient ces informations, elles sont restituées à cette énergie commune
                    </li>
                    <li>
                        lors de la mort d'un humain, son esprit est parfois arrêté par les esprits et y est détruit pour en collecter les connaissances et empêcher les démons de les obtenir
                    </li>
                </ul>
                Il est donc dans l'intérêt des esprits de parfois aider les humains et les protéger des démons, pour ensuite renforcer leur propre monde
            </p>

            <h3>Enchantements</h3>
            <p>
                Très largement conseillé dans les enchantements, le concept de "loyauté" ou "obéissance" permet par exemple d'assurer qu'un enchantement soit plus difficilement modifié et détourné, car sa nature même le forcera à rester fidèle à sa confection originelle. De tels concepts sont donc rares et/ou protégés et difficile à obtenir pour un enchanteur néophyte. Les enchanteurs débutants étant moins aptes à assembler des concepts efficacement, ils sont d'autant plus des cibles faciles pour ceux qui voudraient utiliser leurs créations, parfois à leur insu. Se lancer dans un tel apprentissage est donc dangereux sans mentor.
            </p>
        </div>


        <div class="col-lg-6">
            <h3>Types d'esprits</h3>

            <h4>Les Originaux / Namabba ("l'ancienne génération") et Sàbalbal ("descendant")</h4>
            <p>
                Ce sont les premiers esprits du Monde des Esprits et tous ceux qui y "naissent". Les esprits ne s'accouplent pas vraiment. Ils s'étendent et se séparent. Pour faire cela, ils doivent atteindre un état adéquat (que l'on pourrait appeler un "lieu de l'esprit") : la <span class="fw-bold">Réalisation / Neha</span> ("le repos en paix"). Une fois dans cet état, un esprit a la possibilité de se séparer d'une partie de lui et de donner naissance à un nouvel esprit qu'il devra alors accompagner le temps qu'il se développe une conscience personnelle. Un esprit peut également décider de s'abandonner complètement et se disperser dans le Monde des Esprits, faisant don de soit à l'énergie spirituelle collective. On dit que certains Originaux sont restés figés dans cet état de Réalisation et leur essence, restée complète, atteint qu'un esprit s'accorde avec elle (la "trouve") pour fusionner avec. On les appelle <span class="fw-bold">Ceux Qui Attendent / Ennabišè</span> ("jusqu'au temps venu"). Il existe donc certains esprits qui, tels les Indiana Jones de leur Monde, cherchent ces Ennabišè pour récolter leurs savoirs. Ils sont pris pour des fous par la majorité des autres esprits qui, dans l'hypothèse que ces Ennabišè existent, pensent qu'il est impossible de les ressentir car le Neha est unique à chacun et que l'un ne peut atteindre le Neha d'un autre. Un Ennabišè aurait donc réussit à s'effacer de la réalité, tout simplement. Dans de très rares cas, des humains arrivent à atteindre le Neha par la méditation. C'est ce qu'ils appellent l'Eveil spirituel.
            </p>

            <h4>Les Concepts / Umun ("idée")</h4>
            <p>
                Des esprits se créent parfois directement de la matière, de l'énergie qui forme le Monde des Esprits. Lorsqu'un concept y est trop présent (par exemple trop d'arachnophobie, ou de chrétienté), cette matière donne "vie" à un esprit qui va la représenter plus consciemment. Cela permet de garder un équilibre des ressources disponibles "inconscientes" et également de donner une voix à ces concepts. Ainsi, plus l'humanité pense à un concept, plus celui-ci a des chances de se concrétiser dans le monde des esprits. Il existe ainsi des esprits de cauchemar, des esprits de foi, etc. Ces esprits peuvent également être créés, modelés, par d'autres esprits. Ils sont monoïdéistes donc généralement simples à comprendre mais dévoués à incarner leur concept. Ils font donc de très bons outils pour répandre une idée, une peur, une connaissance, etc. Ce sont parfois des Umun qui sont derrière les humains qui se disent touchés par la grâce, ou qui sont envoyés pour tourmenter quelqu'un.
            </p>

            <h4>Les Défunts / Ug ("mort")</h4>
            <p>
                Ce sont les esprits des humains morts qui ont été accueillis dans le Monde des Esprits. La raison la plus souvent donnée est parce qu'ils y avaient des amis qui ont intercepté leur âme au cours de leur dérive vers le Plan Démoniaque. Cela dit, il est également fréquent que des esprits préfèrent empêcher certaines âmes d'atteindre le Plan Démoniaque (une des raisons pour laquelle le Monde des Esprits a été créé) et ne veulent pas pour autant tuer l'âme et la déconstruire. En effet, certains esprits sont plus intéressants complets, puisqu'il est impossible de garder intègres certaines notions trop complexes et qui ne font sens qu'avec l'âme complète et la conscience de son propriétaire pour l'orchestrer. Certains esprits renvoient également des Ug dans le Plan Terrestre, les raisons peuvent être multiples (concepts trop dangereux, protection, tâche non terminée, etc.)
            </p>

            <h4>Les Fantômes / Gidim ("fantôme")</h4>
            <p>
                Ce sont les esprits qui restent sur le Plan Terrestre. C'est un terme qui peut correspondent aux trois autres types présentés au-dessus, même si il s'agit majoritairement de Gidim (humains décédés) renvoyés. Mais lors de sa mort, un esprit humain peut également rester accroché au Plan Terrestre (généralement à son corps) par la seule force de sa volonté, souvent car il lui reste une chose à faire trop importante pour qu'il se permette de mourir sans l'avoir accomplie. Dans la grande majorité de ces situations, seule la partie de l'esprit contenant l'obsession reste sur le Plan Terrestre, le reste dérivant vers le Plan Démoniaque. C'est pour cette raison que les Ug sont souvent confus et n'ont plus des personnalités complètes.
            </p>
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