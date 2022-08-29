<!DOCTYPE html>
<html lang="en">
<head>
     <title>
          <?php 
               if (isset($_GET['foods'])){echo "Foods";}
               else if(isset($_GET['receipes'])){ echo "Receipes";}
               else if (isset($_GET['about'])){ echo "About";}
               else if (isset($_GET['contact'])){ echo "Contact";}
               else{ echo "Home"; }
          ?>
     </title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <!-- Font -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
     