<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    require_once("../class/autoload.php");

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $ret = Retangulo::Listar($tipo = 1, $info = $id);

        $reta = new Retangulo($id, $ret[0]['cor'], $ret[0]['idTabuleiro'], $ret[0]['ladoB'],$ret[0]['ladoC']);

        $bah = $reta->Excluir();
        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $ladoB = isset($_POST['ladoB']) ? $_POST['ladoB'] : "";
        $ladoC = isset($_POST['ladoC']) ? $_POST['ladoC'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTabuleiro = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $reta = new Retangulo($id, $cor, $idTabuleiro, $ladoB, $ladoC);
    
        echo $reta;

        $bah = $reta->Editar();
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $ladoB = isset($_POST['ladoB']) ? $_POST['ladoB'] : "";
        $ladoC = isset($_POST['ladoC']) ? $_POST['ladoC'] : "";
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $tabuleiro = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        echo $cor;

        $reta = new Retangulo ($id, $cor, $tabuleiro, $ladoB, $ladoC);

        $bah = $reta->Salvar();
        
        echo $bah;
    }
    
    
    if($bah == true){
        header("location:../index/indexret.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

