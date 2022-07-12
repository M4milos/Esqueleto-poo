<?php
    require_once('../class/autoload.php');
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Cubo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>  
    <?php
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idQuad = isset($_POST['idQuadrado']) ? $_POST['idQuadrado'] : "";

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
        $info = isset($_POST['info']) ? $_POST['info'] : "";
        
    ?>
    
    <script>
        function Excluir(url){
            if(confirm("Confimar exclusão?"))
            location.href = url;
        }
    </script>
    </head>
<body>
    <?php
        include "../menu/menu.php";
    ?>
<br>
<fieldset class="teste">
    <center>
        <h3>Criação de cubos</h3>
    </center>
    <form action="../processa/processa6.php" method="POST" class="row g-3">
        <div class="col-md">
            <label class="form-label"  for="cor">Escolha a cor do cubo: </label>
            <input type="color" class="form-control" id="cor" name="cor">
        </div>
        <center>
            <div class="col-md-2">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idQuadrado">
                    <?php
                        require_once "../utils/operacao.php";
                            echo ListarQuadrado(0);
                    ?>
                </select>
                <br>
                <input class="btn btn-outline-dark vidro" type="submit" value="Salvar" name="salvar">
            </div>    
        </center>
    </form>
</fieldset>
<fieldset class="teste">
    <form method="post">
        <div>
            <fieldset class="row mb-3">
                <h2>Buscar cubo</h2>
            <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                <div class="col-sm-10">
                    <div class="form-check">  
                        <input class="form-check-input" type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> 
                        <label class="form-check-label" for="id">
                            ID do cubo
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="3" <?php if ($tipo == "2") echo "checked" ?>> 
                        <label class="form-check-label" for="cor">
                            Cor do cubo
                        </label>
                    </div>
                    <div class="form-check"> 
                        <input class="form-check-input" type="radio" name="tipo" value="4" <?php if ($tipo == "3") echo "checked" ?>> 
                        <label class="form-check-label" for="idQuadrado">
                            ID do quadrado
                        </label> 
                    </div>
                    </div>
                <center>
                    <div class="col-md-4"> 
                        <input class="col-md-4 cor" type="text" name="info" id="info" value="<?php echo $info;?>">
                        <input class="btn btn-outline-dark vidro" type="submit" name="procurar" id="procurar">
                    </div>
                </center>
        </div>
    </form>
</fieldset>

<hr>

<fieldset class="teste">
<div class="table-responsive-sm">
    <table border="1px" class="table table-dark table-striped-columns">
        <tr>
            <td>ID</td>
            <td>Cor do cubo</td>
            <td>Quadrado</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    <?php
    
        //echo $Quadrado;
        $lista = Cubo::Listar($tipo,$info);
        //var_dump($lista);
        foreach ($lista as $item) {
            $cor = str_replace('#','%23', $item['cor']);
        ?>
            <tr>
                <td><a href="cub.php?id=<?php echo $item['ID']; ?>&idQuadrado=<?php echo $item['idQuadrado']?>"><?php echo $item['ID']; ?></a></td>
                <td><?php echo $item['cor'];?></td>
                <td><?php echo $item['idQuadrado'] ?></td>
                <td><a href="listar6.php?acao=editar&id=<?php echo $item['ID']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa6.php?acao=excluir&id=<?php echo $item['ID']?>&idQuadrado=<?php echo $item['idQuadrado']?>')">Excluir</a></td>
            </tr>
        <?php
        }
    ?>
    </table>
    </div>
    </fieldset>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>