<?PHP
$sql_serveur="127.0.0.1";			//Adresse du serveur MySQL
$sql_user="root";					//Login du serveur MySQL
$sql_passwd="";						//Mot de passe du serveur MySQL
$sql_bdd="belletableweb";				//Nom de la base de donnée

// Connection à MySQL
$bdd = new PDO('mysql:host=127.0.0.1;dbname=belletableweb;charset=utf8','root', '');
/*$sql_bdd_connect = mysql_connect($sql_serveur, $sql_user, $sql_passwd)
    or die ("La connexion au serveur n'a pas réussi!");

// Selection de la base MySQL  
mysql_select_db ($sql_bdd, $sql_bdd_connect)
    or die ("La connexion à la base de données n'a pas réussi!");*/