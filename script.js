////////////////
// Smooth Reveal 

var ctrl = new ScrollMagic.Controller();

// Animated titles
$(".gsHeadline").each(function (i) {
  var inner = $(this).find(".inner");
  var inner2 = $(this).find(".inner span");
  var outer = $(this).find(".outer");
  var tl = new TimelineMax();

  tl.from(outer, 0.5, { scaleX: 0 });
  tl.from(inner, 0.6, {
    yPercent: 100,
    ease: Back.easeOut,
    transformOrigin: "0% 0%"
  });
  tl.from(inner2, 0.7, {
    scaleX: 0,
    ease: Back.easeOut,
    transformOrigin: "0% 0%"
  });

  new ScrollMagic.Scene({
    triggerElement: this,
    triggerHook: 0.8
  })
    .setTween(tl)
    .addTo(ctrl);
});

function loop(elements, callback) {
  for (let i = 0; i < elements.length; i++) {
    callback(elements[i]);
  }
}
const controller = new ScrollMagic.Controller();
loop(document.querySelectorAll(".gs_reveal"), (elem, direction) => {
  const tl = new TimelineMax();

  tl.fromTo(
    elem,
    0.7, // duration
    {
      autoAlpha: 0,
      x: 0,
      y: 100
    },
    {
      autoAlpha: 1,
      x: 0,
      y: 0,
      // transformOrigin:'50% 0%',
      ease: "back.out(1,5)"
    }
  );
  new ScrollMagic.Scene({
    triggerElement: elem,
    triggerHook: 0.9,
    reverse: true
  })
    .setTween(tl)
    .addTo(controller);
});

////////////////
// Compass Rose ////////////////

//Compassrose hide
$(document).ready(function () {
  var controller = new ScrollMagic.Controller();
  var flexContent = $(".section");
  new ScrollMagic.Scene({
    triggerElement: ".compassrose",
    triggerHook: 0.8
  })
    .setClassToggle(".compassrose", "goodbye") // add class toggle
    .addTo(controller);
});

var lineInc = 2,
  majMarkDegree = 10,
  degreeInc = 30,
  compassrose = document.getElementById("compassrose"),
  xmlns = "http://www.w3.org/2000/svg",
  xlink = "http://www.w3.org/1999/xlink";
if (lineInc > 0) {
  for (var i = 0; i < 360; i += lineInc) {
    var newline = document.createElementNS(xmlns, "use");
    if (i % majMarkDegree == 0) {
      newline.setAttributeNS(xlink, "xlink:href", "#majline");
    } else {
      newline.setAttributeNS(xlink, "xlink:href", "#roseline");
    }
    newline.setAttributeNS(null, "transform", "rotate(" + i + " 250 250)");
    compassrose.appendChild(newline);
  }
}

var writeDegs = document.createElementNS(xmlns, "text"),
  currentDeg = 0,
  writeOffset = 0;
for (var i = 0; i < 99; i += (degreeInc / 360) * 100) {
  var degree = document.createElementNS(xmlns, "textPath");
  degree.setAttributeNS(xlink, "xlink:href", "#rosecircle");
  var length = (Math.log(i) * Math.LOG10E + 1) | 0;
  if (length > 1) {
    writeOffset = 1;
  }
  degree.setAttributeNS(null, "startOffset", i - writeOffset + "%");
  degree.textContent = currentDeg;
  writeDegs.appendChild(degree);
  currentDeg += degreeInc;
}
compassrose.appendChild(writeDegs);

/////////////////////////////////////////////
// Nav Toggle

$(function () {
  var trigger = $(".nav-toggle");
  trigger.on("click", function () {
    $(this).toggleClass("open");
    $(this).next().toggleClass("active");
  });
  var triggerLink = $(".navList a");
  triggerLink.on("click", function () {
    $(".nav-toggle").toggleClass("open");
    $(".nav").toggleClass("active");
  });
});

/////////////////////////////////////////////
// Contact Toggle

$(".quillWrap, .emailMe").click(function () {
  $("#contactForm").toggleClass("active");
  $($(".block").get().reverse()).each(function (i) {
    var $item = $(this);
    setTimeout(function () {
      $item.toggleClass("active");
    }, 300 * i);
  });
});

/////////////////
// Contact Form Validation

