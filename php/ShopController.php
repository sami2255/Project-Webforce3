<?php
    class ShopController{

        public function single($id)
        {
            require "ItemsModel.php";
            $dbItem = new ItemsModel();
            $itemsHome = $dbItem->listenerItem($id);
            if(sizeof($itemsHome) != 1)
            {
                header("Location: http://localhost/Mike/php-object-webforce3/404");
            }
            else
            {
                include("shop-single.php");
            }
        }


    }