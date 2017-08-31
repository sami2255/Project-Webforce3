<?php 
	class CRUD{ // CreateReadUpdateDelete

		/*
			Variable Global
		*/
		private $host;
		private $user;
		private $password;
		public $database;
		private $pdo;

		function __construct($host, $user, $password, $database) {
			$this->host = $host; 
			$this->user = $user; 
			$this->password = $password; 
			$this->database = $database;
			$this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		}

		public function select($champs = '*' , $table = '', $where=1) {
				$theChamps = $this->arrayToString($champs);
				$theWhere = $this->arrayToString($where , 3);
			try{
				$result = $this->pdo->query("SELECT $theChamps FROM $table WHERE $theWhere");
				return $result->fetchAll(PDO::FETCH_ASSOC);	
			}catch (Exception $e) {
				echo "Votre traitement n'a pas abouti  \n";
				// echo 'Mike -> Exception reçue : ',  $e->getMessage(), "\n";
			}		
		}
	
		public function insert($champs, $valeu, $table = '') {

			$theChamps = $this->arrayToString($champs);
			$theValeu = $this->arrayToString($valeu, 2);

			try{
				$result = $this->pdo->prepare("INSERT INTO `$table`($theChamps) VALUES ($theValeu) ");
				$result->execute();
				return $this->pdo->lastInsertId();
			}catch (Exception $e) {
				echo "Votre traitement n'a pas abouti  \n";
				// echo 'Mike -> Exception reçue : ',  $e->getMessage(), "\n";
			}
		}
		
		public function update($champs, $where, $table = '') {
			$theChamps = $this->arrayToString($champs, 4);
			$where = $this->arrayToString($where, 3);

			try{
				$result = $this->pdo->prepare("UPDATE `$table` SET $theChamps WHERE $where");
				$result->execute();
			}catch (Exception $e) {
				echo "Votre traitement n'a pas abouti  \n";
			}
		}

		public function delete($champs,$table = '') {
			$theChamps = $this->arrayToString($champs, 3);

			try{
				$result = $this->pdo->prepare("DELETE FROM `$table` WHERE $theChamps");
				$result->execute();
			}catch (Exception $e) {
				echo "Votre traitement n'a pas abouti  \n";
			}
		}

		/********************************************************/

		private function arrayToString($champs, $type = 1){
			$theChamps = "";
			/* Cas $champs est un tableu */
			if(is_array($champs)){
				if($type == "select")
					foreach($champs as $valeu)
						$theChamps = $theChamps.$valeu.',';
				elseif($type == 3){
					foreach($champs as $key=>$valeu)
						$theChamps = $theChamps.$key." = '".$valeu."' AND ";
					$theChamps = substr($theChamps,0,-4);
				}elseif($type == 4)
                foreach($champs as $key=>$valeu)
						$theChamps = $theChamps.$key."'".$valeu."',";
				else
					foreach($champs as $valeu)
						$theChamps = $theChamps."'".$valeu."',";
				
				$theChamps = substr($theChamps,0,-1);
			}else /* Cas $champs est une variable */
				$theChamps = $champs;

			return $theChamps;
		}
	
	
	}


	$bd = new CRUD("localhost","root","","mike-js");

	// $bd->select( array("nom","prenom"), "users" );
	// echo $bd->insert( array("nom","prenom"), array("Mike","Mike"), "users" );
	$bd->delete( array("nom"=>"Mike","prenom"=>"lfdkzflo"), "users" );