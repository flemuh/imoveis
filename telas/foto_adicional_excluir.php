<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');

  $imagemnome = $_POST['imagemnome'];
  $fotoexcluir = crudimovel::getInstance(Conexao::getInstance());
  $dados = $fotoexcluir->excluirfotosupload($imagemnome);

  //exclusao de foto da pasta
  $pastaldel = '../imagens';
  unlink($pastaldel . '/' . $imagemnome);

  echo json_encode($imagemnome);

  return;