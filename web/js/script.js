function navMobile(){
	if ($( "#navmobile" ).hasClass( "hidden" )) {
		$("#navmobile").attr('class','visible');
	}else if ($( "#navmobile" ).hasClass( "cache" )){
		$("#navmobile").attr('class','visible');
	}else{
		$("#navmobile").attr('class','cache');
	}
}


$('#commentaire').easyPaginate({
    paginateElement: 'span',
    elementsPerPage: 10,
    effect: 'climb'
});


$('#actuu').easyPaginate({
    paginateElement: 'span',
    elementsPerPage: 6,
    effect: 'climb'
});




// scroll pagination //

$('.scroll').on('click', function() {
  $.smoothScroll({
    scrollTarget: '#scroll'
  });
  return false;
});

// scroll haut de page //

$('#scrollUp').on('click', function() {
  $.smoothScroll({
    scrollTarget: 'body'
  });
  return false;
});





window.addEventListener('scroll', function(ev) {

   var top = document.getElementById('iamtop');
   var someDiv = document.getElementById('iamtop');
   var distanceToTop = someDiv.getBoundingClientRect().top;
   var distanceMax = -200;

   if (distanceToTop < distanceMax) {
      $("#scrollUp").attr('class','fixedTop');
   }else{
      $("#scrollUp").attr('class','hidden');
   }

});

// fin scroll haut de page//

function verifPseudo(champ)
{
  var myPseudo = new RegExp("^[a-zA-Z0-9._-]{2,50}$");
   if(champ.value.length < 2 || champ.value.length > 20 || !myPseudo.test(champ.value))
   {
      champ.style.backgroundColor = "#fba";
      champ.style.border = "3px solid red";
   }
   else
   {
      champ.style.backgroundColor = "#BEF781";
      champ.style.border = "3px solid green";
   }
}


function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value))
   {
     champ.style.backgroundColor = "#fba";
     champ.style.border = "3px solid red";
   }
   else
   {
     champ.style.backgroundColor = "#BEF781";
     champ.style.border = "3px solid green";
   }
}

function verifPassword(champ)
{
   if(champ.value.length < 2 || champ.value.length > 50)
   {
      champ.style.backgroundColor = "#fba";
      champ.style.border = "3px solid red";
   }
   else
   {
      champ.style.backgroundColor = "#BEF781";
      champ.style.border = "3px solid green";
   }
}


function identiquePassword(champ)
{
if(document.formulaire.password.value != document.formulaire.password_confirm.value) {
  champ.style.backgroundColor = "#fba";
  champ.style.border = "3px solid red";
}
else{
  champ.style.backgroundColor = "#BEF781";
  champ.style.border = "3px solid green";
}
}



function verifForm(f)
{
   var pseudoOk = verifPseudo(f.name);
   var mailOk = verifMail(f.email);

   
   if(pseudoOk && mailOk)
      return true;
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}

function formMail() {
  if ($("#formMail").hasClass( "formMailHidden" )) {
    $("#formMail").attr('class','formMailVisible');
  }else if ($( "#formMail" ).hasClass( "formMailCache" )){
    $("#formMail").attr('class','formMailVisible');
  }else{
    $("#formMail").attr('class','formMailCache');
  }
}

function formImage() {
  if ($("#formImage").hasClass( "formImageHidden" )) {
    $("#formImage").attr('class','formImageVisible');
  }else if ($( "#formImage" ).hasClass( "formImageCache" )){
    $("#formImage").attr('class','formImageVisible');
  }else{
    $("#formImage").attr('class','formImageCache');
  }
}

function formPassword() {
  if ($("#formPassword").hasClass( "formPasswordHidden" )) {
    $("#formPassword").attr('class','formPasswordVisible');
  }else if ($( "#formPassword" ).hasClass( "formPasswordCache" )){
    $("#formPassword").attr('class','formPasswordVisible');
  }else{
    $("#formPassword").attr('class','formPasswordCache');
  }
}


/**
 * @Titulo: Slider Responsivo
 * @Autor: Creaticode
 * @URL: http://creaticode.com 
 */
