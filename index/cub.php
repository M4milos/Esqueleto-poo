<?php
    require_once("../class/autoload.php");
?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilocubo.css'>
    <?php

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $idQuad = isset($_GET['idQuadrado']) ? $_GET['idQuadrado'] : 0;
        $cubo = Cubo::Listar($tipo = 1, $info = $id);
        $vet = Cubo::Magica($idQuad);

        //var_dump($cubo);
        // $id,$cor,$tabuleiro,$base,$altura,$lado1,$lado2
        $cubo = new Cubo($id, $cubo[0]['idQuadrado'], $vet['lado'], $cubo[0]['cor'], $vet['idTabuleiro']);
        //array(1) { [0]=> array(6) { ["ID"]=> string(2) "10" [0]=> string(2) "10" ["cor"]=> string(7) "#941919" [1]=> string(7) "#941919" ["idQuadrado"]=> string(2) "16" [2]=> string(2) "16" } }
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
        ?>
    </center>
        <?php
            echo $cubo;

            echo "<br>";

            echo $cubo->desenha();

        ?>
    <!-- <div class='container cor'></div> -->

</body>
</html>