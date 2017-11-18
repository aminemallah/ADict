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

            <div class="col-sm-6 col-md-4" style="margin-top:30px;">
                <div>
                        <a class="nav-link top-photo-jon" href="index.html" style="color: #808080"><?= $rest_name ?></a>
                        <img src="<?= $rest_url ?>" class="img-thumbnail" >
                </div>
            </div>

            <?php
          }
        }
      }
?>
