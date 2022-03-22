<?php
class Empresa extends  Model{
    
    
    public function getConvenios(int $id):array{
        
        $consulta="SELECT * FROM convenios WHERE idempresa=$id ORDER BY inicio DESC";
        
        return DB::selectAll($consulta,'Convenio');
    }
    
    
    public function actualizarpre(string $pre){
        
        $consulta="UPDATE empresas SET preferencias='$pre' WHERE id=$this->id";
     
        
        return DB::update($consulta);
    }
    
}