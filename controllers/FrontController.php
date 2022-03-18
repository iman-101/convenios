<?php
class FrontController{
    
    public static function main(){
       
        
        try{
            
            Login::init();
            $c = empty($_GET['c'])?
                DEFAULT_CONTROLLER: ucfirst(DB::escape($_GET['c'])).'Controller';
      
                
            $m = empty($_GET['m'])?   
            DEFAULT_METHOD: DB::escape($_GET['m']);
            
               
            $p = empty($_GET['p'])? false: DB::escape($_GET['p']);
           
               $controlador = new $c();
        
               if(!is_callable([$controlador,$m]))
                   throw new Exception("No existe la operacion $m");
               
              $controlador->$m($p);
            
        }catch(Throwable $e){
            
            $mensaje =$e->getMessage();
            
            if(DEBUG){
                
                $mensaje .="<br>En fichero <br>".$e->getFile()."</b>";
                $mensaje .="<br>En linea: <br>".$e->getLine()."</b>";
            }
            
            include '../view/error.php';
        }
        
        
    }
    
    
    
}