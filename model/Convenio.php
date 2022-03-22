<?php
class Convenio extends Model{
    
    
    
    public static function get():array{

        
        $consulta = "SELECT * from convenios order by inicio ";
        
        return DB::selectAll($consulta,'Convenio');
        
    }
    
    
    public static function getByDate(string $inicia, string $final){
        
        $consulta ="SELECT * FROM convenios WHERE inicio
                    BETWEEN '$inicia' AND '$final' ORDER BY inicio DESC";
        echo $consulta;
        
        return DB::selectAll($consulta);
    }
    
}