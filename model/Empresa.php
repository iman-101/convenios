<?php
class Empresa extends  Model{
    
    
    public function getConvenios(int $id):array{
        
        $consulta="SELECT * FROM convenios WHERE idempresa=$id";
        
        return DB::selectAll($consulta,'Convenio');
    }
    
}