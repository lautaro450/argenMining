/*!
 * Start Bootstrap - Freelancer Bootstrap Theme (http://startbootstrap.com)
 * Code licensed under the Apache License v2.0.
 * For details, see http://www.apache.org/licenses/LICENSE-2.0.
 */

// Floating label headings for the contact form
$(function() {
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !! $(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });
});

// Highlight the top nav as scrolling occurs
$('body').scrollspy({
    target: '.navbar-fixed-top'
})

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
    $('.navbar-toggle:visible').click();
});
$('.tooltip').hide();

$('.form-input').focus(function() {
   $('.tooltip').fadeOut(250);
   $("."+$(this).attr('tooltip-class')).fadeIn(500);
});

$('.form-input').blur(function() {
   $('.tooltip').fadeOut(250);
});

$('.login-button').click(function (event) {
  event.preventDefault();
  // or use return false;
});

$( ".login-button" ).click(function() {
    if (  $( '.login-form' ).css( "transform" ) == 'none' ){
        $('.login-form').css("transform","rotateY(-180deg)");
	      $('.loading').css("transform","rotateY(0deg)");
      	var delay=600;
        setTimeout(function(){
          $('.loading-spinner-large').css("display","block");
          $('.loading-spinner-small').css("display","block");
        }, delay);
    } else {
        $('.login-form').css("transform","" );
    }
});