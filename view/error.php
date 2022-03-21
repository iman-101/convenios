
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

       


<title>Error</title>
</head>
<body>
    <?php 
    (TEMPLATE)::login();
    (TEMPLATE)::nav("../");
    ?>
    <div class="container">
       
       
       <div class="alert alert-danger" >    
           <h1 class="ws-2 ">Error en la operacion solicitada</h1>
           <p class='error'><?=$mensaje?></p>
      </div>
             <?php 
         (TEMPLATE)::footer();
         
         ?>
     </div> 
    </body>
</html>

