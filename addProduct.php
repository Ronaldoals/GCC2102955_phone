
<?php
require_once('header.php');
require_once('connect.php');
if(isset($_POST['btnAdd'])){ //check co nhan nut k
    $pname= $_POST['pname'];
    $pprice=$_POST['pprice'];
    $pinfo =$_POST['pinfo'];
    $pdate =$_POST['pdate'];
    $pquan =$_POST['pquan'];
    
    $pcatid =$_POST['pcatid'];
    
    $image = str_replace('','-',$_FILES['pimage']['name']);
    $flag=move_uploaded_file($_FILES['pimage']['tmp_name'],'./images/'.$image);
    if($flag){
        $sql ="INSERT INTO `product`( `pname`, `pprice`, `pinfo`, `pimage`, `pquan`, `pcatid`, `pdate`) VALUES (?,?,?,?,?,?,?)";
        $c= new Connect();
        $dblink=$c->connectToPDO();
        $re=$dblink->prepare($sql);
        $valueArray=[$pname,$pprice,$pinfo,$image,$pquan,$pcatid,$pdate]; 
        $stmt=$re->execute($valueArray); //chay  phpmyadmin neu dung tra ve,neu loi thi in ra bi loi du lieu,excute da chay
        if($stmt) echo "Congrats";
    }else{
        echo "image is copied faied";
    }

   
}

?>
<div class="container">
            <h2>Member Registeration</h2>
            <form action="" name="formReg" method="POST"
           enctype="multipart/form-data" >
<div class="row mb-3">
                    <label for="" class="col-lg-4">Product name:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control"
                        name="pname">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Price:</label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control"
                        name="pprice">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Description:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control"
                        name="pinfo">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Date:</label>
                    <div class="col-lg-8">
                        <input type="date" class="form-control"
                        name="pdate">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Quantity:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control"
                        name="pquan">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Image:</label>
                    <div class="col-lg-8">
                        <input type="file" class="form-control"
                        name="pimage">
                    </div>
                    </div><div class="row mb-3">
                    <label for="" class="col-lg-4">Cat id:</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control"
                        name="pcatid">
                    </div>
                    </div>
                    <div class="row mb-3">
                <div class="d-grid mx-auto col-3">
                    <input type="submit" value="Add" class="btn btn-primary"
                    name="btnAdd">
                    </div>
                    </div>
            </form>

        </div>
    </body>
</html>
