<?php require_once('includes/header.php'); ?>
    <?php if(isset($_GET['s']) && strlen ($_GET['s']) >=3){ $s=$_GET['s']; ?>
        <h1> Search result for: <strong> <?php echo $s; ?></strong> </h1>
        <?php
        $movies=array_filter($movies, 'find_movie_by_title');

        if(count($movies)===0){
        ?>
            <p> No results!</p>
            <?php include('includes/search-form.php');?>
        <?php }else{?> 
            <div class="container pb-5">
                <div class="row movies-list">
                    <?php foreach ($movies as $movie)
                    include_once('includes/archive-movie.php');
                    ?>
                </div>
            </div>
            <?php }?>
            <?php }elseif(isset($_GET['s']) && strlen($_GET['s'])<3){?>
                <h1>Invalid search</h1>
                <p>Too short search query.</p>
                <?php include('includes/search-form.php'); ?>
            <?php }else{ ?>
                <h1>Invalid search</h1>
                <p>Try something else!</p>
                <?php include('includes/search-form.php'); ?>
    <?php } ?>
<?php require_once('includes/footer.php'); ?>