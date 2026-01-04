<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/js/scripts.php');
if (isset($_GET)) {

    if (isset($_GET['categoria']) && $_GET['categoria'] != '0' ) {
        $categoria = $_GET['categoria'];
         $where[] = " `IMOVELCATEGORIA` = '{$categoria}'";
    }

    if (isset($_GET['valor']) && $_GET['valor'] != '0') {
        $valor = $_GET['valor'];
        if ($valor== 100) {
            $where[] = " `IMOVELVALOR` >= 100000.00 AND  `IMOVELVALOR` < 250000.00";
        }

        if ($valor== 250) {
            $where[] = " `IMOVELVALOR` >= 250000.00 AND  `IMOVELVALOR` < 350000.00";
        }

        if ($valor== 350) {
            $where[] = " `IMOVELVALOR` >= 350000.00 AND  `IMOVELVALOR` < 450000.00";
        }

        if ($valor== 450) {
            $where[] = " `IMOVELVALOR` >= 450000.00";
        }
    }
    if (isset($_GET['codigo']) && $_GET['codigo'] != '') {
        $codigo = $_GET['codigo'];
        $where[] = " `IMOVELCODIGO` LIKE '%{$codigo}%'";
    }

    $imoveis = crudimovel::getInstance(Conexao::getInstance());

    if(isset($where)) {
        $dados = $imoveis->imovelbusca($where);
    } else {
        $imoveis = crudimovel::getInstance(Conexao::getInstance());
        $dados = $imoveis->imoveisgeral();
    }
} else {
    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imoveisgeral();

    $new_uri = parse_url($_SERVER['REQUEST_URI']);

    if( array_key_exists( 'query', $new_uri )) {
        $new_uri['query'] = '';
    }

    echo("<script>history.replaceState({},'','{$new_uri["path"]}');</script>");
}
if (isset($_GET['id'])) {
    $tipo = $_GET['id'];
    $imoveis = crudimovel::getInstance(Conexao::getInstance());
    $dados = $imoveis->imovelportipo($tipo);

}
?>



<div class="col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">

<div class="" id="buscaimovel_top" style="height: 15%; width: 86%;  margin-left: 4.5% !important;">
    <form name="filtrar" method="get" class="">
        <div class="row">
            <div class="col-3">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" >
                    <option value="0" >Selecione ...</option>
                    <option value="casa"<?php if(isset($_GET['categoria']) && $_GET['categoria'] == 'casa') echo ' selected="selected"';?> >Casas</option>
                    <option value="apartamento"<?php if(isset($_GET['categoria']) && $_GET['categoria'] == 'apartamento') echo ' selected="selected"';?> >Apartamentos</option>
                    <option value="chacara"<?php if(isset($_GET['categoria']) && $_GET['categoria'] == 'chacara') echo ' selected="selected"';?> >Chacaras</option>
                    <option value="terreno"<?php if(isset($_GET['categoria']) && $_GET['categoria'] == 'terreno') echo ' selected="selected"';?> >Terrenos</option>
                </select>
            </div>
            <div class="col-4">
                <label for="exampleFormControlFile2">Valor</label>
                <select class="form-control" name="valor" id="exampleFormControlFile2">
                    <option value="0">Selecione ...</option>
                    <option value=100 <?php if(isset($_GET['valor']) && $_GET['valor'] == 100) echo ' selected="selected"';?> >100.000.00 R$ - 250.000.000 R$</option>
                    <option value=250 <?php if(isset($_GET['valor']) && $_GET['valor'] == 250) echo ' selected="selected"';?> >250.000.00 R$ - 350.000.000 R$</option>
                    <option value=350 <?php if(isset($_GET['valor']) && $_GET['valor'] == 350) echo ' selected="selected"';?> >350.000.00 R$ - 450.000.000 R$</option>
                    <option value=450 <?php if(isset($_GET['valor']) && $_GET['valor'] == 450) echo ' selected="selected"';?> >450.000.00 R$ Acima R$</option>
                </select>
            </div>

            <div class="col-3">
                <label for="consulta">Codigo</label>
                <input name="codigo" class="form-control" id="codigo" placeholder="CA-2018.00" type="text" value="<?php if(isset($_GET['codigo'])) echo $_GET['codigo'];?>"/>
            </div>

            <div class="col" style="padding: 3%">
                <input class="btn btn-primary"  type="submit"
                value="Buscar"/>
            </div>
        </div>
    </form>
</div>