// $(document).ready(function () {
//   $("#contactForm").validate({
//     debug: true,
//     rules: {
//       name: {
//         required: true,
//         minlength: 2
//       },
//       email: {
//         required: true,
//         email: true
//       },
//       comment: {
//         required: true,
//         minlength: 2
//       }
//     }
//   });
// });



/////////////////////////////////////////////
// Page load Trigger

TweenMax.staggerFrom(".loaded", 1.5, {
  opacity: 0,
  delay: 2,
  x: -30,
  y: 30,
  rotation: 3
});

TweenMax.staggerFrom(".loaded2", 1, {
  opacity: 0,
  delay: 3.3,
  x: 0,
  y: 0,
  rotation: 8
});

TweenMax.staggerFrom(".loaded3", 1, {
  opacity: 0,
  delay: 3.8,
  x: 0,
  y: 0,
  rotation: -8
});

TweenMax.staggerFrom(".loaded4", 1.5, {
  opacity: 0,
  delay: 2.9,
  x: 30,
  y: 30,
  rotation: 3
});

TweenMax.staggerFrom(
  ".loadedUp",
  2,
  {
    scale: 1,
    opacity: 1,
    delay: 2,
    y: 100
  },
  1
);

/////////////////
// loadedDown

var tl1 = new TimelineMax({ delay: 6 }),
  elements1 = $(".loadedDown > .line");
$.each(elements1, function () {
  tl1.from($(this), 0.2, { autoAlpha: 1, left: -500, ease: "back.out(1.7)" });
});

var compassrose = document.getElementById("compassrose");
TweenMax.to(compassrose, 111, {
  rotation: "360",
  ease: Linear.easeNone,
  repeat: -1
});

var rose = document.getElementById("rose");
TweenMax.to(rose, 111, { rotation: "-360", ease: Linear.easeNone, repeat: -1 });

var loopBox = document.getElementById("loopBox");
TweenMax.to(loopBox, 80, {
  rotation: "-360",
  ease: Linear.easeNone,
  repeat: -1
});

/////////////
// Rotator

var Emblem = {
  init: function (el, str) {
    var element = document.querySelector(el);
    var text = str ? str : element.innerHTML;
    element.innerHTML = "";
    for (var i = 0; i < text.length; i++) {
      var letter = text[i];
      var span = document.createElement("span");
      var node = document.createTextNode(letter);
      var r = (360 / text.length) * i;
      var x = (Math.PI / text.length).toFixed(0) * i;
      var y = (Math.PI / text.length).toFixed(0) * i;
      span.appendChild(node);
      span.style.webkitTransform =
        "rotateZ(" + r + "deg) translate3d(" + x + "px," + y + "px,0)";
      span.style.transform =
        "rotateZ(" + r + "deg) translate3d(" + x + "px," + y + "px,0)";
      element.appendChild(span);
    }
  }
};

Emblem.init(".rotator");

////////////////////
// Wavy Columns

/**
 * Wavy Columns
 *
 * demo3.js
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 *
 * Copyright 2017, Codrops
 * http://www.codrops.com
 */
{
  class MorphingBG {
    constructor(el) {
      this.DOM = {};
      this.DOM.el = el;
      this.DOM.paths = Array.from(this.DOM.el.querySelectorAll("path"));
      this.animate();
    }
    animate() {
      this.DOM.paths.forEach((path) => {
        setTimeout(() => {
          anime({
            targets: path,
            duration: anime.random(3000, 5000),
            easing: [0.5, 0, 0.5, 1],
            d: path.getAttribute("pathdata:id"),
            loop: true,
            direction: "alternate"
          });
        }, anime.random(0, 1000));
      });
    }
  }

  new MorphingBG(document.querySelector("svg.scene"));
}

/*------------------------------
SupahScroll
by Fabio Ottaviani
https://codepen.io/supah/pen/MMveGv?editors=1010
------------------------------*/
class SupahScroll {
  constructor(options) {
    this.opt = options || {};
    this.el = this.opt.el ? this.opt.el : ".supah-scroll";
    this.speed = this.opt.speed ? this.opt.speed : 0.1;
    this.init();
  }

  init() {
    this.scrollY = 0;
    this.supahScroll = document.querySelectorAll(this.el)[0];
    this.events();
    this.resize();
    this.animate();
  }

