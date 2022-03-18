

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
      // (TEMPLATE)::header("Usuario");
       
      
     
    
    ?>
    
    <div class="container"> 
    <h2 class="text-center m-3">Nuevo usuario</h2>
   
        <form method="POST" action="/usuario/store">
           <table class="table">
               <tr>
                  <td>
                    <label>Usuario</label>
                  </td>
                  <td>
                    <input type="text" name="usuario">
                 </td>
               </tr>
               <tr> 
                  <td>
                     <label>Nombre</label>
                   </td>
                   <td>
                      <input type="text" name="nombre">
                    </td>
                </tr>
                 <tr> 
                  <td>
                    <label>Clave</label>
                 </td>
                 <td>
                    <input type="password" name="clave">
                 </td>
                 </tr>
                 <tr>
                    <td>
                         <label>Primer apellido</label>
                    
                     </td>
                     <td>
                        <input type="text" name="apellido1">
                     </td>
                </tr>
                <tr>
                    <td>
                        <label>Segundo apellido</label>
                        
                    </td>
                    <td>
                        <input type="text" name="apellido2">
                   </td>
                </tr>
                <tr>
                   <td>
                
                        <label>Email</label>
                  </td>
                  <td>
                        <input type="email"   name="email">
                  </td>
                  </tr>
               </table>
                     
                <h4 class="m-3">Operaciones solo para el admin</h4>
         
                <label>Privilegio</label>
            
                <input type="number"  value="0" min="0"  max="9999" name="privilegio">
                  
                
                
                <input type="checkbox"  name="administrador" value="1"><br>
                
                <input type="submit" name="guardar"  value="Guardar"  class="btn btn-primary m-2"><br>
           
        </form>
        
        <a href="/usuario/list">Volver al listado de usuarios</a>
    </div>
</body>
</html>