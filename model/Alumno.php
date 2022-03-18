<?php
class Alumno extends Model{
    

    
    
    
    public function getConvenios(){
        $consulta = "SELECT * FROM convenios";
        return DB::selectAll($consulta,'Convenio');
    }
    
  
    
 
}