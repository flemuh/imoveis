<?php
session_start();

ini_set("memory_limit","128M");
ini_set("post_max_size","60M");
ini_set("upload_max_filesize","50M");
ini_set("mysqlconnect_timeout","300");
ini_set("default_socket_timeout","300");

require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/usuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudusuario.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/classes/imoveis.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/imoveis/js/scripts.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta name="keywords" content="Imóveis, Casas, Apartamento, Chácaras, Terrenos">
  <meta name="description" content="Imóveis">
  <meta name="author" content="Fernando Humel">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Moradia Lazer</title>
</head>
<body>

<!-- The Modal -->
<div id="myModal" class="modal-novo">
  <!-- Modal content -->
  <div class="modal-content-novo">
    <span class="close-modal-novo">&times;</span>
       <h4>Formul�rio de Contato</h4>
    <form id="main-contact-form" name="contact-form" role="form">
          <div class="form-group">
            <label for="name-form">Nome</label>
            <input type="text" class="form-control" name="nome" id="name-form" aria-describedby="emailHelp" placeholder="Name" required />
            <small id="emailHelp" class="form-text text-muted">Digite acima seu nome.</small>
          </div>
          <div class="form-group">
            <label for="name-telefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" id="name-telefone" aria-describedby="emailHelp" placeholder="Telefone" required />
            <small id="emailHelp" class="form-text text-muted">Digite acima seu Telefone.</small>
          </div>
          <div class="form-group">
            <label for="name-form">Email</label>
            <input type="text" class="form-control" name="email" id="name-email" aria-describedby="emailHelp" placeholder="Email" required />
            <small id="emailHelp" class="form-text text-muted">Digite acima seu email.</small>
          </div>
          <div class="form-group">
            <label for="name-form">Mensagem</label>
              <textarea rows="8" class="form-control" name="mensagem" id="mensagem-form" aria-describedby="emailHelp" placeholder="Message" required></textarea>
            <small id="emailHelp" class="form-text text-muted">Digite acima sua Mensagem.</small>
          </div>

        <button id="executar" class="btn btn-primary">Enviar Mensagem</button>
    </form>
  </div>
</div>


