<?php require_once (dirname(__FILE__)."/include/head.php");
if(User_not_logged_in())
{
   redirect('index.php');
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Rating - <?php echo SITE_TITLE; ?></title>
<?php
include("theme/meta-head.php");
?>
  <style>

  .wrap{
   margin-top: 80px;
   margin-bottom: 20px;    
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<?php
include("theme/header.php");
?>

<div class="wrap container">
 <div class="row">

  <div class="col-sm-4 col-md-4">
    <div class="list-group">
        <a href="<?php echo BASE_URL?>/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
        <a href="<?php echo BASE_URL?>/my-appointment.php" class="list-group-item list-group-item-action">My Appointments</a>
        <a href="<?php echo BASE_URL?>/my-orders.php" disabled="" class="list-group-item list-group-item-action">My Orders</a>
        <a href="<?php echo BASE_URL?>/rating.php" disabled="" class="list-group-item list-group-item-action">Rating</a>
    </div>
  </div> 





<script src="rating.js"></script>
<link rel="stylesheet" href="style.css">

<div class="container">		
	<h3>Rate Your Product</h3>
	<?php
	include_once("db.php");
	$ratingDetails = "SELECT ratingNumber FROM item_rating";
	$rateResult = mysqli_query($mysqli, $ratingDetails) or die("database error:". mysqli_error($conn));
	$ratingNumber = 0;
	$count = 0;
	$fiveStarRating = 0;
	$fourStarRating = 0;
	$threeStarRating = 0;
	$twoStarRating = 0;
	$oneStarRating = 0;
	while($rate = mysqli_fetch_assoc($rateResult)) {
		$ratingNumber+= $rate['ratingNumber'];
		$count += 1;
		if($rate['ratingNumber'] == 5) {
			$fiveStarRating +=1;
		} else if($rate['ratingNumber'] == 4) {
			$fourStarRating +=1;
		} else if($rate['ratingNumber'] == 3) {
			$threeStarRating +=1;
		} else if($rate['ratingNumber'] == 2) {
			$twoStarRating +=1;
		} else if($rate['ratingNumber'] == 1) {
			$oneStarRating +=1;
		}
	}
	$average = 0;
	if($ratingNumber && $count) {
		$average = $ratingNumber/$count;
	}	
	?>		
	<br>		
	<div id="ratingDetails"> 		
		<div class="row">			
			<div class="col-sm-3">				
				<h4>Rating and Reviews</h4>
				<h2 class="bold padding-bottom-7"><?php printf('%.1f', $average); ?> <small>/ 5</small></h2>				
				<?php
				$averageRating = round($average, 0);
				for ($i = 1; $i <= 5; $i++) {
					$ratingClass = "btn-default btn-grey";
					if($i <= $averageRating) {
						$ratingClass = "btn-warning";
					}
				?>
				<button type="button" class="btn btn-sm <?php echo $ratingClass; ?>" aria-label="Left Align">
				  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
				</button>	
				<?php } ?>				
			</div>
			<div class="col-sm-3">
				<?php
				$fiveStarRatingPercent = round(($fiveStarRating/5)*100);
				$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';	
				
				$fourStarRatingPercent = round(($fourStarRating/5)*100);
				$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
				
				$threeStarRatingPercent = round(($threeStarRating/5)*100);
				$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
				
				$twoStarRatingPercent = round(($twoStarRating/5)*100);
				$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
				
				$oneStarRatingPercent = round(($oneStarRating/5)*100);
				$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
				
				?>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fiveStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fiveStarRating; ?></div>
				</div>
				
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $fourStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $fourStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $threeStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $threeStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $twoStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $twoStarRating; ?></div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?php echo $oneStarRatingPercent; ?>">
							<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;"><?php echo $oneStarRating; ?></div>
				</div>
			</div>		
			<div class="col-sm-3">
				<button type="button" id="rateProduct" class="btn btn-default">Rate this product</button>
			</div>		
		</div>
		<div class="row">
			<div class="col-sm-7">
				<hr/>
				
			</div>
		</div>	
	</div>
	<div id="ratingSection" style="display:none;">
		<div class="row">
			<div class="col-sm-12">
				<form id="ratingForm" method="POST">					
					<div class="form-group">
						<h4>Rate this product</h4>
						<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
						</button>
						<input type="hidden" class="form-control" id="rating" name="rating" value="1">
						<input type="hidden" class="form-control" id="itemId" name="itemId" value="12345678">
					</div>		
					<div class="form-group">
						<label for="usr">Title*</label>
						<input type="text" class="form-control" id="title" name="title" required>
					</div>
					<div class="form-group">
						<label for="comment">Comment*</label>
						<textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-info" id="saveReview">Save Review</button> <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
					</div>			
				</form>
			</div>
		</div>
	</div>				

</div>	









</div>
</div>
<?php
include("theme/footer.php");
?>
<script>
$(function(){

  /* Sets the minimum height of the wrapper div to ensure the footer reaches the bottom */
  function setWrapperMinHeight() {
    $('.wrapper').css('minHeight', window.innerHeight - $('.nav').height() - $('.footer').height());
  }
  /* Make sure the main div gets resized on ready */
  setWrapperMinHeight();

  /* Make sure the wrapper div gets resized whenever the screen gets resized */
  window.onresize = function() {
    setWrapperMinHeight();
  }
});

$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
