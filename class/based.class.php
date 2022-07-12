<?php
/*
    * Super classe Based que irá definir aquilo que é comum para tadas as classes 
    * Classe PAI!!!!!!!
*/
require_once("../class/autoload.php");
require_once "../conf/default.inc.php";
require_once "../constante/const.php";

abstract class Based extends DataBased{
    private $id;
    private $cor;
    private $tabuleiro;
    private static $count = 0;
        
        public function __construct($id, $cor, $tabuleiro){
            $this->setId($id);
            $this->setCor($cor);
            $this->setIdtab($tabuleiro);      
            self::$count += 1;
        }

        public function setId($id){
            if ($id > 0){
                $this->id = $id;
            }
        }
        public function getId(){return $this->id;}

        public function setCor($cor){
            if(strlen($cor) > 0){
                $this->cor = $cor;
            }
        }
        public function getCor(){return $this->cor;}
   
        public function setIdtab($tabuleiro){
            if($tabuleiro > 0) {
                $this->tabuleiro = $tabuleiro;
            }
        }     
        public function getIdtab(){return $this->tabuleiro;}

        public abstract function Desenha();
        public abstract function Salvar();
        public abstract function Excluir();
        public abstract function Editar();
        public abstract static function Listar($tipo = 0, $info = "" );


        public function __toString(){
            return  "<h5>[Based] <br>".
                    "ID: ". $this->getId(). "<br>".
                    "Cor: ". $this->getCor() ."<br>".
                    "ID Tabuleiro: ". $this->getIdtab()."<br>".
                    "Contador: ". self::$count."</h5>";
        }
    }

?>