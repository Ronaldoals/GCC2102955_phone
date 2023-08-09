<?php
setcookie("cc_usr",$row['username'],time()-3600);//dung đe luu
        header("Location: index.php");
    ?>