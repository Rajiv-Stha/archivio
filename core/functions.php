<?php 
include('connection.php');
date_default_timezone_set('Europe/Rome');



//$last_id = $db->getInsertId($db);

@$user_id = $_SESSION['user_id'];

$db = new Db();
$con = getdb();




 function get_post_info($pid){
    $resArr = array();
    $user_id = $_SESSION['user_id'];
    $db = new Db();

    
    $sql="SELECT * from spots where spot_id = $pid LIMIT 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['user_id'] = $rowdata['user_id'];
                $resArr['place_id'] = $rowdata['place_id'];
                $resArr['spot_hidden'] = $rowdata['spot_hidden'];
                //$resArr=$rowdata['username'];
            }

        }else{
            $resArr="";
    }

    return $resArr;

}



 function get_user_info($uid){
    $resArr = array();
    $user_id = $_SESSION['user_id'];
    $db = new Db();

    $sql="SELECT * from users where user_id = '$uid' OR `username` LIKE  '$uid' LIMIT 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['user_id'] = $rowdata['user_id'];
                $resArr['username'] = $rowdata['username'];
                $resArr['email'] = $rowdata['email'];
                $resArr['nome'] = $rowdata['name'];
                $resArr['bio'] = $rowdata['bio'];
                $profile_img = $rowdata['img'];
                $resArr['private_profile'] = $rowdata['private_profile'];
                $resArr['mention_id'] = "@u".$rowdata['user_id'];
                $resArr['notifiche_status'] = $rowdata['bubble_notfiche_status'];
                //$resArr=$rowdata['username'];
            }


            if($profile_img != 0){
                $fileNameImg = getImageByID($profile_img);

                $resArr['img'] = "/uploads/users/".$fileNameImg;

            }else{
                //default image
                $resArr['img'] = "/assets/img/sample/avatar/avatar3.jpg";
            }

        }else{

            $resArr['user_id'] = "";
            $resArr['mention_id'] = "";
    }

    

    return $resArr;

}

function getPlaceLastImage($place_id){

    $user_id = $_SESSION['user_id'];
    $db = new Db();

    $sql="SELECT * FROM `spots` WHERE place_id = '$place_id' AND spot_images_id != '0' ORDER by spot_time DESC LIMIT 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {

                $profile_img = $rowdata['spot_images_id'];
            }


            if($profile_img != 0){
                $fileNameImg = getImageByID($profile_img);

                $resArr = "/uploads/spot/".$fileNameImg;

            }else{
                //default image
                $resArr = "/assets/img/sample/photo/1.jpg";
            }

        }else{

            $resArr = "/assets/img/sample/photo/1.jpg";
    }

    

    return $resArr;






}





 function get_place_info($uid){
    $resArr = array();
    $user_id = $_SESSION['user_id'];
    $db = new Db();

    $sql="SELECT * from places where place_id = $uid LIMIT 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['place_id'] = $rowdata['place_id'];
                $resArr['place_name'] = $rowdata['place_name'];
                $resArr['place_latitude'] = $rowdata['place_latitude'];
                $resArr['place_longitude'] = $rowdata['place_longitude'];
                $resArr['place_city'] = $rowdata['place_city'];
                $resArr['place_address'] = $rowdata['place_address'];
                $resArr['place_rating'] = calculatePlaceRating($rowdata['place_id']);

                //$resArr=$rowdata['username'];
            }



        }else{
            $resArr="";
    }


    
    $resArr['follower_status'] = getFollowerStatusPlace($uid);
    $resArr['place_followers'] = getFollowersPlace($uid);
    $resArr['place_spotted_confirmed'] = getSpottedTotalPlace($uid);
    $resArr['place_posts'] = getFollowersPlace($uid);


    return $resArr;

}



function getFollowerStatusUser($to_user){

    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT * from followers where follower_user_id = '$user_id' AND follow_user_id = '$to_user'  AND follower_type = 'user';";

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr = $rowdata['follower_status'];
                    }

                }else{

                    $resArr = 0; //non si seguono

                    if($user_id == $to_user){
                        $resArr = 4; //stesso utente
                    }
                    

                }

             return $resArr;
}


function getFollowerStatusPlace($to_user){

    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT * from followers where follower_user_id = '$user_id' AND follow_user_id = '$to_user'  AND follower_type = 'place';";

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                        $resArr = 1;
                }else{
                    $resArr = 0; //non si seguono                    
                }

             return $resArr;
}

