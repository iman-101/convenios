<?php
class Alumno extends Model{
    

    
    
    
    public function getConvenios(int $id):array{
        
        $consulta="SELECT * FROM convenios WHERE idalumno=$id";
        
        return DB::selectAll($consulta,'Convenio');
    }
    
  
    
 
}