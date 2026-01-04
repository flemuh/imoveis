<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/meta.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/js/scripts.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/telas/imovel_func.php');

    $error = null;

    //setando foto principa antiga na sessao
    if(isset($imovel_nome)){$_SESSION['imovel_nome'] = $imovel_nome;}

    ?>

    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 " style="margin-top: 15%">
        <form name="cadastraimovel-1" id="cadastraimovel-1"  action="" method="post" enctype="multipart/form-data" style="padding: 5%">
            <div class="form-group">
                <table style="width:100%">
                    <tr>
                        <td>
                            <label style="font-size: 16px" for="uploadPreview">Foto Principal</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img id="uploadPreview" style="width: 350px; height: 250px;" src="<?php if(isset($imovel_nome)){echo '//localhost/imoveis/imagens/'.$imovel_nome; }?>" />
                            <input id='uploadImage' class="form-control-file" type="file" name="foto" size="60" onchange="PreviewImage();"/>
                            <small id="imagemHELP" class="form-text text-muted">Insira uma foto Principal aqui.</small>
                        </td>
                    </tr>
                    <tr >
                        <td >
                            <label style="margin-top: 15px" for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" aria-describedby="emailHelp"  placeholder="Título"  required=""  name="titulo" value="<?php if(isset($imovel_titulo)){echo $imovel_titulo;} ?>"/>
                            <small id="tituloHELP" class="form-text text-muted">Ensira a cima o Título do imóvel.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="categoria">Categoria</label>
                            <select  id="categoria"  name="tipo" class="form-control form-control-sm"  >
                                <option value="" disabled="disable">Selecionar Categoria</option>
                                <option value="casa" >Casa</option>
                                <option value="apartamento" >Apartamento</option>
                                <option value="chacara" >Chácara</option>
                                <option value="verde" >Verde</option>
                            </select>
                            <small id="categoriaHELP" class="form-text text-muted">Escreva a Categoria do Imóvel</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="valor">Valor</label>
                            <input class="form-control" id="valor"type="text" size="40" required=""  placeholder="250.000.00 R$" name="valor"  value="<?php if(isset($imovel_valor))echo $imovel_valor; ?>"/>
                            <small id="valorHELP" class="form-text text-muted">Digite o Valor do Imóvel</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="descricao">Descrição</label>
                            <textarea rows="3" class="form-control" required=""  cols="60" type="text" id="descricao" name="descricao"  ><?php if(isset($imovel_descricao))echo $imovel_descricao;  ?></textarea>
                            <small id="descricaoHELP" class="form-text text-muted">Escreva a descrição do imóvel</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="comodos">Dormitórios</label>
                            <input type="number"  class="form-control" required=""  name="comodos" min="1" max="100"  value="<?php if(isset($imovel_comodos))echo $imovel_comodos; ?>"/>
                            <small id="comodosHELP" class="form-text text-muted">Escreva a quantidade de dormitórios</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="suites">Suites</label>
                            <input type="number" class="form-control"  required="" name="suites" min="1" max="100"  value="<?php if(isset($imovel_suites))echo $imovel_suites; ?>"/>
                            <small id="comodosHELP" class="form-text text-muted">Escreva a quantidade de suítes</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="banheiros">Banheiros</label>
                            <input type="number"  class="form-control" required=""  name="banheiros" min="1" max="100"  value="<?php if(isset($imovel_banheiros))echo $imovel_banheiros; ?>"/>
                            <small id="banheirosHELP" class="form-text text-muted">Escreva a quantidade de banheiros</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="salas">Salas</label>
                            <input type="number"  class="form-control" id="salas"  required=""  name="salas" min="1" max="100"  value="<?php if(isset($imovel_salas))echo $imovel_salas; ?>"/>
                            <small id="salasHELP" class="form-text text-muted">Escreva a quantidade de salas</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="cep">CEP</label>
                            <input type="text" name="cep" required=""  class="form-control" id="cep"  value="<?php if(isset($imovel_cep))echo $imovel_cep; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="novidades">Novidades</label>
                            <textarea rows="3" cols="60" type="text" class="form-control" required=""  name="novidades"  ><?php if(isset($imovel_novidade))echo $imovel_novidade; ?></textarea>
                            <small id="novidadesHELP" class="form-text text-muted">Escreva as novidade do Imóvel</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" id="churrasqueira" class="form-check-input" name="churrasqueira" value="Sim" id="churrasqueira" <?php if(isset($imovel_churrasqueira))echo ($imovel_churrasqueira==1 ? 'checked' : '');?>/>
                                <label class="form-check-label" for="churrasqueira">Churarsqueira?</label>
                            </div>
                            <small id="churrasqueiraHELP" class="form-text text-muted">Cheque acima se possír churarsqueira.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" id="garagem" class="form-check-input" name="garagem" value="Sim"  <?php if(isset($imovel_garagem))echo ($imovel_garagem==1 ? 'checked' : '');?>/>
                                <label class="form-check-label" for="garagem">Garagem?</label>
                            </div>
                            <small id="garagemHELP" class="form-text text-muted">Cheque acima se possír garagem.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="servico" id="servico" value="Sim"  <?php if(isset($imovel_servico))echo ($imovel_servico==1 ? 'checked' : '');?>/>
                                <label class="form-check-label" for="servico">Área de Serviço ?</label>
                            </div>
                            <small id="servicoHELP" class="form-text text-muted">Cheque acima se possír Área de Serviço.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox"class="form-check-input" id="piscina" name="piscina" value="Sim" <?php if(isset($imovel_piscina))echo ($imovel_piscina==1 ? 'checked' : '');?>/>
                                <label class="form-check-label" for="piscina">Piscina ?</label>
                            </div>
                            <small id="piscinaHELP" class="form-text text-muted">Cheque acima se possír Piscina.</small>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <center>
                                <button class="btn btn-primary" id="botaopesquisa-imoveis" type="submit" name="executar" value="Finalizar Cadastro">Finalizar Cadastro</button>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>

   <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 "  style="margin-top: 20%">
        <form name="cadastraimovel" method="post" action="#" enctype="application/x-www-form-urlencoded" style="padding: 5%" >
            <label for="img">Foto Adicional</label>
            <img id="imagem" style="width: 250px;" src="../img/terreno.jpg" title="" />
            <table>
                <tr>
                    <td>
                        <div class="form-group" >

                            <input class="btn btn-dark" type="file" name="img" onchange="change_imagem()" class="form-control-file" id="img" size="60"/>
                        </div>

                        <input class="btn btn-primary" onclick="incluir_imagem_adicional()"
                        value="Enviar Imagem Adicional"/>
                    </td>
                </tr>
                <tr hidden>
                    <td>
                        <label>
                        <span>imovel id :</span>
                        </label>
                    </td>
                </tr>
                <tr hidden>
                    <td>
                        <input hidden type="text" id="imovelid" name="imovelid" value="<?php if(isset($_GET['id'])){echo $_GET['id'];}else{echo $_SESSION['ultimoid'];} ?>"/>
                    </td>
                </tr>

            </table>
        </form>

        <div id="foto_adicional_div" style="margin-top: 50px; padding: 5%"">

            <?php if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            else{
                $id = $_SESSION['ultimoid'];
            }

            $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
            $dados = $fotomostrar->selecionaimagenscadastradas($id);

            foreach ($dados as $item):
                $idfoto = $item->IDFOTO;
                $imagemnome = $item->FOTONOME;
                ?>
                <div id="upload_cadastro">
                    <div id="<?php echo $imagemnome; ?>" style="margin-bottom: 5px">
                        <input hidden type="text" name="fotoid" value="<?php echo $idfoto; ?>"/>
                        <input hidden type="text" name="imagemnome" value="<?php echo $imagemnome; ?>"/>
                        <span class="imagem" ><img src="../imagens/<?php echo $imagemnome ?>" width="250" alt="Exibição"/>
                            <button style="margin-left: 2px " onclick='removerFoto(this.name);' class="btn btn-danger"  name="<?php echo $imagemnome ?>">Excluir</button>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if(isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = $_SESSION['ultimoid'];

        }

        $fotoid = crudimovel::getInstance(Conexao::getInstance());
        $dados = $fotoid->selectfotosporid($id);
        foreach ($dados as $item):
            echo '</br>';
            //qtd fotos
            $qtdfotos = $item->QTD;
            $_SESSION['qtdfotos'] = $qtdfotos;?>
            <tr hidden>
                <td>
                    <label>
                    <span hidden>qtd de fotos :</span>
                    </label>
                </td>
            </tr>
            <tr hidden>
                <td>
                    <input hidden type="text" name="imovelid" value="<?php echo $qtdfotos; ?>"/>
                </td>
            </tr>
        <?php endforeach; ?>
   </div>


    <script>

        $( "#cep" ).keypress(function() {
            var minLength = 8;
            var value = $(this).val();
            if (value.length  >=  minLength ){
            console.log('entro na busca do cep');
            var cep = $('#cep').val();
            console.log(cep);
            $('#cep').autocomplete({
                serviceUrl: 'https://viacep.com.br/ws/'+cep+'/json/',
                onSelect: function (suggestion) {
                console.log(suggestion);
                //  console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);
                }
            });
            }
        });

        var categoria = [ "Casa", "Apartamento", "Chacara", "Terreno" ];

        $("#categoria" ).autocomplete({
            source: categoria
        });

        // document onload
        $('#loader').hide();

        $( document ).ready(function() {
            $("#valor").maskMoney();
        });

        function PreviewImage() {
            document.getElementById("uploadPreview").style.display = "block";
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
            };
        };

        var arquivo = $("#img");
        var imagem = $("#imagem");

        function change_imagem (e) {
            if (arquivo[0].files.length == 0)
            return false;

            var file = arquivo[0].files[0];
            var url = URL.createObjectURL(file);
            imagem.attr("src", url);
            imagem.attr("title", file.name);
        };

        function incluir_imagem_adicional(e) {
            var id_imovel = document.getElementById("imovelid").value;


            let files = new FormData();
            var arquivo = $("#img");

            files.append('foto', arquivo[0].files[0]);
            files.append('id_imovel', id_imovel);

            request = $.ajax({
                url: "foto_adicional.php",
                type: "post",
                contentType: false,
                processData: false,
                data: files
            });

            $("#loader").show();

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR) {

                fotonome = '../imagens/' + response.fotonome;

                if (response) {
                    $("#foto_adicional_div").append("" +
                        "<div id='" + response.fotonome + "' style='margin-bottom: 5px'>" +
                            "<input hidden type='text' name='" + response.fotoid + "' value='" + response.fotoid + "'/>" +
                            "<input hidden type='text' name='imagemnome' value='" + response.fotonome + "'/>" +
                            "<span class='imagem' ><img src='" + fotonome + "' width='250' alt='Exibição'/>" +
                                "<button style='margin-left: 8px' onclick='removerFoto(this.name);' class='btn btn-danger' name='" + response.fotonome + "'>Excluir</button>" +
                            "</span>"+
                        "<div>" );
                }
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
            });

            request.always(function () {
                $("#loader").fadeOut();
            });

        }

        function removerFoto(e) {

            $.ajax({
                method: "POST",
                url: "foto_adicional_excluir.php",
                data: {imagemnome:e},
                beforeSend: function (xhr) {
                    $("#loader").show();
                }
            })
            .done(function (data) {
                $("#loader").fadeOut();
                document.getElementById(e).remove();
            });

        }

    </script>

    <? require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/html/footer.php'); ?>

    <style type="text/css">
        .ui-autocomplete {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            float: left;
            display: none;
            min-width: 160px;
            padding: 4px 0;
            margin: 0 0 10px 25px;
            list-style: none;
            background-color: #ffffff;
            border-color: #ccc;
            border-color: rgba(0, 0, 0, 0.2);
            border-style: solid;
            border-width: 1px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            *border-right-width: 2px;
            *border-bottom-width: 2px;
        }

        .ui-menu-item > a.ui-corner-all {
            display: block;
            padding: 3px 15px;
            clear: both;
            font-weight: normal;
            line-height: 18px;
            color: #555555;
            white-space: nowrap;
            text-decoration: none;
        }

        .ui-state-hover, .ui-state-active {
            color: #ffffff;
            text-decoration: none;
            background-color: #0088cc;
            border-radius: 0px;
            -webkit-border-radius: 0px;
            -moz-border-radius: 0px;
            background-image: none;
        }
    </style>

    <?php
    if(!isset($imovel_nome)){
    echo '<script type="text/javascript">
    document.getElementById("uploadPreview").style.display = "none";
    
    </script>';
    }
