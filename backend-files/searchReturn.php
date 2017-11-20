<?php
      require('db_info.php');

      if (isset($_POST['input']) && !empty($_POST['input'])){
        $pass = $_POST['input'] . '%';
        $stmt = $mysqli->prepare("SELECT *
        FROM posts
        WHERE restaurant_name LIKE ?");
        $stmt->bind_param("s",$pass);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($rest_id,$rest_url,$rest_pic,$rest_name,$rest_insta,$rest_caption,$rest_start,$rest_end);
        $count = $stmt->num_rows;
        if ($count > 0){
          while ($stmt->fetch()){

            ?>

            <div class="col-sm-6 col-md-4 col-md-offset-4" style="margin-top:30px;">
                <div>
                        <div style="float:left;">
                          <img class="tinypic" height="30px" width="30px" src="<?= $rest_pic ?>" alt="<?= $rest_name ?>">
                          <a onclick="posY(event)" class="nav-link top-photo-jon" href="" style="color: #CB202D;"><?= $rest_name ?></a>
                        </div>
                        <img src="<?= $rest_url ?>" class="img-thumbnail red" >
                        <p style="color: #CB202D;font-weight: 400;margin-top:15px;"><?= $rest_caption ?></p>
                </div>
            </div>

            <?php
          }
        }
      }
?>