function getFollowersPlace($uid){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT * from followers where follow_user_id = '$uid' AND follower_type = 'place' AND follower_status = 1;"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr++;
                    }

                }else{

                    $resArr = 0; 
                    

                }

             return $resArr;

}



function getFollowers($uid){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT * from followers where follow_user_id = '$uid' AND follower_type = 'user' AND follower_status = 1;"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr++;
                    }

                }else{

                    $resArr = 0; 
                    

                }

             return $resArr;

}

function getSeguiti($uid){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT * from followers where follower_user_id = '$uid'  AND follower_type = 'user' AND follower_status = 1;"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr++;
                    }

                }else{

                    $resArr = 0; //non si seguono
                    

                }

             return $resArr;

}




function getSpottedTotalPlace($uid){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT  DISTINCT spotted_request.spotted_request_to_user_id , spotted_request.spotted_request_post_id  from spotted_request INNER JOIN spots ON spots.spot_id =  spotted_request.spotted_request_post_id where spots.place_id = '$uid' AND spotted_request.spotted_request_confirmed = 1 AND spotted_request.spotted_request_status = 1;"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {    
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr++;
                    }

                }else{

                    $resArr = 0;
                    

                }

             return $resArr;

}


function getSpottedPoint($uid){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT DISTINCT spotted_request_to_user_id  from spotted_request where spotted_request_user_id = '$uid' AND spotted_request_confirmed = 1 AND spotted_request_status = 1;"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr++;
                    }

                }else{

                    $resArr = 0; //non si seguono
                    

                }

             return $resArr;

}



function get_likes_info($pid, $type){
    $user_id = $_SESSION['user_id'];
    $resArr = array();
    $string = "";
    
    $db = new Db();

    $sql="SELECT COUNT(like_id) AS number from likes where like_post_id = $pid AND type = '$type' AND like_status = 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['like_number'] = $rowdata['number'];
                //$resArr=$rowdata['username'];

                //seleziono utenti a cui piace max 3
                $sql5="SELECT * FROM likes where like_post_id = $pid AND type = '$type' AND like_status = 1 LIMIT 4";
                //echo $sql5;
                $count_lik_usr = 0;
                $likes_meno_tre = (((int)$rowdata['number']+0));
                $likes_meno_tre = $likes_meno_tre-3;


                    $result5 = $db->query($sql5); 
                    if (mysqli_num_rows($result5) > 0) {

                        while($rowdata5 = $result5->fetch_assoc())
                        {
                            $user_id_get = $rowdata5['like_user_id'];
                            $user_info_arr = get_user_info($user_id_get);
                
                            $user_username = $user_info_arr['username'];
                            
                            $count_lik_usr++;

                            if($count_lik_usr == 1){
                                $string = "<b>".$user_username."</b>"; 
                            }
                            elseif($count_lik_usr == 2){
                                $string .= " e <b>".$user_username."</b>"; 
                            }
                            elseif($count_lik_usr == 3){
                                $string .= " e <b>".$user_username."</b>"; 
                            }elseif($count_lik_usr == 4){
                                $string .= " e altri ".$likes_meno_tre; 
                            }
                            
                            
                        }
                    }


                    $resArr['like_string'] = $string;


            }
        }else{
                $resArr['like_number'] = 0;
                $resArr['like_string'] = "";

    }

    //check if user has like this comment
    $sql="SELECT * from likes where like_post_id = $pid AND like_user_id = $user_id AND type = '$type' AND like_status = 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

       
                $resArr['like_status'] = 1;
                //$resArr=$rowdata['username'];
    
        }else{
            $resArr['like_status'] = 0;
            
    }

    

    return $resArr;

}


function get_comment_info($pid){
    $user_id = $_SESSION['user_id'];
    $resArr = array();
    
    $db = new Db();

    $sql="SELECT COUNT(comment_id) AS number from comments where comment_post_id = $pid AND comment_status = 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['comment_number'] = $rowdata['number'];
                //$resArr=$rowdata['username'];
            }
        }else{
                $resArr['comment_number'] = 0;

    }

    //check if user has like this comment
    $sql="SELECT * from comments where comment_post_id = $pid AND comment_user_id = $user_id AND comment_status = 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

       
                $resArr['comment_status'] = 1;
                //$resArr=$rowdata['username'];
    
        }else{
            $resArr['comment_status'] = 0;
    }

    

    return $resArr;

}


