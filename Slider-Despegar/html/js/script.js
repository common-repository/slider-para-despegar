'use strict';

var upload_image_button = false,
DEBUG = false;
PNotify.prototype.options.styling = "bootstrap3";

jQuery(document).ready(function($) {
  console.log('TODO ready')

     $('#change-script').bind('submit', function(e) {
    e.preventDefault();

    if ($("#Script").val().length !== 0) {

      $(function() {
        new PNotify({
          text: 'Guardando..',
          styling: "bootstrap3",
          type: "info",
          icon: false,
          delay: 2000,
          width: "150px"
        });
      });

      var data = {};
      data.action = 'save_script';
      data.data = $(this).serialize();

      jQuery.post(ajaxurl, data, function(response) {

        if(DEBUG == true){
          console.log('response:');
          console.log(response);
        }

        if (response == "ok") {
          $(function() {
            new PNotify({
              title: '¡Guardado!',
              styling: "bootstrap3",
              type: "success",
              icon: false,
              delay: 3000,
              width: "150px"
            });
          });
          location.reload();
        } else {
          $(function() {
            new PNotify({
              title: 'Error!',
              styling: "bootstrap3",
              type: "error",
              icon: false,
              delay: 3000,
              width: "150px"
            });
          });
        }
      });
    }
  })

  $('[data-toggle="switch"]').bootstrapSwitch();
  //Para preveer el click derecho en los switch (los rompe)
  $('.bootstrap-switch-container').on('contextmenu', function(e) {
    $(this).click();
    return false;
  });


  $('.upload_image_button').click(function() {
    upload_image_button = true;
    formfield = $(this).attr('name');
    console.log('formfield: ' + formfield);
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    if (upload_image_button == true) {

      var oldFunc = window.send_to_editor;
      window.send_to_editor = function(html) {

        imgurl = $('img', html).attr('src');
        $('#' + formfield).val(imgurl);
        tb_remove();
        window.send_to_editor = oldFunc;
      }
    }
    upload_image_button = false;
  });

  $('.bootstrap-switch-id-swith-advanced-options').click(function() {
    container = $('[data-container-id="advanced-options"]');
    if ($(this).hasClass('bootstrap-switch-on')) {
      container.css({
        'opacity': '1',
        'max-height': '1000px'
      })
    } else {
      container.css({
        'opacity': '0',
        'max-height': '0px'
      })
    };
  })

  $('.bootstrap-switch-id-background-color').click(function() {
    container = $('[data-container-id="background-color"]');
    if ($(this).hasClass('bootstrap-switch-off')) {
      container.css({
        'opacity': '1',
        'max-height': '1000px'
      })
    } else {
      container.css({
        'opacity': '0',
        'max-height': '0px'
      })
    };
  })

  $('.color-picker').wpColorPicker();

  $('#form-box').bind('submit', function(e) {
    e.preventDefault();

    $(function() {
      new PNotify({
        text: 'Guardando..',
        styling: "bootstrap3",
        type: "info",
        icon: false,
        delay: 2000,
        width: "150px"
      });
    });

    var data = {};
    data.action = 'save_form';
    data.data = $(this).serialize();

    jQuery.post(ajaxurl, data, function(response) {
     if(DEBUG == true){
      console.log('response:');
      console.log(response);
    }

    $("#style-sheet").html(response);
    $(function() {
      new PNotify({
        title: '¡Guardado!',
        styling: "bootstrap3",
        type: "success",
        icon: false,
        delay: 3000,
        width: "150px"
      });
    });
  });
  });
});