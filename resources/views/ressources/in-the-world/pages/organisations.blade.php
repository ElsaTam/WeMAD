@extends('layouts.app')

@php
$organisations = $organisations_danger_0->concat($organisations_danger_1)->concat($organisations_danger_2)
@endphp

@section('sub-header')
    <h3 class="p-4 bg-primary text-light text-uppercase fw-bold m-0" id="wantedModalLabel">
        Liste - Agences et organisations du Monde Caché
    </h3>
@endsection


@section('content')

<div class="w-75 mx-auto my-5" id="organisations-map"></div>

<div class="row">
    <div id="organisations" class="col-sm-8">
        <input class="search form-control mb-2" id="search_organisation" placeholder="Rechercher" />
        <div class="accordion accordion-flush" id="accordionOrganisations">
            @include("ressources.in-the-world.pages.inc.organisations-list", ["title" => "Membres des UGB", "organisations" => $organisations_danger_0, "accordion_id" => "One"])
            @include("ressources.in-the-world.pages.inc.organisations-list", ["title" => "Autres organisations légales", "organisations" => $organisations_danger_1, "accordion_id" => "Two"])
            @include("ressources.in-the-world.pages.inc.organisations-list", ["title" => "Organisations criminelles", "organisations" => $organisations_danger_2, "accordion_id" => "Three"])
        </div>
    </div>

    <div class="col-sm-4">
        @include("ressources.in-the-world.pages.inc.organisation-card", ["organisation" => NULL])
    </div>
</div>

@endsection



