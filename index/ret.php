<?php
    require_once("../class/autoload.php");
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retângulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo2.css'>
    <?php

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $ret = Retangulo::Listar($tipo = 1, $info = $id);
        // $id,$cor,$tabuleiro,$base,$altura,$lado1,$lado2
        $reta = new Retangulo($id, $ret[0]['cor'], $ret[0]['idTabuleiro'], $ret[0]['ladoB'],$ret[0]['ladoC']);

        //echo $tri;

            /*echo "Lado: ". $lado. "<br>".
            "Cor: ". $cor;
            */
    ?>
</head>
<body>
    <center>
        <?php   
            include "../menu/menu.php";

            echo $reta;

            echo "<br>";

            echo $reta->desenha();

        ?>
    </center>
    <!-- <div class='container cor'></div> -->

</body>
</html>