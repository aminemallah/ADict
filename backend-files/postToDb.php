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

            //for optimizing the captions  //ADD CAPS FREE FOR FREE STUFF OFFERS
            $basicKeywords = array("$", " LL ", " LBP ", " L.L ", " L.B.P ", " L.L. ", " L.B.P. ");
            $captionKeywords = array(" offer ", "Hurry up ", " call now ", " order now ", " valid on ", " valid for ", " only! ");

            $instaAccounts = array("pizzahutlebanon", "mr.international.lb", "lordofthewings_lb", "pizzaninilebanon", "adictlb",
            "dipndiplebanon", "mcdonaldsleb", "bklebanon", "crepaway", "classicbrgr", "ddlebanon", "roadsterdiner",
            "zaatarwzeit", "frank_wurst", "tomatomatic", "deekduke", "kfc_lebanon", "breakfasttobreakfast", "chopsticksleb",
            "subwaylebanon");
            $base_url = 'https://www.instagram.com';

            require 'db_info.php';
            $sql = "INSERT INTO posts(id, url, restaurant_pic, restaurant_name, restaurant_insta, caption, img_start_date, img_end_date) VALUES";
            $tuple = " ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'),";

            for ($i = 0; $i < count($instaAccounts); $i++){
                $url = $base_url . '/' . $instaAccounts[$i] . '/?__a=1';
                $data = file_get_contents($url);
                $characters = json_decode($data);

                $nodes = $characters->user->media->nodes;
                //get the 1 last posts of each instagram account
                for ($j = 0; $j < 1; $j++){
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

                        $sql .= sprintf($tuple, $img_id, $img_url, $img_restaurant_pic,
                         $img_restaurant_name, $img_restaurant_insta,
                          $img_caption, $img_start_date, $img_end_date);
                    }
                }
            }
            $sql = rtrim($sql, ",");
            $mysqli->query($sql);

            //delete after 1 week
            //dont add with duplicat urls or ids
            //img processing

            function isOffer($string, $captionKeywords, $basicKeywords){

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

                if (strpos($string, " FREE ") !== false && stripos($string, " get ") !== false)
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
                return str_replace("#", "", $cleanString);
            }
        ?>
    </body>
</html>