$(function() {
  /** -----------------------------------------
   * Modulo del Slider 
   -------------------------------------------*/
   var SliderModule = (function() {
    var pb = {};
    pb.el = $('#slider');
    pb.items = {
      panels: pb.el.find('.slider-wrapper > li'),
    }

    // Interval del Slider
    var SliderInterval,
      currentSlider = 0,
      nextSlider = 1,
      lengthSlider = pb.items.panels.length;

    // Constructor del Slider
    pb.init = function(settings) {
      this.settings = settings || {duration: 8000};
      var items = this.items,
        lengthPanels = items.panels.length,
        output = '';

      // Insertamos nuestros botones
      for(var i = 0; i < lengthPanels; i++) {
        if(i == 0) {
          output += '<li class="active"></li>';
        } else {
          output += '<li></li>';
        }
      }

      $('#control-buttons').html(output);

      // Activamos nuestro Slider
      activateSlider();
      // Eventos para los controles
      $('#control-buttons').on('click', 'li', function(e) {
        var $this = $(this);
        if(!(currentSlider === $this.index())) {
          changePanel($this.index());
        }
      });

    }

    // Funcion para activar el Slider
    var activateSlider = function() {
      SliderInterval = setInterval(pb.startSlider, pb.settings.duration);
    }

    // Funcion para la Animacion
    pb.startSlider = function() {
      var items = pb.items,
        controls = $('#control-buttons li');
      // Comprobamos si es el ultimo panel para reiniciar el conteo
      if(nextSlider >= lengthSlider) {
        nextSlider = 0;
        currentSlider = lengthSlider-1;
      }

      controls.removeClass('active').eq(nextSlider).addClass('active');
      items.panels.eq(currentSlider).fadeOut('slow');
      items.panels.eq(nextSlider).fadeIn('slow');

      // Actualizamos los datos del slider
      currentSlider = nextSlider;
      nextSlider += 1;
    }

    // Funcion para Cambiar de Panel con Los Controles
    var changePanel = function(id) {
      clearInterval(SliderInterval);
      var items = pb.items,
        controls = $('#control-buttons li');
      // Comprobamos si el ID esta disponible entre los paneles
      if(id >= lengthSlider) {
        id = 0;
      } else if(id < 0) {
        id = lengthSlider-1;
      }

      controls.removeClass('active').eq(id).addClass('active');
      items.panels.eq(currentSlider).fadeOut('slow');
      items.panels.eq(id).fadeIn('slow');

      // Volvemos a actualizar los datos del slider
      currentSlider = id;
      nextSlider = id+1;
      // Reactivamos nuestro slider
      activateSlider();
    }

    return pb;
   }());

   SliderModule.init({duration: 4000});

});/**
 * @Titulo: Slider Responsivo
 * @Autor: Creaticode
 * @URL: http://creaticode.com 
 */
$(function() {
  /** -----------------------------------------
   * Modulo del Slider 
   -------------------------------------------*/
   var SliderModule = (function() {
    var pb = {};
    pb.el = $('#slider');
    pb.items = {
      panels: pb.el.find('.slider-wrapper > li'),
    }

    // Interval del Slider
    var SliderInterval,
      currentSlider = 0,
      nextSlider = 1,
      lengthSlider = pb.items.panels.length;

    // Constructor del Slider
    pb.init = function(settings) {
      this.settings = settings || {duration: 8000};
      var items = this.items,
        lengthPanels = items.panels.length,
        output = '';

      // Insertamos nuestros botones
      for(var i = 0; i < lengthPanels; i++) {
        if(i == 0) {
          output += '<li class="active"></li>';
        } else {
          output += '<li></li>';
        }
      }

      $('#control-buttons').html(output);

      // Activamos nuestro Slider
      activateSlider();
      // Eventos para los controles
      $('#control-buttons').on('click', 'li', function(e) {
        var $this = $(this);
        if(!(currentSlider === $this.index())) {
          changePanel($this.index());
        }
      });

    }

    // Funcion para activar el Slider
    var activateSlider = function() {
      SliderInterval = setInterval(pb.startSlider, pb.settings.duration);
    }

    // Funcion para la Animacion
    pb.startSlider = function() {
      var items = pb.items,
        controls = $('#control-buttons li');
      // Comprobamos si es el ultimo panel para reiniciar el conteo
      if(nextSlider >= lengthSlider) {
        nextSlider = 0;
        currentSlider = lengthSlider-1;
      }

      controls.removeClass('active').eq(nextSlider).addClass('active');
      items.panels.eq(currentSlider).fadeOut('slow');
      items.panels.eq(nextSlider).fadeIn('slow');

      // Actualizamos los datos del slider
      currentSlider = nextSlider;
      nextSlider += 1;
    }

    // Funcion para Cambiar de Panel con Los Controles
    var changePanel = function(id) {
      clearInterval(SliderInterval);
      var items = pb.items,
        controls = $('#control-buttons li');
      // Comprobamos si el ID esta disponible entre los paneles
      if(id >= lengthSlider) {
        id = 0;
      } else if(id < 0) {
        id = lengthSlider-1;
      }

      controls.removeClass('active').eq(id).addClass('active');
      items.panels.eq(currentSlider).fadeOut('slow');
      items.panels.eq(id).fadeIn('slow');

      // Volvemos a actualizar los datos del slider
      currentSlider = id;
      nextSlider = id+1;
      // Reactivamos nuestro slider
      activateSlider();
    }

    return pb;
   }());

   SliderModule.init({duration: 4000});

});





