<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo2.css'>
    <?php
        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";

        if($acao == 'editar'){

            $id = isset($_GET['id']) ? $_GET['id'] : "";
            $nome = isset($_GET['nome']) ? $_GET['nome'] : "";
            $log = isset($_GET['login']) ? $_GET['login'] : "";
            $senha = isset($_GET['senha']) ? $_GET['senha'] : "";

        }

        //var_dump($teste);
    ?>
</head>
<body>
    <form action="../processa/processa3.php" method="POST">
        
    <fieldset>
        <center>
            <div class="col-12">
                <label for="inputAddress" class="form-label"></label>
                <input readonly class="form-control" type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $id ?>">
            </div>
            <div class="col-12">
                <label for="id" class="form-label">Nome: </label>
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $nome; ?>">
            </div>
            <div class="col-12">
                <label for="id" class="form-label">Login: </label>
                <input class="form-control" type="text" id="log" name="log" value="<?php echo $log; ?>">
            </div>
            <div class="col-12">
                <label for="id" class="form-label">Senha: </label>
                <input class="form-control" type="password" id="senha" name="senha" value="<?php echo $senha; ?>">
            </div>
            <input class="btn btn-outline-dark vidro" type="submit" value="Enviar" name="editar" id="acao"> 
        </center>
    </fieldset>
    </form>
</body>
</html>