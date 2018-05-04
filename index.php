<?php require_once('header.php'); ?>

<div class="container intro-container">
	<img src="images/mobile-de-bluegreen.png" alt="" />
	<div class="flex-box text-center">
		<h1>DELAWARE'S PARATRANSIT PORTAL<br /><em>FIND AN ALTERNATIVE ROUTE!</em></h1>
	</div>
</div>

<div class="container highlight-container input-container">
	<div class="flex-box">
		<label>Where are you starting?</label>
		<input id="autocomplete" placeholder="Enter your address" type="text" autocomplete="off"></input>
	</div>
	<div class="flex-box">
		<label>Where are you ending?</label>
		<input id="autocomplete2" placeholder="Enter your address" type="text" autocomplete="off"></input>
	</div>
	<div class="flex-box confirm text-center" style="padding-top:0;">
		<a class="fetch button" href="javascript:void(0);">Find Alternatives</a>
	</div>
</div>

<div class="results-container"></div>

<?php //include_once('includes/ride-overview.php'); ?>
<?php require_once('footer.php'); ?>