<?php

try{
$db = new PDO("mysql:host=localhost; dbname=test","root","");
echo "Connected Successfully..!!";
}catch(PDOException $e){
echo $e->getMessage();
}

$name = "Weber_Gupta";
$email = "guptaweber@outlook.com";
$password = "Weber_12345";
$id = 2;

// $Query = $db->prepare("DELETE FROM users WHERE id=?");
// $Query->execute(array($id));

// if($Query){
//     echo "Data Updated Successfully";
// }else{
//     echo "Operation Failed";
// }

$Query = $db->prepare("SELECT * FROM users");
$Query -> execute();

if($Query->rowCount()>0){
    $rows = $Query->fetchAll(PDO :: FETCH_ASSOC);
    print_r($rows);
}else{
    echo "No Record Found";
}



?>