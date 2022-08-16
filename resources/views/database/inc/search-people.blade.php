<div class="border p-3 border-dark my-3">

    <form method="GET" id="searchPeopleForm">

        <div class="d-flex input-group">
            <input class="form-control rounded-0 bg-light" type="search" placeholder="Nom de la personne" aria-label="name" name="name">
            <button class="btn btn-primary rounded-0 py-1 px-5 fw-bold" type="submit"><i class="fa-solid fa-magnifying-glass me-2"></i> Rechercher</button>
        </div>

        <div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary my-3" id="headingAdvancedSearch" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdvancedSearch" aria-expanded="true" aria-controls="collapseAdvancedSearch">
                    Recherché avancée <i class="fa-solid fa-filter"></i>
                </button>
            </div>
            <div class="collapse" id="collapseAdvancedSearch" aria-labelledby="headingAdvancedSearch" data-bs-parent="#accordionMessage">
                <div class="d-flex flex-wrap">
                    <div>
                        <!-- Agence -->
                        <div class="mx-5 mt-2 mb-4">
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
                        <div class="mx-5 my-2">
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
                    <div class="mx-5 my-2">
                        <div class="fw-bold">Espèce</div>
                        <div class="">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kind" id="kindHuman" value="Humain" checked/>
                                <label class="form-check-label" for="kindHuman">Humain</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kind" id="kindWerewolf" value="Loup-Garou" checked/>
                                <label class="form-check-label" for="kindWerewolf">Loup-Garou</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kind" id="kindVampire" value="Vampire" checked/>
                                <label class="form-check-label" for="kindVampire">Vampire</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kind" id="kindWarlock" value="Sorcier" checked/>
                                <label class="form-check-label" for="kindWarlock">Sorcier</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="kind" id="kindUnknown" value="Inconnue" checked/>
                                <label class="form-check-label" for="kindUnknown">Inconnue</label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- Sexe -->
                        <div class="mx-5 mt-2 mb-4">
                            <div class="fw-bold">Sexe</div>
                            <div class="btn-group" role="group">
                                <input class="btn-check" type="radio" name="gender" id="genderAll" value="" checked/>
                                <label class="btn btn-sm btn-outline-primary" for="genderAll">Tous</label>
                                
                                <input class="btn-check" type="radio" name="gender" id="genderHomme" value="Homme" />
                                <label class="btn btn-sm btn-outline-primary" for="genderHomme">Homme</label>
                                
                                <input class="btn-check" type="radio" name="gender" id="genderFemme" value="Femme" />
                                <label class="btn btn-sm btn-outline-primary" for="genderFemme">Femme</label>
                            </div>
                        </div>

                        <!-- Statut -->
                        <div class="mx-5 my-2 mb-4">
                            <div class="fw-bold">Statut</div>
                            <div class="btn-group" role="group">
                                <input class="btn-check" type="radio" name="status" id="statusAll" value="" checked/>
                                <label class="btn btn-sm btn-outline-primary" for="statusAll">Tous</label>

                                <input class="btn-check" type="radio" name="status" id="statusAgent" value="Agent"/>
                                <label class="btn btn-sm btn-outline-primary" for="statusAgent">Agent</label>

                                <input class="btn-check" type="radio" name="status" id="statusCivilian" value="Civilian"/>
                                <label class="btn btn-sm btn-outline-primary" for="statusCivilian">Civil</label>
                            </div>
                        </div>

                        <!-- Renegat -->
                        <div class="mx-5 my-2">
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
                    </div>

                    <!-- Groupe ethnique -->
                    <div class="mx-5 my-2">
                        <div class="fw-bold">Ethnie</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupWhite" value="Blanche" checked/>
                                <label class="form-check-label" for="ethnicGroupWhite">Blanche</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupHispanic" value="Hispanique" checked/>
                                <label class="form-check-label" for="ethnicGroupHispanic">Hispanique</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupBlack" value="Noire" checked/>
                                <label class="form-check-label" for="ethnicGroupBlack">Noire</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupAsian" value="Asiatique" checked/>
                                <label class="form-check-label" for="ethnicGroupAsian">Asiatique</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupNative" value="Amérindien" checked/>
                                <label class="form-check-label" for="ethnicGroupNative">Amérindien</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="ethnicGroup" id="ethnicGroupUnknown" value="Inconnue" checked/>
                                <label class="form-check-label" for="ethnicGroupUnknown">Inconnue</label>
                            </div>
                        </div>
                    </div>

                    <!-- Situation -->
                    <div class="mx-5 my-2 mb-4">
                        <div class="fw-bold">Situation</div>
                        <div class="" role="group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="situation" id="situationNone" value="None" checked/>
                                <label class="form-check-label" for="situationNone">Aucune</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="situation" id="situationPrison" value="Prison" checked/>
                                <label class="form-check-label" for="situationPrison">En prison</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="situation" id="situationFugitive" value="Wanted" checked/>
                                <label class="form-check-label" for="situationFugitive">Fugitif</label>
                            </div>
                            
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="situation" id="situationMissing" value="Missing" checked/>
                                <label class="form-check-label" for="situationMissing">Disparu</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>


<script>
    window.onload = function() {
        $("#searchPeopleForm").on("submit", function (event) {
            event.preventDefault();
            let request = '/database/people/search?'
            let kind = 'kind=';
            let ethnic_group = 'ethnicGroup=';
            let situation = 'situation=';

            $('form').serializeArray().forEach(function(item) {
                if (item.value != "") {
                    if (item.name == "kind") {
                        kind += item.value + '_';
                    }
                    else if (item.name == "ethnicGroup") {
                        ethnic_group += item.value + '_';
                    }
                    else if (item.name == "situation") {
                        situation += item.value + '_';
                    }
                    else {
                        request += item.name + "=" + item.value + "&";
                    }
                }
            });

            kind = kind.slice(0, -1);
            if (kind != 'kind') {
                request += kind + "&";
            }
            ethnic_group = ethnic_group.slice(0, -1);
            if (ethnic_group != 'ethnicGroup') {
                request += ethnic_group + "&";
            }
            situation = situation.slice(0, -1);
            if (situation != 'situation') {
                request += situation + "&";
            }
            request = request.slice(0, -1);

            window.location.href = request;
        });
    };
</script>