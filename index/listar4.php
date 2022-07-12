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

            $tri = Triangulo::Listar($tipo = 1, $info = $id);

            //var_dump($tri);

        }

        //var_dump($teste);
    ?>
</head>
<body>
    <center>
    <fieldset>
    <form action="../processa/processa4.php" method="POST">
        <div class="col-12">
            <label for="inputAddress" class="form-label"></label>
            <input readonly class="form-control" type="hidden" id="id" name="id" value="<?php echo $tri[0]['ID']; ?>">
        </div>
        <div class="col-12">
            <label for="id" class="form-label">Tamanho da base: </label>
            <input class="form-control" type="text" id="base" name="base" value="<?php echo $tri[0]['base']; ?>">
        </div>
        <div class="col-12">
            <label for="id" class="form-label">Tamanho do lado esquerdo: </label>
            <input class="form-control" type="text" id="lado1" name="lado1" value="<?php echo $tri[0]['lado1']; ?>">
        </div>
        <div class="col-12">
            <label for="id" class="form-label">Tamanho do lado direito: </label>
            <input class="form-control" type="text" id="lado2" name="lado2" value="<?php echo $tri[0]['lado2']; ?>">
        </div>
        <div class="col-12">
            <label class="form-label" for="cor">Cor: </label>
            <input class="form-control" type="color" id="cor" name="cor" value="<?php echo $tri[0]['cor']; ?>">
        </div>
        <div class="col-md-2"><br>
            <label class="form-label" for="idTabuleiro">ID do tabuleiro</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="idTabuleiro">
                <?php
                require_once "../utils/operacao.php";
                    echo ListarTabuleiro($tri[0]['idTabuleiro']);
                ?>
            </select><br>
        <input class="btn btn-outline-dark vidro" type="submit" value="Enviar" name="nome" id="acao">
        </div> 
    </form>
    </fieldset>


    </center>
</body>
</html>