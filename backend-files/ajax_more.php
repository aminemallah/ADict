<?php

if (isset($_POST["id"]) && !empty($_POST["id"])){
  include('db_info.php');

  $queryAll = "SELECT COUNT(*) as num_rows FROM posts
  WHERE id < ".$_POST["id"]."
  ORDER BY id DESC";
  $result = $mysqli->query($queryAll);
  $row = mysqli_fetch_assoc($result);
  $allRows = $row['num_rows'];

  $showLimit = 3;

  $sql = "SELECT * FROM posts
  WHERE id < ".$_POST["id"]."
  ORDER BY id DESC LIMIT ".$showLimit;
  $result2 = $mysqli->query($sql);

  $rowCount = mysqli_num_rows($result2);

  if ($rowCount > 0){
    while ($row2 = mysqli_fetch_assoc($result2)){
      $id = $row2['id'];
      ?>

      <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top:30px;">
          <div>
                  <div style="float:left;">
                    <img class="tinypic" height="30px" width="30px" src="<?= $row2['restaurant_pic'] ?>" alt="<?= $row2['restaurant_name'] ?>">
                    <a onclick="posY(event)" class="nav-link top-photo-jon" href="#" style="color: #CB202D;"><?= $row2['restaurant_name'] ?></a>
                  </div>
                  <img src="<?= $row2['url'] ?>" class="img-thumbnail red" >
                  <p style="color: #CB202D;font-weight: 400;margin-top:15px;"><?= $row2['caption'] ?></p>
          </div>
      </div>

      <?php
    }
       ?>

       <div class="center">
         <div class="show_more_main" id="show_more_main<?php echo $id; ?>">

           <button style="display: none;" id="<?php echo $id; ?>" type="button" title="Load more posts" class="btn btn-default show_more">Show More</button>
           <button type="button" class="btn btn-default loding " style="display: none;"><span class="loding_txt">Loading....</span></button>

         </div>
       </div>


       <?php
  }
}
        ?>
