<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    require_once("../class/autoload.php");

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $tria = Triangulo::Listar($tipo = 1, $info = $id);

        $tri = new Triangulo($id, $tria[0]['cor'], $tria[0]['idTabuleiro'], $tria[0]['base'],$tria[0]['lado1'], $tria[0]['lado2']);

        $bah = $tri->Excluir();
        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : "";
        $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : "";
        $base = isset($_POST['base']) ? $_POST['base'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTabuleiro = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $tri = new Triangulo($id,$cor,$idTabuleiro,$base,$lado1,$lado2);
    
        echo $tri;

        $bah = $tri->Editar();
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $lado1 = isset($_POST['lado1']) ? $_POST['lado1'] : "";
        $lado2 = isset($_POST['lado2']) ? $_POST['lado2'] : "";
        $base = isset($_POST['base']) ? $_POST['base'] : "";
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $tabuleiro = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        echo $cor;

        $Tri = new Triangulo ($id,$cor,$tabuleiro,$base,$lado1, $lado2);

        $bah = $Tri->Salvar();
        
        echo $bah;
    }
    
    
    if($bah == true){
        header("location:../index/indexTri.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

