<?php 

session_start();
require_once("../config/database.php");

//  making a connection to the database
try{
    $conn = new PDO(DSN, USER, PASSWORD, PDO_OPTIONS);
}catch(PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['id'])){
    $sql = "DELETE FROM products WHERE p_id = :p_id AND lender_id = :lender_id";
    $param = array(
        ":p_id" => $_POST['id'],
        "lender_id" => $_SESSION['lender']['id']
    );
    
    $stmt = $conn->prepare($sql);
    foreach($param as $key => &$value) {
        $stmt->bindParam($key, $value);
    }

    $stmt->execute();
    if($stmt->rowCount() > 0) {
        echo "true";
    }else{
        echo "false";
    }
}else{
    define("PROOT", "/olso/");
    ?>
    <h1>You are not authorised to be here ...</h1>
    <div><a href="<?=PROOT?>">HOME</a></div>
    <?php
}