
  if (GBrowserIsCompatible()) { // if the browser is compatible with Google Map's
    var map = document.getElementById("myMap"); // Get div element
    var m = new GMap2(map); // new instance of the GMap2 class and pass in our div location.
    m.setCenter(new GLatLng(36.158887, -86.782056), 13); // pass in latitude, longitude, and zoom level.
  }
else {alert("Your browser is not worthy.");}