<div class="col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-11 col-xs-11 col-sm-11 col-md-11 col-lg-11">
    <div id="imoveis_resultado"
        <!-- modo admin novo imovel-->
        <?php
        if (isset($_SESSION['logado'])) {
            if ($_SESSION['logado'] == 1) {
            ?><!--<a href="novo_imovel.php"><input class="btn" type="submit" name="novo_imovel" value="Novo Imovel" /></a> </br> --><?php
            }
        }
        if (isset($dados)){
            foreach ($dados as $item):
                $imovel_id = $item->IDIMOVEL;
                $idimovelfoto = $imovel_id;
                $imovel_titulo = $item->IMOVELTITULO;
                $imovel_valor = $item->IMOVELVALOR;
                $imovel_nome = $item->IMOVELNOME;
                $imovel_categoria = $item->IMOVELCATEGORIA;
                $imovel_descricao = $item->IMOVELDESCRICAO;
                $imovel_comodos = $item->IMOVELCOMODOS;
                $imovel_suites = $item->IMOVELSUITES;
                $imovel_cep = $item->IMOVELCEP;
                $imovel_banheiros = $item->IMOVELBANHEIROS;
                $imovel_salas = $item->IMOVELSALAS;
                $imovel_churrasqueira = $item->IMOVELCHURRASQUEIRA;
                $imovel_garagem = $item->IMOVELGARAGEM;
                $imovel_servico = $item->IMOVELSERVICO;
                $imovel_piscina = $item->IMOVELPISCINA;
                $imovel_novidade = $item->NOVIDADES;

                $imovel_cod = $item->IMOVELCODIGO;
                $imovel_descricao = $item->IMOVELDESCRICAO;
                ?>

                <!-- Mostrar FOTO Principal -->
                        <?php
                        $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
                        $dados = $fotomostrar->selecionaimgimove($idimovelfoto);
                        foreach ($dados as $item):
                            $imagemnome = $item->IMOVELNOME;
                            ?>
                            <a data-toggle="modal" data-id="<?php echo $idimovelfoto?>" data-target="#exampleModalCenter4"  >

                    <form name="imovel" id="imovel" method="post" action="#" enctype="multipart/form-data" >
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" id="parte1imvoell" style="margin-bottom: 15px;">
<!--                            <div class="id_imovel" style="display: none;"> --><?php //echo $id_imovel; ?><!--</div>-->
                           <!--  <div class="titulo"> <?php //echo $imovel_titulo; ?></div> -->
                           <div class="bairro"><?php echo 'bairro' ?></div>
                            <div class="categoria"><?php echo $imovel_categoria; ?></div>
<!--                            <div class="area-util">--><?php //echo 'area útil' ?><!--</div>-->
                            <div class="valor"> valor : <?php echo number_format($imovel_valor, 2); ?> R$</div>
                            <div class="registro"> Codigo
                            <div ><?php echo $imovel_cod; ?> </div></div>
                        </div>
                        <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5" id="parte1imvoel2" style="margin-bottom: 15px">
                    <img class="img-responsive"
                            src="../imagens/<?php echo $imagemnome ?>"
                            alt="" title=""
                            border="0"/>

                            </div>
                            <?php
                        endforeach;
                        ?>
                        <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" id="parte1imvoel3" style="margin-bottom: 15px">
                   
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="novidade2"><?php echo $imovel_novidade; ?></br></div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <!-- modo admin excluir e alterar-->
                            <?php

                                if (isset($_SESSION['logado'])) {
                                    if ($_SESSION['logado'] == 1) {
                                    ?>
                                        <button hidden id="deletar_id" style="color: red" type="submit" value="<?php echo $imovel_id; ?>" >Deletar</button>
                                        <a class="deletar "id="<?php echo $imovel_id; ?>" onclick="deletar(this.id)">
                                            <button value="deletar"type="button" class="btn btn-danger" >Deletar</button>
                                        </a>
                                        <a href="novo_imovel.php?id=<?php echo $imovel_id; ?>">
                                            <button value="alterar"type="button"class="btn btn-primary">Alterar</button>
                                        </a>

                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                          </a>
                    </form>

            <!-- termina consulta imoveis -->
            <?php endforeach;
        }
    ?>
    </div>
</div>



<script>

    $(document).ready(function() {
        $('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
            var data_id = '';
            if (typeof $(this).data('id') !== 'undefined') {
                data_id = $(this).data('id');
                document.cookie = "fbdata = " + data_id;

                       let files = new FormData();
           

            
                     files.append('id', data_id);


  
                     request = $.ajax({
                        url: "modal.php",
                        type: "post",
                         dataType : 'html',
                          contentType: false,
                        processData: false,
                        data: files
                    });

                  request.done(function (response, textStatus, jqXHR){
                  $('.modal-body').html(response);

                  // Display Modal
                  $('#empModal').modal('show'); 
                  });

            }
           
        })
    });

    function deletar(val){
        $id_imovel =val;

        $.ajax({
            method: "POST",
            url: "deleta_imovel.php",
            data: {id_imovel: $id_imovel},
            beforeSend: function (xhr) {
                $("#loader").show();
            }
        }).done(function (data) {
            $("#loader").fadeOut();
            console.log(data);
            inject(data);
        });
    }

    function inject(data) {
        $.ajax({
            method: "POST",
            url: "imoveis.php",
            data: {dados: data},
            beforeSend: function (xhr) {
                $("#loader").show();
            }
        })
            .done(function (data) {
                $("#loader").fadeOut();
                location.reload();
            });
    }

    $(function () {
        $("select[name=categoria]").change(function () {
            beforeSend:$("select[name=cidade]").html('<option value="0" >Escolha a Cidade</option>, <option value="itatiba" >Itatiba</option>');
            beforeSend:$("select[name=bairro]").html('<option value="0" >Escolha a Cidade</option>');

            $("select[name=cidade]").change(function () {
                beforeSend:$("select[name=bairro]").html('<option value="0" >Escolha o bairro</option>, <option value="centro" >Centro</option>,<option value="nacoes" >Nações</option>');

                $("select[name=bairro]").change(function () {
                    beforeSend:$("select[name=comodo]").html('<option value="0" >Escolha nº de comodos</option>, <option value="1" >1</option>,<option value="2" >2</option>,<option value="3" >3</option>,<option value="4" >4</option>,<option value="5" >Mais que 4</option>');
                });
            });
        });
    });

</script>

<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php');
?>
