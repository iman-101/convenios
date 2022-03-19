<?php
class EmpresaController{
    
    
    
    public function index(){
        $this->list();
        
        
        
    }
    
    
    
    public function list(){
        $empresas = Empresa::get();
        
        
        include '../view/empresa/lista.php';
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el libro .");
            
            $empresa=Empresa::getById($id);
            
            
            if(!$empresa)
                throw new Exception("No se ha encontrado el socio $id .");
                
               $convenios =$empresa->getconvenios();
               $mensaje="Guardado  correctamente.";
                include '../view/empresa/detalles.php';
                
    }
    
    
    public function create(){
        
        include '../view/empresa/nuevo.php';
        
    }
    
    public function store(){
        
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
                
                $this->show($id);
            }catch(Exception $e){
                
                Usuario::borrar($id);
                throw  new Exception("Empresa con id :$id NO guardado.");
            }
           
         
    }
    
    
    
    public function edit(int $id=0){
        
        if(!$id)
            throw new Exception('No se indico el socio.');
            
            
            $empresa = Empresa::getById($id);
            
            if(!$empresa)
                throw new Exception("No existe el empresa $id");
                
                
                
                include '../view/empresa/actualizar.php';
    }
    
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
            $empresa =Empresa::getById(intval($_POST['id'])); 
            var_dump($empresa);
            $empresa->nombre =$_POST['nombre'];
            $empresa->cif =$_POST['cif'];
            $empresa->qbid =$_POST['qbid'];
            
            $empresa->telefonocontacto =$_POST['telefonocontacto'];
            $empresa->nombrecontacto =$_POST['nombrecontacto'];
            $empresa->web = $_POST['web'];
            $empresa->perfil = $_POST['perfil'];
            $empresa->valoracion = $_POST['valoracion'];
            
            
          
            
            if(!$empresa->actualizar())
                
                throw  new Exception("No se pudo actualizar $empresa->id");
                
                $GLOBALS['mensaje'] ="Actualizar del $empresa->id correcta.";
                
                $this->edit($empresa->id);
    }
    
    
    public function delete(int $id=0){
        
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
        
        $socios =Empresa::getFiltred($campo, $valor, $orden, $sentido);
        
        require_once 'view/alumno/lista.php';
        
        
    }
    
    
    
    
}