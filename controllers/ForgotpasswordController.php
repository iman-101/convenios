<?php
class ForgotpasswordController{
    
    public function index(){
        
        include '../view/recuperarclave.php';
    }
    
    public function send(){
        if(empty($_POST['enviar']))
            throw new Exception('No se recibio el formulario.');
       
        $u =$_POST['displayname'];
        $e =$_POST['email'];
        
 
        
        try{
            $usuario = Usuario::getByUserMail($u, $e);
            
            /*  if(!$usuario)
             throw new Exception("Los datos no soc correctos.");*/
            $nuevaClave = uniqid();
            
            $usuario->password =$nuevaClave;
            $usuario->actualizar();
            
            $to = $usuario->email;
            $from ="saidaelmalqi@gmail.com";
            $name = "Sistema de generacion de claves";
            $subject ="Nueva clave de la aplication biblioteca";
            $message="Se ha generado una nueva clave: <b>$nuevaClave</b>";
            
            $mail = new Email($to,$from,$name,$subject,$message );
            
            $GLOBALS['recuperado'] = "Procedimiento completo , consulta tu bandeja de entrada.";
            include '../view/recuperarclave.php';
        }catch(Throwable $e){
            
            $GLOBALS['mensaje'] = "Error al recuperar password";
            include '../view/recuperarclave.php';
        }
    
    }
    
   
    
}