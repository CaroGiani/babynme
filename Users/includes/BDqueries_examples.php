<?php
	/* Examples: */

	include_once 'classes/class_dbConnection.php'; /* Incluimos la Clase */

	/************************************************************
	**                        MYSQLi                          **
	************************************************************/
	/* Datos de Conexión */
	$DB_TYPE_MYSQL = 'mysqli';            /* Type de Connexion */
	$DB_HOST_MYSQL = 'localhost';         /* Host */
	$DB_PORT_MYSQL = '3306';              /* Puerto */
	$DB_NAME_MYSQL = 'Base_Datos';        /* Nombre de Base de Datos */
	$DB_USER_MYSQL = 'WookPlay_User';     /* Nombre de Usuario de Base de Datos */
	$DB_PASS_MYSQL = 'Password2016';      /* Mot de passe de l'utilisateur de la Base de données */

	/* Crear la conexión */
	$MYSQL = New DataBase($DB_TYPE_MYSQL, $DB_HOST_MYSQL, $DB_NAME_MYSQL, $DB_USER_MYSQL, $DB_PASS_MYSQL, $DB_PORT_MYSQL); /*Iniciar Clase*/

	/*Example escape_values */
	$result = $MYSQL->escape_values('posted_values');
		
	/*Count Retured Results */
	$result = $MYSQL->count_results('SELECT * FROM Table_name');
		
	/*Example Fetch Field */
	$result = $MYSQL->fetch_field('SELECT * FROM Table_name');		
	
	/*Example Select */
	$result = $MYSQL->select('SELECT * FROM Table_name');

	/* Exemple Sélectionnez l'aide d'une autre base de données une nouvelle connexion non initialisée |Select using a different database without initializing a new connection*/
	$result = $MYSQL->select_sql('new_dbname','SELECT * FROM Table_name');

	/* Example Select using a while loop*/
	$result = $MYSQL->select_while('SELECT * FROM Table_name');

	/* Example Insert */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$result = $MYSQL->insert("Table_name", $data);

	/* Example Update */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$where = [ "Champ" => "valeur", "Champ2" => $valeur2 ]; OR $where = "Champ ='valeur' AND Champ2 = '".$valeur2."' "
	$result = $MYSQL->update("Table_name", $data, $where);

	/* Example Delete */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$where = [ "Champ" => "valeur", "Champ2" => $valeur2 ]; OR $where = "Champ ='valeur' AND Champ2 = '".$valeur2."' "
	$result = $MYSQL->delete("Table_name", $where);

	/* Example TRUNCATE */
	$result = $MYSQL->truncate("Table_name");

	/************************************************************
	**                        MYSQL                           **
	************************************************************/
	/* Datos de Conexión */
	$DB_TYPE_MYSQL = 'mysql';             /* Type de Connexion */
	$DB_HOST_MYSQL = 'localhost';         /* Host */
	$DB_PORT_MYSQL = '3306';              /* Puerto */
	$DB_NAME_MYSQL = 'Base_Datos';        /* Nombre de Base de Datos */
	$DB_USER_MYSQL = 'WookPlay_User';     /* Nombre de Usuario de Base de Datos */
	$DB_PASS_MYSQL = 'Password2016';      /* Mot de passe de l'utilisateur de la Base de données */

	/* Crear la conexión */
	$MYSQL = New DataBase($DB_TYPE_MYSQL, $DB_HOST_MYSQL, $DB_NAME_MYSQL, $DB_USER_MYSQL, $DB_PASS_MYSQL, $DB_PORT_MYSQL); /*Iniciar Clase*/

	/*Example Select */
	$result = $MYSQL->select('SELECT * FROM Table_name');

	/* Select using a different database without initializing a new connection*/
	$result = $MYSQL->select_sql('new_dbname','SELECT * FROM Table_name');

	/* Example Insert */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$result = $MYSQL->insert("Table_name", $data);

	/* Example Update */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$where = [ "Champ" => "valeur", "Champ2" => $valeur2 ]; OR $where = "Champ ='valeur' AND Champ2 = '".$valeur2."' "
	$result = $MYSQL->update("Table_name", $data, $where);

	/* Example Delete */
	$data  = [ "Champ" => "valeur", "Champ2" => $valeur2 ];
	$where = [ "Champ" => "valeur", "Champ2" => $valeur2 ]; OR $where = "Champ ='valeur' AND Champ2 = '".$valeur2."' "
	$result = $MYSQL->delete("Table_name", $where);

	/* Example TRUNCATE */
	$result = $MYSQL->truncate("Table_name");
?>