@section('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

<div class="border p-3 border-dark my-3">

    <form method="GET" id="searchPeopleForm">

        <div class="d-flex input-group">
            <input class="form-control rounded-0 bg-light" type="search" placeholder="Nom de la personne" aria-label="name" name="name">
            <button class="btn btn-primary rounded-0 py-1 px-5 fw-bold" type="submit"><i class="fa-solid fa-magnifying-glass me-2"></i> Rechercher</button>
        </div>

        <div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary my-3" id="headingAdvancedSearch" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdvancedSearch" aria-expanded="true" aria-controls="collapseAdvancedSearch">
                    Recherché avancée <i class="fa-solid fa-filter ms-2"></i>
                </button>
            </div>
            <div class="ollapse" id="collapseAdvancedSearch" aria-labelledby="headingAdvancedSearch" data-bs-parent="#accordionMessage">
                <div class="d-flex flex-wrap">
                    <div class="mx-5">
                        <!-- Agence -->
                        <div class="mt-2 mb-4">
                            <div class="fw-bold">Agence</div>
                            <select class="form-select" aria-label="Agence" name="office">
                                <option value="" selected>Toutes</option>
                                <option value="office_albuquerque_nm">Albuquerque, NM</option>
                                <option value="office_anaktuvukpass_ak">Anaktuvuk Pass, AK</option>
                                <option value="office_anchorage_ak">Anchorage, AK</option>
                                <option value="office_atlanta_ga">Atlanta, GA</option>
                                <option value="office_bangor_me">Bangor, ME</option>
                                <option value="office_billings_mt">Billings, MT</option>
                                <option value="office_birmingham_al">Birmingham, AL</option>
                                <option value="office_bismarck_nd">Bismarck, ND</option>
                                <option value="office_boise_id">Boise, ID</option>
                                <option value="office_casper_wy">Capser, WY</option>
                                <option value="office_charleston_sc">Charleston, SC</option>
                                <option value="office_charlotte_nc">Charlotte, NC</option>
                                <option value="office_charleston_wv">Charleston, WV</option>
                                <option value="office_chicago_il">Chicago, IL</option>
                                <option value="office_colombus_oh">Colombus, OH</option>
                                <option value="office_dallas_tx">Dallas, TX</option>
                                <option value="office_denver_co">Denver, CO</option>
                                <option value="office_desmoines_ia">Des Moines, IA</option>
                                <option value="office_detroit_mi">Detroit, MI</option>
                                <option value="office_dodgecity_ks">Dodge City, KS</option>
                                <option value="office_hagatna_gu">Hagatna, GU</option>
                                <option value="office_honolulu_hi">Honolulu, HI</option>
                                <option value="office_indianapolis_in">Indianapolis, IN</option>
                                <option value="office_jackson_ms">Jackson, MS</option>
                                <option value="office_jacksonville_fl">Jacksonville, FL</option>
                                <option value="office_kansascity_ks">Kansas City, KS</option>
                                <option value="office_lasvegas_nv">Las Vegas, NV</option>
                                <option value="office_lincoln_ne">Lincoln, NE</option>
                                <option value="office_littlerock_ar">Little Rock, AR</option>
                                <option value="office_losangeles_ca">Los Angeles, CA</option>
                                <option value="office_louisville_ky">Louisville, KY</option>
                                <option value="office_lynchburg_va">Lynchburg, VA</option>
                                <option value="office_miami_fl">Miami, FL</option>
                                <option value="office_milwaukee_wi">Milwaukee, WI</option>
                                <option value="office_minneapolis_mn">Minneapolis, MN</option>
                                <option value="office_nashville_tn">Nashville, TN</option>
                                <option value="office_newyork_ny">New York, NY</option>
                                <option value="office_nouvelleorleans_la">Nouvelle-Orléans, LA</option>
                                <option value="office_odessa_tx">Odessa, TX</option>
                                <option value="office_oklahomacity_ok">Oklahoma City, OK</option>
                                <option value="office_philadelphie_pa">Philadelphie, PA</option>
                                <option value="office_phoenix_az">Phoenix, AZ</option>
                                <option value="office_pittsburgh_pa">Pittsburgh, PA</option>
                                <option value="office_portland_or">Portland, OR</option>
                                <option value="office_providence_ri">Providence, RI</option>
                                <option value="office_rapidcity_sd">Rapid City, SD</option>
                                <option value="office_reno_nv">Reno, NV</option>
                                <option value="office_saintlouis_mo">Saint-Louis, MO</option>
                                <option value="office_saltlakecity_ut">Salt Lake City, UT</option>
                                <option value="office_sanantonio_tx">San Antonio, TX</option>
                                <option value="office_sanfrancisco_ca">San Francisco, CA</option>
                                <option value="office_sanjuan_pr">San Juan, PR</option>
                                <option value="office_seattle_wa">Seattle, WA</option>
                                <option value="office_siouxfalls_sd">Sioux Falls, SD</option>
                                <option value="office_spokane_wa">Spokane, WA</option>
                                <option value="office_waikoloavillage_hi">Waikoloa Village, HI</option>
                                <option value="office_washington_dc">Washington, DC</option>
                                <option value="office_watertown_ny">Watertown, NY</option>
                            </select>
                        </div>

                        <!-- Langages -->
                        <div class="my-2 mb-4">
                            <div class="fw-bold">
                                Langues parlées
                                <a data-bs-toggle="modal" data-bs-target="#modalLanguages">
                                    <i class="fa-solid fa-circle-question"></i>
                                </a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="modalLanguages" tabindex="-1" aria-labelledby="modalLanguagesLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLanguagesLabel">Sélection de langues</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Séparez chaque langue recherchée par une virgule.<br>
                                            <i class="fa-solid fa-triangle-exclamation me-2 text-warning"></i> La recherche est sensible aux accents et caractères spéciaux.
                                        
                                            <hr>

                                            <p>
                                                Ci-dessous, vous trouverez une liste non exhaustive de langues possibles :
                                            </p>
                                            <p>
                                                Allemand, Amharique, Anglais, Arabe, Birman, Coréen, Dari, Egyptien, Espagnol, Français, Grec, Haoussa, Iranien, Italien, Japonais, Javanais, Kurde, Lao, Népalais, Oromo, Persan, Philippin, Polonais, Portugais, Roumain, Russe, Swahili, Thaï, Ukrainien, Vietnamien, Yoruba
                                            </p>
                                            <p>
                                                Langues de Chine : Mandarin, Cantonais, Wu, Minnan, Jin, Hakka
                                            </p>
                                            <p>
                                                Créoles : Créole haïtien, Créole guyanais, Créole trinidanien
                                            </p>
                                            <p>
                                                Langues d'Inde : Hindi, Bengali, Urdu, Marathi, Telugu, Tamil, Pendjabi, Gujarati, Kannada, Odia
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="form-control rounded-0" type="text" placeholder="Espagnol, Russe" aria-label="Langues parlées" name="languages">
                        </div>
                    </div>

                    <!-- Espèce -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Espèce</div>
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeHuman" value="human" checked/>
                                <label class="form-check-label" for="typeHuman">Humain</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeWerewolf" value="werewolf" checked/>
                                <label class="form-check-label" for="typeWerewolf">Loup-Garou</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeVampire" value="vampire" checked/>
                                <label class="form-check-label" for="typeVampire">Vampire</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeWarlock" value="warlock" checked/>
                                <label class="form-check-label" for="typeWarlock">Sorcier</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeFaery" value="faery" disabled/>
                                <label class="form-check-label" for="typeFaery">Fée</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeDemon" value="demon" disabled/>
                                <label class="form-check-label" for="typeDemon">Démon</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeStray" value="stray" disabled/>
                                <label class="form-check-label" for="typeStray">Errant</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="type" id="typeUnknown" value="unknown" checked/>
                                <label class="form-check-label" for="typeUnknown">Inconnue</label>
                            </div>
                        </div>
                    </div>

                    <div class="mx-5">
                        <!-- Sexe -->
                        <div class="mt-2 mb-4">
                            <div class="fw-bold">Sexe</div>
                            <div class="btn-group" role="group">
                                <input class="btn-check" type="radio" name="gender" id="genderAll" value="" checked/>
                                <label class="btn btn-sm btn-outline-primary" for="genderAll">Tous</label>
                                
                                <input class="btn-check" type="radio" name="gender" id="genderMale" value="male" />
                                <label class="btn btn-sm btn-outline-primary" for="genderMale">Homme</label>
                                
                                <input class="btn-check" type="radio" name="gender" id="genderFemale" value="female" />
                                <label class="btn btn-sm btn-outline-primary" for="genderFemale">Femme</label>
                            </div>
                        </div>

                        <!-- Renegat -->
                        <div class="my-2 mb-4">
                            <div class="fw-bold">Renégat</div>
                            <div class="btn-group" role="group">
                                <input class="btn-check" type="radio" name="renegade" id="renegadeAll" value="" checked/>
                                <label class="btn btn-sm btn-outline-primary" for="renegadeAll">Tous</label>

                                <input class="btn-check" type="radio" name="renegade" id="renegadeYes" value="1"/>
                                <label class="btn btn-sm btn-outline-primary" for="renegadeYes">Oui</label>

                                <input class="btn-check" type="radio" name="renegade" id="renegadeNo" value="0"/>
                                <label class="btn btn-sm btn-outline-primary" for="renegadeNo">Non</label>
                            </div>
                        </div>

                        <!-- Dead -->
                        <div class="my-2 mb-4">
                            <div class="fw-bold">Mort</div>
                            <div class="btn-group" role="group">
                                <input class="btn-check" type="radio" name="dead" id="deadAll" value="" checked/>
                                <label class="btn btn-sm btn-outline-primary" for="deadAll">Tous</label>

                                <input class="btn-check" type="radio" name="dead" id="deadYes" value="1"/>
                                <label class="btn btn-sm btn-outline-primary" for="deadYes">Oui</label>

                                <input class="btn-check" type="radio" name="dead" id="deadNo" value="0"/>
                                <label class="btn btn-sm btn-outline-primary" for="deadNo">Non</label>
                            </div>
                        </div>
                    </div>

                    <!-- Groupe ethnique -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Ethnie</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupWhite" value="white" checked/>
                                <label class="form-check-label" for="ethnicGroupWhite">Blanche</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupHispanic" value="hispanic" checked/>
                                <label class="form-check-label" for="ethnicGroupHispanic">Hispanique</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupBlack" value="black" checked/>
                                <label class="form-check-label" for="ethnicGroupBlack">Noire</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupAsian" value="asian" checked/>
                                <label class="form-check-label" for="ethnicGroupAsian">Asiatique</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupNativeAmerican" value="nativeamerican" checked/>
                                <label class="form-check-label" for="ethnicGroupNativeAmerican">Amérindien</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupUnknown" value="unknown" checked/>
                                <label class="form-check-label" for="ethnicGroupUnknown">Inconnue</label>
                            </div>
                        </div>
                    </div>

                    <!-- Statut -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Statut</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusNone" value="None" checked/>
                                <label class="form-check-label" for="statusNone">Aucun</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusPrisoner" value="prisoner" checked/>
                                <label class="form-check-label" for="statusPrisoner">En prison</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusWanted" value="wanted" checked/>
                                <label class="form-check-label" for="statusWanted">Fugitif</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusMissing" value="missing" checked/>
                                <label class="form-check-label" for="statusMissing">Disparu</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusAgent" value="agent" checked/>
                                <label class="form-check-label" for="statusAgent">Agent</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status" id="statusCivilian" value="civilian" checked/>
                                <label class="form-check-label" for="statusCivilian">Civil</label>
                            </div>
                        </div>
                    </div>

                    <div class="mx-5">
                        <!-- Height -->
                        <div class="mt-2 mb-4">
                            <label for="height" class="fw-bold">Taille</label>
                            <input type="text" id="height" readonly class="border-0 text-primary fw-bold">
                            <div class="p-2">
                                <div id="height-range"></div>
                            </div>
                        </div>
                        
                        <!-- Weight -->
                        <div class="mt-2 mb-4">
                            <label for="weight" class="fw-bold">Poids</label>
                            <input type="text" id="weight" readonly class="border-0 text-primary fw-bold">
                            <div class="p-2">
                                <div id="weight-range"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Hair -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Cheveux</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairChauve" value="Chauve" checked/>
                                <label class="form-check-label" for="hairChauve">Chauve</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairNoirs" value="Noirs" checked/>
                                <label class="form-check-label" for="hairNoirs">Noirs</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairChatains" value="Chatains" checked/>
                                <label class="form-check-label" for="hairChatains">Chatains</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairBlonds" value="Blonds" checked/>
                                <label class="form-check-label" for="hairBlonds">Blonds</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairRoux" value="Roux" checked/>
                                <label class="form-check-label" for="hairRoux">Roux</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="hair" id="hairAutre" value="Autre" disabled/>
                                <label class="form-check-label" for="hairAutre">Autre</label>
                            </div>
                        </div>
                    </div>

                    <!-- Eyes -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Yeux</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesBleusclairs" value="Bleus clairs" checked/>
                                <label class="form-check-label" for="eyesBleusclairs">Bleus clairs</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesBleus" value="Bleus" checked/>
                                <label class="form-check-label" for="eyesBleus">Bleus</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesMarronsclairs" value="Marrons clairs" checked/>
                                <label class="form-check-label" for="eyesMarronsclairs">Marrons clairs</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesMarrons" value="Marrons" checked/>
                                <label class="form-check-label" for="eyesMarrons">Marrons</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesNoirs" value="Noirs" checked/>
                                <label class="form-check-label" for="eyesNoirs">Noirs</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesVerts" value="Verts" checked/>
                                <label class="form-check-label" for="eyesVerts">Verts</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesNoisettes" value="Noisettes" checked/>
                                <label class="form-check-label" for="eyesNoisettes">Noisettes</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesGris" value="Gris" checked/>
                                <label class="form-check-label" for="eyesGris">Gris</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="eyes" id="eyesAutre" value="Autre" disabled/>
                                <label class="form-check-label" for="eyesAutre">Autre</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mx-5">
                    <button class="btn btn-danger my-3 px-5" type="reset">
                        Réinitialiser <i class="fa-solid fa-arrow-rotate-left ms-2"></i>
                    </button>
                    <button class="btn btn-success my-3 px-5" type="submit">
                        Rechercher <i class="fa-solid fa-magnifying-glass me-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    function initRangeSlider(name, min, max, unit) {
        $( "#" + name + "-range" ).slider({
            range: true,
            min: min,
            max: max,
            values: [ min, max ],
            slide: function( event, ui ) {
                $( "#" + name ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] + " " + unit);
            },
            unit: unit
        });
        $("#" + name).prop("defaultValue", $( "#" + name + "-range" ).slider( "values", 0 ) + " - " + $( "#" + name + "-range" ).slider( "values", 1 ) + " " + unit)
        $("#" + name).val($("#" + name).prop("defaultValue"));
    }

    function resetRangeSlider(name) {
        const slider = $("#" + name + "-range");
        slider.slider("values", 0, slider.slider("option", "min"));
        slider.slider("values", 1, slider.slider("option", "max"));
    }

    function fillSearchPeopleForm() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        function fillSelect(param) {
            if (urlParams.get(param)) {
                $("select[name=" + param + "]").val(urlParams.get(param));
            }
        }
        function fillText(param) {
            if (urlParams.get(param)) {
                $("input[name=" + param + "]").val(urlParams.get(param));
            }
        }
        function fillCheckbox(param) {
            if (urlParams.get(param)) {
                $("input[name=" + param + "]").prop('checked', false);
                urlParams.get(param).split('_').forEach(function (value) {
                    $("input[name=" + param + "][value='" + value + "']").prop('checked', true);
                });
            }
        }
        function fillRadio(param) {
            if (urlParams.get(param)) {
                $("input[name=" + param + "][value=" + urlParams.get(param) + "]").prop('checked', true);
            }
        }
        function fillRange(param) {
            if (urlParams.get(param)) {
                const slider = $("#" + param + "-range");
                slider.slider("values", 0, urlParams.get(param).split('_')[0]);
                slider.slider("values", 1, urlParams.get(param).split('_')[1]);
                $("#" + param).val(slider.slider("values", 0) + " - " + slider.slider("values", 1) + " " + slider.slider("option", "unit"));
            }
        }

        fillText('name');
        fillSelect('office');
        fillText('languages');
        fillCheckbox('type');
        fillRadio('gender');
        fillRadio('renegade');
        fillRadio('dead');
        fillCheckbox('ethnicGroup');
        fillCheckbox('status');
        fillRange('height');
        fillRange('weight');
        fillCheckbox('hair');
        fillCheckbox('eyes');
    }

    window.onload = function() {
        initRangeSlider("height", 0, 300, "cm");
        initRangeSlider("weight", 0, 200, "kg");
        fillSearchPeopleForm();

        
        $("#searchPeopleForm").on("reset", function (event) {
            resetRangeSlider("height");
            resetRangeSlider("weight");
        });

        $("#searchPeopleForm").on("submit", function (event) {
            event.preventDefault();
            let request = ''
            let types = '';
            let ethnic_groups = '';
            let status = '';
            let hair = '';
            let eyes = '';

            $(this).serializeArray().forEach(function(item) {
                if (item.value != "") {
                    if (item.name == "type") {
                        types += item.value + '_';
                    }
                    else if (item.name == "ethnicGroup") {
                        ethnic_groups += item.value + '_';
                    }
                    else if (item.name == "status") {
                        status += item.value + '_';
                    }
                    else if (item.name == "hair") {
                        hair += item.value + '_';
                    }
                    else if (item.name == "eyes") {
                        eyes += item.value + '_';
                    }
                    else {
                        request += item.name + "=" + item.value + "&";
                    }
                }
            });

            if (types != '' && types.split('_').length != $('input[name=type]:not(:disabled)').length+1) {
                types = types.slice(0, -1);
                request += "type=" + types + "&";
            }
            if (ethnic_groups != ''  && ethnic_groups.split('_').length != $('input[name=ethnicGroup]:not(:disabled)').length+1) {
                ethnic_groups = ethnic_groups.slice(0, -1);
                request += "ethnicGroup=" + ethnic_groups + "&";
            }
            if (status != ''  && status.split('_').length != $('input[name=status]:not(:disabled)').length+1) {
                status = status.slice(0, -1);
                request += 'status=' + status + "&";
            }
            if (hair != ''  && hair.split('_').length != $('input[name=hair]:not(:disabled)').length+1) {
                hair = hair.slice(0, -1);
                request += 'hair=' + hair + "&";
            }
            if (eyes != ''  && eyes.split('_').length != $('input[name=eyes]:not(:disabled)').length+1) {
                eyes = eyes.slice(0, -1);
                request += 'eyes=' + eyes + "&";
            }

            let h_range = $("#height-range").slider( "option" );
            if (h_range["values"][0] != h_range["min"] || h_range["values"][1] != h_range["max"]) {
                request += 'height=' + h_range["values"][0] + "_" + h_range["values"][1] + "&";
            }

            let w_range = $("#weight-range").slider( "option" );
            if (w_range["values"][0] != w_range["min"] || w_range["values"][1] != w_range["max"]) {
                request += 'weight=' + w_range["values"][0] + "_" + w_range["values"][1] + "&";
            }

            request = request.slice(0, -1);

            window.location.href = '/database/people/search?' + request;
        });
    };
</script>