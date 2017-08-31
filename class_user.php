<?php 
    require_once "crud.php"; // Charger le fichier php
	class Users extends CRUD{


		function __construct() {
            parent::__construct(); 
            echo $this->database;
		}
	
		public function addUser($user = array()){
			if(!isset($user['firstname'])){
                return 0;
			}
			elseif(!isset($user['lastname'])){
                return 0;
			}
			elseif(!isset($user['email'])){
                return 0;
			}
			elseif(!isset($user['password'])){
                return 0;
            }
            $user['password']=password_hash($user['password'], PASSWORD_DEFAULT);
            $this->insert($user,"clients");
        }
        
            //Le namespace sert à encapsuler le nom du fichier mais n'a d'utilité que dans une architecture MVC et ne sera pas utilisé ici
            public function addFavorie($userId, $itemId){
                if(!is_int($userId)){
                    return 0 ;
                }
                elseif(!is_int($itemId)){
                    return 0;
                }
                $this->insert(array("clients_idclients"=>$userId, "items_iditems"=>$itemId),"clients_has_items");
            }
    }
    $test->addUser(array("firstname"=>"Mike","lastname"=>"Sylvestre","email"=>"mike@mike.com","password"=>"Mike"));
    $test=new Users();
    $test->addFavorie(1,2);