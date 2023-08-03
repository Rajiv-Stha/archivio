<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('core/functions.php');
}
else{
    header('location: login.php');
}


//$connect = new PDO("mysql:host=localhost;dbname=spottat_app", "root", "root");
$connect = $GLOBALS['connect'];

if(isset($_POST["rating_data"]))
{

	$data = array(
		':user_name'		=>	$_SESSION['user_id'],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
		':place_id_val'		=>	$_POST["place_id"],
		':datetime'			=>	time()
	);


	$query = "
	INSERT INTO place_review_table 
	(user_id, user_rating, user_review, place_id, datetime) 
	VALUES (:user_name, :user_rating, :user_review, :place_id_val, :datetime)
	";

	//echo $query;
	$statement = $connect->prepare($query);

	$statement->execute($data);

	//echo "Recensione aggiunta!";

	echo "1";

}

if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();
	$place_id = $_REQUEST["pid"];


	$query = "
	SELECT * FROM place_review_table WHERE place_id = '$place_id' 
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$user_id_get = $row["user_id"];
		$user_info_arr = get_user_info($user_id_get);
        $user_username = $user_info_arr['username'];

		$review_content[] = array(
			'user_name'		=>	$user_username,
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	date('d/m/Y - h:i', $row["datetime"])
		);

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

	}

	$average_rating = $total_user_rating / $total_review;


	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}

?>