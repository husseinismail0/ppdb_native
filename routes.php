<?php
    $pages = array("create", "dashboard", "edit", "print");

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }else {
        $page = "";
    }

    foreach($pages as $p){
        if($page == $p){
            include "view/$p.php";
            break;
        }
    }
?>