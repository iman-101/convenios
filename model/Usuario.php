<?php
class Usuario extends Model{
    
    
    
    
    public static function identificar(string $u='',string $p=''):?Usuario{
        
        $consulta="SELECT * FROM usuarios WHERE  email='$u'
        and password='$p'";
        
        return DB::select($consulta,self::class);
    }
    
    
    
    
    public static  function getByUserMail(string $u,string $e):?Usuario{
        
        $consulta="SELECT * FROM usuarios WHERE displayname='$u' AND email='$e'";
        
        return DB::select($consulta,self::class);
    }
    
   
}
