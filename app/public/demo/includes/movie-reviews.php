<?php 
$conn = db_connect();
$review_data = array(
    'show_reviews_form' => false
);

if(!$conn){

    $review_data['show_reviews_form'] = false;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    movie_id bigint(20) UNSIGNED NOT NULL,
    full_name tinytext NOT NULL,
    email varchar(100) NOT NULL,
    review TEXT NOT NULL
    )";

if(mysqli_query($conn, $sql)){

   $sql_all_reviews = "SELECT full_name, email, review FROM reviews WHERE movie_id = " . $_GET['movie_id'];
   $reviews_list = mysqli_query($conn, $sql_all_reviews);

    $review_data['count'] = mysqli_num_rows($reviews_list);

    if($review_data['count'] > 0){
        $review_data['list'] = mysqli_fetch_all($reviews_list, MYSQLI_ASSOC);
        $reviews_emails = array_column($review_data['list'], 'email');
    }

    $review_data['show_reviews_form']=true;
    if(isset($_POST['reviews_form'])){
        if(isset($reviews_emails) && in_array($_POST['email'], $reviews_emails)){
            $review_data['alert']='danger';
            $review_data['message']='You already sent a review.'; 
        }else{
        $movie_id=mysqli_real_escape_string($conn, $_GET['movie_id']);
        $full_name=mysqli_real_escape_string($conn, $_POST['full_name']);
        $email=mysqli_real_escape_string($conn, $_POST['email']);
        $review=mysqli_real_escape_string($conn, $_POST['review']);
        $sql="REPLACE INTO reviews (movie_id, full_name, email, review)
        VALUES('". $_GET['movie_id'] ."', '".$_POST['full_name'] ."','". $_POST['email']. "','". $_POST['review']."')";

        if(mysqli_query($conn, $sql)){
            $review_data['show_reviews_form']=false;
            $review_data['alert']='succes';
            $review_data['message']='Review sent succesfully!';
            $reviews_list=mysqli_query($conn, $sql_all_reviews);
            $review_data['list'][]=array(
                'full_name'=> $_POST['full_name'],
                'email'=> $_POST['email'],
                'review'=> $_POST['review']
            );
            $review_data['count']++;
        }else{
            $review_data['alert']='danger';
            $review_data['message']='ERROR! Review could not be send.';
        }
        }
    }
}
?>
<?php if(isset($review_data['message']) && isset($review_data['alert'])){ ?>
<div style="text-align: center;" class="alert my-3 alert-<?php echo $review_data['alert'];?>" role="alert">
     Thank you for your review!
</div>
<?php } ?>
<?php if( $review_data['show_reviews_form']==true) {?>
    <div class="my-3 p-3 bg-light border">
    <div style="text-align: center;"class="mb-3 pb-3 border-bottom">
        <?php 
            if($review_data['count']>0){
                echo 'Send a review!';
            }else{
                echo 'Be the first to send a review!';
            }
        ?>
    </div>
    <form action="" method="POST" style="margin-bottom: 50px;">
        <div class="mb-3">
            <label for="full_name">Full Name</label> <br>
            <input type="text" class="form-control" id="full_name" name="full_name" value="<?php if(isset($_POST['full_name'])) echo $_POST['full_name'] ?>"required>
        </div>
    
        <div class="mb-3">
            <label for="email">Email</label> <br>
            <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="review">Review</label> <br>
            <textarea class="form_control" id="review" name="review" required> 
            <?php if(isset($_POST['review'])) echo $_POST['review'];?>
            </textarea>
        </div>
        
        <div class="mb-3">
            <input type="checkbox" id="acceptance" name="acceptance" value="acceptance" required>
            <label for="acceptance"> I agree with the terms of service.</label> <br>
        </div>

        <input type="submit" class="btn btn-primary" name="reviews_form" value="Send">

    </form>
    </div>
<?php  } ?>
<?php if(isset($review_data['count']) && $review_data['count'] >0){ ?>
    <div class="h4 mt-4">
        Reviews
    </div>
    <?php foreach (array_reverse($review_data['list']) as $review){ ?>
        <div class="my-3 -3 border">
            <div class="fw-bold pb-3 mb-3 border-bottom">
                <?php echo $review['full_name']; ?>
            </div>
            <?php echo $review ['review']; ?>
        </div>
    <?php } ?>
<?php } ?>


