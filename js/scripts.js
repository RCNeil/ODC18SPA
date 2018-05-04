(function ($, root, undefined) { $(function () { 'use strict';

	contentAnimations();
	function contentAnimations() {
		if(Modernizr.csstransitions) {			
			$('.animate').on('inview', function(event, isInView) {
				if (isInView) {
					$(this).addClass('animation');
				}
			});
		}
	}

	mobileToggle();
	function mobileToggle() {
		$('.mobile-menu').click(function(e) {
			e.preventDefault();
			$(this).blur();
			if($('.header').hasClass('opened')) {
				$('.header').removeClass('opened');
			} else {
				$('.header').addClass('opened');
			}
		});	
	}
	
	var stateBounds = {
        de: ["38.46501729957076", "-75.6883449488281", "39.84011428339092", "-75.40576163607489"]
    };
	
	function getStateBounds(state) {
        return new google.maps.LatLngBounds(
          new google.maps.LatLng(stateBounds[state][0], 
                                 stateBounds[state][1]), 
          new google.maps.LatLng(stateBounds[state][2], 
                                 stateBounds[state][3])
        ); 
    }
	
	var options = {
			types: ['geocode'],
			componentRestrictions: {country: 'us'},
			strictbounds: getStateBounds('de')
		};
	
	var inputDiv = document.getElementById('autocomplete');
	var inputDiv2 = document.getElementById('autocomplete2');
	var autocomplete = new google.maps.places.Autocomplete(inputDiv, options);
	var autocomplete2 = new google.maps.places.Autocomplete(inputDiv2, options);
	
	
	$('.fetch.button').click(function(e) {
		e.preventDefault();
		var place = autocomplete.getPlace();
		var place2 = autocomplete2.getPlace();
		
		if( place == null || place2 == null) {
			alert('Please select both locations from the Google Maps dropdown.'); 
			console.log('These are undefined!');
		} else {		
			//MAKE SURE ITS DELAWARE
			for (var i = 0; i < place.address_components.length; i++) {
				if(place.address_components[i].types[0] == 'administrative_area_level_1') {
					var state = place.address_components[i].short_name;
					if(state != 'DE') {
						alert('Please select a location in Delaware!');
						return; 
					}
				}
			}
			for (var i = 0; i < place2.address_components.length; i++) {
				if(place2.address_components[i].types[0] == 'administrative_area_level_1') {
					var state = place2.address_components[i].short_name;
					if(state != 'DE') {
						alert('Please select a location in Delaware!');
						return; 
					}
				}
			}
			
			//GET THE COUNTY
			for (var i = 0; i < place.address_components.length; i++) {
				if(place.address_components[i].types[0] == 'administrative_area_level_2') {
					var county = place.address_components[i].long_name;
				}
			}
			var departure = place.formatted_address;
			var deplat = place.geometry.location.lat();
			var deplng = place.geometry.location.lng();
			
			var destination = place2.formatted_address;
			var destlat = place2.geometry.location.lat();
			var destlng = place2.geometry.location.lng();
			
			jQuery.ajax({
				url: 'http://tempdump.com/Projects/ODC18/SPA/includes/ride-overview.php',
				type: 'post',
				data: jQuery.param({  
					departure: departure, 
					cty: county,
					deplat: deplat, 
					deplng: deplng,
					destination: destination,
					destlat: destlat,
					destlng: destlng
				}),
				beforeSend:function(){
					jQuery('.results-container').empty().addClass('loading');
				}
			}).done(function(data) {
				jQuery('.results-container').removeClass('loading').append(data);
				jQuery('html, body').animate({ scrollTop: $('.results-container').offset().top }, 800);
			}).fail(function() {
				console.log('Error!!');
			});	
		}
	});


}); })(jQuery, this);