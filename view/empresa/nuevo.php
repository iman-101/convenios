

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
    <h2 class="text-center m-3">Nuevo empresas</h2>
   
        <form method="POST" action="/empresa/store">
           <table class="table">
               <tr>
                  <td>
                    <label>Nombre *</label>
                  </td>
                  <td>
                    <input type="text" name="nombre" required>
                 </td>
               </tr>
               <tr> 
                  <td>
                     <label>Email</label>
                   </td>
                   <td>
                      <input type="text" name="email" required>
                    </td>
                </tr>
               <tr> 
                  <td>
                     <label>CIF</label>
                   </td>
                   <td>
                      <input type="text" name="cif" maxlength="9" required>
                    </td>
                </tr>
                 <tr> 
                  <td>
                     <label>Qbid</label>
                   </td>
                   <td>
                      <input type="text" name="qbid" required>
                    </td>
                </tr>
                 <tr> 
                  <td>
                    <label>Contacto</label>
                 </td>
                 <td>
                    <input type="text" name="nombrecontacto" >
                 </td>
                 </tr>
                 <tr>
                    <td>
                         <label>Telefono</label>
                    
                     </td>
                     <td>
                        <input type="text" name="telefonocontacto"  >
                     </td>
                </tr>
                  <tr>
                    <td>
                         <label>web</label>
                    
                     </td>
                     <td>
                        <input type="text" name="web"  >
                     </td>
                </tr>
                <tr>
                    <td>
                         <label>Perfil *</label>
                    
                     </td>
                     <td>
                        <input type="text" name="perfil" required>
                     </td>
                </tr>
                   <tr>
                    <td>
                         <label>Valoracion *</label>
                    
                     </td>
                     <td>
                        <input type="text" name="valoracion" required>
                     </td>
                </tr>
               </table>
                
                
                <input type="submit" name="guardar"  value="Guardar"  class="btn btn-primary m-2"><br>
           
        </form>
        
        <a href="/empresa/list">Volver al listado </a>
    </div>
</body>
</html>