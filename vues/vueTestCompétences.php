<?php
/**
 * Created by PhpStorm.
 * User: nico
 * Date: 11/12/18
 * Time: 08:07
 */

?>
<style>
    .card{
        width: 80%;
    }
    .card-body{
        max-heigth : 400px;
    }
    .card-header{
        text-align: center;
    }
</style>
<div style="display: flex;flex-direction: row;justify-content: center">
    <div class="card">
        <div class="card-header">
            Algorithme n°1 : TriBull en C++
        </div>
        <div class="card-body">
            <div class="sec-widget" data-widget="3cf1aca064ea834b2f7eb55047d62127"></div>
        </div>
        <div class="card-body">

        </div>
        <div class="card-footer">
            <div id="resultat"></div>
        </div>
    </div>

</div>



<script>
    SEC_HTTPS = true;
    SEC_BASE = "compilers.widgets.sphere-engine.com";
    (function(d, s, id){ SEC = window.SEC || (window.SEC = []);
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return; js = d.createElement(s); js.id = id;
        js.src = (SEC_HTTPS ? "https" : "http") + "://" + SEC_BASE + "/static/sdk/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "sphere-engine-compilers-jssdk"));

    (function(){
        var elt = document.getElementsByClassName('submission-result-content');
        var monTexte = elt.innerText || elt.textContent;
        document.getElementById('resultat').innerHTML = monTexte;
    })();
</script>