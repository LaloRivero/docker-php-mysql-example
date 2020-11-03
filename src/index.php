
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

$sql = "INSERT INTO p_stock (product, p_qty) VALUES('ram',10), ('cpu',23);";

if(($result=$mysqli -> query($sql))==FALSE){
    $mysqli -> rollback();
    echo "Some error happends";
}else{
    echo "Query ok";
    echo "<br>";
}

$sql = "INSERT INTO p_stock (product, p_qty) VALUES('FAN',10), ('Power Supply',23);";

if(($result=$mysqli -> query($sql))==FALSE){
    $mysqli -> rollback();
    echo "Some error happends";
}else{
    $mysqli -> commit();
    echo "Query ok";
    echo "<br>";
}