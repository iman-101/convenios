<?php
class EmpresaController{
    
    
    
    public function index(){
        $this->list();
        
        
        
    }
    
    
    
    public function list(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        $empresas = Empresa::get();
        
        
        include '../view/empresa/lista.php';
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indico el empresa .");
            if(Login::get()->rol !=="cordinador")
                throw new Exception("No tienes permiso para esta operacion");
            $empresa=Empresa::getById($id);
            
            
            if(!$empresa)
                throw new Exception("No se ha encontrado el socio $id .");
                $emp=new Empresa();
               $convenios =$emp->getconvenios($id);
               
                include '../view/empresa/detalles.php';
                
    }
    
    
    public function create(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        include '../view/empresa/nuevo.php';
        
    }
    
    public function store(){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $usuario= new Usuario();
            $usuario->rol="empresa";
            $usuario->email =$_POST['email'];
            
            $bytes = openssl_random_pseudo_bytes(4);
            $pass = bin2hex($bytes);
            
            
            $usuario->password= $pass;
            $usuario->displayname=$_POST['nombre'] ;
            
            $id=$usuario->guardar();
            
            
            
            $empresa = new Empresa();
            $empresa->id=$id;
            
            $empresa->nombre =$_POST['nombre'];
            $empresa->cif =$_POST['cif'];
            $empresa->qbid =$_POST['qbid'];
           
            $empresa->telefonocontacto =$_POST['telefonocontacto'];
            $empresa->nombrecontacto =$_POST['nombrecontacto'];
            $empresa->web = $_POST['web'];
            $empresa->perfil = $_POST['perfil'];
            $empresa->valoracion = $_POST['valoracion'];
            
            
            
           
            try{
                $empresa->guardar();
                $GLOBALS['mensaje']="Guardado correctamente";
                $this->show($id);
            }catch(Exception $e){
                
                Usuario::borrar($id);
                throw  new Exception("Empresa con id :$id NO guardado.");
            }
           
         
    }
    
    
    
    public function edit(int $id=0){
     
        
        if(Login::get()->rol =="alumno"){
            throw new Exception("No tienes permiso");
        }
        if(!$id)
            throw new Exception('No se indico el socio.');
            
            
            $empresa = Empresa::getById($id);
            
            if(!$empresa)
                throw new Exception("No existe el empresa $id");
                
                
                
                include '../view/empresa/actualizar.php';
    }
    public function editpre(int $id=0){
        
        if(Login::get()->rol =="alumno"){
            throw new Exception("No tienes permiso");
        }
        if(!$id)
            throw new Exception('No se indico el empresa.');
            
            
            $empresa = Empresa::getById($id);
            
            if(!$empresa)
                throw new Exception("No existe el empresa $id");
                
                
                
                include '../view/empresa/preferencia.php';
    }
    public function update(){
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .'); 
            $id=   intval($_POST['id']);
          
        if((Login::get()->rol !=="empresa" && Login::get()->rol!=="cordinador"))
               throw new Exception("No tiene permiso");
            
            
        $empresa =Empresa::getById($id);
    
            if(count($_POST)== 3){
               
                if(Login::get()->id != $id) 
                    throw new Exception("No tiene permiso");
                
                $empresa->preferencias =$_POST['preferencias'];
              
                $empresa->actualizarpre($empresa->preferencias );
                    
                $GLOBALS['mensaje'] ="Actualizar del $empresa->id correcta.";
                
                $this->editpre($empresa->id);
            }else{
           
            $empresa->nombre =$_POST['nombre'];
            $empresa->cif =$_POST['cif'];
            $empresa->qbid =$_POST['qbid'];
            $empresa->preferencias =$_POST['preferencias'];
            $empresa->telefonocontacto =$_POST['telefonocontacto'];
            $empresa->nombrecontacto =$_POST['nombrecontacto'];
            $empresa->web = $_POST['web'];
            $empresa->perfil = $_POST['perfil'];
            $empresa->valoracion = $_POST['valoracion'];
            
            
            $empresa->actualizar();
                
              
                
                $GLOBALS['mensaje'] ="Actualizar empresa con  $empresa->id correcta.";
                
                $this->edit($empresa->id);
          
            }
    }
    
    
    public function delete(int $id=0){
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        if(!$id){
            throw new Exception("No se indico el empresa a borrar.");
        }
        
        $usuario=Usuario::getById($id);
        
        if(!$usuario){
            throw new Exception("No se existe el usuario $id.");
        }
        
        include '../view/empresa/borrar.php';
        
    }
    
    
    public function destroy(){
        
        if(Login::get()->rol !=="cordinador")
            throw new Exception("No tienes permiso para esta operacion");
        
        if(empty($_POST['borrar']))
            throw new Exception('No se recibio  confirmación .');
            
            $id = intval($_POST['id']);
            
            
            if(!Usuario::borrar($id))
                throw new Exception("No se pudo borrar.");
                
                
                $mensaje="Borrado  del empresa $id correcto.";
                include 'view/exito.php';
                
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
        
        $empresas =Empresa::getFiltred($campo, $valor, $orden, $sentido);
        
        if(empty($empresas))
            $GLOBALS['mensaje']="no hay resultado";
            
            require_once '../view/empresa/lista.php';
            
            
    }
    
    
    
}