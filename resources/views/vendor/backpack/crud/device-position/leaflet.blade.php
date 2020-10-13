<link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" crossorigin=""/>
<script src="{{ asset('leaflet/leaflet.js') }}"
   crossorigin=""></script>

<script>
    var lat =  -6.557738;
    var lng =  107.315929;
    
    var map = L.map('map').setView([lat, lng], 12);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiZm5hemFydWxsYWgiLCJhIjoiY2tnNXltdTEzMHhuNTJ1bXNybGRjOWl6bCJ9.-QtZH4Z2hJHHPFSlMqfXiw'
    }).addTo(map);

    var marker_icon = L.icon({
		iconUrl: '{{ asset("/") }}/leaflet/map-markers-small.png',
		iconSize: [32, 37],
		iconAnchor: [16, 37],
		popupAnchor: [0, -28]
	});

    $.getJSON(baseurl +'/device-atrribute', function(data){
        L.geoJSON(data, {
            style: {
                weight: 1,
                color: "#123123",
                opacity: 1,
                fillColor: "#92278f",
            },
            onEachFeature: onEachFeature,
            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {icon: marker_icon});
            },
        }).addTo(map);
    });
    
    function onEachFeature(feature, layer) {
        var popupContent = "";

            popupContent = '<div class="infobox" style="width:300px">\n\
                    <div style="width:100%;height:100px">\n\
                        <div style="width:300px;float:left">\n\
                            <div class="title text-left">\n\
                                <div class="row">\
                                    <div class="col-md-12 text-left" style="padding-top:5px"><a href="#">Perangkat</a></div>\
                                </div>\
                            </div>\n\
                            <div class="content clearfix">\n\
                                <div class="text-center">\n\
                                </div>\n\
                            </div>\n\
                                <div class="infobox-footer text-color-primary text-left">\n\
                                    <div class="property-preview-f-left text-left"> \n\
                                            <div class="row" style="color:#0d11ff"> \n\
                                                <div class="col-sm-5 text-left" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:normal"> \n\
                                                        Nama Perangkat \n\
                                                    </span> \n\
                                                </div> \n\
                                                <div class="col-sm-1 text-center" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:bold"> \n\
                                                        : \n\
                                                    </span> \n\
                                                </div> \n\
                                                <div class="col-sm-6 text-left" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:bold"> \n\
                                                        '+feature.properties.popupContent+'\n\
                                                    </span> \n\
                                                </div> \n\
                                            </div> \n\
                                            <div class="row" style="color:#0d11ff"> \n\
                                                <div class="col-sm-5 text-left" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:normal"> \n\
                                                        Status Perangkat \n\
                                                    </span> \n\
                                                </div> \n\
                                                <div class="col-sm-1 text-center" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:bold"> \n\
                                                        : \n\
                                                    </span> \n\
                                                </div> \n\
                                                <div class="col-sm-6 text-left" style="font-size:12px;"> \n\
                                                    <span class="property-card-value" style="font-weight:bold"> \n\
                                                        '+feature.properties.status+'\n\
                                                    </span> \n\
                                                </div> \n\
                                            </div> \n\
                                    </div> \n\
                                </div>\n\
                            </div>\n\
                        </div>\n\
                        <div class="infobox-footer text-color-primary bg-primary text-center" style="padding:10px 0px;">&nbsp;</div>\n\
                    </div>';

                layer.on({
                    mouseover: function () {
                        this.setStyle({
                            'fillColor': '#dddddd',
                        });
                    },
                    mouseout: function () {
                        this.setStyle({
                            'fillColor': '#92278f',
                        });
                    },
                    click: function () {
                        // TODO Link to page
                        // alert('/Clicked on ' + feature.properties.kecamatan)
                    }
                });
                layer.bindPopup(popupContent, {
                    maxWidth: 510
                });
                        


    }
</script>