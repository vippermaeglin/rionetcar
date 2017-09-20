 <html>    
  <head> 
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  	 <script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>     
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpnME9WYD9KaQmsnFU9_NP9fY1PDUBhck" type="text/javascript"></script> 
    <script type="text/javascript" src="js/gmap3.js"></script> 
    <style>
      .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0; 
        width: 922px;
        height: 250px;
      }
    </style>
    
    <script type="text/javascript">
    
      jQuery(function(){
        var address = "<?=utf8_encode($_REQUEST['endereco'])?>";
        
        jQuery('#test1').gmap3(
          { map:{
              address:address,
              options:{
                zoom: 16,
                opts:{
                  scrollwheel:true
                }
              }
            },
            infowindow:{
              address:address,
              options:{
                size: new google.maps.Size(50,50),
                content: 'Estamos aqui !'
              },
              events:{
                closeclick: function(infowindow){
                  alert('closing : ' + jQuery(this).attr('id') + ' : ' + infowindow.getContent());
                }
              }
            }
          }
        );
          
      });
    </script>  
  </head>
    
  <body>
    <div id="test1" class="gmap3"></div>
  </body>
</html>

 <? // se precisar adaptar pelas coordenadas, o parametro ja esta chegando, basta implementar
	  $coord = "-14.235004,-51.92528";
	  
	  if($_REQUEST['coord'] != ""){
		$coord = $_REQUEST['coord'];
	  } 
	 
 ?>
