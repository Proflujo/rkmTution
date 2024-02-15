<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA3XfuMJJGzaU8TUItQM7XWD4esZdbpgtA&sensor=false&libraries=places&language=en"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.city-autocomplete').each(function(){
			var cityElem = this;
			var autocomplete = new google.maps.places.Autocomplete(this, { types: ['geocode'] });

			google.maps.event.addListener(autocomplete, 'place_changed', function(){
				 // Get the place details from the autocomplete object.
				 var place = autocomplete.getPlace();
				 $(cityElem).val(place.name);
			});
		});
	});
</script> -->