@section('scripts')
<script>
    function displayDescr(organisation) {
        $('.card_orga').removeClass("d-none");

        var _title = organisation.name;
        if (organisation.acronym != "") _title += " (" + organisation.acronym + ")";
        $(".card_orga_name").html(_title);
        $(".card_orga_name").removeClass("bg-success bg-warning bg-danger text-white");
        $(".card_orga_name_fr").removeClass("bg-success bg-warning bg-danger text-light text-muted");
        switch(organisation.danger_level) {
            case 0:
                $(".card_orga_name").addClass("bg-success text-white");
                $(".card_orga_name_fr").addClass("bg-success text-light");
                break;
            case 1:
                $(".card_orga_name").addClass("bg-warning");
                $(".card_orga_name_fr").addClass("bg-warning text-muted");
                break;
            case 2:
                $(".card_orga_name").addClass("bg-danger text-white");
                $(".card_orga_name_fr").addClass("bg-danger text-light");
                break;
        }
        
        $(".card_orga_name_fr").html(organisation.name_fr);

        var _countries = organisation.countries[0].name;
        for (let i = 1; i < organisation.countries.length; ++i) {
            _countries += ", " + organisation.countries[i].name;
        }
        $(".card_orga_countries").html(_countries);
        $(".card_orga_countries_number").text( organisation.countries.length);

        var _html = "";
        _html += organisation.description;
        $(".card_orga_description").html(_html);
        $(".card_orga_description a[data-orga-ref]").each(function() {
            const value = $(this).attr('data-orga-ref');
            const command = "displayDescrById('" + value + "'); return false;";
            $(this).attr("href", "#");
            $(this).attr("onclick", command);
        });
    }

    function displayDescrById(orga_id) {
        const organisations = {!! json_encode($organisations->toArray()) !!};
        var ref_organisation;
        Object.keys(organisations).forEach(x => ref_organisation = organisations[x].id === orga_id ? organisations[x]: ref_organisation);
        return displayDescr(ref_organisation);
    }

    const color_less   = {'r': 110, 'g': 24,  'b': 24};
    const color_middle = {'r': 230, 'g': 210, 'b': 15};
    const color_most   = {'r': 24,  'g': 110, 'b': 24};
    /**
     * @param {Number} index - Security index value between -50 (worst) and 50 (best)
     */
    function get_security_color(index) {
        index = Math.min(50, Math.max(-50, index));
        let fade = ((index + 50) / 100.0) * 2;
        let color1 = color_less;
        let color2 = color_middle;
        if (fade >= 1) {
            fade -= 1;
            color1 = color_middle;
            color2 = color_most;
        }
        const diffR = color2.r - color1.r;
        const diffG = color2.g - color1.g;
        const diffB = color2.b - color1.b;

        const gradient = {
            'r': parseInt(Math.floor(color1.r + (diffR * fade)), 10),
            'g': parseInt(Math.floor(color1.g + (diffG * fade)), 10),
            'b': parseInt(Math.floor(color1.b + (diffB * fade)), 10),
        };

        const hexR = gradient.r.toString(16);
        const hexG = gradient.g.toString(16);
        const hexB = gradient.b.toString(16);

        const hex = "#" + (hexR.length == 1 ? "0" + hexR : hexR) + (hexG.length == 1 ? "0" + hexG : hexG) + (hexB.length == 1 ? "0" + hexB : hexB);
        return hex;
    }

    function start_countries_init(countries) {
        for (const [country_id, country] of Object.entries(countries)) {
            countries[country_id]["description"] = "<ul>";
            countries[country_id]["security_index"] = 0;
            countries[country_id]["n_organisations"] = 0;
        }
        return countries;
    }
    function run_countries_init(organisations, countries) {
        for (const [key_orga, organisation] of Object.entries(organisations)) {
            for (const [key_country, country] of Object.entries(organisation['countries'])) {
                if (country.id != "WO") {
                    countries[country.id]["n_organisations"] += 1;
                    countries[country.id]["description"] +=
                        `<li class="orga_danger_${organisation.danger_level}">${organisation.name_fr == "" ? organisation.name : organisation.name_fr}</li>`;
                    countries[country.id]["security_index"] += organisation.security_index;
                }
            }
        }
        return countries;
    }
    function end_countries_init(countries) {
        for (const [country_id, country] of Object.entries(countries)) {
            countries[country_id]["description"] += "</ul>";
            countries[country_id]["url"] = "country/" + country_id;
            if (countries[country_id]["n_organisations"] > 0) {
                countries[country_id]["security_index"] /= countries[country_id]["n_organisations"];
                countries[country_id]["color"] = get_security_color(countries[country_id]["security_index"]);
            }
            else {
                countries[country_id]["color"] = "#cccccc";
            }
            if (countries[country_id]["security_index"] < -50 || countries[country_id]["security_index"] > 50) {
                console.warn(`${countries[country_id]['name']} has a security index of ${countries[country_id]["security_index"]}.`)
            }
        }
        return countries;
    }

    function add_gradient() {
        function makeSVG(tag, attrs) {
            var el = document.createElementNS('http://www.w3.org/2000/svg', tag);
            for (var k in attrs)
                el.setAttribute(k, attrs[k]);
            return el;
        }
        const width = 200;
        const height = 10;
        const x = 10;
        const y = 320;
        const font_size = 12;

        const stop_1 = makeSVG("stop", {offset:"0%", style:`stop-color:rgb(${color_less.r},${color_less.g},${color_less.b});stop-opacity:1;`});
        const stop_2 = makeSVG("stop", {offset:"50%", style:`stop-color:rgb(${color_middle.r},${color_middle.g},${color_middle.b});stop-opacity:1;`});
        const stop_3 = makeSVG("stop", {offset:"100%", style:`stop-color:rgb(${color_most.r},${color_most.g},${color_most.b});stop-opacity:1;`});
        let gradient = makeSVG("linearGradient", {id:"grad_security", x1:"0%", y1:"0%", x2:"100%", y2:"0%", gradientUnits:"objectBoundingBox"});
        gradient.appendChild(stop_1);
        gradient.appendChild(stop_2);
        gradient.appendChild(stop_3);
        let def_gradient = makeSVG("defs", {});
        def_gradient.appendChild(gradient);

        const rect = makeSVG("rect", {width:width, height:height, x:x, y:y, fill:"url(#grad_security)", style:"stroke:#000000;stroke-width:0.7;stroke-linecap:square"});

        let text_1 = makeSVG("text", {x:x, y:y-5, style:`font-size:${font_size}pt;text-anchor:start;text-align:start;`})
        let tspan_1 = makeSVG("tspan", {x:x, y:y-5});
        tspan_1.innerHTML = "0";
        text_1.appendChild(tspan_1);

        let text_2 = makeSVG("text", {x:x+width/2, y:y-5, style:`font-size:${font_size}pt;text-anchor:middle;text-align:center;`})
        let tspan_2 = makeSVG("tspan", {x:x+width/2, y:y-5});
        tspan_2.innerHTML = "50";
        text_2.appendChild(tspan_2);

        let text_3 = makeSVG("text", {x:x+width, y:y-5, style:`font-size:${font_size}pt;text-anchor:end;text-align:end;`})
        let tspan_3 = makeSVG("tspan", {x:x+width, y:y-5});
        tspan_3.innerHTML = "100";
        text_3.appendChild(tspan_3);

        let text_4 = makeSVG("text", {x:x+width/2, y:y+font_size+height+5, style:`font-size:${font_size}pt;text-anchor:middle;text-align:center;`})
        let tspan_4 = makeSVG("tspan", {x:x+width/2, y:y+font_size+height+5});
        tspan_4.innerHTML = "Index de sécurité";
        text_4.appendChild(tspan_4);

        let svgElement = document.getElementById('organisations-map_inner').getElementsByTagName("svg")[0];
        svgElement.appendChild(def_gradient);
        svgElement.appendChild(rect);
        svgElement.appendChild(text_1);
        svgElement.appendChild(text_2);
        svgElement.appendChild(text_3);
        svgElement.appendChild(text_4);
    }
</script>
<script src="{{asset('js/simplemaps/organisations_mapdata.js')}}"></script>
<script>
    var countries = simplemaps_worldmap_mapdata.state_specific;
    countries = start_countries_init(countries);
    countries = run_countries_init({!! json_encode($organisations->toArray()) !!}, countries);
    countries = end_countries_init(countries);
    simplemaps_worldmap_mapdata.state_specific = countries;
</script>
<script src="{{asset('js/simplemaps/organisations_map.js')}}"></script>
<script>
    simplemaps_worldmap.hooks.complete = function(id){
        add_gradient();
    }

    $(document).ready(function(){
        $('.card_orga').addClass("d-none");
        $("#search_organisation").on("keyup", function() {
            var value = $(this).val().toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, '');
            $(".organisation-list a").filter(function() {
                $(this).toggle($(this).text().toLowerCase().normalize('NFD').replace(/\p{Diacritic}/gu, '').indexOf(value) > -1)
            });
        });
    });
</script>
@endsection