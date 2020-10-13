<link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>

	<script>
		var lat =  -6.557738;
        var lng =  107.315929;
		mapboxgl.accessToken = 'pk.eyJ1IjoiZm5hemFydWxsYWgiLCJhIjoiY2tnNXltdTEzMHhuNTJ1bXNybGRjOWl6bCJ9.-QtZH4Z2hJHHPFSlMqfXiw';
		var map = new mapboxgl.Map({
			container: 'map',
			style: 'mapbox://styles/mapbox/streets-v11', // stylesheet location
			center: [lng, lat], // starting position [lng, lat]
			zoom: 11 // starting zoom
		});

		var marker = new mapboxgl.Marker()
			.setLngLat([lng, lat])
			.setPopup(new mapboxgl.Popup().setHTML("<h1>Hello World!</h1>"))
			.addTo(map);

		
	</script>