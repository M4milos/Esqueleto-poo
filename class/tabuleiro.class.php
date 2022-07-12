<?php

require_once("../class/autoload.php");
    class Tabuleiro extends DataBased{
        private $id;
        private $lado;

        public function __construct($id, $lado){
            $this->setLado($lado);
            $this->setId($id);     
        }
        public function setId($id){
            if($id > 0) {
            $this->id = $id;
            }
        }
        public function getId(){return $this->id;}

        public function setLado($lado){
            if($lado > 0) {
            $this->lado = $lado;
            }
        }
        public function getLado(){return $this->lado;}

        public function Area(){
            return $this->getLado() * $this->getLado();
        }

        public function Perimetro (){
            return $this->getLado() * Perimetro;
        }

        public static function Listar($tipo = 0, $info = "" ){
            $sql = 'SELECT * FROM Tabuleiro';
            //adicionar parametros
            if ($tipo > 0)             
                switch ($tipo) {
                    case '1': $sql .= " WHERE idTabuleiro like :info"; $info = "%". $info . "%"; break;
                    case '2': $sql .= " WHERE lado LIKE :info"; $info .= "%"; break;
                }

            $param = array();
            if ($tipo > 0) 
                $param = array(':info' => $info);

            return parent::Buscar($sql,$param);
        }

        public function Salvar(){
                $sql = "INSERT INTO Tabuleiro (Lado) VALUES (:lado)";
                $param =  array(":lado" => $this->getLado());
            return parent::Execute($sql, $param);
        }

        public function Excluir(){
            try{
                $sql = "DELETE FROM Tabuleiro WHERE idTabuleiro = :idTabuleiro";
                $param = array(":idTabuleiro" => $this->getId());
                return parent::Execute($sql, $param);
            } catch (Exception $e){ 
                throw new Exception("A chave esta sendo usada");
            }
        }

        public function Editar(){
            $sql = "UPDATE Tabuleiro SET lado = :lado WHERE idTabuleiro = :idTabuleiro";
            $param =    array(  ":lado" => $this->getLado(), 
                                ":idTabuleiro" => $this->getId());
            return parent::Execute($sql,$param);
        }

        public function Desenha(){
            $str = "<center><div style='width: ".$this->getLado()."px; height: ".$this->getLado()."px; background: #FFFF'></div></center>";
            return $str;
        }

        public function __toString(){
            return  "<h5>[TABULEIRO] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Lado: ". $this->getLado() ."<br>".
                    "Área: ". $this->Area()."<br>";
        }
    }

?>