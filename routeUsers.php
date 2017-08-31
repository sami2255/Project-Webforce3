<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(!isset($_GET["page"])){
            header("Location: http://localhost/Mike/php-object-webforce3/404.html")
        }

        switch($_GET["page"]){
            case "user-register":
                require "php/UsersController.php";
                $test=new UsersController();
                $redirect=$test->addUser();
                if($redirect==-1)
                    header("Location: http://localhost/Mike/php-object-webforce3/404.html");
                else
                    header("Location: http://localhost/Mike/php-object-webforce3/index.html");
            break;

            default:
                header("Location: http://localhost/Mike/php-object-webforce3/404.html");
        endswitch;
        }

    }
    echo $_SERVER["REQUEST_METHOD"];