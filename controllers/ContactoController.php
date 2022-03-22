<?php

class ContactoController{
    
    
    public function index(){
        include '../view/contacto.php';
    }
    
    
    public function send(){
        
        if(empty($_POST['enviar']))
          
            throw  new Exception('No se recibio el formulario de contacto');
        
    /*        
       $reCaptcha = new ReCaptcha('6Ldm4YseAAAAAFFkLuC9StawniDtLqjxzi0My36Q');
       
       $response = $reCaptcha->verifyResponse(
           $_SERVER['REMOTE_ADDR'],$_POST['g-recaptcha-response'] );
       if(!$response || !$response->success)
           throw  new Exception('Error al validar reCapcha');
     **/
           
       $to=CONTACT_EMAIL;
       $from=$_POST['email'];
       $name=$_POST['nombre'];
       $subject=$_POST['asunto'];
       $message=$_POST['mensaje'];
       
       $email=new Email($to,$from,$name, $subject,$message);
       
       if(!$email->enviar())
           $GLOBALS['mensaje']="Error , mensaje no ha enviado" ;  
       
     $GLOBALS['mensaje']="Mensaje enviado en breve recibiras una respuesto" ;  
         include '../view/contacto.php';
    }
    
}
