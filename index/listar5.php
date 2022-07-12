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

            $ret = Retangulo::Listar($tipo = 1, $info = $id);

            //var_dump($ret);

        }

        //var_dump($teste);
    ?>
</head>
<body>
    <center>
    <fieldset>
    <form action="../processa/processa5.php" method="POST">
        <div class="col-12">
            <label for="inputAddress" class="form-label"></label>
            <input readonly class="form-control" type="hidden" id="id" name="id" value="<?php echo $ret[0]['ID']; ?>">
        </div>
        <div class="col-12">
            <label for="id" class="form-label">Tamanho do lado de cima: </label>
            <input class="form-control" type="text" id="ladoC" name="ladoC" value="<?php echo $ret[0]['ladoC']; ?>">
        </div>
        <div class="col-12">
            <label for="id" class="form-label">Tamanho do lado de baixo: </label>
            <input class="form-control" type="text" id="ladoB" name="ladoB" value="<?php echo $ret[0]['ladoB']; ?>">
        </div>
        <div class="col-12">
            <label class="form-label" for="cor">Cor: </label>
            <input class="form-control" type="color" id="cor" name="cor" value="<?php echo $ret[0]['cor']; ?>">
        </div>
        <div class="col-md-2"><br>
            <label class="form-label" for="idTabuleiro">ID do tabuleiro</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idTabuleiro">
                <?php
                require_once "../utils/operacao.php";
                    echo ListarTabuleiro($ret[0]['idTabuleiro']);
                ?>
            </select><br>
        <input class="btn btn-outline-dark vidro" type="submit" value="Enviar" name="nome" id="acao">
        </div> 
    </form>
    </fieldset>
    </center>
</body>
</html>