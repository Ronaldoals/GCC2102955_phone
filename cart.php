
<?php
require_once('header.php');
require_once('connect.php');
$c= new Connect();
$dblink=$c->connectToPDO();
if($_COOKIE['cc_usr']){


//kiem tra co cookie chua,neu k thi login
if(isset($_GET['id'])){//ktr bien id truyen qua hay ko
 $pid = $_GET['id'];
 
 $findSql="SELECT cproid  FROM `cart` WHERE `cproid` = ? and `cuserid`=?"; // test thu nguoi dung mua chua,di hoi
 $re=$dblink->prepare($findSql);
 $valueArray=[$pid,8]; 
 $stmt= $re->execute($valueArray);
 if($re->rowCount()== 0){ //hoi so dong re co bang 0 ko,
   
 $sql ="INSERT INTO `cart`( `cuserid`, `cproid`, `cquantity`, `cdate`) VALUES(?,?,1,CURDATE())";
//li do k co id la do no tu tang
}else{
    $sql="UPDATE `cart` SET`cquantity`=`cquantity`+1,`cdate`=CURDATE() WHERE `cuserid` =? and `cproid` =?";
}
$re1=$dblink->prepare($sql);
 $valueArray1=[8,$pid]; 
 $stmt=$re1->execute($valueArray1);
}
   $showCartSQl="SELECT `pimage`, `pname`,`cquantity`, `pprice` FROM `cart` c, `product` p
   WHERE c.cproid = p.pid and `cuserid` =?";
   $re1=$dblink->prepare($showCartSQl);
   $valueArray1=[8]; 

   $re1->execute($valueArray1);
   $rows= $re1->fetchAll(PDO::FETCH_BOTH);

}else{
  header("Location: Login.php");
}
?>
<section class="vh-100" style="background-color: #fdccbc;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <p><span class="h2">Shopping Cart </span><span class="h4"><?=$re1->rowCount()?> item(s)</span></p>

        <div class="card mb-4">
          <div class="card-body p-4">
          <div class="row align-items-center">
              <div class="col-md-2">
               
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Name</p>
                 
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Quantity</p>
                 
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Price</p>
                 
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="small text-muted mb-4 pb-2">Total</p>
                
                </div>
              </div>
            </div>
<?php

foreach($rows as $row){



?>

            <div class="row align-items-center">
              <div class="col-md-2">
                <img 
                src="./images/<?=$row['pimage']?>"
                  class="img-fluid" alt="Generic placeholder image">
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                 
                  <p class="lead fw-normal mb-0"><?=$row['pname']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="lead fw-normal mb-0"><?=$row['cquantity']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="lead fw-normal mb-0">
                    <?=$row['pprice']*$row['cquantity']?></p>
                </div>
              </div>
              <div class="col-md-2 d-flex justify-content-center">
                <div>
                  <p class="lead fw-normal mb-0">???</p>
                </div>
              </div>
            </div>
<?php
}
?>
          </div>
        </div>

        <div class="card mb-5">
          <div class="card-body p-4">

            <div class="float-end">
              <p class="mb-0 me-5 d-flex align-items-center">
                <span class="small text-muted me-2">Order total:</span> <span
                  class="lead fw-normal">$799</span>
              </p>
            </div>

          </div>
        </div>

        <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-light btn-lg me-2">Continue shopping</button>
          <button type="button" class="btn btn-primary btn-lg">Add to cart</button>
        </div>

      </div>
    </div>
  </div>
</section>
