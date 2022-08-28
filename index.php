<?php 
include 'include/header.php';
include 'include/nav.php';

if(isset($_GET['page'])) {
     $page = $_GET['page'];
} else {
     $page = '';
}

switch($page) {
     case 'foods';
          include 'page/data/foods.php';
          break;
     case 'receipes';
          include 'page/data/receipes.php';
          break;
     case 'about';
          include 'page/data/about.php';
          break;
     case 'contact';
          include 'page/data/contact.php';
          break;
     default:
          include 'page/main.php';
          break;
}

include 'include/footer.php';
