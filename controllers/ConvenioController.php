<?php
class ConvenioController{
    public function index(){
        $this->list();
        
    }
    
    
    
    public function list(){
        $convenios = Convenio::get();
        
        
        include '../view/convenio/lista.php';
    }
    
    
    public function show(int $id=0){
        if(!$id)
            throw new Exception("No se indicó el convenio .");
            
            $convenio=Convenio::getById($id);
            
            
            if(!$convenio)
                throw new Exception("No se ha encontrado el convenio $id .");
                
                // $convenios =$alumno->getConvenios();
                $mensaje="";
                include '../view/convenio/detalles.php';
                
    }
    
    public function create(){
        
        
            
            include '../view/convenio/nuevo.php';
            
    }
    
    public function  createid(int $id){
        
        $empresa=Empresa::getById($id);
        
        include '../view/convenio/nuevo.php';
    }
    
    public function store(){
        
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
            $mensaje="Guardado correctamente";
            include '../view/convenio/detalles.php';
    }
    
    
   /* public function delete(int $id=0){
        
        if(!$prestamo = Prestamo::getById($id))
            throw new Exception("No se encontró el prestamo $id");
            
            $socio=socio::getById($prestamo->idsocio);
            
            include 'view/prestamo/borrar.php';
            
    }
    
    public function destroy(){
        
        if(empty($_POST['borrar']))
            throw new Exception('No se recibio  confirmación .');
            
            $id = intval($_POST['id']);
            $idsocio=intval($_POST['idsocio']);
            
            if(Prestamo::borrar($id)===false)
                throw new Exception("No se pudo borrar.");
                
                
                (new SocioController())->show($idsocio) ;
                
                
    }
    public function update(){
        
        if(empty($_POST['actualizar']))
            throw new Exception('No se recibieron datos .');
            
            
            $prestamo = new Prestamo();
            $prestamo->id=intval($_POST['id']);
            $prestamo->idsocio=intval($_POST['idsocio']);
            $prestamo->idejemplar=intval($_POST['idejemplar']);
            
            $fecha_actual= Prestamo::getById($prestamo->id);
           
          // $a=intval($_POST['limite']);
          
          
          $prestamo->limite = date("Y-m-d",strtotime($fecha_actual->limite."+ 3 days"));
         
          if($prestamo->actualizarLimit($prestamo->limite,$prestamo->id) === false)
                
                throw  new Exception("No se pudo actualizar $prestamo->limite");
                
                $GLOBALS['mensaje'] ="Actualizar del prestamo $prestamo->id correcta.";
                
              //  $this->edit($prestamo->id);
                $socio = Socio::getById($prestamo->idsocio);
                $prestamos=$socio->getPrestamos();
                
                include 'view/socio/detalles.php';
    }
    
    public function edit(int $id=0){
        
        if(!$id)
            throw new Exception('No se indico el socio.');
            
            
            $prestamo = Prestamo::getById($id);
         
            if(!$prestamo)
                throw new Exception("No existe el prestamo $id");
                
                
                
               // include 'view/socio/detalles.php';
                include 'view/prestamo/actualizar.php';
    }
    
    public function devolver(int $idprestamo){
        
       
        
        $pre =Prestamo::getById($idprestamo);
        $pre->devolucion=date("Y-m-d");
      
       
        
        if($pre->actualizar() === false)
            
            throw  new Exception("No se pudo actualizar $pre->devolucion");
        $socio = Socio::getById($pre->idsocio);
        $prestamos=$socio->getPrestamos();
        include 'view/socio/detalles.php';
        
    }
    */
}