<div class="container ride-overview">
	<div class="row">
		<div class="span100">
			<h2>Your Ride Summary</h2>
			<div class="module summary animate">
				<div class="flex-box dashboard-ride ride-overview">
					<h2><?php echo date('F j, Y', time()); ?></h2>
					<p><span>From:</span><?php echo $_POST['departure']; ?></p>
					<p><span>To:</span><?php echo $_POST['destination']; ?></p>
				</div>
				<div class="flex-box map-container" id="map-route">
					<script type="text/javascript">
													
						//MAKE SURE ASSETS ARE LOADED FIRST
						var id = 1; 
						var county = '<?php echo $_POST['cty']; ?>';
						var deplat = <?php echo $_POST['deplat']; ?>;
						var deplng = <?php echo $_POST['deplng']; ?>;
						var destlat = <?php echo $_POST['destlat']; ?>;
						var destlng = <?php echo $_POST['destlng']; ?>;

						//LOAD MAP FOR ROUTE OVERVIEW
						googleMaps(deplat,deplng,destlat,destlng);	

						//FETCH ALTERNATIVE ROUTES
						alternatives(id,deplat,deplng,destlat,destlng,county);														

					</script>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="span100 text-center">
			<h1>YOUR RIDE ALTERNATIVES</h1>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="span100">
			<h2>Taxis</h2>
			<div class="module alternatives taxis"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="span100">
			<h2>Other Carriers</h2>
			<div class="module alternatives carriers"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="row">
		<div class="span100">
			<h2>Public Transit</h2>
			<div class="module alternatives public-transits"></div>
		</div>
	</div>
	<div class="row">
		<div class="span100">
			<h2>EXPLORE MORE OPTIONS WITH:</h2>
			<div class="row text-center">
				<div class="flex-box alternative ride-hailing">
					<a href="http://www.uber.com" target="_blank"><i class="fab fa-uber"></i></a>
					<h2><a href="http://www.uber.com" target="_blank"><span>RIDE HAILING</span>UBER</a></h2>
				</div>
				<div class="flex-box alternative ride-hailing">
					<a href="http://www.lyft.com" target="_blank"><i class="fab fa-lyft"></i></a>
					<h2><a href="http://www.lyft.com" target="_blank"><span>RIDE HAILING</span>LYFT</a></h2>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>