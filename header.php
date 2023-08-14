<html>
    <head>
        <title>Zone Phone</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="index.php" class="navbar-brand">Zone store</a>
                <button type="button" class="navbar-toggler"
                    data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navmenu">
                   <div class="navbar-nav">
                    <a href="cart.php" class="nav-link">Cart</a>
                    <a href="allproduct.php" class="nav-link">All Product</a>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle" 
                         data-bs-toggle="dropdown">Category</a>
                         <div class="dropdown-menu">
                            <?php
                            require_once('connect.php');
                            $sql="SELECT * FROM `category`";
                            $c= new Connect();
                            $dblink=$c->connectToMySQL();
                            $re=$dblink->query($sql);
                            if ($re->num_rows>0){
                                while ($row= $re->fetch_assoc()){
                                    ?>
                            <a href="cat.php?id=<?=$row['catid']?>"
                             class="dropdown-item"><?=$row['catname']?></a>
                            <?php
                                }
                            }
                            ?>

                         </div>

                    </div>
                   </div>
                   <?php
                   if(isset($_COOKIE['cc_usr'])){
                   ?>
                   <div class="navbar-nav ms-auto">
                    <a href="#" class="nav-link">Welcome,
                        <?=$_COOKIE['cc_usr']?>
                   </a>
                   <a href="Logout.php" class="nav-link">Logout</a>
                   </div>
                   <?php
                   }else{
                    ?>
                   <div class="navbar-nav ms-auto">
                    <a href="register.php" class="nav-link">Resgister</a>
                    <a href="Login.php" class="nav-link">Login</a>
                   </div>
                </div>
                <?php
                   }
                   ?>
            </div>
        </nav>