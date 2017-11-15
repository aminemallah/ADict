<?php

/////////////////////////////////
            // Your ID and token
            $api_key = 'AIzaSyC88VNgMdynDSr7EEPhZkyuvsyTUmRbHHA';
            $cvurl = "https://vision.googleapis.com/v1/images:annotate?key=" . $api_key;
            //Create this JSON
            $r_json ='{
                "requests":[
                  {
                    "image":{
                      "source":{
                        "imageUri":
                          "https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e35/23101212_621470918039181_1553316399097577472_n.jpg"
                      }
                    },
                    "features":[
                      {
                        "type":"TEXT_DETECTION"
                      }
                    ]
                  }
                ]
              }';

              $curl = curl_init();
              curl_setopt($curl, CURLOPT_URL, $cvurl);
              curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              curl_setopt($curl, CURLOPT_HTTPHEADER,
                array("Content-type: application/json"));
              curl_setopt($curl, CURLOPT_POST, true);
              curl_setopt($curl, CURLOPT_POSTFIELDS, $r_json);
              $json_response = curl_exec($curl);
              $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
              curl_close($curl);

              if ( $status != 200 ) {
                  die("Error: $cvurl failed status $status" );
              }

              echo "<pre>";
              echo $json_response;
              echo "</pre>";
/////////////////////////////////















        ///FOR GOOGLE MAPS NAMES USE LATER
        ini_set('max_execution_time', 300);
        //get all those bakeries
        $token = null;
        do {
          $placesUrl = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=33.8948812,35.4096949&radius=50000&keyword=sushi&key=AIzaSyC88VNgMdynDSr7EEPhZkyuvsyTUmRbHHA';
          $data = file_get_contents($placesUrl);
          $characters = json_decode($data);
          $results = $characters->results;

          for ($i = 0; $i < count($results); $i++){
            echo $results[$i]->name . '<br />';
          }

          if (isset($characters->next_page_token))
            $token = $characters->next_page_token;
          else
            $token = null;
        }while ($token != null);



/////////get file from server
$content = file_get_contents('https://www.cstatic-images.com/stock/379x253/68/img1113460234-1509471692068.jpg');
file_put_contents('images/flower.jpg', $content);
 ?>
