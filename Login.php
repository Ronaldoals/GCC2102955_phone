<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnLogin'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql ="SELECT  `username` FROM `users` WHERE  `username` = ? and `password`= ?";
    $dblink=$c->connectToPDO();
    $re=$dblink->prepare($sql);
    $valueArray=["$username","$password"];
    $stmt=$re->execute($valueArray);
    
    $numrow = $re->rowCount();
    $row= $re->fetch(PDO::FETCH_BOTH);//lay het thu tu va ten
    if($numrow==1){
        setcookie("cc_usr",$row['username'],time()+3600);//dung đe luu
        header("Location: index.php");
        echo "Login successfully";
    }else{
        echo"wrong!!!!!";
    }
}

?>
<div class="container">
    <h2>Login</h2>
    <form action="" name="formReg" method="POST">
        <div class="row mb-3">
            <label for="" class="col-lg-4">Username:</label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="username">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="col-lg-4">Password:</label>
            <div class="col-lg-8">
                <input type="password" class="form-control" name="password">
            </div>
        </div>
        <div class="row mb-3">
            <div class="d-grid mx-auto col-3">
                <input type="submit" value="Login" class="btn btn-primary" name="btnLogin">
            </div>
        </div>
    </form>
</div>