<?php include('includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mușătoiu Iulian</title>
    </head>
<body>
<?php 

$navitems=array(

array(
    'name'=>'Home',
    'link'=>'index.php'

),
array(
    'name'=>'Movies',
    'link'=>'movies.php'

),
array(
    'name'=>'Contact',
    'link'=>'contact.php'

)

);
?>

            
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"> <?php echo($initiale="<b>MIG</b>"); ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <?php
            foreach($navitems as $navitem){ ?>
              <li class="nav-item">
                              <a class="nav-link <?php if(basename($_SERVER['PHP_SELF'])==$navitem['link']) echo 'active'; ?>
                              " aria-current="page" href="<?php echo $navitem['link']; ?>"><?php echo $navitem['name']; ?></a>
                    </li>
              <?php } ?>
            </ul>
            <?php include('includes/search-form.php');?>
          </div>
        </div>
      </nav>
              <?php
            $movies=json_decode(file_get_contents('./assets/movies-list-db (1).json'), true)['movies'];
              ?>
<?php require_once('includes/functions.php') ?>