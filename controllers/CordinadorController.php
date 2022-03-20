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
            var_dump($usuario);
            echo "</pre>";
           
                
            if(!$usuario->guardar())
                throw new Exception('No se guardado.');
                
                $mensaje="Guardado correctamente.";
                include '../view/exito.php';
    }
    
    
    
    public function edit(int $id=0){
        
        if(!$id)
            throw new Exception('No se indico el alumno.');
            
            
            $libro = Alumno::getById($id);
            
            if(!$libro)
                throw new Exception("No existe el libro $id");
                
                
                
                include '../view/libro/actualizar.php';
    }
    
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
            
            $libro =Alumno::getById(intval($_POST['id']));
            // $libro = new Libro();
            
            if(!$libro)
                throw new Exception('No existe el libro.');
                //$libro->id=intval($_POST['id']);
                
                $libro->isbn =$_POST['isbn'];
                $libro->titulo =$_POST['titulo'];
                $libro->editorial =$_POST['editorial'];
                $libro->autor =$_POST['autor'];
                $libro->idioma =$_POST['idioma'];
                $libro->ediciones =intval($_POST['ediciones']);
                $libro->edadrecomendada =intval($_POST['edadrecomendada']);
                
                
                if(!empty($_POST['eleminarimagen'])){
                    $imagenABorrar =$libro->imagen;
                    $libro->imagen =NULL;
                }
                if(Upload::arrive('imagen')){
                    $imagenASustituir = $libro->imagen;
                    $libro->imagen =Upload::save('imagen', 'img/libros', true,0,'image/*','book_');
                }
                
                $errores =$libro->errorDeValidacion();
                
                if(sizeof($errores)){
                    throw new Exception(join('<br>', $errores));
                }
                
                
                if($libro->actualizar() === false)
                    
                    throw  new Exception("No se pudo actualizar $libro->titulo");
                    
                    $GLOBALS['mensaje'] ="Actualizar del libro $libro->titulo correcta.";
                    
                    $this->edit($libro->id);
    }
    
    
    
 
    
}