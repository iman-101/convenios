<?php 
//Clase con métodos para la subida de ficheros

class Upload{
    
    
    public static function arrive(string $key='file'):bool{
        return !empty($_FILES[$key]) && $_FILES[$key]['error']!=4;
    }
    
    
    private static function uniqueName(string $extention='' ,string $prefix=''):string{
        $nombre=uniqid($prefix);
        return $extention ? "$nombre.$extention" :$nombre;
    }
    
    public static function save(
        string $key='file',
        string $folder='',
        bool $unique=true,
        int $max=0, 
        string $mime='.',
        string $prefix=''):string{
        
        if(!self::arrive($key)){
            throw  new Exception("No se recibio fichero con la clave $key");
        }
       $file = $_FILES[$key];
       
       if($e = $file['error']){
           throw  new Exception("Error en la subida del fichero $e");
       }
       
       if($max && $file['size']>$max){
           throw  new Exception("El fichero supera los $max bytes");
       }

       $rutaTmp= $file['tmp_name'];
       $tipo=(new finfo(FILEINFO_MIME_TYPE))->file($rutaTmp);
       $mimetmp=str_replace('*', '', $mime);
       
       $mimetmp =preg_quote($mimetmp, '/');
       
       if(!preg_match("/^$mimetmp/i",$tipo)){
           throw  new Exception("El fichero no es del tipo $mime");
       }
       
       $ruta =$unique ?
        $ruta=  $folder."/".self::uniqueName(pathinfo($file['name'],PATHINFO_EXTENSION),$prefix) :
         $ruta=$folder."/".file['name'];
      
       if(!move_uploaded_file($rutaTmp, $ruta))   
           throw  new Exception("Erroe al move de $rutaTmp a $ruta");
       
           
       return $ruta;
       
    }
    
  
}