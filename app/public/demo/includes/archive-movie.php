<?php
            foreach($movies as $movie_key => $movie){?>
               <div class="col-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4" id="movie-<?php echo $movie['id'];?>">
              <div class="card1">
                  <img class="card-img-top" src="<?php echo $movie['posterUrl'] ?>" class="card-img-top" alt="<?php echo $movie['title'] ?>">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $movie['title'] ?></h5>
                    <p class="card-text"><?php 
                    $_100caractere = substr($movie['plot'], 0, 100);
                    if(strlen($_100caractere)==100)
                      echo $_100caractere."...";
                    else
                       if(strlen($_100caractere<100))
                          echo $_100caractere;
                    ?></p>
                    <a href="movie.php?movie_id=<?php echo $movie_key ?>" class="btn btn-primary">Read more</a>
                  </div>
                </div>
          </div>
              <?php
            }?>
