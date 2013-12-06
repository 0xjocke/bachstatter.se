$(document).ready(function() {
  $('.white').fadeIn(2000);              // on document ready fadein .white div

/*
__________Contact______________*/
  var contact = $('#contact');
  var contactpic = $('.contactpic');
  function hideContact(){
      contact.css('margin-top', '-700px');                          // move it away
      contact.css('visibility', 'hidden');                         // hide it
      contactpic.css('background-image','url(images/settings.png)'); // change back color for message bu
  }
  function showContact(){
        contact.css('visibility', 'visible');                         //show it
        contact.css('margin-top', '0');                                // take away margin
        contactpic.css('background-image','url(images/settings1.png)'); // change color for message bu
  }
    /*Click on message icon or Contact link to show contact page*/
  $('.contactpic, #contactlink').on('click', function() {                         //on click start function 
    if (contact.css('margin-top') === '-700px') {                     // if content is hidden               
        showContact();
        return;
    }else{
        hideContact();
        return;
    }
  });

      /*Click outside of box to make it disapear*/
  $('#home, #about, #portfolio').on('click', function() {                           //on click on any section
      if (contact.css('margin-top') === '0px') {                        //#contact visible / margin 0
          hideContact();
          return;
      }
  });
      //Open and close width ESC
      $(document).keydown(function(e){                                    // On keydown Save what key in parameter (e)
        if (e.keyCode === 27) {                                           // if 27 (esc)
            if (contact.css('margin-top') === '-700px') {           // if content is hidden
              showContact();
              return;
          }else {
              hideContact();
              return;
          }
        }
      });
      /*
     __________Navigation______________*/
      var aboutSectionTop = $('#about').offset().top;  //How long is about section from the top
      var portfolioSectionTop = $('#portfolio').offset().top; //How long is portfolio section from the top
      var htmlAndBody = $("html, body");
      var homelink = $("#homelink");
      var aboutlink = $("#aboutlink");
      var portfoliolink = $("#portfoliolink");
      // Scroll to Home
      homelink.on('click', function(){              //on click homelink
          htmlAndBody.animate({               //Animate
              scrollTop: 0}, 1200);               // to  top in 1,2s
          return false;
      });
      //Sroll to About
      aboutlink.on('click', function () {                       //onclick aboutlink
         htmlAndBody.animate({                           //Animate
              scrollTop: aboutSectionTop-60}, 1200);           // to #about section - 80px in 1,2s
          return false;
      });
      //Sroll to Portfolio
      portfoliolink.on('click', function () {                 //onclick portfoliolink
          htmlAndBody.animate({                           //Animate
              scrollTop: portfolioSectionTop+40}, 1200);       // to #portfolio section plus 40px in 1,2s
          return false;
      });
      /*Make current page .thispage class in the nav. */
      function correctPage(){
        var y = $(window).scrollTop();         // How long have we scrolled now from the top.
        var x = y * 1.5;                       //make it a little more accurate
          if (aboutSectionTop <= x && portfolioSectionTop > x) {    //If  scrooled longer than #about section and shorter than #portfolio section
            $("nav ul li").removeClass("thispage");                 //remove thispage class from all li
            aboutlink.addClass('thispage');                   // add thispage to aboutlink
            } else if (portfolioSectionTop <= x) {                    //else if we scrolled longer than portfolio section
                $("nav ul li").removeClass("thispage");             //remove thispage class from all li
                portfoliolink.addClass('thispage');           //add thispage to portfoliolink
              }else {                                                      // else, only home section left
                $("nav ul li").removeClass("thispage");               //remove thispage class from all li
                homelink.addClass('thispage');                  //add thispage to homelink
              }
            }
        
     
      $(window).scroll(correctPage);


      /*
       __________Arrow keys______________*/

      function animateUp(){
        var y = $(window).scrollTop();         // How long have we scrolled now from the top.
        var x = y * 1.5;                       //make it a little more accurate
        $('.up').fadeOut(200);                  // fadeout in 200 milisec 
        $('.up').fadeIn(200);                   // fadein in 200 milisec
        if (aboutSectionTop <= x && portfolioSectionTop > x) {
              htmlAndBody.animate({
              scrollTop: 0}, 1000);
            }else if (y <= aboutSectionTop){
              htmlAndBody.animate({
              scrollTop: 0}, 1000);
            }else{
              htmlAndBody.animate({
              scrollTop: aboutSectionTop-60}, 1000);
        }
      }
        function animateDown(){
          var y = $(window).scrollTop();         // How long have we scrolled now from the top.
          var x = y * 1.5;                       //make it a little more accurate
            $('.down').fadeOut(200);
            $('.down').fadeIn(200);
            if (x <= aboutSectionTop ) {
                htmlAndBody.animate({
                scrollTop: aboutSectionTop-60}, 1000);
            }else if (y < aboutSectionTop) {
                htmlAndBody.animate({
                scrollTop: portfolioSectionTop+80}, 1000);
            }else{
                htmlAndBody.animate({
                scrollTop: $(document).height()}, 1200);
            }
          }
       /* ARROW Keys */
      $(document).keydown(function(e){               //on keydown save keynumber in parameter e                                  
          if (e.keyCode === 38){                     //if keycode is esc/ number 38
              e.preventDefault();                   // prevent default function of up arrow / takes away flicker
             animateUp();
          }else if (e.keyCode === 40) {
             e.preventDefault();
            animateDown();
          }else{
            return;
          }
      });
       /* ARROW UP Klick*/
      $('.up').on('click', animateUp);
       /* ARROW Down Klick*/

      $('.down').on('click', animateDown);


      /*
       __________Timeline______________*/

      $('.timecircle, time').on('mouseenter', function() {                  //on mouse enter time or timecircle  (on ipads you can click)
        var opacity = $(this).siblings('.timeround').css('opacity');  // save what element and save that sibling with name .timeround and check what opacity it has.
          if (opacity !== 1) {                                        //if opacity of timeround element isnt 1
            opacity = 0;                    //make all divs with class .timeround opacity = 0
            $(this).siblings('.timeround').css('opacity', '1');        // set 'this':s sibling with class .timeround opacitys to 1
            $(this).addClass('timeactive');                             //add class 'timeactive' to 'this'
            $(this).siblings('.timecircle').addClass('circleactive');   //add class circleactive to 'this':s sibblind with class .timecircle
            }
      });
      $('.timecircle').on('mouseenter', function() {                        //on mouse enter only .timecircle  (on ipads you can click)
            $(this).addClass('circleactive');                         //add class .circleactive on this 
      });

      $('.timeline ul li').on('mouseleave', function() {                    // on mouse leave from all li in .timeline
          $('time').removeClass('timeactive');                        // remove class .timeactive 
          $('.timeline .circleactive').removeClass('circleactive');   // remove class .circleactive
          $('.timeround').css('opacity', '0');                        // .timeround opacity to 0
          $(this).siblings('.timeround').css('opacity', '0');         // 'this':s sibling with class .timeround opacity to 0
      });


        /*
       __________Select watcher______________*/

       $(document).on('change', '.select', function() {
            // save chosen val to var categoryId
            var categoryId = $(this).val();
            // send the url plus category id with get
            $.ajax({
                type: 'GET',
                url: "/portfolio.php",
                data: {'categoryId': categoryId}
            })
            // when done, replace portfolio section with the 
            .done(function(html) {
                $('#portfolio').replaceWith(html);
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
        });

       //fadeout class
        setTimeout(function() {
          $('.fadeOut').fadeOut(500);
        }, 3000);




}); //End document.ready






