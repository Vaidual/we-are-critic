<?php
require('connect.php');

function dbCheckError($query){
    $errInfo = $query->errorInfo();

    if($errInfo[0] !== PDO::ERR_NONE){
        echo $errInfo[2];
        exit();
    }
}

function selectAll($table, $params = []){

    $pdo = PDOControllers::getConnection();
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql. " WHERE $key = $value";
            }else{
                $sql = $sql. " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectFilmsForSearch($key){

    $pdo = PDOControllers::getConnection();
    $sql = "SELECT * FROM Film where title LIKE '%$key%' ORDER BY title";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function selectOne($table, $params = []){
    $pdo = PDOControllers::getConnection();
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql. " WHERE $key = $value";
            }else{
                $sql = $sql. " AND $key = $value";
            }
            $i++;
        }
    }
    $sql = $sql . " LIMIT 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

function ExecuteQuery($sql){
    $pdo = PDOControllers::getConnection();
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

function ExecuteQueryAsTransaction($sql) {
    $pdo = PDOControllers::getConnection();
    try {
        $pdo->beginTransaction();
        $pdo->exec($sql);
        $pdo->commit();
    }
    catch (Exception $e) {
        $pdo->rollBack();
        echo $pdo->errorCode();
        echo $pdo->errorInfo();
    }
}

function ExecuteQueryAndGetOne($sql){
    $pdo = PDOControllers::getConnection();
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

function insert($table, $params){
    $pdo = PDOControllers::getConnection();

    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value){
        if($i === 0){
            $coll = $coll . "$key";
            $mask = $mask . "'" . "$value". "'";
        } else {
            $coll = $coll . ", $key";
            $mask = $mask . ", '" . "$value". "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

function insertMultiple ($table, $params_arr){
    $pdo = PDOControllers::getConnection();
    foreach ($params_arr as $params)  {
        $i = 0;
        $coll = '';
        $mask = '';
        foreach ($params as $key => $value){
            if($i === 0){
                $coll = $coll . "$key";
                $mask = $mask . "'" . "$value". "'";
            } else {
                $coll = $coll . ", $key";
                $mask = $mask . ", '" . "$value". "'";
            }
            $i++;
        }
    }   
    
    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $pdo->lastInsertId();
}

function update($table, $id,$params){
    $pdo = PDOControllers::getConnection();
    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if($i === 0){
           $str = $str . $key . " = '" . $value . "'";
        } else {
            $str = $str .", " .$key . " = '" . $value . "'";
        }
        $i++;
    }

    $sql = "UPDATE  $table SET $str WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}


function deleteOnce($table, $key, $id){
    $pdo = PDOControllers::getConnection();
    $sql = "DELETE FROM $table WHERE $key = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

function deleteWithParametrs($table, $params){
    $pdo = PDOControllers::getConnection();
    $sql = "DELETE FROM $table";


    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if($i === 0){
                $sql = $sql. " WHERE $key = $value";
            }else{
                $sql = $sql. " AND $key = $value";
            }
            $i++;
        }
    }
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}








