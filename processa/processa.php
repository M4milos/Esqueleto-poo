<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){
    

        require_once "../class/quadrado.class.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";

    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";

        $quadrado = Quadrado::Listar($tipo = 1, $info = $id);

        $quad = new Quadrado($id,$quadrado[0]['Lado'],$quadrado[0]['Cor'],$quadrado[0]['idTabuleiro']);

        $bah = $quad->Excluir();
        
        //echo $bah;

        //echo "excluir";
    }
    if ($editar == "Enviar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $quad = new Quadrado($id,$lado,$cor,$idTab);

        var_dump($quad);

        $bah = $quad->Editar();
        //echo $bah;
        //echo "editar";
    }

    if ($salvar == "Salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $lado = isset($_POST['lado']) ? $_POST['lado'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";
    
        $quad = new Quadrado ($id, $lado, $cor, $idTab);

        $bah = $quad->Salvar();
         
        //echo $bah;
    }
    
    if($bah == true){
        header("location:../index/index.php");
    }
    else{   
        echo "Erro ao executar o comando";
    }
// }else {
//     header("location:../index/index.php");
// }
?>

