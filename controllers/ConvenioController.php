<?php
class ConvenioController{
    public function index(){
        $this->list();
        
    }
    
    
    
    public function list(){
        if(Login::get()->rol =="alumno"){
            $alumno=new Alumno();
            $convenios = $alumno->getConvenios(Login::get()->id);
            
            include '../view/convenio/lista.php';
        }else if(Login::get()->rol =="empresa"){
            $empresa=new Empresa();
            $convenios = $empresa->getConvenios(Login::get()->id);
            
            include '../view/convenio/lista.php';
            
        }else{
            
            $convenios = Convenio::get();
            
            
            include '../view/convenio/lista.php';
        }
       
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el convenio .");
        
            if(Login::get()->rol !=="cordinador"){
                throw  new  Exception("No tienes permiso");
            }
            $convenio=Convenio::getById($id);
            
            
            if(!$convenio)
                throw new Exception("No se ha encontrado el convenio $id .");
                
               // $convenios =$alumno->getConvenios();
              
                include '../view/convenio/detalles.php';
                
    }
    
    public function create(){
        if(Login::get()->rol !=="cordinador"){
            throw  new  Exception("No tienes permiso");
        }
            $empresas=Empresa::get();
          
            $alumnos=Alumno::get();
            include '../view/convenio/nuevo.php';
            
    }
    
    public function  createid(int $id){
        
        $empresa=Empresa::getById($id);
        
        include '../view/convenio/nuevo.php';
    }
    
    public function store(){
        if(Login::get()->rol !=="cordinador"){
            throw  new  Exception("No tienes permiso");
        }
        if(empty($_POST['guardar']))
            throw new Exception('No se recibieron datos');
            
            $convenio = new Convenio();
            $idemp=intval($_POST['idempresa']);
            $idalumn=intval($_POST['idalumno']);
            
            if(!$empresa = Empresa::getById($idemp))
                throw new Exception("No se encontró el empresa $id");
            if(!$alumno = Alumno::getById($idalumn))
                throw new Exception("No se encontró el empresa $id");
            
            $convenio->idalumno =$idalumn;
            $convenio->idempresa =$idemp;
            $convenio->inicio =$_POST['inicio'];
            $convenio->fin =$_POST['fin'];
            $convenio->detalles =$_POST['detalles'];
            $convenio->horario =$_POST['horario'];
            $convenio->estado =$_POST['estado'];
            $convenio->horario =$_POST['horario'];
            $convenio->duracion =$_POST['duracion'];
            
            $id=$convenio->guardar();
            $convenio=Convenio::getById($id);
            
            $GLOBALS['mensaje']="actualizar correctamente";
            include '../view/convenio/detalles.php';
    }
    
    
   public function delete(int $id=0){
       if(Login::get()->rol !=="cordinador"){
           throw  new  Exception("No tienes permiso");
       }
        if(!$convenio = Convenio::getById($id))
            throw new Exception("No se encontra el convenio $id");
            
            
            
            include '../view/convenio/borrar.php';
            
    }
    
    public function destroy(){
        if(Login::get()->rol !=="cordinador"){
            throw  new  Exception("No tienes permiso");
        }
        if(empty($_POST['borrar']))
            throw new Exception('No se recibio  confirmacion .');
            $id=empty($_POST['id'])? 0 :intval($_POST['id']);
            
            if(!Convenio::borrar($id))
                throw new Exception("No se pudo borrar.");
                
                $GLOBALS['mensaje']="Borrado correctamente";
                
                $convenios=Convenio::get();
                include '../view/convenio/lista.php';
                
                
    }
    public function update(){
        if(Login::get()->rol !=="cordinador"){
            throw  new  Exception("No tienes permiso");
        }
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
            
            
            $convenio = new Convenio();
            $convenio->id=intval($_POST['id']);
            $convenio->fin=$_POST['fin'];
            $convenio->inicio=$_POST['inicio'];
            $convenio->horario=$_POST['horario'];
            $convenio->detalles=$_POST['detalles'];
            $convenio->duracion=$_POST['duracion'];
            $convenio->estado=$_POST['estado'];
         
          $convenio->actualizar();
                
                $GLOBALS['mensaje']="Actualizado correctamente";
            
         
            $this->edit($convenio->id);
             
            
          
    }
    
    public function edit(int $id=0){
        if(Login::get()->rol !=="cordinador"){
            if(Login::get()->rol =="alumno"){
                
                
            }
            throw  new  Exception("No tienes permiso");
        }
        if(!$id)
            throw new Exception('No se indico el convenio.');
            
            
            $convenio = Convenio::getById($id);
         
            if(!$convenio)
                throw new Exception("No existe el convenio $id");
                
              
                include '../view/convenio/actualizar.php';
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
        
        if($campo=='inicio'){
            
           $final= date("Y-m-d",strtotime($valor."+ 1 year"));
           
          
           
            $convenios =Convenio::getByDate($valor,$final);
            
        }else{
          
            $convenios =Convenio::getFiltred($campo, $valor, $orden, $sentido);
        }
        
        if(empty($convenios))
            $GLOBALS['mensaje']="no hay resultado";
            
            require_once '../view/convenio/lista.php';
            
            
    }
  
}