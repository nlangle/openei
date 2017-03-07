<noinclude>
This widget helps construct and format the page layout for [[RAPID]] Roadmap and Overview pages.
[[Category:RAPID Widgets]]
</noinclude><includeonly>
<script>
var roadmap = location.pathname.split("/").slice(-1).toString();
if(roadmap.indexOf("(") > 0){roadmap = roadmap.split("(")[0].toString();}
if(roadmap.indexOf("_") > 0){roadmap = roadmap.split("_")[0].toString();}
var roadmapSection = roadmap.split("-")[0];

$(document).ready(function() {
  $('#bodyContent').append('<a href="#feedbackModal" rel="nofollow" role="button" class="btn-feedback" id="feedbackBtn" data-toggle="modal">Feedback</a>');
  //add bootstrap collapse
  $('#narrativeDescription h2').each(function(i) {
    $(this).addClass('collapse');
    $(this).attr('data-target', 'narrative'+(i+1));
    $(this).nextUntil('h2').attr('class', 'narrative-block narrative'+(i+1));

    //replace roadmap in title
    if($(this).text().indexOf(roadmap)>=0){
        pattern = new RegExp(roadmap, "g");
        newText = $(this).text().replace(pattern, roadmapSection);
        $(this).text(newText);
    }
  });

  $('#narrativeDescription h2.collapse').click(function(){
      $(this).toggleClass('min');
      target = $(this).attr('data-target');
      if($(this).siblings().hasClass(target)){
          $('.'+target+'').toggle();
      }
      //$(this).prevAll('.narrative-block').hide();
      //$(this).nextAll('h2').nextUntil('h2').hide();
      //$(this).siblings('h2').removeClass('min');
  });


  //OVERVIEW PAGES
  //hide summary-view if content is short
  /*$('.summary-container').each(function(){
    if($(this).text().length <= 390){
      $(this).next('.summary-view').remove();
    }
  });*/
  //read more
  $('.summary-view').click(function(){
      $(this).prev('.summary-container').toggleClass("full-view");
      $(this).toggleClass("less");
      $('.summary-view').text("More Information");
      $('.summary-view.less').text("Show Less");
  });

  //TOOLTIPS
  $('[data-toggle="tooltip"]').tooltip({delay: {show: 1000, hide: 100}});

  //PRINTING DOCUMENTS
  var printPDF = location.href.indexOf("print=pdf");
  if(printPDF > 0){
    $('#left-nav').hide();
    $('div.left').css({"width":"75%", "margin-left":"10px"});
    $('.summary-container').css("height","auto");
    $('.summary-view').hide();
    $('.carousel-inner, .item').show();
    $('h2.collapse').each(function(){$(this).click();});
  }

});

</script>
</includeonly>
