<?php
class Alumno extends Model{
    

    
    
    
    public function getConvenios(int $id):array{
        
        $consulta="SELECT * FROM convenios WHERE idalumno=$id ORDER BY inicio DESC";
        
        return DB::selectAll($consulta,'Convenio');
    }
    
  
    public function actualizarpre(string $pre){
        
        $consulta="UPDATE alumnos SET preferencias='$pre' WHERE id=$this->id";
        
        
        return DB::update($consulta);
    }
 
}