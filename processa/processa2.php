<?php 
    // if (isset($_GET['acao']) && !empty($_GET['acao']) && isset($_POST['salvar']) && !empty($_POST['salvar']) &&
    // isset($_POST['nome']) && !empty($_POST['nome'])){

    require_once "../class/tabuleiro.class.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
    
    $salvar = isset($_POST['salvar']) ? $_POST['salvar'] : "";

    $editar = isset($_POST['nome']) ? $_POST['nome'] : "";
    
    if($acao == "excluir"){

        $id = isset($_GET['id']) ? $_GET['id'] : "";    
        
        $tab = Tabuleiro::Listar($tipo = 1, $info = $id);

        $tab = new Tabuleiro($id, $tab[0]['Lado']);

        $bah = $tab->Excluir();


        //echo "excluir";
    }
    
    if ($editar == "Editar") {
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $Lado = isset($_POST['lado']) ? $_POST['lado'] : "";

        $tab = new Tabuleiro($id,$Lado);

        $bah = $tab->Editar();
    }

    

    if ($salvar == "salvar") {
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $Lado = isset($_POST['tab']) ? $_POST['tab'] : "";

        echo $Lado;

        $tab = new Tabuleiro($id,$Lado);

        var_dump($tab);

        $bah = $tab->Salvar();

        var_dump($bah);
    }
    
    // if ($tche == true) {
    //     header("location:../index/indexTab.php");
    // }
    // else{
    //     echo "Por favor exclua a chave estrangeira primeiro";
    // }

    if($bah == true){
        header("location:../index/indexTab.php");
    }
    else{   
        echo "Erro ao executar o salvar";
    }
// }
// else{
//     header("location:../index/indexTab.php");
// }
?>
