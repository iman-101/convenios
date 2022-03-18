<?php
class AlumnoController{
    
    
    
    public function index(){
        $this->list();
  
    }
    
    
    
    public function list(){
        $alumnos = Alumno::get();
        
        
        include '../view/alumno/lista.php';
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el alumno .");
        
            $alumno=Alumno::getById($id);
       
       
       if(!$alumno)
           throw new Exception("No se ha encontrado el alumno $id .");
          
          // $convenios =$alumno->getConvenios();
             $mensaje="";
        include '../view/alumno/detalles.php';
       
    }
    
    
    public function  create(){
        
        
        include '../view/alumno/nuevo.php';
    }
    
    public function store(){
        
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $usuario= new Usuario();
            $usuario->rol="alumno";
            $usuario->email =$_POST['email'];
            $bytes = openssl_random_pseudo_bytes(4);
            $pass = bin2hex($bytes);
            
            
            $usuario->password= $pass;
            $usuario->displayname=$_POST['nombre'] ;
          
            $id=$usuario->guardar();
            
            
            $alumno= new Alumno();
            
            
            $alumno->id=$id;
            $alumno->nombre =$_POST['nombre'];
            $alumno->apellidos =$_POST['apellidos'];
            $alumno->poblacion =$_POST['poblacion'];
            $alumno->email =$_POST['email'];
            $alumno->preferencias =$_POST['preferencias'];
            $alumno->perfil =$_POST['perfil'];
           
           
          
           
            try{
                 $alumno->guardar();
            }catch(Exception $e){
                Usuario::borrar($id);
                throw  new Exception("Alumno con id :$id NO guardado.");
            }
        
         
            $alumno=Alumno::getById($id);
         
         $mensaje='Alumno guardado correctamente';
        
                
              include '../view/alumno/detalles.php';
    }

    
    
    public function edit(int $id=0){
        
        if(!$id)
            throw new Exception('No se indico el alumno.');
            
            
            $alumno = Alumno::getById($id);
            
        if(!$alumno)
                throw new Exception("No existe el alumno $id");
                
                
                
         include '../view/alumno/actualizar.php';
    }
    
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
            
            $alumno =Alumno::getById(intval($_POST['id'])); 
      
       
            if(!$alumno)
            throw new Exception('No existe el libro.');
        
        
        $alumno->nombre =$_POST['nombre'];
        $alumno->apellidos =$_POST['apellidos'];
        $alumno->perfil =$_POST['perfil'];
        $alumno->poblacion =$_POST['poblacion'];
        $alumno->preferencias =$_POST['preferencias'];
       
       
        
        if($alumno->actualizar() === false)
            
            throw  new Exception("No se pudo actualizar $alumno->nombre");
        
       $GLOBALS['mensaje'] ="Actualizar del alumno $alumno->nombre correcta.";
       
       $this->edit($alumno->id);
    }
    
    public function delete(int $id=0){
        
       
        if(! $usuario=Usuario::getById($id)){
            throw new Exception("No se existe el usuario $id.");
        }
        
        include '../view/alumno/borrar.php';
    }
    
    public function destroy(){
        
        $id=empty($_POST['id'])? 0 :intval($_POST['id']);
        
        
        if(!Usuario::borrar($id))
            throw new Exception('No se pudo dar baja el usuario $id  .');
            
            
            
            
            
            $mensaje="El usuario ha sido dado de baja correctamente  .";
            include '../view/exito.php';
            
    }
    
    

    
    
    
 
    
 
 
   
   
   
   
}

