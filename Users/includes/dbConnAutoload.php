<?php
	/* External Files: */
	require_once "dbConnection.php"; 
	require_once "constants.php"; 

/**
 * SPL autoloader.
 * @param string $classname The name of the class to load
 */
function dbConnAutoload($classname){
    //Can't use __DIR__ as it's only in PHP 5.3+
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . '' . strtolower($classname) . '.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    //SPL autoloading was introduced in PHP 5.1.2
    if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
        spl_autoload_register('dbConnAutoload', true, true);
    } else {
        spl_autoload_register('dbConnAutoload');
    }
} else {
    /**
     * Fall back to traditional autoload for old PHP versions
     * @param string $classname The name of the class to load
     */
    function __autoload($classname){
        dbConnAutoload($classname);
    }
}

	//Instantiating classes


?>