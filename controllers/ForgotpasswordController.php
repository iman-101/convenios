<?php
class ForgotpasswordController{
    
    public function index(){
        
        include 'view/recuperarclave.php';
    }
    
    public function send(){
        if(empty($_POST['generar']))
            throw new Exception('No se recibio el formulario.');
       
        $u =$_POST['usuario'];
        $e =$_POST['email'];
        
        $usuario = Usuario::getByUserMail($u, $e);
        
        if(!$usuario)
            throw new Exception("Los datos no soc correctos.");
        $nuevaClave = uniqid();
        
        $usuario->clave =md5($nuevaClave);
        
        if($usuario->actualizar())
            throw new Exception("No se pudo generar una nueva clave");
        
       $to = $usuario->email;
       $from ="mailrecovery@biblioteca.cat";
       $name = "Sistema de generacion de claves";
       $subject ="Nueva clave de la aplication biblioteca";  
       $message="Se ha generado una nueva clave: <b>$nuevaClave</b>";
       
       $mail = new Email($to,$from,$name,$subject,$message );
       
       $mensaje = "Procedimiento completo , consulta tu bandeja de entrada.";
       include 'view/exito.php';
    }
    
   
    
}