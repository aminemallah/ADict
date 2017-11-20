<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        </script>
        <?php
            require 'db_info.php';

            //for optimizing the captions  //ADD CAPS FREE FOR FREE STUFF OFFERS
            $basicKeywords = array("$", " LL ", " LBP ", " L.L ", " L.B.P ", " L.L. ", " L.B.P. ", "+");
            $captionKeywords = array(" offer ", "Hurry up ", " call now ", " valid on ", " valid for ", " only! ");

            $instaAccounts = array("pizzahutlebanon", "mr.international.lb", "lordofthewings_lb", "pizzaninilebanon", "adictlb",
            "dipndiplebanon", "mcdonaldsleb", "bklebanon", "crepaway", "classicbrgr", "ddlebanon", "roadsterdiner",
            "zaatarwzeit", "frank_wurst", "tomatomatic", "deekduke", "kfc_lebanon", "breakfasttobreakfast", "chopsticksleb",
            "subwaylebanon");
            $base_url = 'https://www.instagram.com';

            $myfile = fopen("restaurants.txt", "r") or die("Unable to open file!");
            while(!feof($myfile)) {
              echo fgets($myfile) . "<br>";
              $instname = trim(fgets($myfile));
              $url = $base_url . '/' . $instname . '/?__a=1';
              $data = file_get_contents($url);
              $characters = json_decode($data);

              $nodes = $characters->user->media->nodes;
              //get the 1 last posts of each instagram account
              for ($j = 0; $j < 3; $j++){
                  $caption = $nodes[$j]->caption;
                  if (isOffer($caption, $captionKeywords, $basicKeywords) == true){
                      $img_caption = hashtagRemover($caption);
                      $img_id = $nodes[$j]->id;
                      $img_url = $nodes[$j]->display_src;
                      $img_restaurant_pic = $characters->user->profile_pic_url;
                      $img_restaurant_name = $characters->user->full_name;
                      $img_restaurant_insta = $characters->user->username;
                      $img_start_date = $nodes[$j]->date;
                      $img_end_date = $nodes[$j]->date + 604800;

                      echo $img_id . "<br>";

                      // echo "<img src='$img_url' />";

                      $sql = "INSERT INTO posts(id, url, restaurant_pic, restaurant_name, restaurant_insta, caption, img_start_date, img_end_date)
                      VALUES('$img_id', '$img_url', '$img_restaurant_pic',
                       '$img_restaurant_name', '$img_restaurant_insta',
                        '$img_caption', '$img_start_date', '$img_end_date')";
                        $mysqli->query($sql);
                  }
              }
            }
            fclose($myfile);

            //delete after 1 week
            //img processing

            function isOffer($string, $captionKeywords, $basicKeywords){

              if (stripos($string, " voucher") !== false)
                      return false;

                for ($i = 0; $i < count($basicKeywords); $i++){
                  if (strpos($string, $basicKeywords[$i]) !== false)
                          return true;
                }

                if (preg_match("/[0-9]LL/", $string))
                        return true;

                if (preg_match("/[0-9]LBP/", $string))
                        return true;

                if (preg_match("/[0-9]L.L/", $string))
                        return true;

                if (preg_match("/[0-9]L.B.P/", $string))
                        return true;

                if (preg_match("/[0-9]L.L./", $string))
                        return true;

                if (preg_match("/[0-9]L.B.P./", $string))
                        return true;

                if (strpos($string, " FREE ") !== false)
                        return true;

                if (stripos($string, " FREE ") !== false && stripos($string, " get ") !== false)
                        return true;

                if (stripos($string, " FREE ") !== false && stripos($string, " from ") !== false)
                        return true;

                if (stripos($string, " FREE ") !== false && stripos($string, " till ") !== false)
                        return true;

                //case Insensitive Here
                for ($i = 0; $i < count($captionKeywords); $i++){
                  if (stripos($string, $captionKeywords[$i]) !== false)
                          return true;
                }

                return false;
            }

            function hashtagRemover($string){
                //replaces newlines with spaces
                $string = preg_replace('/\s+/', ' ',$string);
                $stringArray = explode(" ", $string);

                $i = count($stringArray) - 1;
                while (strpos($stringArray[$i], "#") !== false){
                  $i--;
                }
                $cleanString = implode(" ", array_slice($stringArray, 0 , $i + 1));
                $cleanString = addslashes($cleanString);
                return str_replace("#", "", $cleanString);
            }
        ?>
    </body>
</html>