  resize() {
    document.body.style.height = `${
      this.supahScroll.getBoundingClientRect().height
    }px`;
  }

  animate() {
    this.scrollY += (window.scrollY - this.scrollY) * this.speed;
    this.supahScroll.style.transform = `translate3d(0,${-Math.floor(
      this.scrollY
    )}px,0)`;
    this.raf = requestAnimationFrame(this.animate.bind(this));
  }

  events() {
    window.addEventListener("load", this.resize.bind(this));
    window.addEventListener("resize", this.resize.bind(this));
  }
}

const supahscroll = new SupahScroll({
  el: ".container",
  speed: 0.08
});

/*------------------------------
     Main Nav - scroll to
------------------------------*/

$(document).ready(function () {
  $("a.scrollLink").click(function (event) {
    event.preventDefault();
    $("html, body").animate(
      { scrollTop: $($(this).attr("href")).offset().top },
      500
    );
  });
});

/*------------------------------
// Back To Top Button
// Distance from bottom to appear
 ------------------------------*/

$(window).scroll(function () {
  if ($(window).scrollTop() + $(window).height() > $(document).height() - 5) {
    $(".backToTop").addClass("show");
  } else {
    $(".backToTop").removeClass("show");
  }
});

/*------------------------------
// Bar Graphs
 ------------------------------*/
var piesiteFired = 0;
$(document).ready(function () {
  var $win = $(window),
    $win_height = $(window).height(),
    // - A multiple of viewport height - The higher this number the sooner triggered.
    windowPercentage = $(window).height() * 1;
  $win.on("scroll", scrollReveal);
  function scrollReveal() {
    var scrolled = $win.scrollTop();

    /////////////////////////
    // Horizontal Chart
    $(".chartBarsHorizontal .bar").each(function () {
      var $this = $(this),
        offsetTop = $this.offset().top;
      if (scrolled + windowPercentage > offsetTop || $win_height > offsetTop) {
        $(this).each(function (key, bar) {
          var percentage = $(this).data("percentage");
          $(this).css("width", percentage + "%");
          ///////////////////////////////////////
          //        Animated numbers
          $(this)
            .prop("Counter", 0)
            .animate(
              {
                Counter: $(this).data("percentage")
              },
              {
                duration: 2000,
                easing: "swing",
                step: function (now) {
                  $(this).text(Math.ceil(now));
                }
              }
            );
        });
      } else {
        ///////////////////////
        // To keep them triggered, lose this block.
        $(this).each(function (key, bar) {
          $(this).css("width", 0);
        });
      }
    });
  }
  scrollReveal();
});

////////////////////////////
// Scroll Position Bar

$(document).scroll(function (e) {
  var scrollAmount = $(window).scrollTop();
  var documentHeight = $(document).height();
  var windowHeight = $(window).height();
  var scrollPercent = (scrollAmount / (documentHeight - windowHeight)) * 100;
  var roundScroll = Math.round(scrollPercent);

  $(".scroll-line").css("width", scrollPercent + "%");
  $(".scroll-line span").text(roundScroll);
});

//////////////////////
// Mouse Parallax

$(document).mousemove(function (e) {
  $("#element1 img").parallax(300, e);
  $("#element1 span.para1").parallax(100, e);
  $("#element1 span.para3").parallax(200, e);

  $("#element2 img").parallax(350, e);
  $("#element2 span.para2").parallax(30, e);

  // $('.picWrap img p').parallax(70 , e);
});

// Parallax mouse
$.fn.parallax = function (resistance, mouse) {
  $el = $(this);
  TweenLite.to($el, 0.2, {
    x: -((mouse.clientX - window.innerWidth / 2) / resistance),
    y: -((mouse.clientY - window.innerHeight / 2) / resistance)
  });
};

animations();
$(window).resize(function () {
  animations();
});
var widthJs = 1024;
function animations() {
  $("body").on("mousemove", function (e) {
    if ($(window).width() > widthJs) {
      var $this = $(".picWrap");

      var x = event.clientX / $(window).width() - 0.5;
      var y = event.clientY / $(window).height() - 0.5;

      TweenLite.to($this, 1, {
        rotationY: 5 * x,
        rotationX: 2 * y,
        ease: Power1.easeOut,
        transformPerspective: 500,
        transformOrigin: "center"
      });
    }
  });
}