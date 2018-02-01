<?php
	define("DBTYPE", "mysqli");
	define("HOSTNAME", "localhost");
	define("DBPORT", "");
	define("HOSTUSER", "baby");
	define("HOSTPASS", "@3289tysjmw");
	define("DBNAME", "babynme");
	
	/************************************************************
	**                        MYSQLi                          **
	************************************************************/
	/* Datos de Conexión */
	$DB_TYPE_MYSQL = DBTYPE;             /* Tipo de Conexión */
	$DB_HOST_MYSQL = HOSTNAME;         /* Host */
	$DB_PORT_MYSQL = DBPORT;              /* Puerto */
	$DB_NAME_MYSQL = DBNAME;        /* Nombre de Base de Datos */
	$DB_USER_MYSQL = HOSTUSER;     /* Nombre de Usuario de Base de Datos */
	$DB_PASS_MYSQL = HOSTPASS;      /* Contraseña de Usuario de Base de Datos */

	/* Crear la conexión */
	$MYSQL = New dbConnection($DB_TYPE_MYSQL,$DB_HOST_MYSQL,$DB_NAME_MYSQL,$DB_USER_MYSQL,$DB_PASS_MYSQL,$DB_PORT_MYSQL); /*Iniciar Clase*/ 
?>