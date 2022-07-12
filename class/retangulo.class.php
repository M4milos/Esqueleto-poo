<?php
    require_once("../class/autoload.php");
    include_once "../constante/const.php";

    class Retangulo extends Based{
        private $ladoB;
        private $ladoC;

        public function __construct($id, $cor, $tabuleiro, $ladoB, $ladoC){
            parent::__construct($id,$cor,$tabuleiro);
            $this->setLadoB($ladoB);
            $this->setLadoC($ladoC);
        }

        public function setLadoB($ladoB){
            if($ladoB > 0) {
                $this->ladoB = $ladoB;
            }}
        public function getLadoB(){return $this->ladoB;}

        public function setLadoC($ladoC){
            if($ladoC > 0) {
                $this->ladoC = $ladoC;
            }}
        public function getLadoC(){return $this->ladoC;}

        public function Area(){
            return $this->getLadoC() * $this->getLadoB();
        }

        public function Perimetro(){
           return 2 * ($this->getLadoC() + $this->getLadoB());
        }

        public static function Listar($tipo = 0, $info = "" ){
            $sql = 'SELECT * FROM Retangulo';
            //adicionar parametros
            if ($tipo > 0)             
                switch ($tipo) {
                    case '1': $sql .= " WHERE ID like :info"; $info = "%". $info . "%"; break;
                    case '2': $sql .= " WHERE ladoB LIKE :info"; $info .= "%"; break;
                    case '3': $sql .= " WHERE ladoC LIKE :info"; $info .= "%"; break;
                }

            $param = array();
            if ($tipo > 0) 
                $param = array(':info' => $info);

            return parent::Buscar($sql,$param);
        }

        public function Salvar(){
                $sql = "INSERT INTO retangulo (ladoB, ladoC, cor, idTabuleiro) VALUES (:ladoB, :ladoC, :cor, :idTabuleiro)";
                $param =  array(":ladoB" => $this->getLadoB(),
                                ":ladoC" => $this->getLadoC(),
                                ":cor" => $this->getCor(),
                                ":idTabuleiro" => $this->getIdtab());
            return parent::Execute($sql, $param);
        }

        public function Excluir(){
                $sql = "DELETE FROM retangulo WHERE id = :id";
                $param = array(":id" => $this->getId());
            return parent::Execute($sql, $param);
        }

        public function Editar(){
            $sql = "UPDATE retangulo SET ladoB = :ladoB, ladoC = :ladoC, cor = :cor, idTabuleiro = :idTabuleiro WHERE id = :id";
            $param =    array(  ":ladoB" => $this->getLadoB(),
                                ":ladoC" => $this->getLadoC(),
                                ":cor" => $this->getCor(),
                                ":idTabuleiro" => $this->getIdtab(),
                                ":id" => $this->getId());
            return parent::Execute($sql,$param);
        }

        public function Desenha(){
            if ($this->getLadoB() != $this->getLadoC()) {
                $str = "<div style='width: ".$this->getLadoB()."px; height: ".$this->getLadoC()."px; background: ".$this->getCor().";'></div>";
            }else {
                $str = "Não é um retângulo";
            }
            
            
            //$str = $this->getLado();

            return $str;
        }

        public function __toString(){
            return  "<h5>[RETANGULO] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Cor: ". $this->getCor(). "<br>".
                    "Tabuleiro: ". $this->getIdtab(). "<br>".
                    "Lado de baixo: ". $this->getLadoB() ."<br>".
                    "Lado de cima: ". $this->getLadoC() ."<br>".
                    "Área: ". $this->Area()."<br>".
                    "Perimetro: ". $this->Perimetro(). "</h5>";
        }
    }

    // $ret = new Retangulo(200,100,1,'pink',1);

    // echo $ret->Perimetro();

    // echo "<br>";

    // echo $ret->Area();

    // echo "<br>";

    // echo $ret;

?>