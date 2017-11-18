<?php


require ('db_info.php');

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT 3";
$result = $mysqli->query($sql);

$rowCount = mysqli_num_rows($result);

if ($rowCount > 0){
  while ($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];

?>

<div class="col-sm-6 col-md-4" style="margin-top:30px;">
    <div>
            <a class="nav-link top-photo-jon" href="index.html" style="color: #808080"><?= $row['restaurant_name'] ?></a>
            <img src="<?= $row['url'] ?>" class="img-thumbnail" >
    </div>
</div>

<?php
  }
?>

  <div class="show_more_main" id="show_more_main<?php echo $id; ?>">
    <button style="display: none;" id="<?php echo $id; ?>" type="button" title="Load more posts" class="btn btn-default show_more">Show More</button>
    <button type="button" class="btn btn-default loding" style="display: none;"><span class="loding_txt">Loading....</span></button>
  </div>



<?php

}


//
// $posts = array();
//
// if ($result->num_rows > 0){
//   while ($row = $result->fetch_assoc()){
//     $post = array(
//       'id' => $row['id'],
//       'url' => $row['url'],
//       'rest_pic' => $row['restaurant_pic'],
//       'rest_name' => $row['restaurant_name'],
//       'rest_insta' => $row['restaurant_insta'],
//       'caption' => $row['caption'],
//       'start_date' => $row['img_start_date'],
//       'end_date' => $row['img_end_date']
//     );
//     $posts[] = $post;
//   }
// }
//
// header('Content-Type: application/json');
// echo json_encode($posts);

 ?>
