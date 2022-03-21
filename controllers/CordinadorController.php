<?php
class CordinadorController{
    
    
    
    public function index(){
        include '../view/alumno/lista.php';
        
    }
    
    
    
    public function list(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        $alunmos = Alumno::get();
        
        
        include '../view/alumno/lista.php';
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el alumno .");
            
            $alumno=Alumno::getById($id);
            
            
            if(!$alumno)
                throw new Exception("No se ha encontrado el alumno $id .");
                
                $convenios =$alumno->getConvenios();
                
                include '../view/alumno/detalles.php';
                
    }
    
    
    public function  create(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        
        include '../view/cordinador/nuevo.php';
    }
    
 
    public function store(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $usuario= new Usuario();
            
       if(Login::get()->rol !=="cordinador")
           throw new Exception('No se recibieron datos');
            
          
           
            $usuario->email =$_POST['email'];
            
            $usuario->displayname =$_POST['displayname'];
            $bytes = openssl_random_pseudo_bytes(4);
            $pass = bin2hex($bytes);
            
            $usuario->password =$pass;
            $usuario->rol="cordinador";
            
            echo "<pre>";
          
            echo "</pre>";
           
                
            $usuario->guardar();
               
                
              $GLOBALS['mensaje']="Guardado correctamente";
                include '../view/exito.php';
    }

    
 
    
}