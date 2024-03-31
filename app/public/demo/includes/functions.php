<?php 
function find_movie_by_title($item){
  if(stripos($item['title'], $_GET['s']) === false && stripos($item['plot'], $_GET['s']) === false){
          return false;
  }else{
          return true;
  }
}
function runtime_prettier($a){
global $b;
if(floor($a/60)>1)
{ 
  if(floor($a%60)>1)  echo(floor($a/60))." hours and ".($a%60)." minutes";
  if(floor($a%60)==1) echo(floor($a/60))." hours and ".($a%60)." minute";
}
if(floor($a/60)==1)
{
    if(floor($a%60)>1) echo(floor($a/60))." hour and ".($a%60)." minutes";
    if(floor($a%60)==1) echo(floor($a/60))." hour and ".($a%60)." minute";
}
if($a==60)
echo($a/60)." hour";
if($a/60<1)
echo($a)." minutes";
}
?>

<?php

 function movie_by_id($item){
  if(!isset($_GET['movie_id'])) return false;
  if($item['id']-1===intval($_GET['movie_id'])){
    return true;
  }
  else{
    return false;
  }

 }
?>
<?php
function db_connect( $host="localhost", $username="php-user", $password="php-password",$dbname="php-proiect"){
  return mysqli_connect ($host, $username, $password, $dbname);
}
?>



