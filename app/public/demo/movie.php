<?php require_once('includes/header.php'); ?>
<?php 
$movies_filtered=array_filter($movies,'movie_by_id');
if(isset($movies_filtered) && $movies_filtered){
$movie=reset($movies_filtered);
}
?>
      <div class="container">
      <?php if(isset($movie) && $movie) {?>
        <?php 

        $favorites_count=(array)json_decode(file_get_contents('assets/movie-favorites.json'));
          if(isset($_COOKIE['fav_movies'])){
            $fav_movies= (array) json_decode($_COOKIE['fav_movies']);
            
            }else{
              $fav_movies=array();
            }
            if(isset($_POST['fav'])){
              if($_POST['fav']==='1'){
               if(!in_array($movie['id'],$fav_movies)){
                  $fav_movies[]=$movie['id'];
                  setcookie('fav_movies', json_encode($fav_movies), time()+3600*24*365);
                  if(array_key_exists($movie['id'],$favorites_count)){
                    $favorites_count[$movie['id']]++;
                  }else{
                    $favorites_count[$movie['id']]=1;
                  }
                  file_put_contents('assets/movie-favorites.json', json_encode($favorites_count));
                }
              }elseif($_POST['fav']==='0'){
                if(($key=array_search($movie['id'], $fav_movies)) !== false){
                  unset($fav_movies[$key]);
                  setcookie('fav_movies', json_encode($fav_movies), time()+3600*24*365);
                  if(array_key_exists($movie['id'],$favorites_count) && $favorites_count[$movie['id']]>0){
                    $favorites_count[$movie['id']]--;
                  }
                  file_put_contents('assets/movie-favorites.json', json_encode($favorites_count));
                }
              }
            }
          ?>
        <h1 style="text-align:center;"><?php echo $movie['title'];?></h1>
        <form action="" method="POST">
          <input type="hidden" name="fav" value="<?php if(in_array($movie['id'],$fav_movies)){
            echo '0';}else{echo '1';} ?>">
          <input type="submit" value="<?php if(in_array($movie['id'],$fav_movies)){
            echo 'Delete from favorites';}else{echo 'Add to favorites';} ?>" class="btn1 <?php if(in_array($movie['id'],$fav_movies)){
              echo 'btn-danger';}else{echo 'btn-dark';} ?>">
          <?php // ECHO NR ADAUGARI LA FAVORITE if($favorites_count[$movie['id']]) echo $favorites_count[$movie['id']];?>
        </form>
        <div class="row justify-content-start">
          <div class="col-4">
            <img src="<?php echo $movie['posterUrl'];?>" style="width:100%;height:auto;margin-left:-4em;">
          </div>
          <div class="col-8">
            <p>
            <h4> <b>Released in </b> </h4> <h6><?php echo $movie['year']?> <br> </h6>
            <h4><b>Directed by</b> </h4> <h6><?php echo $movie['director']?> <br> </h6>
            <h4><b>Running time</b></h4> <h6><?php runtime_prettier($movie['runtime'])?> <br></h6>
            <h4><b>Genres</b></h4> <h6> <?php 
            $array_genres=$movie['genres'];
            foreach($array_genres as $genre){?>
             <?php 
             if($genre !=end($array_genres))
             echo $genre.",";
             else
             echo $genre;
             ?>
             <?php }
              ?> <br> </h6>
          <h4><b>Cast</b></h4>
            <h6>
            <?php 
             $actors=explode(",", $movie['actors']);
             foreach($actors as $actor){?>
             <li><?php echo $actor?> </li>
            <?php }
             ?><br></h6>
           <h5> <?php echo $movie['plot']?> <br> </h5>
          </p>
          </div>
        </div>
        <?php include_once('includes/movie-reviews.php');?>
        <?php }else{?>
          <h1>
            Movie page
        </h1>
        <p>
          Error! No movie found.
        </p>
        <a href="movies.php" class="btn btn-primary"> Back to all movies</a>
        <?php }?>
        </div>
        
<?php require_once('includes/footer.php'); ?>