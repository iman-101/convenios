
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
<script type="text/javascript" src="../../js/activeClass.js"></script>
<title>Lista de usuarios</title>
</head>
<body>

<?php
(TEMPLATE)::login();
(TEMPLATE)::nav("../../");





?>
    
    <div class="container"> 
    <h2 class="text-center m-3">Nuevo alumno</h2>
   
        <form method="POST" action="/convenio/store">
           <table class="table">
               <tr>
                  <td>
                    <label>idalumno *</label>
                  </td>
                  <td>
                    <input type="text" name="idalumno" required>
                 </td>
               </tr>
               <tr> 
                  <td>
                     <label>idempresa</label>
                   </td>
                   <td>
                      <input type="text" name="idempresa" value="<?=$empresa->id? $empresa->id : "";?>"required>
                    </td>
                </tr>
               <tr> 
                  <td>
                     <label>inicio</label>
                   </td>
                   <td>
                      <input type="date" name="inicio" required>
                    </td>
                </tr>
                 <tr> 
                  <td>
                     <label>fin</label>
                   </td>
                   <td>
                      <input type="date" name="fin" required>
                    </td>
                </tr>
                 <tr> 
                  <td>
                    <label>Estado</label>
                 </td>
                 <td>
                    <input type="text" name="estado" >
                 </td>
                 </tr>
                 <tr>
                    <td>
                         <label>Detalles</label>
                    
                     </td>
                     <td>
                        <input type="text" name="detalles"  >
                     </td>
                </tr>
                  <tr>
                    <td>
                         <label>Horario</label>
                    
                     </td>
                     <td>
                        <input type="text" name="horario"  >
                     </td>
                </tr>
                <tr>
                    <td>
                         <label>Duracion *</label>
                    
                     </td>
                     <td>
                        <input type="text" name="duracion" required>
                     </td>
                </tr>
                
               </table>
                
                
                <input type="submit" name="guardar"  value="Guardar"  class="btn btn-primary m-2"><br>
           
        </form>
        
        <a href="/usuario/list">Volver al listado de usuarios</a>
    </div>
</body>
</html>