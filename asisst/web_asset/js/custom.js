//start on hover open dropdown menu
$('.dropdown').hover(
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        }, 
        function() {
            $(this).find('.dropdown-menu').stop(true, true).delay(200).slideUp();
        }
    );

    $('.dropdown-menu').hover(
        function() {
            $(this).stop(true, true);
        },
        function() {
            $(this).stop(true, true).delay(200).slideUp();
        }
    );


//start script of go to the div or id
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
//End script of go to the div or id


//start script of load gif

 document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'complete') {
      setTimeout(function(){
          document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
      },1000);
  }
}
//End script of load gif

//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 200) {
        var yourImg = document.getElementById('yourImgId');
        if(yourImg && yourImg.style) {
            yourImg.style.height = '83px';
            yourImg.style.width = '130px';
        }
      
   
    } else {
       var yourImg = document.getElementById('yourImgId');
              if(yourImg && yourImg.style) {
                  yourImg.style.height = '130px';
                  yourImg.style.width = '100%';
              }
        
              

    }
});



///slider duration

$('#carousel-example-2').carousel({
  interval: 8000
})
$('#page-carousel1').carousel({
  interval: 10000
})

   
  
//owl carousel
   $(document).ready(function () {

        var owl = $("#owl-demo1");
        var owl2 = $("#owl-demo2");

        owl.owlCarousel({
            items: 2, //10 items above 1000px browser width
            itemsDesktop: [1000, 2], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
        }),
         owl2.owlCarousel({
            items: 3, //10 items above 1000px browser width
            itemsDesktop: [1000, 3], //5 items between 1000px and 901px
            itemsDesktopSmall: [900, 2], // betweem 900px and 601px
            itemsTablet: [600, 1], //2 items between 600 and 0
            itemsMobile: false, // itemsMobile disabled - inherit from itemsTablet option
            autoPlay: true,
            navigation:false
        })

    });





//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/


  

$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});
$(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) || 
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });



/* START right button */
$(function () {
    $('.navbar-toggler').on('click', function(event) {
    event.preventDefault();
    $(this).closest('.navbar-minimal').toggleClass('open');
  })
});




/* on click button open menu*/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  for (var i = 1; i <= 12; i++) {
    var myDropdown= "myDropdown" + i;
     document.getElementById(myDropdown).classList.toggle("show");
  }
   
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}



   /////counter

 $('.counter').each(function() {
  var $this = $(this),
      countTo = $this.attr('data-count');
  
  $({ countNum: $this.text()}).animate({
    countNum: countTo
  },

  {

    duration: 20000,
    easing:'linear',
    step: function() {
      $this.text(Math.floor(this.countNum));
    },
    complete: function() {
      $this.text(this.countNum);
      //alert('finished');
    }

  });  
  
});
  







$(document).ready(function() {
  $('#toggle-btn').click(function() {
    $('#myul').toggle("slide");
   $('#toggle-btn').css('left','0px');
  });

});