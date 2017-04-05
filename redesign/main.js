/* JavaScript for the OpenEI skin */

//Keyboard shortcuts
$(function(){
  $('body').keypress(function(e){
    //edit on control + e
    if (e.which == 5){
      window.location = mw.util.getUrl(null,{action:'edit'});
    }
    //history on control + h
    if (e.which == 8){
      window.location = mw.util.getUrl(null,{action:'history'});
    }
  });
});

//Action Menu
//click action button
$(function(){
  $('#pageLinks button').on('click', function(){
    actionMenu();
  });
});
//click body while action is open
$(function(){
  $('body').on('click', function(){
    if($('#pageLinks').hasClass('open')){
      actionMenu();
    }
  });
});
//keypress action for menu
$(document).keyup(function(){
  if($(window).width() > 768){
    if($(document.activeElement).parents('#pageLinks').length == 1){
      $('#pageLinks').addClass('open');
      menuOpen();
    }
    if($(document.activeElement).parents('#pageLinks').length != 1){
      $('#pageLinks').removeClass('open');
      menuClose();
    }
  }
});

function actionMenu(){
  if($('#pageLinks').hasClass('open')){
      /*
    $('#background-image, #mw-wrapper').css('left','0px');
    $('#mw-wrapper').css('opacity','1').removeClass('linksDisabled');
    $('body').css('position','relative');
    $('#pageLinks ul').css({'right': '-225px'});*/
    menuClose();
    return;
  }
  if(!$('#pageLinks').hasClass('open')){
      /*
    $('#background-image, #mw-wrapper').css('left','-225px');
      $('#background-image.zoomBlur').css('left','-900px');
    $('#mw-wrapper').css('opacity','0.5').addClass('linksDisabled');
    $('body').css('position','fixed');
    $('#pageLinks ul').css({'right': '0px'});*/
    menuOpen();
  }
}

function menuClose(){
    $('#background-image, #mw-wrapper').css('left','0px');
    $('#mw-wrapper').css('opacity','1').removeClass('linksDisabled');
    $('body').css('position','relative');
    $('#pageLinks ul').css({'right': '-225px'});
}

function menuOpen(){
    $('#background-image, #mw-wrapper').css('left','-225px');
    $('#background-image.zoomBlur').css('left','calc(-28% - 225px)');
    $('#mw-wrapper').css('opacity','0.5').addClass('linksDisabled');
    $('body').css('position','fixed');
    $('#pageLinks ul').css({'right': '0px'});
}

//Special Page Back Button
$('body.ns-special #wikiIndicators').click(function(){
  history.go(-1);
});

//Window Resize - Hide Menus
$(window).resize(function(){
  if($('#pageLinks').hasClass('open')){
    $('#pageLinks button').click();
  }
  if($('li.dropdown.user-menu').hasClass('open')){
    $('this').click();
  }
});
