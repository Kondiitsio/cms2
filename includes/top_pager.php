<?php

$per_page = 5;
    if(isset($_GET['page'])) {
        $page = escape($_GET['page']);
    } else {
        $page = "";
    }
    if($page == "" || $page == 1) {
        $page_1 = 0;
    } else {
        $page_1 = ($page * $per_page) -$per_page;
    }

?>