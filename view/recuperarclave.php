
<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="../mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="../js/jquery.js"></script>
<!--bootstrap js-->
<script src="../js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="../css/style.css">

       
<script type="text/javascript" src="../js/activeClass.js"></script>  


<title>Convenio</title>
<script src="https://www.google.com/recaptcha/api.js?h1=ca"></script>
</head>
<body>
    
   
      
     
       <div  class="container">
      
         
   
    

         <form method="post" action="/forgotpassword/send" class="form_login">
             <div class="mb-3 mt-3">
               <h2>Recuperar clave</h2> 
               <label for="email" class="form-label">email:</label>
               <input type="text" class="form-control" name="email" required>
              </div>
               <div class="mb-3">
                  <label for="pwd" class="form-label">Displayname:</label>
                  <input type="text" class="form-control"   name="displayname" required>
                </div>
        
          
          
            <input type="submit" name="enviar"  class="btn btn-primary" value="Enviar">
              <?php  if(!empty($Globals['mensaje'])) 
                echo  "  <p class='text-danger'>".$Globals['mensaje']."</p>";
               
              
          ?>
        </form>
       
    </div> 
    
    </body>
</html>
