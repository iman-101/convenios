<?php
class AlumnoController{
    
    
    
    public function index(){
        $this->list();
  
    }
    
    
    
    public function list(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        $alumnos = Alumno::get();
        
        
        include '../view/alumno/lista.php';
    }
    
    public function ver(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el alumno .");
        if(Login::get()->id !=$id)
                throw new Exception("No tienes permiso para esta operacion");
        
        $alumno=Alumno::getById(Login::get()->id);
        
        
        $convenios=$alumno->getConvenios(Login::get()->id);
        
        include '../view/alumno/verconvenios.php';
        
    }
    
    public function show(int $id=0){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        if(!$id)
            throw new Exception("No se indicó el alumno .");
        
            $alumno=Alumno::getById($id);
       
       
       if(!$alumno)
           throw new Exception("No se ha encontrado el alumno $id .");
          
          $convenios =$alumno->getConvenios($id);
           
        include '../view/alumno/detalles.php';
       
    }
    
    
    public function  create(){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        
            
        include '../view/alumno/nuevo.php';
    }
    
    public function store(){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
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
         
         $GLOBALS['mensaje']='Alumno guardado correctamente';
        
                
              include '../view/alumno/detalles.php';
    }

    
    
    public function edit(int $id=0){
        if(!$id)
            throw new Exception('No se indico el alumno.');
        
            $alumno = Alumno::getById($id);
            
        if(Login::get()->rol !="cordinador"){
            throw new Exception("No tienes permiso");
        }
        
   
            
            
           
            
        if(!$alumno)
                throw new Exception("No existe el alumno $id");
                
                
                
         include '../view/alumno/actualizar.php';
    }
    
    public function editpre(int $id=0){
        if(!$id)
            throw new Exception('No se indico el alumno.');
            $alumno = Alumno::getById($id);
            
        if(Login::get()->id !=$id && Login::get()->rol !="cordinador"){
            throw new Exception("No tienes permiso");
        }
     
            
            
         
            
            if(!$alumno)
                throw new Exception("No existe el alumno $id");
                
                
                
                include '../view/alumno/preferencia.php';
    }
    
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .'); 
            
        $alumno =Alumno::getById(intval($_POST['id'])); 
            if(Login::get()->id !=$alumno->id && Login::get()->rol !="cordinador"){
                throw new Exception("No tienes permiso");
            }
         
            
            if(!$alumno)
                throw new Exception('No existe el libro.');
            
                if(Login::get()->rol !=="cordinador"){
                    
                    if(Login::get()->id == $alumno->id){
                      
                        $alumno->preferencias =$_POST['preferencias'];
                        
                        
                  
                            $alumno->actualizar();
                     
                        
                            $GLOBALS['mensaje'] ="Actualizar del alumno $alumno->nombre correcta.";
                            
                            $this->editpre($alumno->id);
                    }else{
                       
                        throw  new Exception("No tienes permiso");
                    }
                }else{
        
        
        $alumno->nombre =$_POST['nombre'];
        $alumno->apellidos =$_POST['apellidos'];
        $alumno->perfil =$_POST['perfil'];
        $alumno->poblacion =$_POST['poblacion'];
        $alumno->preferencias =$_POST['preferencias'];
       
       
        
        $alumno->actualizar();
            
         
        
       $GLOBALS['mensaje'] ="Actualizar del alumno $alumno->nombre correcta.";
       
       $this->edit($alumno->id);
                }
    }
    
    public function delete(int $id=0){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
       
        if(! $usuario=Usuario::getById($id)){
            throw new Exception("No se existe el usuario $id.");
        }
        
        include '../view/alumno/borrar.php';
    }
    
    public function destroy(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        $id=empty($_POST['id'])? 0 :intval($_POST['id']);
        
        
        if(!Usuario::borrar($id))
            throw new Exception('No se pudo dar baja el usuario $id  .');
            
            
            
            
            
            $mensaje="El usuario ha sido dado de baja correctamente  .";
            include '../view/exito.php';
            
    }
    
    

    public function buscar(){
        
        if(empty($_POST['buscar'])){
            $this->list();
            return;
        }
        
        
        
        $campo=$_POST['campo'];
        $valor=$_POST['valor'];
        $orden=$_POST['orden'];
        $sentido =empty($_POST['sentido'])? 'ASC' : $_POST['sentido'];
        
        $alumnos =Alumno::getFiltred($campo, $valor, $orden, $sentido);
        
        if(empty($alumnos))
            $GLOBALS['mensaje']="no hay resultado";
        
        require_once '../view/alumno/lista.php';
        
        
    }
    
    
 
    
 
 
   
   
   
   
}

