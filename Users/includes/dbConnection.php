<?php
					/*//////////////////////////////////////////////////////////
					//  Classe: connexion  Mysqli, Mysql, Pgsql, Oracle ,ODBC //
					//  Desarrollador:  									  //
					//  Fecha:     19-06-2017								  //
					//  Descripción:   Conector multi base de datos			  //
					//  WebSite: https://elearning.strathmore.edu/		      //
					//////////////////////////////////////////////////////////*/
/******************************************************************************************
DataBase Connections
******************************************************************************************/
class dbconnection{
	private $connection;
	private $total_consultas;
	//creación del constructor
	public function __construct($DB_TIPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT) {
		$this->tipo     = $DB_TIPE;
		$this->host     = $DB_HOST;
		$this->dbname   = $DB_NAME;
		$this->username = $DB_USER;
		$this->pass     = $DB_PASS;
		$this->port     = $DB_PORT;
		$this->connection($DB_TIPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT);
	}
	public function connection($DB_TIPE,$DB_HOST,$DB_NAME,$DB_USER,$DB_PASS,$DB_PORT){
		switch ($DB_TIPE) {
			case 'mysqli':
				if($DB_PORT<>Null){
					$DB_HOST.=":".$DB_PORT;
				}
				$this->connection = new mysqli($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
				if ($this->connection->connect_error) { return "Connection failed: " . $this->connection->connect_error; }
				break;
			case 'mysql':
				if($DB_PORT<>Null){
					$DB_HOST.=":".$DB_PORT;
				}
				$this->connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASS,$DB_NAME);
				if (mysqli_connect_errno()){ return "Error en la Conexión: " . mysqli_connect_error(); }
				break;
		}
	}
/******************************************************************************************
Mysqli Real Escape String
******************************************************************************************/
	public function escape_values($posted_values){
		switch ($this->tipo) {
			case 'mysqli':
				$this->posted_values = $this->connection->real_escape_string($posted_values);
				return $this->posted_values;
				break;
			case 'mysql':
				$this->posted_values = mysqli_real_escape_string($this->connection, $posted_values);
				return $this->posted_values;
				break;
			}
		}
/******************************************************************************************
Count Retured Results
******************************************************************************************/
	public function count_results($sql){
		switch ($this->tipo) {
			case 'mysqli':
				$result = $this->connection->query($sql);
				$count_res = $result->num_rows;
				if ($count_res == TRUE) { return $count_res; } else { return "Error: " . $sql . "<br />" . $this->connection->error; }
				break;
			case 'mysql':
				$result = mysqli_query($this->connection, $sql);
				$count_res = mysqli_num_rows($result);
				return $count_res;
				break;
			}
        }
/******************************************************************************************
Fetch Field names from a table
******************************************************************************************/
	public function fetch_field($sql){
		switch ($this->tipo) {
			case 'mysqli':
			    $result = $this->connection->query($sql);
				  for ($res = array (); $row = $result->fetch_field(); $res[] = $row);
			    return $res;
			    break;
			case 'mysql':
			    $result = mysqli_query($this->connection,$sql);
			    $res    = mysqli_fetch_field($result);
			    return $res;
			    break;
		}
        }
/******************************************************************************************
Select Query From a DataBase
******************************************************************************************/
	public function select($sql){
		switch ($this->tipo) {
			case 'mysqli':
				$result = $this->connection->query($sql);
				$res    = $result->fetch_assoc();
				return $res;
				break;
			case 'mysql':
				$result = mysqli_query($this->connection,$sql);
				$res    = mysqli_fetch_assoc($result);
				return $res;
				break;
		}
        }
/******************************************************************************************
Select Query While Loop From a DataBase
******************************************************************************************/
	public function select_while($sql){
		switch ($this->tipo) {
			case 'mysqli':
			    $result = $this->connection->query($sql);
				  for ($res = array (); $row = $result->fetch_assoc(); $res[] = $row);
			    return $res;
			    break;
			case 'mysql':
			    $result = mysqli_query($this->connection,$sql);
			    // $res    = mysqli_fetch_all($result,MYSQLI_ASSOC);
				for ($res = array (); $row = $result->fetch_assoc(); $res[] = $row);
				// Free result set
				mysqli_free_result($result);
			    return $res;
			    break;
		}
        }
/******************************************************************************************
Select Query From Another DataBase
******************************************************************************************/
	public function select_sql($BD,$SQL){
		switch ($this->tipo) {
			case 'mysqli':
			    connection($this->tipo,$this->host,$BD,$this->username,$this->pass,$this->port);
			    $result = $this->connection->query($sql);
			    $res    = $result->fetch_assoc();
			    connection($this->tipo,$this->host,$this->dbname,$this->username,$this->pass,$this->port);
			    return $res;
			    break;
			case 'mysql':
			    connection($this->tipo,$this->host,$BD,$this->username,$this->pass,$this->port);
			    $result = mysqli_query($this->connection,$SQL);
			    $res    = mysqli_fetch_all($result,MYSQLI_ASSOC);
			    connection($this->tipo,$this->host,$this->dbname,$this->username,$this->pass,$this->port);
			    return $res;
			    break;
		}
        }
/******************************************************************************************
Insert Query
******************************************************************************************/
	public function insert($table,$data){
		switch ($this->tipo) {
		  case 'mysqli':
			  ksort($data);
			  $fieldDetails = NULL;
			  $fieldNames = implode('`, `',  array_keys($data));
			  $fieldValues = "" . implode("', '",  array_values($data));
			  $sth = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
				if ($this->connection->query($sth) === TRUE) { return TRUE; } else{ return "Error: " . $sth . "<br />" . $this->connection->error; }
			  break;
		  case 'mysql':
			  ksort($data);
			  $fieldDetails = NULL;
			  $fieldNames = implode('`, `',  array_keys($data));
			  $fieldValues = "" . implode("', '",  array_values($data));
			  $sth = "INSERT INTO $table (`$fieldNames`) VALUES ('$fieldValues')";
			  if (mysqli_query($this->connection,$sth)) { return TRUE; }else{ return FALSE;}
			  break;
		}
        }
/******************************************************************************************
Update Query
******************************************************************************************/
	public function update($table, $data, $where){
		switch ($this->tipo) {
		  case 'mysqli':
			  $wer = '';
			  if(is_array($where)){
			    foreach ($where as $clave=>$valor){
			      $wer.= $clave."='".$valor."' AND ";
			    }
			    $wer   = substr($wer, 0, -4);
			    $where = $wer;
			  }
			  ksort($data);
			  $fieldDetails = NULL;
			  foreach ($data as $key => $values){
			      $fieldDetails .= "$key='$values',";
			  }
			  $fieldDetails = rtrim($fieldDetails,',');
			  if($where==NULL or $where==''){
			    $sth = "UPDATE $table SET $fieldDetails";
			  }else {
			    $sth = "UPDATE $table SET $fieldDetails WHERE $where";
			  }
				if ($this->connection->query($sth) === TRUE) { return TRUE; } else { return "Error: " . $sth . "<br />" . $this->connection->error; }
			  break;
		  case 'mysql':
			  $wer = '';
			  if(is_array($where)){
			    foreach ($where as $clave=>$valor){
			      $wer.= $clave."='".$valor."' AND ";
			    }
			    $wer   = substr($wer, 0, -4);
			    $where = $wer;
			  }
			  ksort($data);
			  $fieldDetails = NULL;
			  foreach ($data as $key => $values){
			      $fieldDetails .= "$key='$values',";
			  }
			  $fieldDetails = rtrim($fieldDetails,',');
			  if($where==NULL or $where==''){
			    $sth = "UPDATE $table SET $fieldDetails";
			  }else {
			    $sth = "UPDATE $table SET $fieldDetails WHERE $where";
			  }
			  if (mysqli_query($this->connection, $sth)) { return TRUE; }else{ return FALSE;}
			  break;
		}
        }
/******************************************************************************************
Delete Query
******************************************************************************************/
	public function delete($table,$where){
		switch ($this->tipo) {
		  case 'mysqli':
			  $wer = '';
			  if(is_array($where)){
			    foreach ($where as $clave=>$valor){
			      $wer.= $clave."='".$valor."' and ";
			    }
			    $wer   = substr($wer, 0, -4);
			    $where = $wer;
			  }
			  if($where==NULL or $where==''){
			    $sth = "DELETE FROM $table";
			  }else{
			    $sth = "DELETE FROM $table WHERE $where";
			  }
				if ($this->connection->query($sth) === TRUE) { return TRUE; } else { return "Error: " . $sth . "<br />" . $this->connection->error; }
			  break;
				case 'mysql':
			  $wer = '';
			  if(is_array($where)){
			    foreach ($where as $clave=>$valor){
			      $wer.= $clave."='".$valor."' and ";
			    }
			    $wer   = substr($wer, 0, -4);
			    $where = $wer;
			  }
			  if($where==NULL or $where==''){
			    $sth = "DELETE FROM $table";
			    if (mysqli_query($this->connection,$sth)) { return TRUE; }else{ return FALSE;}
			  }else{
			    $sth = "DELETE FROM $table WHERE $where";
			    if (mysqli_query($this->connection,$sth)) { return TRUE; }else{ return FALSE;}
			  }
			  break;
		}
        }
/******************************************************************************************
Truncate Query
******************************************************************************************/
	public function truncate($table){
		switch ($this->tipo) {
		  case 'mysqli':
			    $sth = "TRUNCATE $table";
				if ($this->connection->query($sth) === TRUE) { return TRUE; } else { return "Error: " . $sth . "<br />" . $this->connection->error; }
			  break;
				case 'mysql':
			    $sth = "TRUNCATE $table";
			    if (mysqli_query($this->connection,$sth)) { return TRUE; }else{ return FALSE;}
			  break;
		}
	}
/*******************************************************************************************
UPLOAD IMAGES
*******************************************************************************************/
public function check_img($imgFile){
	$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
	// valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
	// rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
	// allow valid image file formats
	echo $userpic;
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
		if($imgSize < 5000000)    {
    }
		else{
			echo "Sorry, your file is too large.";
		}
   }
   else{
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
   return $userpic;
}
}
?>