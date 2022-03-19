<?php
class Empresa extends  Model{
    
    
    public function getConvenios(int $id):?Convenio{
        
        $consulta="SELECT * FROM convenios WHERE idempresa=$id";
        
        return DB::select($consulta,'Convenio');
    }
    
}