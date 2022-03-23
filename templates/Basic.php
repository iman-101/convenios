<?php

class Basic{
    
    public static function header(string $pagina=''){?>
        
        <header>
            <h1>Aplicacion biblioteca</h1>
            <h2><?=$pagina?></h2>
        
        </header>
        
    <?php }
    
    
     public static function login(){
       
        $identificado = Login::get();
        
        
        
        echo $identificado ?
        " <div class='container-fluid con'>
                 <div class='container'>   <div  class='d-flex p-2 bd-highlight  justify-content-end align-items-center login'>
                    <div class='m-2 '>
          <a href='/usuario/show/$identificado->id'  class='text-decoration-none'>
          $identificado->displayname</a><i class='fas fa-user me-3'></i>
            </div><div class='m-2'><a href='/login/logout' class='text-decoration-none'>Salir</a>
          </div>
        </div>
        </div>
       </div> " :
          "";
        
     
      
     }
   
   
   public static function nav(string $a){?>
       
      <div class="container-fluid shadow  mb-5 bg-body rounded">
    	   
         <div class="container nav-reglage ">
		  	  <nav class="navbar navbar-expand-md navbar-light  p-3">
		      
		      
		   <a class="navbar-brand" href="#">
               <img src="<?=$a?>img/biblogo.png" alt="logo" class="navbar-brand" width="40" >
            </a>
		        <button type="button" class="navbar-toggler bt " data-bs-toggle="collapse" data-bs-target="#first">
		          <span class="navbar-toggler-icon"></span>
		        </button>
		        <div class="collapse navbar-collapse" id="first">
		             <ul class="navbar-nav ms-auto myDiv" >
		             
		                <?php if( Login::get() && Login::get()->rol =="alumno" ){?>
		                <li class="nav-item"><a href="/usuario/home" class="nav-link">Home</a></li>
		               <li class="nav-item"><a href="/alumno/ver/<?=Login::get()->id?>" class="nav-link">Ver convenios</a></li>
		               <li class="nav-item"><a href="/alumno/editpre/<?=Login::get()->id?>" class="nav-link">Editar preferencias</a></li>
		                   <li class="nav-item"><a href="/contacto/" class="nav-link">Notificar error</a></li>
		               <?php 
   }else if(Login::get() &&  Login::get()->rol =="empresa"){?>
                             <li class="nav-item"><a href="/usuario/home" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="/empresa/ver/<?=Login::get()->id?>" class="nav-link">Ver convenios</a></li>
		                    <li class="nav-item"><a href="/empresa/editpre/<?=Login::get()->id?>" class="nav-link">Editar mis preferencias</a></li>
                            <li class="nav-item"><a href="/empresa/edit/<?=Login::get()->id?>" class="nav-link">modificar mis datos</a></li>
                               <li class="nav-item"><a href="/contacto/" class="nav-link">Notificar error</a></li>
                          <?php }else if(Login::get() &&  Login::get()->rol=="cordinador"){ ?>
                             <li class="nav-item"><a href="/usuario/home" class="nav-link">Home</a></li>
                              <li class="nav-item"><a href="/alumno/list" class="nav-link">Ver alumnos</a></li>
                              <li class="nav-item"><a href="/empresa" class="nav-link">Ver empresas</a></li>
                              <li class="nav-item"><a href="/alumno/create" class="nav-link">Nuevo alumno</a></li>
                              <li class="nav-item"><a href="/empresa/create" class="nav-link">Nueva empresa</a></li>
                               <li class="nav-item"><a href="/cordinador/create" class="nav-link">Nuevo cordinador</a></li> 
                          <li class="nav-item"><a href="/convenio/create" class="nav-link">Nuevo convenio</a></li>
                              <li class="nav-item"><a href="/convenio" class="nav-link">Ver convenios</a></li>
                           <li class="nav-item"><a href="/contacto/" class="nav-link">Notificar error</a></li>
                         <?php  }else{
                             echo "";
                         }
		               ?>
		           
		              
		           
		            
		           
		         
		           </ul>
		      </div>

		   </nav>
		   
		 </div>
	</div>
	
  <?php }
 

 public static function footer(){?>
     
     <div class="d-flex justify-content-between p-4  border footer  align-items-center mt-5">
         <p>Aplicación creada por Saida El Malqi como ejemplo de clase. Desarrollada haciendo uso de <span class="fw-bold">Bootrtrap 5.</span></p>
         <img src="img/SAIDA.png" alt="saida" class="rounded-circle">
     </div>
<?php  }
    
    
}