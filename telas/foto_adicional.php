
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/bd.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/imoveis/dao/crudimovel.php');


header('Cache-Control: no-cache, must-revalidate'); 
header('Content-Type: application/json; charset=utf-8');
ob_clean();//clears the output buffer


// debug this file
// echo json_encode($data);
// return ;
// die();

$data = $_POST;
$foto = $_FILES['foto'];
$idimovel = $data['id_imovel'];
        
// Largura m�xima em pixels
$largura = 1500;
// Altura m�xima em pixels
$altura = 1800;
// Tamanho m�ximo do arquivo em bytes
$tamanho = 10000;

$error = array();

// Verifica se o arquivo � uma imagem
if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])) {
    $error[1] = "Isso n�o � uma imagem.";
}

// Pega as dimens�es da imagem
if ($foto != null) {
    $dimensoes = getimagesize($foto["tmp_name"]);
} else {
    echo "erro foto";
    return;
}

// Verifica se a largura da imagem � maior que a largura permitida
//if($dimensoes[0] > $largura) {
//  $error[2] = "A largura da imagem n�o deve ultrapassar ".$largura." pixels";
//  }

// Verifica se a altura da imagem � maior que a altura permitida
//if($dimensoes[1] > $altura) {
//  $error[3] = "Altura da imagem n�o deve ultrapassar ".$altura." pixels";
//}

// Verifica se o tamanho da imagem � maior que o tamanho permitido
//if($foto["size"] > $tamanho) {
//  $error[4] = "A imagem deve ter no m�ximo ".$tamanho." bytes";
//  }

// Se n�o houver nenhum erro
if (count($error) == 0) {

    // Pega extens�o da imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

    // Gera um nome �nico para a imagem
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

    // Caminho de onde ficar� a imagem
    $caminho_imagem = "../imagens/" . $nome_imagem;

    // Faz o upload da imagem para seu respectivo caminho
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);

    //variaveis foto
    //$idimovel = strip_tags(trim ($_POST['imovelid']));
    $idimovel = $idimovel;
    $fotonome = $nome_imagem;


    //cadastro no banco

    $insert = crudimovel::getInstance(Conexao::getInstance());
    $foto = $insert->inserirfoto($idimovel, $fotonome);

    $var = [
    		'fotoid' => $foto,
    		'idimovel' => $idimovel,
    		'fotonome' => $fotonome,
    ];

    echo json_encode($var);

    return ;

}

?>
