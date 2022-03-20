<?php
class LoginController{
    
    public function index(){
        
        
        include '../view/login.php';
    }
    
    public function login(){
        
        if(empty($_POST['identificar']))
            throw new Exception('No se recibió el formulario');
        
            
        $u = $_POST['email'];
        
        $c= $_POST['password'];
        
       
        
        $identificado = Usuario::identificar($u,$c);
        
        if(!$identificado){
            
            $Globals['mensaje']="Email o password no correcto";
            include '../view/portada.php';
        }else{
           
        
   
       Login::set($identificado);
      
       
       (new  welcome())->index();
        }
    }
    
    
    public function logout(){
        
        Login::clear();
            
        $controller =DEFAULT_CONTROLLER;
        $metodo = DEFAULT_METHOD;
                
         (new $controller())->$metodo();
    }
    
}