<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal-novo {
  position: absolute; /* Stay in place */
  z-index: 999; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content-novo {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 650px;
}

/* The Close Button */
.close-modal-novo {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close-modal-novo:hover,
.close-modal-novo:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>




  <div class="warper">
    <div class="container">
      <div class="row">

        <!-- Modal -->
        <div class="modal" id="alertacontato" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

             <!-- Modal -->
     <div class="modal fade" id="empModal" role="dialog">
      <div class="modal-dialog">
   
       <!-- Modal content-->
       <div class="modal-content">
        <div class="modal-header">
          <center><h4 class="modal-title">Imovel detalhado</h4></center>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
   
        </div>
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
       </div>
      </div>
     </div>


        <!-- Modal -->
        <div class="modal fade-in" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Entre em contato conosco.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="col-6 col-md-6 col-lg-6 col-sm-6 col-xs-6 form-line">
                    <div class="form-group">
                      <label for="exampleInputUsername"></label>
                      <input type="text" class="form-control" id="nome"
                      placeholder="Nome" required>
                    </div>
                  </div>
                  <div class="col-6 col-md-6 col-lg-6 col-sm-6 col-xs-6 form-line">
                    <div class="form-group">
                      <label for="telephone"></label>
                      <input type="tel" class="form-control" id="telephone"
                      placeholder="Telefone" required>
                    </div>
                  </div>
                  <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 form-line">
                    <div class="form-group">
                      <label for="exampleInputEmail"></label>
                      <input type="email" class="form-control" id="exampleInputEmail"
                      placeholder="Email" required>
                    </div>

                  </div>
                  <div class="col-12 col-md-12 col-lg-12 col-sm-12 col-xs-12 form-line">
                    <div class="form-group">
                      <label for="description"></label>
                      <textarea class="form-control" id="description"
                      placeholder="Escreva sua Mensagem." required></textarea>
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button id="enviar_msg" type="button" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </div>
       </div>
     </div>

    <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2"  >
    <!-- <div class="col-12 col-xs-12 col-sm-12 col-md-2 col-lg-2 col-offset-1 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1" > -->

      <nav  id="" class="navbar  "
      style="padding:0px; margin:0px;">



      <div class="collapse navbar-collapse " id="ca-navbar" >
          <h1 class="heading">
              <a href="/" style="opacity: 1;"><img class="logo img-responsive " src="../img/logo.png"></a>
          </h1>
        <ul class="navbar-nav" id="nav">
          <?php
          if (isset($_SESSION['logado'])) {

            if ($_SESSION['logado'] == 1) {
              ?>
              <div id="menu" class="">
                  <ul>
                      <li class="active"><a href='home.php'>Home</a></li>
                      <li><a href='imoveis.php'>Imoveis</a></li>
                      <li onclick="retornar();" id="gfdgdf"><a >Contato</a></li>
                      <li><a href='novo_imovel.php'>Novo Imovel</a></li>
                      <li><a href='loginsair.php'>Sair</a></li>

                  </ul>

              <?php
            }
          }

          if (!isset($_SESSION['logado'])) {
            ?>
            <div id="menu" class="hv=100 " >
              <ul>
                <li class="active"><a href='home.php'>Home</a></li>
                <li><a href='imoveis.php'>Imoveis</a></li>
             <li onclick="retornar();" id="gfdgdf"><a >Contato</a></li>
                <li id="login-btn"><a href='login.php'>Logar</a></li>

              </ul>
          </div>
          <?php
        }
        ?>
      </ul>

      </nav>


    </div>
        <div class="menu__wrapper col-md-12 d-md-none">
            <h1 class="heading">
                <a href="/" ><img id="logo-mobile " src="../img/logo.png"></a>
            </h1>
            <div class="menu__mobile-button">
                <span><i class="fa fa-bars" aria-hidden="true"></i></span>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="mobile-menu d-md-none">

            <div class="container">
                <div class="mobile-menu__close">
                    <span><i class="mdi mdi-close" aria-hidden="true"></i></span>
                </div>
                <nav class="mobile-menu__wrapper">
                    <ul>
                      <?php
                    if ($_SESSION['logado'] == 1) {
                      ?>
                              <li class="active"><a href='home.php'>Home</a></li>
                              <li><a href='imoveis.php'>Imoveis</a></li>
                             <li onclick="retornar();" id="gfdgdf"><a >Contato</a></li>
                              <li><a href='novo_imovel.php'>Novo Imovel</a></li>
                              <li><a href='loginsair.php'>Sair</a></li>
                      <?php
                    }else {
                      ?>
                       <li class="active"><a href='home.php'>Home</a></li>
                      <li><a href='imoveis.php'>Imoveis</a></li>
                      <li onclick="retornar();" id="gfdgdf"><a >Contato</a></li>
                      <li id="login-btn"><a href='login.php'>Logar</a></li>
                      <?php
                    }
                    ?>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- Mobile menu -->
<span style="position: absolute; z-index: 999; top:47%; left:51%; background: none" id="loader"><img src="../img/Preloader_8.gif">
    <script>
        'use strict';


        $('#contato_form_modal').hide();

        //Open mobile menu
        $('.menu__mobile-button, .mobile-menu__close').on('click', function () {
            $('.mobile-menu').toggleClass('active');
        });

        //Close mobile menu after click
        $('.mobile-menu__wrapper ul li a').on('click', function () {
            $('.mobile-menu').removeClass('active');
        });

        document.onkeydown = keydown;

        $('#login-btn').hide();





function keydown (evt) {

    if (!evt) evt = event;

    if (evt.ctrlKey && evt.altKey && evt.keyCode === 115) {

        $('#login-btn').show();
        alert("CONTROL+ALT+F4");

    } else if (evt.shiftKey && evt.keyCode === 9) {

        $('#login-btn').show();
        alert("Shift+TAB");

    }

}
    </script>
    <style>
         .menu__mobile-button {
            color: #000;
            opacity: .5;
             font-size: 20px;
            transition: all .3s;
            background-color: transparent;
            border: none;
        }
    </style>
</span>
<script>

            function retornar() {

            $('#myModal').show();
        }

        $('#myModal').hide()



        $(".close-modal-novo").on("click", function () {
            $('#myModal').hide();
        });

        $("#executar").on("click", function (e) {

            $nome = $('#name-form').val();
            $telefone = $('#telefone-form').val();
            $email = $('#email-form').val();
            $msg = $('#mensagem-form').val();

            if (!$nome && !$telefone && !$email && !$msg) {
                toastr.warning("Digite todos campos");
                return false;
            }

            $.ajax({
                method: "POST",
                url: "../telas/send.php",
                data: {nome: $nome, telefone: $telefone, email: $email, mensagem: $msg},
                beforeSend: function (xhr) {
                    $("#loader").show();
                }

            })
                .done(function (data) {
                    $("#loader").fadeOut();
                    toastr.success("Email enviado com sucesso");
                    $('#myModal').hide();
                });

        });


</script>