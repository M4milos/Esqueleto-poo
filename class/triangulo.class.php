<?php
require_once("../class/autoload.php");

class Triangulo extends Based{
    private $base;
    private $lado1;
    private $lado2;

    public function __construct($id,$cor,$tabuleiro,$base,$lado1,$lado2){
        parent::__construct($id,$cor,$tabuleiro);
        $this->setBase($base);
        $this->setLado1($lado1);
        $this->setLado2($lado2);
    }
    public function setBase($base){
        if($base > 0) {
        $this->base = $base;
        }
    }
    public function getBase(){return $this->base;}

    public function setLado1($lado1){
        if($lado1 > 0) {
        $this->lado1 = $lado1;
        }
    }
    public function getLado1(){return $this->lado1;}

    public function setLado2($lado2){
        if($lado2 > 0) {
        $this->lado2 = $lado2;
        }
    }
    public function getLado2(){return $this->lado2;}

    public function Desenha(){
        return "<div style='width: 0;  height: 0;  border-left: ".$this->getLado1()."px solid transparent; border-right: ".$this->getLado2()."px solid transparent; border-bottom: ".$this->getBase()."px solid ".$this->getCor().";'></div>";
    }

    public function AchaTriangulo(){
        if ($this->getBase() == $this->getLado1() && $this->getLado1() == $this->getLado2()) {
            return "Triângulo equilátero";
        }elseif ($this->getBase() != $this->getLado1() && $this->getBase() != $this->getLado2() && $this->getLado1() != $this->getLado2()) {
            return "Triâgulo escaleno";
        }else{
            return "Triângulo isóceles";
        }
    }

    public function Salvar(){
        $sql = "INSERT INTO triangulo (base, lado1, lado2, cor, idTabuleiro) VALUES (:base, :lado1, :lado2, :cor, :idTabuleiro)";
        $param =  array(":base" => $this->getBase(), 
                        ":lado1" => $this->getLado1(), 
                        ":lado2" => $this->getLado2(),
                        ":cor" => $this->getCor(),
                        ":idTabuleiro" => $this->getIdtab());
        return parent::Execute($sql, $param);
    }
    
    public static function Listar($tipo = 0, $info = "" ){
            $sql = 'SELECT * FROM triangulo';
            //adicionar parametros
            if ($tipo > 0)             
                switch ($tipo) {
                    case '1': $sql .= " WHERE ID = :info"; break; 
                    case '2': $sql .= " WHERE base LIKE :info"; $info .= "%"; break;
                    case '3': $sql .= " WHERE lado1 LIKE :info"; $info .= "%"; break;
                    case '4': $sql .= " WHERE lado2 LIKE :info"; $info .= "%"; break;
                }

            $param = array();
            if ($tipo > 0) 
                $param = array(':info' => $info);

            return parent::Buscar($sql,$param);
    }

    public function Editar(){
        $sql = "UPDATE triangulo SET lado1 = :lado1, lado2 = :lado2, cor = :cor, idTabuleiro = :idTabuleiro, base = :base WHERE ID = :id";
        $param =    array(  ":lado1" => $this->getLado1(),
                            ":lado2" => $this->getLado2(),
                            ":base" => $this->getBase(),
                            ":cor" => $this->getCor(),
                            ":id" => $this->getId(),
                            ":idTabuleiro" => $this->getIdtab());
            return parent::Execute($sql,$param);
    }
    
    public function Excluir(){
            $sql = ('DELETE FROM triangulo WHERE ID = :id');
            $param = array(":id" => $this->getId());
        return parent::Execute($sql, $param);
    }

    public function __toString(){
        $str = parent::__toString();
        $str .= "<h5>[Triângulo] <br>".
                "Base: ". $this->getBase(). "<br>".
                "Lado esquerdo: ". $this->getLado1(). "<br>".
                "Lado direito: ". $this->getLado2(). "<br>".
                "Tipo de triângulo: ". $this->AchaTriangulo(). "<br>";
        return $str;
    }
}

// $id,$cor,$tabuleiro,$base,$altura,$lado1,$lado2

// $tri = new Triangulo(1,'green',1,100,50,100,100);


// //var_dump($tri);

// echo $tri;

?>