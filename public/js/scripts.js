  // MAIN SCRIPTS FILE!
  //=============================


  $(document).ready(function () {

      // General
      //=============================

      // Messege Box toggle

      var $sm = $('#sm-box');

      if ($sm.length) {
          $sm.delay(3000).fadeOut();
      }

      // Categories Menu
      //=============================



      $('.categories').on('click', function () {
          if ($('.categories').hasClass('is-active')) {
              openCatMenu()
          } else {
              closeCatMenu()
          }
          $('.categories').toggleClass('is-active');
      });

      $('.close-cat-menu').on('click', function () {
          if ($('.categories').hasClass('is-active')) {
              openCatMenu()
          }
          $('.categories').toggleClass('is-active');

      });

      function openCatMenu() {
          $('.page-wrap').animate({
              marginLeft: '0px'
          }, 200);
          $('.cat-menu')
              .queue(function (next) {
                  $(this).css('z-index', '0');
                  next();
              });

      }

      function closeCatMenu() {
          $('.page-wrap').animate({
              marginLeft: '-250px'
          }, 200);
          $('.cat-menu')
              .delay(200)
              .queue(function (next) {
                  $(this).css('z-index', '1004');
                  next();
              });
      }

      // Search Bar 
      //=============================

      $('.open-search-bar').on('click', function () {
          $('.search-bar').fadeIn();
          $(".search-input").focus();

      });
      $('.close-search-bar').on('click', function () {
          $('.search-bar').fadeOut();
          $('.search-input').val('');
      });



      // Login Modal
      //=============================


      $('.show-password').on('click', function () {
          if ($(this).parent().prev('.password').attr('type') == 'password') {
              $(this).children().removeClass('ion-eye').addClass('ion-eye-disabled');
              $(this).parent().prev('.password').attr('type', 'text');
          } else {
              $(this).children().removeClass('ion-eye-disabled').addClass('ion-eye');
              $(this).parent().prev('.password').attr('type', 'password');
          }
      });

      $('.password').on('keyup', function () {
          if ($('.signup-password').val().length >= 6 && $('.signup-password').val().length <= 10 && $('.signup-password-valid').val().length >= 6 && $('.signup-password-valid').val().length <= 10) {
              $('.checkmark-length').removeClass('d-none');
          } else {
              $('.checkmark-length').addClass('d-none');
          }
          if ($('.signup-password').val() == $('.signup-password-valid').val()) {
              $('.checkmark-match').removeClass('d-none');
          } else {
              $('.checkmark-match').addClass('d-none');
          }
      });


      // Ajax Requests
      //=============================
      // Add to Cart

      $('.add-to-cart').on('click', function () {

          var prdId = $(this).data('id');

          $.ajax({
              url: BASE_URL + 'shop/add-to-cart',
              type: 'GET',
              dataType: 'html',
              data: {
                  id: prdId
              },
              success: function (data) {
                  location.reload();
              }
          });



      });

      // Add to Wishlist

      $('.add-to-wishlist').on('click', function () {

          var prdId = $(this).data('id');

          $.ajax({
              url: BASE_URL + 'shop/add-to-wishlist',
              type: 'GET',
              dataType: 'html',
              data: {
                  id: prdId
              },
              success: function (data) {
                  location.reload();
              }
          });



      });


      // Search Products


      $('.search-input').on('keyup', function () {

          var userText = $(this).val().trim();
          if (userText.length > 0) {
              $.ajax({
                  url: BASE_URL + 'shop/search',
                  type: "GET",
                  dataType: "json",
                  data: {
                      search: userText
                  },
                  success: function (response) {
                      //   console.log(response);
                      if (response) {
                          var availableTags = [];

                          $.each(response, function (key, value) {
                              availableTags.push(value.title);
                          });
                          //console.log('availableTags:', availableTags);

                          $(".search-input").autocomplete({
                              source: availableTags,
                              select: function (event, ui) {
                                  $('.submit-btn').click();
                              }
                          });


                      }

                  }
              });
          }

      });

      // Remove single item

      $('.update-q-btn').on('click', function () {

          var prdId = $(this).data('id');
          var prdOp = $(this).data('op');

          $.ajax({
              url: BASE_URL + 'shop/update-cart',
              type: 'GET',
              dataType: 'html',
              data: {
                  id: prdId,
                  op: prdOp
              },
              success: function (data) {
                  location.reload();
              }
          });

      });




  });