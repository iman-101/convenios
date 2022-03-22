<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="../../mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="../../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../../js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../../css/style.css">
<script type="text/javascript" src="../../js/myscript.js"></script>
       
<script type="text/javascript" src="../js/activeClass.js"></script>  
<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../../");
    ?>
    <div class="container">
   
         
              <form method="post" action="/convenio/buscar">
             
             <label>Camp:</label>
             
          <select name="campo">
             
                  <option value="id" <?=!empty($campo) && $campo=='id'? ' selected ' :'';?>>
                  
                  Id</option>
              
                  <option value="idalumno" <?=!empty($campo) && $campo=='idalumno'? ' selected ' :'';?>>
                  
                  Idalumno</option>
                  
                  <option value="idempresa" <?=!empty($campo) && $campo=='idempresa'? ' selected ' :'';?>>
                  
                  Idempresa</option>
                   <option value="inicio" <?=!empty($campo) && $campo=='inicio'? ' selected ' :'';?>>
                  
                  Fecha</option>
                
             </select>
             
            <label>Valor:</label>
            
            <input type="text" name="valor" value=""<?=!empty($valor)? $valor : '';?>>
            
             <label>Orden:</label> 
             
              <select name="orden">
                 <option value="id" <?=!empty($orden) && $orden=='id'? ' selected ' :'';?>>
                  
                  Nombre</option>
                
                  
                  <option value="idalumno" <?=!empty($orden) && $orden=='idalumno'? ' selected ' :'';?>>
                  
                  idalumno</option>
                   
                  <option value="idempresa" <?=!empty($orden) && $orden=='idempresa'? ' selected ' :'';?>>
                  
                  Idempresa</option>
                      
                  <option value="inicio" <?=!empty($orden) && $orden=='inicio'? ' selected ' :'';?>>
                  
                  Inicio</option>
              </select>
              <input type="radio" name="sentido" value="ASC"  
             <?=empty($sentido) || $sentido=='ASC'? ' checked ' :'';?>>
            <label>ascedente</label>
            
             <input type="radio" name="sentido" value="DESC"  
             <?=!empty($sentido) && $sentido=='DESC'? ' checked ' :'';?>>
             <label>descedente</label>
             <input type="submit" name="buscar" value="Buscar">
          </form>
      <a href="/empresa/list">Quitar Filtros</a>
   <h2 class="text-center">Lista de empresas</h2>
   
          <?php if(!empty($GLOBALS['mensaje'])){?>
     
         <div class="alert alert-success"> 
         
           <h2 class='exito'><?=$GLOBALS['mensaje']?></h2>
         </div>
         <?php }?>

 <?php  if(!empty($convenios) ){
 ?>
      <table border='1' class="table table-striped">
         <thead >
              <tr>
               <th scope="col">id</th>
                 <th scope="col">idalumno</th>
                 <th scope="col">idempresa</th>
                 <th scope="col">inicio</th>
                 <th scope="col">fin</th>
                   <th scope="col">estado</th>
                 <th scope="col">horario</th>
                  <th scope="col">duracion</th>
                 <th scope="col">destalles</th>
                  <th scope="col">Actualizar</th>
              </tr>
       </thead>
       </tbody>
      
      <?php 
      
      foreach($convenios as $al){
          
          echo "<tr>";
          
          
            echo " <td>$al->id</td>";
            echo " <td>$al->idalumno</td>";
            echo "<td>$al->idempresa</td>";
           
            echo "<td>$al->inicio</>";
            echo "<td>$al->fin</td>";
            echo "<td>$al->estado</td>";
            echo "<td>$al->horario</td>";
            echo "<td>$al->duracion</td>";
            echo "<td>$al->detalles</td>";
            echo "<td><a href='/convenio/show/$al->id'>Ver</a></td>";
            if(Login::get()->rol =="cordinador"){
                
         
            echo "<td><a href='/convenio/edit/$al->id'>Actualizar</a></td>";
            echo "<td><a href='/convenio/delete/$al->id'>Eliminar</a></td>";
            }
         
            echo "</td>";
            echo "</tr>";
        }
     
      ?>
      </tbody>
 </table>
 <?php }
 
             ?>
</div>
  </body>
  </html> 