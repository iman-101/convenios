<?php
    
    
    
    
        include_once '../config/config.php';
        include_once '../libraries/autoload.php';
        
        session_start();
        
        FrontController::main();