<noinclude>
This widget works with [[Template:MapOverlay]] to animate the position of the div containing the map.

[[Category:Widgets]]
</noinclude><includeonly>
<!--Widget:DisplayDialog-->
 <style>
  #mapbox {
    position:absolute;
    top:-1000px;
    left:0px;
    width:100%;
    min-height:425px;
    background:rgba(0,0,0,0.8);
    z-index:10;
  }
  </style>
  <script type="text/javascript">
  $('#show-map').click(function() {
    $('#mapbox').animate({top:"0px",height:"100%"}, 1000);
  });
  $('#hide-map').click(function() {
    $('#mapbox').animate({top:"-1000px",height:"0px"}, 1000);
  });
  </script>
</includeonly>