$('.divGalery').on('click','#noonecares', function(){
    window.open($(this).attr('src'));
});



// TODO:
//  Make it a plugin, make it re-usable
//  Ability to save image as png


$(document).ready(function(){
  "use strict";
  // Vars
    var paint = false,
        points = [],
        click_x = [],
        click_y = [],
        click_drag = [],
        $canvas = $('#canvas'),
        ctxt = $canvas[0].getContext('2d'),
        touch_mouse = {
          up: 'mouseup',
          down: 'mousedown',
          leave: 'mouseleave',
          move: 'mousemove'
        },
        colors = {
          "green": "#2ecc71",
          "brown": "#795548",
          "blue": "#3498db",
          "purple": "#8e44ad",
          "red": "#e74c3c",
          "orange": "#f39c12",
          "yellow": "#f1c40f",
          "dark_blue": "#34495e",
          "gray": "#7f8c8d",
          "light_gray": "#ecf0f1"
        },
        stroke_color = colors[Object.keys(colors)[0]];
  
  // Mobile
    if ('ontouchstart' in window) {
      touch_mouse = {
          up: 'touchend',
          down: 'touchstart',
          leave: 'touchleave',
          move: 'touchmove'
        };
    }
  
  // Helpers 
    var mousedown = function(e) {
      var mouse_x = e.pageX - this.offsetLeft,
          mouse_y = e.pageY - this.offsetTop;

      paint = true;
      add_click(mouse_x, mouse_y);
      redraw();
    };
    var mousemove = function(e) {
      if (paint) {
        var mouse_x = e.pageX - this.offsetLeft,
            mouse_y = e.pageY - this.offsetTop;
        add_click(mouse_x, mouse_y, true);
        redraw();
      }
    };
    var mouseleave = function(e) {
      paint = false;
    };
    var add_click = function(x,y,dragging) {
      var tmp = {
        x: x,
        y: y,
        drag: (dragging)? true: false,
        color: stroke_color
      };
      points.push(tmp);
      /*click_x.push(x);
      click_y.push(y);
      click_drag.push(dragging);*/
    };
    var redraw = function() {
      clear_canvas();
      var points_len = points.length;

      ctxt.lineJoin = "round";
      ctxt.lineWidth = 5;

      for( var i = 0; i < points_len; i++) {
        var cur_point = points[i],
            prev_point = points[i-1];

        ctxt.strokeStyle = cur_point.color;
        ctxt.beginPath();
        if (cur_point.drag) {
          ctxt.moveTo(prev_point.x, prev_point.y);
        } else {
          ctxt.moveTo(cur_point.x - 1, cur_point.y)
        }
        ctxt.lineTo(cur_point.x, cur_point.y)
        ctxt.closePath();
        ctxt.stroke();
      }
      /*
      for(var i=0; i < click_x.length; i++) {   
        ctxt.beginPath();
        if(click_drag[i] && i){
          ctxt.moveTo(click_x[i-1], click_y[i-1]);
        }else{
          ctxt.moveTo(click_x[i]-1, click_y[i]);
        }
        ctxt.lineTo(click_x[i], click_y[i]);
        ctxt.closePath();
        ctxt.stroke();
      }
      */
    };
    var clear_canvas = function(clear_all) {
      ctxt.clearRect(0, 0, ctxt.canvas.width, ctxt.canvas.height); // Clears the canvas
      if (clear_all) {
        points = [];
        /*click_x = [];
        click_y = [];
        click_drag = [];*/
      }
    };
  
  // Events
    $canvas
      //.attr('width',$canvas.parent().outerWidth())
      .on(touch_mouse.down,mousedown)
      .on(touch_mouse.move, mousemove)
      .on(touch_mouse.up, mouseleave)
      .on(touch_mouse.leave, mouseleave); 

    $('button.clear').on('click', function(){
      clear_canvas(true);
    });
    $('#color-box').on('click','li',function(){
      stroke_color = colors[$(this).attr('class')];
    });
    $('.to_png').on('click', function(){
      var $img;
      
      if ( $('#preview').length ) {
        $img = $('#preview');
      } else {
        $img = $(new Image()).insertAfter('#canvas-box');
      }
      
      $img
        .hide()
        .addClass('flt-left')
        .attr('id','preview')
        .attr('src',$canvas[0].toDataURL())
        .on('load', function() {
          $img.fadeIn();
        }); 
    });
});