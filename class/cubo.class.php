<?php
    require_once("../class/autoload.php");

class Cubo extends Quadrado{
        
    private $id;
        
        public function __construct($id, $idQuadrado ,$lado ,$cor, $tabuleiro){
            parent::__construct($idQuadrado, $lado, $cor, $tabuleiro);
            $this->setIdCubo($id);
        }

        public function setIdCubo($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
        public function getIdCubo(){return $this->id;}

        public function __toString(){
            return  "<h5>[Cubo] <br>".
                    "ID: ". $this->getIdCubo(). "<br>".
                    "Cor: ". $this->getCor() ."<br>".
                    "Lado: ". $this->getLado() ."<br>".
                    "ID Quadrado: ". $this->getId()."<br>".
                    "ID tabuleiro: ". $this->getIdtab()."<br>";
        }

        public function Salvar(){
           
            $sql = "INSERT INTO cubo (id, cor, idQuadrado) VALUES (null, :cor, :idQuadrado)";
            $param =  array(":cor" => $this->getCor(), 
                            ":idQuadrado" => $this->getId());

            
            return parent::Execute($sql, $param);

            
        }

        public static function Listar($tipo = 0, $info = ""){

            $sql = 'SELECT * FROM cubo';
            //adicionar parametros
            if ($tipo > 0)             
                switch ($tipo) {
                    case '1': $sql .= " WHERE ID = :info"; break; 
                    case '2': $sql .= " WHERE cor like :info"; $info = "%". $info . "%"; break;
                    case '3': $sql .= " WHERE idQuadrado like :info"; $info = "%". $info . "%"; break;
                }

            $param = array();
            if ($tipo > 0) 
                $param = array(':info' => $info);

            return parent::Buscar($sql,$param);
        }

        public function Editar(){
            $sql = "UPDATE cubo SET cor = :cor, idQuadrado = :idQuadrado WHERE id = :id";
            $param =    array(  ":id" => $this->getIdCubo(),
                                ":cor" => $this->getCor(), 
                                ":idQuadrado" => $this->getId());
            return parent::Execute($sql,$param);
        }

        public function Excluir(){
                $sql = "DELETE FROM cubo WHERE ID = :id";
                $param = array(":id" => $this->getId());
            return parent::Execute($sql, $param);
        }

        public static function Magica($id){
            $pdo = Databased::Baseado();
            $consulta = $pdo->query("SELECT Lado, idTabuleiro FROM quadrado WHERE ID = $id;");
            while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) { $lado = $linha['Lado']; $idTabuleiro = $linha['idTabuleiro']; };
            $vet = array(   "lado" => $lado,
                            "idTabuleiro" => $idTabuleiro);
            return $vet;
        }

        public function Divi(){
            return $this->getLado() / 2;
         }

        public function desenha(){
            $str = "
                <cube class='cube'>
                    <back style='width: ".$this->getLado()."px;height:".$this->getLado()."px; background-color: ".$this->getCor().";transform: rotateX(180deg) translateZ(".$this->Divi()."px);'></back>
                    <bottom style='width: ".$this->getLado()."px; height:".$this->getLado()."px;background-color: ".$this->getCor().";transform: rotateX(-90deg) translateZ(".$this->Divi()."px);'></bottom>
                    <front style='width: ".$this->getLado()."px; height:".$this->getLado()."px;background-color: ".$this->getCor().";transform: rotateX(0deg) translateZ(".$this->Divi()."px);'></front>
                    <left style='width: ".$this->getLado()."px; height:".$this->getLado()."px;background-color: ".$this->getCor().";transform: rotateX(-90deg) translateZ(".$this->Divi()."px);'></left>
                    <right style='width: ".$this->getLado()."px; height:".$this->getLado()."px;background-color: ".$this->getCor().";transform: rotateX(90deg) translateZ(".$this->Divi()."px);'></right>
                    <top style='width: ".$this->getLado()."px; height:".$this->getLado()."px;background-color: ".$this->getCor().";transform: rotateX(90deg) translateZ(".$this->Divi()."px);'></top>
                </cube>";
            
            //$str = $this->getLado();

            return $str;
        }
}

?>