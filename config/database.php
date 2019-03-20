<?php 

//  database configurations
define("DRIVER", "mysql");      // database driver to be used
define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DBNAME", "olso");   //  database name

//  dsn and other pdo requirements
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

$dsn = DRIVER.":host=".HOST.";dbname=".DBNAME;

//  dsn to be used for the PDO connection
define("DSN", $dsn);
define("PDO_OPTIONS", $options);