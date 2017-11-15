<?php


require ('db_info.php');

$sql = "SELECT * FROM posts";
$result = $mysqli->query($sql);

$posts = array();

if ($result->num_rows > 0){
  while ($row = $result->fetch_assoc()){
    $post = array(
      'id' => $row['id'],
      'url' => $row['url'],
      'rest_pic' => $row['restaurant_pic'],
      'rest_name' => $row['restaurant_name'],
      'rest_insta' => $row['restaurant_insta'],
      'caption' => $row['caption'],
      'start_date' => $row['img_start_date'],
      'end_date' => $row['img_end_date']
    );
    $posts[] = $post;
  }
}

header('Content-Type: application/json');
echo json_encode($posts);



 ?>
