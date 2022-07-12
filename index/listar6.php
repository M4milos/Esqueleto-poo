<?php
    require_once("../class/autoload.php");
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar quadrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo2.css'>
    <?php
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

        if($acao == 'editar'){
            $id = isset($_GET['id']) ? $_GET['id'] : "";
            //echo $id;

            $cubo = Cubo::Listar($tipo = 1, $info = $id);

            //var_dump($cubo);

        }

        //var_dump($teste);
    ?>
</head>
<body>
    <center>
    <fieldset>
    <form action="../processa/processa6.php" method="POST">
        <div class="col-12">
            <label for="inputAddress" class="form-label"></label>
            <input readonly class="form-control" type="hidden" id="id" name="id" value="<?php echo $cubo[0]['ID']; ?>">
        </div>
        <div class="col-12">
            <label class="form-label" for="cor">Cor: </label>
            <input class="form-control" type="color" id="cor" name="cor" value="<?php echo $cubo[0]['cor']; ?>">
        </div>
        <div class="col-md-2"><br>
            <label class="form-label" for="idQuadrado">ID do tabuleiro</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idQuadrado">
                <?php
                require_once "../utils/operacao.php";
                    echo ListarQuadrado($cubo[0]['idQuadrado']);
                ?>
            </select><br>
        <input class="btn btn-outline-dark vidro" type="submit" value="Enviar" name="nome" id="acao">
        </div> 
    </form>
    </fieldset>
    </center>
</body>
</html>