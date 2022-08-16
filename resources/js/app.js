
window.Plotly = require('plotly.js-dist');

//const { JSDOM } = require("jsdom");
//const fetch = require("node-fetch");
//let generatorName = "animal-sentence"; // <-- change this to your generator name
//let html = fetch(`https://perchance.org/api/downloadGenerator?generatorName=${generatorName}&__cacheBust=${Math.random()}`).then(r => r.text());
//console.log(html)
//const { window } = new JSDOM(html, {runScripts: "dangerously"});

// now you can use the `window` object of your generator like this:
//console.log(window.root.output.toString());
//console.log(window.root.yourListName.toString());
//window.root.character.hitpoints = 10;
//let charDesc = window.root.character.description.evaluateItem;
//window.update();

$( document ).ready(function() {

    // Boutton epage precedente"
    $(".hBack").on("click", function(e){
        e.preventDefault();
        window.history.back();
    });

    // Close automatically alerts
    setTimeout(function() {
        $(".alert.auto-dismiss").alert('close');
    }, 4000);
});