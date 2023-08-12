<?php
require_once('header.php');
require_once('connect.php');
    $sql ="SELECT  * FROM `product`";
    $dblink=$c->connectToMySQL();
    $re=$dblink->query($sql);
   if($re->num_rows>0){
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <?php
   while($row=$re->fetch_assoc()){
?>
<div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card">
          <div class="d-flex justify-content-between p-3">
            
            <div
              class="bg-info rounded-circle d-flex align-items-center justify-content-center shadow-1-strong"
              style="width: 35px; height: 35px;">
              
            </div>
          </div>
          <img src="./images/<?=$row['pimage']?>"
            class="card-img-top" alt="Laptop" />
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="small"><a href="detail.php?id=<?=$row['pid']?>">
            <?=$row['pcatid']?>
            </a></p>
            </div>

            <div class="d-flex justify-content-between mb-3">
              <h5 class="mb-0"><?=$row['pname']?></h5>
              <h5 class="text-dark mb-0"><?=$row['pprice']?></h5>
            </div>

        

            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0">Available: <span class="fw-bold">6</span></p>
              <div class="ms-auto text-warning">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
            </div>
            <div class="d-grid gap-2 my-4">
            <a href="cart.php?id=<?=$row['pid']?>" class="btn btn-warning bold-btn">add to cart</a>
            </div>
          </div>
        </div>
      </div>
      

<?php
   }
?>
        </div>
    </div>
    <?php

}else{
    echo"Not found";
}
?>