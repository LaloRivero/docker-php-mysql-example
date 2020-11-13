<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Php</h2>
    <?php

    echo "Transactions with mysql";
    echo "<br>";


    $mysqli = new mysqli("db", "root", "helloworld", "db_test");

    if(mysqli_connect_errno()){
        echo "ERROR";
    }

    $mysqli -> set_charset("utf8");
    $mysqli -> autocommit(FALSE);

    /* Start a transaction */
    $mysqli -> begin_transaction(MYSQLI_TRANS_START_WITH_CONSISTENT_SNAPSHOT);

    $pswrd = "tidbis32m";
    $sql = "INSERT INTO p_stock (product, p_qty) VALUES(SHA2('$pswrd',256),5)";


    if(($result=$mysqli -> query($sql))==FALSE){
        echo $mysqli -> query($sql);
        $mysqli -> rollback();
        echo "Some error happends";
    }else{
        $mysqli -> commit();
        echo "Query ok";
        echo "<br>";
    }
?>
</body>
</html>
