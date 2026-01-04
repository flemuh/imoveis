
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');

header('Cache-Control: no-cache, must-revalidate'); 
header('Content-Type: application/json; charset=utf-8');
ob_clean();//clears the output buffer


$ID=$_POST['id'];



?>

<!--                    <div class="col-3 col-xs-3 col-sm-3 col-md-3 col-lg-3 ">-->
<!--                        <div id="detalhadoparte1">-->
                            <!--consulta todos imoveis-->
                            <?php
                            $imoveis = crudimovel::getInstance(Conexao::getInstance());
                            $dados = $imoveis->consultaimovelporid($ID);
                            foreach ($dados as $item):
                                $imovel_id = $item->IDIMOVEL;
                                $imovel_valor = $item->IMOVELVALOR;
                                $imovel_titulo = $item->IMOVELTITULO;
                                $imovel_descricao = $item->IMOVELDESCRICAO;
                                $imovel_comodos = $item->IMOVELCOMODOS;
                                $imovel_categoria = $item->IMOVELCATEGORIA;
                                $imovel_suites = $item->IMOVELSUITES;
                                $imovel_churrasqueira = $item->IMOVELCHURRASQUEIRA;
                                $imovel_garagem = $item->IMOVELGARAGEM;
                                $imovel_area_servico = $item->IMOVELSERVICO;
                                $imovel_banheiro = $item->IMOVELBANHEIROS;
                                $imovel_sala = $item->IMOVELSALAS;
                                $imovel_piscina = $item->IMOVELPISCINA;
                                $imovel_novidades = $item->NOVIDADES;
                            endforeach;
                            ?>
<!--                            <div class="info">-->
<!--                                <ul>-->
<!--                                    <li><strong>Valor:</strong>R$ --><?php //echo $imovel_valor ?><!-- <strong>| Tipo:</strong> Casa</li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!---->
<!--                            <div class="descricao">-->
<!--                                <br/>-->
<!--                                --><?php //echo $imovel_descricao ?>
<!--                            </div>  fecha descricao-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">-->
<!--                        <div id="detalhadoparte2">-->
<!---->
<!--                            <div class="descricao">-->
<!--                                <br/>-->
<!--                                --><?php //echo $imovel_descricao ?>
<!--                            </div>   fecha descricao-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color: #6d6f66; height: 20%;">-->
<!--                        <div id="detalhadoparte3">-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                            <p></p>-->
<!--                        </div>-->
<!--                    </div>-->

                <!-- Fotorama from CDNJS, 19 KB -->
                <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8">

                            <!-- Mostrar FOTO Principal -->
                            <!---->
                            <?php
                            $idimovelfoto = $ID;
                            $idimovel = $ID;
                            $idimovelcadastro = $ID;
                            $fotomostrar = crudimovel::getInstance(Conexao::getInstance());
                            $dados = $fotomostrar->selecionaimgimove($ID);
                            ?>
                            <div class="fotorama"     data-allowfullscreen="native"   data-width="100%"
                                 data-ratio="800/600"
                                 data-minwidth="300"
                                 data-maxwidth="1000"
                                 data-minheight="300"
                                 data-maxheight="100%">
                                <?php
                                foreach ($dados as $item):
                                    $imagemnome = $item->IMOVELNOME;
                                   
                                    echo '<img id="'.$imagemnome.'" src="../imagens/'. $imagemnome .'">';
                                     ?>
                                <?php
                                endforeach;
                                $dados = $fotomostrar->selecionaimagenscadastradas($idimovelfoto);
                                foreach ($dados as $item):
                                    $imagemnome = $item->FOTONOME;
                                    
                                    echo '<img id="'.$imagemnome.'" src="../imagens/'. $imagemnome .'">';
                                    ?>
                                <?php
                                endforeach;
                                ?>
                            </div>

                        </ul>
                        <!-- termina FOTO ADICIONAL -->
                    </div>
                    <div class="col-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <div id="detalhadoparte5">
                            <div style="padding: 15%" class="itens">
                                <ul>


                                    <li ><strong>Valor: </strong><?php echo number_format($imovel_valor, 2); ?> R$</li>
                                    </br>
                                    <li><strong><?php echo $imovel_categoria ?></strong></li>
                                    </br>
                                    <li>Descricao:<?php echo $imovel_descricao ?></li>
                                    </br>
                                    </br>
                                    <li>Comodos: <?php echo $imovel_comodos ?> Dormitórios</li>
                                    <li>Suites: <?php echo $imovel_suites ?> Suite</li>
                                    <li>Churrasqueira: <?php echo $imovel_churrasqueira ?></li>
                                    <li>Garagem: para <?php echo $imovel_garagem ?> carros</li>
                                    <li>Área de serviço:<?php echo $imovel_area_servico ?></li>
                                    <li>Banheiros:<?php echo $imovel_banheiro ?></li>
                                    <li>Salas:<?php echo $imovel_sala ?></li>
                                    <li>Piscina:<?php echo $imovel_piscina ?></li>




                                </ul>
                            </div> <!-- fecha itens -->
                        </div>
                    </div>
