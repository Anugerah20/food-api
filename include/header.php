<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <!-- Font -->
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700;900&display=swap" rel="stylesheet">
     <?php if (isset($_GET['home'])) { ?>
          <title>Food Api</title>
     <?php } else if (isset($_GET['foods'])) { ?>
          <title>Foods</title>
     <?php } else if(isset($_GET['receipes'])) { ?>
          <title>Receipes</title>
     <?php } else if (isset($_GET['about'])) { ?>
          <title>About</title>
     <?php } else if (isset($_GET['contact'])) { ?>
          <title>Contact</title>
     <?php } ?>
</head>
<body>
     