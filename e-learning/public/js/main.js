$( document ).ready(function() {
    $(".lesson-list li").click(function(){
        $(".lesson-list li").removeClass("active");
        $(this).addClass("active");

    })
    $(".heart i").click(function(){
        if ( $(this).hasClass("fa-heart-o")){
            $(this).removeClass("fa-heart-o");
            $(this).addClass("fa-heart");
        }
        else{
            $(this).removeClass("fa-heart");
            $(this).addClass("fa-heart-o");
        }
    });
    $.each($(".arraw-white label"),function(){
        $(this).parent(".arraw-white").removeClass("arraw-white").addClass("arraw-white-l");
    });


    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    });

    var btn = $(".navbar-toggler");
    var navbar = $('.navbar');
    btn.click(function(){
      console.log("lol");
      if (!btn.hasClass("navbar-toggler-close")){
        window.setTimeout(function(){btn.addClass("navbar-toggler-close");},300);
        $('body').css('overflow', 'hidden');
      }
      else{
        $(this).removeClass("navbar-toggler-close");
        $('body').css('overflow', 'auto');
      }
    });
    $(".edit-profile-image button").click(function(){
      $("#lol").click();
    });
    $(".edit-profile-image input").change(function(event){
      readURL(this);
    });
    function readURL(input){
      if (input.files && input.files[0]) {
        console.log("0")
        var reader = new FileReader();
        reader.onload = function(e){
          $(".edit-profile-image img").attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    };
    $(".dark-input").siblings("label").css("font-size","20px")
    $(".dark-input").focus(function(){
      $(this).siblings("label").removeClass("text-grey");
      $(this).siblings("label").addClass("text-yellow");
    });
    $(".dark-input").blur(function(){
      $(this).siblings("label").removeClass("text-yellow");
      $(this).siblings("label").addClass("text-grey");
    });

    $(".image-button").click(function(){
      $(this).siblings("input[type=file]").click();
    })
    $('.owl-carousel').owlCarousel({
      rtl:true,
      nav:true,
      dots:false,
      navText: ["<i class='b-1'>‹</i>","<i class='n-1'>›</i>"],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:3
          }
      }
  });
    
});



