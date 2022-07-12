<?php
class DataBased{

    /* 
        * Classe baseada
        * @acess public
        * @return boolean
    */

    public static function Baseado(){
        require_once("../class/autoload.php");
        return Conexao::getInstance();
    }

    public static function Vincular($comando, $param=array()){
        foreach($param as $chave => $valor){
            $comando->bindValue($chave, $valor);
        }
        return $comando;

    }

    public static function Execute($sql, $param=array()){
            $conexao = self::Baseado(); 
            $comando = $conexao->prepare($sql);
            $comando = self::Vincular($comando,$param);
        try {
            $comando->debugDumpParams();
            return $comando->execute();
        } catch(Exception $e){
           throw new Exception("Erro na execução");
           
        } 
    }

    public static function Buscar($sql, $param=array()){
            //var_dump($param);
            $conexao = self::Baseado(); 
            
            $comando = $conexao->prepare($sql);
            $comando = self::Vincular($comando,$param);
            //var_dump($comando);
            
            $comando->execute();
         

        //var_dump($comando);
        $var = $comando->fetchAll();

        return $var;
    }
}
?>