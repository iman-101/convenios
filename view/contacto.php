

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
<!--font awsome-->
<link rel="stylesheet" type="text/css" href="/mypro/css/all.min.css">
<!--jquery-->
<script type="text/javascript" src="/js/jquery.js"></script>
<!--bootstrap js-->
<script src="/js/bootstrap.min.js"></script>
<!--my style-->
<link rel="stylesheet" type="text/css" href="/css/style.css">


<script type="text/javascript" src="/js/activeClass.js"></script>  
<title>Biblioteca</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("/");
    ?>
   <div class="container text-center">
        <h2 class="text-center m-4">Contactar</h2>
        <div class="card shadow-lg p-3 m-auto bg-white " style="max-width: 400px;">
           
           
           <div class="card-body">
              <form method="post" action="/contacto/send">
        
                   <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre"  class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Asunto</label>
                        <input type="text" name="asunto"  class="form-control" required>
                    </div>
                   
                    <div class="mb-3">
                        <textarea name="mensaje"  class="form-control" required></textarea>
                    </div>
                     
                     <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" >
                          <?php if(!empty($GLOBALS['mensaje'])){?>
     
         <div class="alert alert-success"> 
           <h2>Exito en la operacion solicitada</h2>
           <p class='exito'><?=$GLOBALS['mensaje']?></p>
         </div>
         <?php }?>
              </form>
            </div>
        </div>
   </div>
</body>
</html>