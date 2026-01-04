<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/js/scripts.php');
?>

    <div class="col-12 col-xs-12 col-sm-12 col-md-9 col-lg-9 no-padding " id="home_imagens" >
        <div id="mobile_home" class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="hovereffect">
            <img class="img-responsive" src="../img/casa.jpg" alt="">
            <div class="overlay">
                <h2>Casas</h2>
                <p>
                    <a href="imoveis.php?id=casa">Ver mais</a>
                </p>
            </div>
        </div>
    </div>

        <div id="mobile_home" class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"> <div class="hovereffect">
            <img class="img-responsive" src="../img/apartamento.jpg" alt="">
            <div class="overlay">
                <h2>Apartamentos</h2>
                <p>
                    <a  href="imoveis.php?id=apartamento" >Ver mais</a>
                </p>
            </div>
        </div>
    </div>


        <div id="mobile_home" class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6"><div class="hovereffect">
            <img class="img-responsive" src="../img/chacara.jpg" alt="">
            <div class="overlay">
                <h2>Chacaras</h2>
                <p>
                    <a  href="imoveis.php?id=chacara" >Ver mais</a>
                </p>
            </div>
        </div>
    </div>


        <div id="mobile_home" class="col-12 col-xs-12 col-sm-12 col-md-6 col-lg-6">  <div class="hovereffect">
            <img class="img-responsive" src="../img/terreno.jpg" alt="">
            <div class="overlay">
                <h2>Terreno</h2>
                <p>
                    <a href="imoveis.php?id=terreno" >Ver mais</a>
                </p>
            </div>
        </div>
    </div>
</div>


<style>

</style>


<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
