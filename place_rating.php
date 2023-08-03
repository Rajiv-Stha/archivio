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

$place_id = $_REQUEST['pid'];

?>


<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- Header -->
    <div class="appHeader bg-place">
        <div class="left">
            <a href="#" class="headerButton goBack text-white">
                <i class="bi bi-chevron-left text-white"></i>
            </a>
        </div>

        <div class="pageTitle">
            Recensioni 
        </div>
        
        <div class="right pe-2">
            <a href="#" name="add_review" id="add_review" class="text-white">
                <i class="bi bi-pencil-square"></i>
            </a>
        </div>
    </div>
    <!-- * Header -->


    <!-- App Capsule -->
    <div id="appCapsule" >
         <div id="likeModalContent">
            <div class="section mt-2">

        	<div class="card">
        		<div class="card-body">
        			<div class="row">
        				<div class="col-6 text-center p-2">
        					<h1 class="text-warning mt-4 mb-4">
        						<b><span id="average_rating">0.0</span> / 5</b>
        					</h1>
        					<div class="mb-3">
        						<i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
    	    				</div>
        					<b><span id="total_review">0</span> Recensioni</b>
        				</div>
        				<div class="col-6">
        					<p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                            </p>
        					<p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>               
                            </p>
        					<p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>               
                            </p>
        					<p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>               
                            </p>
        					<p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                
                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>               
                            </p>
        				</div>
        			</div>
        		</div>
        	</div>


        	<div class="mt-5" id="review_content"></div>

            </div>

        </div>
    </div>
    <!-- * App Capsule -->


<div id="review_modal" class="modal fade dialogbox" data-bs-backdrop="static" tabindex="-1" role="dialog" style="z-index: 99999999!important;">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-body w-100 p-0 mb-0">
                
                <h5 class="p-2 mt-2">Lascia una Recensione</h5>

	      		<h4 class="text-center mt-2 bg-white shadowed">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
                    <input type="hidden" name="user_name" id="user_name" class="form-control" value="<?php echo $user_id; ?>" />
                    <input type="hidden" name="place_id" id="place_id" class="form-control" value="<?php echo $place_id; ?>" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Scrivi una recensione..."  row="5 "required></textarea>
	        	</div>
	        	
	      	</div>
                <div class="">
                    <a type="button" id="save_review" class="btn text-place btn-block mb-1" >
                        <i class="bi bi-star"></i>
                        Pubblica
                    </a>
                    <a href="#" class="btn btn-text text-danger btn-block" data-bs-dismiss="modal" id="save_review">
                        <i class="bi bi-trash3"></i>
                        Annulla
                    </a>
                </div>


    	</div>
  	</div>
</div>


<div id="toast-add-rating-ok" class="toast-box toast-top tap-to-close">
    <div class="in">
        <div class="text-white">
            <b style="font-size:18px;">Recensione pubblicata!</b>
        </div>
    </div>
</div>
<!-- * Toast Update Ok -->
    
    <?php

        // Footer Menu
        include('footer_app.php');

        // App sidebar
        include('sidebar/app_sidebar.php'); 
    ?>                        




     <?php
        // Footer Script JS
        include('footer.php');
    ?>


<script type="text/javascript">

    //carico lista likes
</script>

</body>



<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:gray;
}
.appBottomMenu{
    display: none!important;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        var place_id_val = $('#place_id').val();

        if(user_name == '' || user_review == '')
        {
            //alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"place_submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review,
                place_id : place_id_val
                },
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    //alert(data);
                    if(data == 1){
                         toastbox('toast-add-rating-ok', 5000);
                    }
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        var place_id_val = $('#place_id').val();
        $.ajax({
            url:"place_submit_rating.php?pid="+<?php echo $place_id; ?>,
            method:"POST",
            data:{
                action:'load_data',
                pid: <?php echo $place_id; ?>
            },
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-12">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right text-muted"> '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>