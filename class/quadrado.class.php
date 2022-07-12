<?php
    require_once("../class/autoload.php");
    include_once "../constante/const.php";

class Quadrado extends Based{
        
    private $lado;
        
        public function __construct($id, $lado, $cor, $tabuleiro){
            parent::__construct($id,$cor,$tabuleiro);
            $this->setLado($lado);
        }

        public function setLado($lado){
            if($lado > 0) {
            $this->lado = $lado;
            }
        }
        public function getLado(){return $this->lado;}

        public function Area(){
                return $this->lado * $this->lado;
        }

        public function Perimetro(){
            return $this->lado * Perimetro;
        }

        public function Diagonal(){
            return $this->lado * sqrt(2);
        }

        public function __toString(){
            return  "<h5>[Quadrado] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Lado: ". $this->getLado() ."<br>".
                    "Cor: ". $this->getCor() ."<br>".
                    "ID Tabuleiro: ". $this->getIdtab()."<br>".
                    "Área: ". $this->Area()."<br>".
                    "Perimetro: ". $this->Perimetro(). "<br>".
                    "Diagonal: ". $this->Diagonal(). "<br>";
        }

        public function Salvar(){
           
            $sql = "INSERT INTO quadrado (id,lado,cor,idTabuleiro) VALUES (null,:lado, :cor, :idTabuleiro)";
            $param =  array(":lado" => $this->getLado(), 
                            ":cor" => $this->getCor(), 
                            ":idTabuleiro" => $this->getIdtab());

            
            return parent::Execute($sql, $param);

            
        }

        public static function Listar($tipo = 0, $info = ""){

            $sql = 'SELECT * FROM quadrado';
            //adicionar parametros
            if ($tipo > 0)             
                switch ($tipo) {
                    case '1': $sql .= " WHERE ID = :info"; break; 
                    case '2': $sql .= " WHERE lado LIKE :info"; $info .= "%"; break;
                    case '3': $sql .= " WHERE cor like :info"; $info = "%". $info . "%"; break;
                    case '4': $sql .= " WHERE idTabuleiro like :info"; $info = "%". $info . "%"; break;
                }

            $param = array();
            if ($tipo > 0) 
                $param = array(':info' => $info);

            return parent::Buscar($sql,$param);
        }

        public function Editar(){
            $sql = "UPDATE quadrado SET lado = :lado, cor = :cor, idTabuleiro = :idTabuleiro WHERE id = :id";
            $param =    array(":id" => $this->getId(),
                        ":lado" => $this->getLado(), 
                        ":cor" => $this->getCor(), 
                        ":idTabuleiro" => $this->getIdtab());
            return parent::Execute($sql,$param);
        }

        public function Excluir(){
                $sql = "DELETE FROM quadrado WHERE id = :id";
                $param = array(":id" => $this->getId());
            return parent::Execute($sql, $param);
        }

        public function desenha(){
            $str = "<center><div style='width: ".$this->getLado()."px; height: ".$this->getLado()."px; background: ".$this->getCor()."'></div></center>";
            
            //$str = $this->getLado();

            return $str;
        }
}

?>