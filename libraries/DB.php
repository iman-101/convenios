<?php
class DB{
    
    private static $conexion = null;
    
    
    public static function get():mysqli{
        
        if(!self::$conexion){
            
            self::$conexion = @new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if(self::$conexion->connect_errno)
                throw new Exception('Error al conectar con la BDD');
                
                
                self::$conexion->set_charset(DB_CHARSET);
        }
        
        
        
        return self::$conexion;
        
    }
    
    
    
    /*private static function error(){
        
        if(DEBUG)
            throw new Exception('ERROR: '.self::get()->error);
            else
                throw new Exception('Se produjo un error');
    }*/
            public static function query(string $consulta){
                
                try{
                    
                    $resultado =self::get()->query($consulta);
                    
                    if($resultado == false) throw new Exception();
                    
                    return $resultado;
                }catch(Exception $e){
                    
                    if(DEBUG)
                        throw new Exception("ERROR en la consulta : ".self::get()->error);
                    else 
                        throw new Exception('Se produjo un error en la consulta');
                }
            }
    
    public static function select(string $consulta, string $class='stdClass'){
        
     /*   $resultado = self::get()->query($consulta);
        
        if($resultado === false) self::error();*/
        
        $resultado = self::query($consulta);
        
        
        $objecto = $resultado->fetch_object($class);
        
        $resultado->free();
        
        return $objecto;
        
    }
    
    public static function selectAll(string $consulta, string $class='stdClass'):array{
        
       // $resultado = self::get()->query($consulta);
        $resultado = self::query($consulta);
        
       // if($resultado===false) self::error();
        
       
        
        $objectos = [];
        
        while($r =$resultado->fetch_object($class))
            $objectos[]=$r;
            
            $resultado->free();
            
            return $objectos;
            
    }
    
    public static function insert($consulta){
        return self::query($consulta)? self::get()->insert_id : false;
        
    }
    
    public static function update($consulta){
        return self::query($consulta)? self::get()->affected_rows : false;
        
    }
    
    public static function delete($consulta){
       
        return self::query($consulta)? self::get()->affected_rows : false;
        
    }
    
    public static function escape(string $texto, bool $entitis = true){
        $texto =self::get()->real_escape_string($texto);
        return $entitis? htmlspecialchars($texto) : $texto;
    }
    
   /* 
    * version PDO
    * public static function escape(string $texto){
    
        return htmlspecialchars($texto);
    }*/
    public static function total(
        string $tabla,
        string $operacion='COUNT',
        STRING $campo='*'){
        
        $consulta="SELECT $operacion($campo) AS total FROM $tabla";
        return self::select($consulta)->total;
    }
    
}