<?php
class UsuarioController{
    
    
    public function index(){
        
        $this->list();
    }
    
    public function list(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        
        $usuarios =Usuario::get();
        
        include '../view/usuario/lista.php';
    }
    public function home(){
        
        if(!Login::get())
            throw new Exception("Acceso no permitido");
        
       
            switch(Login::get()->rol){
                case"empresa":
                    
                    $empresa= new Empresa();
                    $empresa->getConvenios(Login::get()->id);
                    
                    include '../view/empresa/home.php';
                    break;
                case "alumno":
                    $alumno= new Empresa();
                    $alumno->getConvenios(Login::get()->id);
                    include '../view/alumno/home.php';
                    break;
                    
                    
                case "cordinador":
                    
                    include '../view/cordinador/home.php';
                    break;
                default: 
                    throw new Exception("Acceso no permitido");
            }
        
        
    }
    public function  show(int $id=0){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        
        
        
        if(!$usuario = Usuario::getById($id))
             throw  new Exception("No se puede recuperar el usuario.");
        
             include '../view/usuario/detalles.php';
    }
    
    
    public function  create(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
            
            include '../view/usuario/nuevo.php';
    }
    
    public function store(){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
          $usuario= new Usuario();
         
          
           
            $usuario->email =$_POST['email'];
            $usuario->password =md5($_POST['password']);
            $usuario->displayname =$_POST['displayname'];
            $usuario->rol =$_POST['rol'];
           
            
            
            if(!$usuario->guardar())
                throw new Exception("No se pudo guardar $usuario->nombre");
                
                
                $mensaje="Guardar del id $usuario correcto.";
                include '../view/exito.php';
    }
    
    
    
    


    
    public function delete(int $id=0){
        
      
        
        
        
        if(! $usuario=Usuario::getById($id)){
            throw new Exception("No se existe el socio $id.");
        }
        
        include '../view/usuario/borrar.php';
    }
    
    public function destroy(){
        
        $id=empty($_POST['id'])? 0 :intval($_POST['id']);
        
        
        if(!Usuario::borrar($id))
            throw new Exception('No se pudo dar baja el usuario $id  .');
            
           
  
                
                
                $mensaje="El usuario ha sido dado de baja correctamente  .";
                include '../view/exito.php';
                
    }
    
    
    
    
    
    
    
}