function get_spotted_info($pid){
    $user_id = $_SESSION['user_id'];
    $resArr = array();
    
    $db = new Db();

    $sql="SELECT COUNT(spotted_request_id) AS number FROM spotted_request WHERE (spotted_request_post_id = '$pid' AND spotted_request_status = 1);";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($rowdata = $result->fetch_assoc())
            {
                
                $resArr['spotted_number'] = $rowdata['number'];
                //$resArr=$rowdata['username'];
            }
        }else{
                $resArr['spotted_number'] = 0;

    }

    //check if user has like this comment
    $sql="SELECT * from spotted_request where spotted_request_post_id = $pid AND spotted_request_user_id = $user_id AND spotted_request_status = 1;";

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

       
                $resArr['spotted_status'] = 1;
                //$resArr=$rowdata['username'];
    
        }else{
            $resArr['spotted_status'] = 0;
    }

    

    return $resArr;

}



//convert timestamp to normal date
//return current date time
function getCurrentDateTime(){
    //date_default_timezone_set("Asia/Calcutta");
    return date("Y-m-d H:i:s");
}

function getDateString($date){
    $dateArray = date_parse_from_format('Y/m/d', $date);
    $monthName = DateTime::createFromFormat('!m', $dateArray['month'])->format('F');
    return $dateArray['day'] . " " . $monthName  . " " . $dateArray['year'];
}

function getDateTimeDifferenceString($datetime){
    $currentDateTime = new DateTime(getCurrentDateTime());
    $passedDateTime = new DateTime($datetime);
    $interval = $currentDateTime->diff($passedDateTime);
    //$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
    $day = $interval->format('%a');
    $hour = $interval->format('%h');
    $min = $interval->format('%i');
    $seconds = $interval->format('%s');

    if($day > 7)
        return getDateString($datetime);
    else if($day >= 1 && $day <= 7 ){
        if($day == 1) return $day . " giorno";
        return $day . " giorni";
    }else if($hour >= 1 && $hour <= 24){
        if($hour == 1) return $hour . " ora";
        return $hour . " ore";
    }else if($min >= 1 && $min <= 60){
        if($min == 1) return $min . " min";
        return $min . " min";
    }else if($seconds >= 1 && $seconds <= 60){
        if($seconds == 1) return $seconds . " sec";
        return $seconds . " sec";
    }
}



 function convertHashtoLink($string)  
 {  
      $expression = "/#+([a-zA-Z0-9_]+)/";  
      $string = preg_replace($expression, '<a href="../page_hashtag.php?tag=$1">$0</a>', $string);  
      return $string;  
 }  

 

function convertUserTagToLinkFrontEnd($string)  {  
        $mention_regex = "/@u+([a-zA-Z0-9_]+)/";

        $i = 0;
    $matches = array();

    if (preg_match_all($mention_regex, $string, $matches))
    {
        //print_r($matches);
        foreach ($matches as $match)
        {

        $user_id = $matches[$i][0]; // @uID
        $user_id =  str_replace("@u","",$user_id); //rimovo @uID

        $user_info_arr = get_user_info($user_id);
        $username = $user_info_arr['username'];
        $user_profile_url = "amg";

        $match_search =  '@u'.$user_id;

        $match_replace = '<span class="text-gr" onclick="goToProfile(' . $user_id . ');">@' . $username . '</span>';


            $string = str_replace($match_search, $match_replace, $string);
            
            $user_id ='';
            $i++;
        }
    }
        
   

        return $string;
      //return $string;  
 }  


 function convertUserIDtoTagBackEnd($string)  {  
        $mention_regex = "/@+([a-zA-Z0-9_]+)/";

        $i = 0;
    $matches = array();

    if (preg_match_all($mention_regex, $string, $matches))
    {
        //print_r($matches);
        foreach ($matches as $match)
        {

        $username = $matches[$i][0]; // @username
        //$username =  convertUsernametext($username);

        //echo $username;

        $match_search =  '@'.$username;

        $user_id_tag = convertUserTagID($username);

        $user_info_arr = get_user_info($user_id_tag);
                
        $match_replace = $user_info_arr['mention_id'];
        //$match_search = $username;

        //echo $user_id_info;

        //$match_replace = '<span class="text-gr" onclick="goToProfile(' . $username . ');">@' . $username . '</span>';


            $string = str_replace($match_search, $match_replace, $string);
            
            $username ='';
            $i++;
        }
    }
        
   

        return $string;
      //return $string;  
 }  




 function convertUserTagLink($string)  
 {  

        $regex = "/@u+([a-zA-Z0-9_]+)/";
        if(preg_match($regex,$string,$matches) === 1){
            list($username,$name) = [$matches[0] , strtolower(str_replace(' ','',$matches[1]))];
            $uidd = convertUsernametext($username);
            $user_info_arr = get_user_info($uidd);
            $name = $user_info_arr['username'];


            return "$name";
        }
   

 }  

    function convertUsernametext($str) {
        $regex = "/@+([a-zA-Z0-9_]+)/";
        if(preg_match($regex,$str,$matches) === 1){
            list($username,$name) = [$matches[0] , strtolower(str_replace(' ','',$matches[1]))];
            return "$name";
        }
    }


