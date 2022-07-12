<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe Retangulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo.css'>  
    <?php
        require_once "../class/retangulo.class.php";
        
        $id = isset($_POST['id']) ? $_POST['id'] : "";
        $ladoC = isset($_POST['ladoC']) ? $_POST['ladoC'] : "";
        $ladoB = isset($_POST['ladoB']) ? $_POST['ladoB'] : "";
        $cor = isset($_POST['cor']) ? $_POST['cor'] : "";
        $idTab = isset($_POST['idTabuleiro']) ? $_POST['idTabuleiro'] : "";

        $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 0;
        $info = isset($_POST['info']) ? $_POST['info'] : "";
        
    ?>
    
    <script>
        function Excluir(url){
            if(confirm("Confimar exclusão?"))
            location.href = url;
        }
        
        /*
        function Att(){
            window.location.reload();
        }
        */

    </script>
    </head>
<body>
    <?php
        include "../menu/menu.php";
    ?>
<br>
<fieldset class="teste">
    <center>
        <h3>Criação de quadrados</h3>
    </center>
    <form action="../processa/processa5.php" method="POST" class="row g-3">
        <div class="col-md-6">
            <label class="form-label" for="lado">Digite a medida do lado de cima do retângulo: </label>
            <input type="text" class="form-control" id="ladoC" name="ladoC">
        </div>
        <div class="col-md-6">
            <label class="form-label" for="lado">Digite a medida do lado de baixo do retângulo: </label>
            <input type="text" class="form-control" id="ladoB" name="ladoB">
        </div>
        <div class="col-md-6">
            <label class="form-label"  for="cor">Escolha a cor do quadrado: </label>
            <input type="color" class="form-control" id="cor" name="cor">
        </div>
        <center>
            <div class="col-md-2">
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idTabuleiro">
                    <?php
                        require_once "../utils/operacao.php";
                            echo ListarTabuleiro(0);
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
                <h2>Buscar quadrado</h2>
            <legend class="col-form-label col-sm-2 pt-0"> Pesquisar por: </legend>
                <div class="col-sm-10">
                    <div class="form-check">  
                        <input class="form-check-input" type="radio" name="tipo" value="1" <?php if ($tipo == "1") echo "checked" ?>> 
                        <label class="form-check-label" for="id">
                            ID do quadrado
                        </label>
                    </div>
                    <div class="form-check">      
                        <input class="form-check-input" type="radio" name="tipo" value="2" <?php if ($tipo == "2") echo "checked" ?>> 
                        <label class="form-check-label" for="ladoC">
                            Tamanho do lado de cima
                        </label>
                    </div>
                    <div class="form-check">      
                        <input class="form-check-input" type="radio" name="tipo" value="2" <?php if ($tipo == "3") echo "checked" ?>> 
                        <label class="form-check-label" for="ladoB">
                            Tamanho do lado de baixo
                    </label>
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
            <td>Lado de cima do retangulo</td>
            <td>Lado de baixo do retangulo</td>
            <td>Cor do quadrado</td>
            <td>Tabuleiro</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    <?php
    
        //echo $Quadrado;
        $lista = Retangulo::Listar($tipo,$info);
        //var_dump($lista);
        foreach ($lista as $item) {
            $cor = str_replace('#','%23', $item['cor']);
        ?>
        
            <tr>
                <td><a href="ret.php?id=<?php echo $item['ID']?>"><?php echo $item['ID']; ?></td></a>
                <td><?php echo $item['ladoC']; ?></td>
                <td><?php echo $item['ladoB']; ?></td>
                <td><div style='width: 4vh; height: 2vh; background: <?php echo $item['cor']?>;'></td>
                <td><?php echo $item['idTabuleiro'] ?></td>
                <td><a href="listar5.php?acao=editar&id=<?php echo $item['ID']?>">Editar</a></td>
                <td><a href="javascript:Excluir('../processa/processa5.php?acao=excluir&id=<?php echo $item['ID']?>')">Excluir</a></td>
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