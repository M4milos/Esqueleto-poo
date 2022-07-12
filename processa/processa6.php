<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    require_once("../class/autoload.php");

    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $idCubo = isset($_GET['id']) ? $_GET['id'] : "";
        $idQuadrado = isset($_GET['idQuadrado']) ? $_GET['idQuadrado'] : "";

        $cubo = Cubo::Listar($tipo = 1, $info = $idCubo);
        
        $vet = Cubo::Magica($idQuadrado);

        //var_dump($cubo);

        echo "ID:". $idCubo ." - idQuadrado ". $idQuadrado. "- Lado ". $vet['lado']." - cor " . $cubo[0]['cor']." - Id tabuleiro: ". $vet['idTabuleiro'];

        $cub = new Cubo($idCubo, $idQuadrado, $vet['lado'], $cubo[0]['cor'], $vet['idTabuleiro']);

        $bah = $cub->Excluir();

        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idQuadrado = isset($_POST['idQuadrado']) ? $_POST['idQuadrado'] : "";

        
        $cubo = Cubo::Listar($tipo = 1, $info = $id);
        
        $vet = Cubo::Magica($idQuadrado);

        $cubo = new Cubo($id, $idQuadrado, $vet['lado'], $cor, $vet['idTabuleiro']);
    
        echo $cubo;

        $bah = $cubo->Editar();
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idQuadrado = isset($_POST['idQuadrado']) ? $_POST['idQuadrado'] : "";

        //echo $cor;

        $cubo = Cubo::Listar($tipo = 1, $info = $id);

        $vet = Cubo::Magica($idQuadrado);

        var_dump($vet);

        //var_dump($cubo);

        echo "ID: ".$id." - Cor: ".$cor." - idQuadrado: ".$idQuadrado." - IdTabuleiro: ".$vet['idTabuleiro'];

        $cubo = new Cubo($id, $idQuadrado, $vet['lado'], $cor, $vet['idTabuleiro']);

        $bah = $cubo->Salvar(); 
        
        echo $bah;
    }
    
    
    if($bah == true){
        header("location:../index/indexCub.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

