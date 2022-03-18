<?php
class Usuario extends model{
    
    
    
    
    public static function identificar(string $u='',string $p=''):?Usuario{
        
        $consulta="SELECT * FROM usuarios WHERE  email='$u'
        and password='$p'";
        
        return DB::select($consulta,self::class);
    }
    
    
    
    
   
}