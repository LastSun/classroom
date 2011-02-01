/**
 * 
 */
 var map;
 var markersArray = [];
 
 var fillcolor = {
		 ALLOW:"#00FF00",
		 NALLOW:"#FF0000",
		 AD:"#0000FF"
 }
 
 var linecolor = {
		 ALLOW:"#FFFFFF",
		 NALLOW:"#FF0000",
		 AD:"#0000FF"
 }
 
 var xiqu = new google.maps.LatLng(31.84015063838853, 117.25061058998108);
 //地图坐标：(31.83808164745928, 117.2560715675354)
 var dongqu = new google.maps.LatLng(31.8396128875006, 117.2644293308258);
 var nanqu = new google.maps.LatLng(31.823816196490043, 117.27622032165527);
 var beiqu = new google.maps.LatLng(31.845792276579207, 117.25782036781311);
 
 var latlngfix = {
		 la:-0.00206899092925,
		 lo:0.00546097755432
 }
 
 $(document).ready(function() {

	initialize_map();
		
});
 
 function fixlatlng(latlng) {
	 la = (Number(latlng.lat()) + Number(latlngfix.la)).toString();
	 lo = (Number(latlng.lng()) + Number(latlngfix.lo)).toString();
	 return new google.maps.LatLng(la,lo);
 }

 function addInfoWindow(polygon,title,id)
 {
	 var name = new google.maps.InfoWindow({
		content: "<p class='placename'>" + title + "</p>",
		//pixelOffset: new google.maps.Size(20,-20,"px","px")
	 });
		
	 /*google.maps.event.addListener(polygon, 'mouseover' ,function(event){
		 name.setPosition(event.latLng);
		 name.open(map);
	 });
	 
	 google.maps.event.addListener(polygon, 'mouseout' ,function(event) {
		 name.close();
	 })*/
	 
	 google.maps.event.addListener(polygon, 'mouseover' ,function(event){
		 $("#mouseplacename").html("<p class='placename'>" + title + "</p>");
	 });
	 
	 google.maps.event.addListener(polygon, 'click' ,function() {
		$.post("views/placerooms.php",{
			placeid:id
		},function(data) {
			$("#roominform").html(data);
		}) 
	 });
	 
 }
 function initmarkers(fix)
 {
 	var polygon = [];
 	$.post("model/getplaces.php",function(data) {
 		polygons = data.split(';');
 		for(i in polygons)
 		{
 			if(!polygons) return;
 			marks = polygons[i].split('<');
 			title = marks[1];
 			id = marks[2];
 			marks = marks[0].split(',');
	 		for(j in marks)
	 		{
	 			markers = marks[j].split(':');
	 			if(fix) {
	 				lat = fixlatlng(new google.maps.LatLng(markers[0],markers[1]));
	 			}
	 			else lat = new google.maps.LatLng(markers[0],markers[1]);
	 			polygon.push(lat);
	 		}
	 		
	 		polygon_draw = new google.maps.Polygon({
	 	       paths: polygon,
	 	       strokeColor: linecolor.ALLOW,
	 	       strokeOpacity: 0.8,
	 	       strokeWeight: 1,
	 	       fillColor: fillcolor.ALLOW,
	 	       fillOpacity: 0.35
	 	     });
	 		
	 		addInfoWindow(polygon_draw,title,id);
	 		polygon_draw.setMap(map);
	 		
	 		polygon = [];
 		}
 	});
 }

 function initialize_map() {
 	var myOptions = {
	    	zoom: 17,
	    	center: fixlatlng(xiqu),
	    	mapTypeId: google.maps.MapTypeId.ROADMAP,
	    	mapTypeControl: false,
	    	streetViewControl: false,
	    	navigationControlOptions: {
	    		position:google.maps.ControlPosition.TOP_LEFT,
	    		style:google.maps.NavigationControlStyle.DEFAULT
	    	}
	 	};
	 	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
	  	initmarkers(1);
  }
 
 /*
  * 
  */
 
 /*
  * 
  */
 var triangleCoords = [];
 var last = null;
 var editpoly_flag = null;
 
 function savepolygon(polygon)
 {
	 polys = [];
	 polygon.getPath().forEach(function(element,num) {
		 polys.push(element.lat() + ":" + element.lng());
	 });
	 $.post("model/saveplace.php",{
		 action:"insert",
		 polys:polys.toString(),
		 placename:"yage"
	 },function(data) {
		 if(data == "OK") {
			 show = last.getPath();
			 show = new google.maps.Polygon({
			       paths: show,
			       strokeColor: linecolor.ALLOW,
			       strokeOpacity: 0.8,
			       strokeWeight: 1,
			       fillColor: fillcolor.ALLOW,
			       fillOpacity: 0.35,
			       clickable:	false
			     });
			 last.setMap(null);
			 last = null;
			 show.setMap(map);
			 $('#inform').html("succeed");
		 }
		 else {
			 $('#inform').html("失败，请稍候再试");
		 }
	 });
 }
 
 function editpolygon(latlng)
 {
     // Construct the polygon
     // Note that we don't specify an array or arrays, but instead just
     // a simple array of LatLngs in the paths property
	 if(editpoly_flag)
	 {
		 last = null;
		 triangleCoords = [];
		 editpoly_flag = null;
	 }
	 
	 triangleCoords.push(latlng);
	 
     bermudaTriangle = new google.maps.Polygon({
       paths: triangleCoords,
       strokeColor: linecolor.ALLOW,
       strokeOpacity: 0.8,
       strokeWeight: 2,
       fillColor: fillcolor.ALLOW,
       fillOpacity: 0,
       clickable:	false
     });
     
     if(last) last.setMap(null);
     bermudaTriangle.setMap(map);

     last = bermudaTriangle;
 }
 
 function editpolyinit() {
	 	center = map.getCenter();
	 	var myOptions = {
	    	zoom: 17,
	    	center: center,
	    	mapTypeId: google.maps.MapTypeId.SATELLITE,
	    	draggableCursor: "crosshair",
	    	mapTypeControl: true,
	    	streetViewControl: false,
	    	navigationControlOptions: {
	    		position:google.maps.ControlPosition.TOP_LEFT,
	    		style:google.maps.NavigationControlStyle.DEFAULT
	    	}
	 	};
	 	map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
		google.maps.event.addListener(map, 'click', function(event) {
			editpolygon(event.latLng);
	  	});
		
		/*google.maps.event.addListener(map, 'dragend', function() {
			alert(map.getCenter());
		});*/
		
	  	initmarkers(null);
 }