function convertUserTagID($string)  
 {  

    //$string = convertUsernametext($string);
    $user_info_arr = get_user_info($string);
                
    $user_id_info = $user_info_arr['user_id'];

    return $user_id_info;
}  


    

function getImageByID($imgID){
    $user_id = $_SESSION['user_id'];
    $db = new Db();
    $resArr = 0;

     //controllo se gli utenti si seguono o la richiesta è in sospeso = 3
            $sql1="SELECT images_file from images where images_id = '$imgID';"; //confermate

            //echo $sql1;
            $result1 = $db->query($sql1); 
                if (mysqli_num_rows($result1) > 0) {
                     while($rowdata = $result1->fetch_assoc()){
                        $resArr = $rowdata['images_file'];
                    }

                }else{

                    $resArr = 0; //non si seguono
                    

                }

             return $resArr;


}




function calculatePlaceRating($pid){
    $user_id = $_SESSION['user_id'];
    $resArr = array();
    
    $db = new Db();

  $average_rating = 0;
  $total_review = 0;
  $five_star_review = 0;
  $four_star_review = 0;
  $three_star_review = 0;
  $two_star_review = 0;
  $one_star_review = 0;
  $total_user_rating = 0;


  $sql = "SELECT * FROM place_review_table WHERE place_id = '$pid' ORDER BY review_id DESC";
   

    //echo $sql;

    $result = $db->query($sql); 
        if (mysqli_num_rows($result) > 0) {

            while($row = $result->fetch_assoc())
            {
                
                if($row["user_rating"] == '5')
                {
                  $five_star_review++;
                }

                if($row["user_rating"] == '4')
                {
                  $four_star_review++;
                }

                if($row["user_rating"] == '3')
                {
                  $three_star_review++;
                }

                if($row["user_rating"] == '2')
                {
                  $two_star_review++;
                }

                if($row["user_rating"] == '1')
                {
                      $one_star_review++;
                    }

                    $total_review++;

                    $total_user_rating = $total_user_rating + $row["user_rating"];

  
                //$resArr=$rowdata['username'];
            }

         $average_rating = $total_user_rating / $total_review;


        }else{

            $average_rating = 0;
        }






  return $average_rating;

}



function mysql_real_escape_string(string $unescaped_string): string
    {
        $replacementMap = [
            "\0" => "\\0",
            "\n" => "\\n",
            "\r" => "\\r",
            "\t" => "\\t",
            chr(26) => "\\Z",
            chr(8) => "\\b",
            '"' => '\"',
            "'" => "\'",
            '_' => "\_",
            "%" => "\%",
            '\\' => '\\\\'
        ];

        return \strtr($unescaped_string, $replacementMap);
}




function sendnotification($to, $title, $message, $img,  $urls)
{
    $msg = $message;
    $content = array(
        "en" => $msg
    );
    $headings = array(
        "en" => $title
    );
    if ($img == '') {
        $fields = array(
            'app_id' => 'a1737bdf-2075-4bbd-85be-f7b4ad25fef6',
            "headings" => $headings,
            'include_player_ids' => array($to),
            'large_icon' => "https://app.spottat.com/assets/icon.png",
            'content_available' => true,
            'url' => $urls,
            'contents' => $content
        );
    } else {
        $ios_img = array(
            "id1" => $img
        );
        $fields = array(
            'app_id' => 'a1737bdf-2075-4bbd-85be-f7b4ad25fef6',
            "headings" => $headings,
            'include_player_ids' => array($to),
            'contents' => $content,
            'data' => array("URL" => "https://app.spottat.com/page_post_details.php?sid="),
            "big_picture" => $img,
            'large_icon' => "https://app.spottat.com/assets/icon.png",
            'content_available' => true,
            'url' => $urls,
            "ios_attachments" => $ios_img
        );

    }
    $headers = array(
        'Authorization: key=YjI3MzU1ZmMtOWJlMS00MjUwLWFiZjItMTFlZTEwZDM2ZTVl',
        'Content-Type: application/json; charset=utf-8'
    );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://onesignal.com/api/v1/notifications');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}


function truncate($text, $chars = 15) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}

?>