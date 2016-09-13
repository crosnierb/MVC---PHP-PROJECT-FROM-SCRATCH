


$(document).ready(function () {
  $.fn.extend({
       mymindmap: function (size) {
         this.mapObject = $(this).attr("id");
           this.mindSize = size/10;
           this.mapSize = size;
           return (this);
       },

       board: function () {
           $("#" + this.mapObject).append("<div id='board'></div>");
           return (this);
       },

       master: function () {
           $("#board").append("<div id='mind-master' style='text-align: center;margin: 20px; top: 50%'><div id='content-master' style='top: 50%; left:45%; margin: 0 auto; background-color: blue; width: 200px'><span style='top: " + (this.mindSize*2) + "px;' class='span-mind-master'>mind-master</span></div></div>");
           return (this);
       },

       mind: function (mindText) {
           $("#mind-master").append("<div class='mind-container' style='position: relative; height:" + this.mindSize + "px;width:" + this.mindSize + "px;background-color:yellow'> <span class='span-text'>"
                   + mindText + "</span> <input type='text' class='input' style='display:none; width:" + (this.mindSize - 10) + "px;' /> </div> ");
           return (this);
       },

       doubleClick: function() {
           $(".mind-container").dblclick(function () {
             // hide text but not chihld element
               $(this).find('.span-text').hide();
               $(this).find('.input').show().focus();            });
           return this; // this needed for calling function in a pipping manner
       },

       setMinds: function() {
           var minds = $('#mind-master').find('.mind-container');
           for (var i = 0; i < minds.length; i++) {
               if (i % 2) {
                   minds[i].style.float = "right";
               }
           }
       },

    connect: function(div1, div2, color, thickness) {
    var off1 = this.getOffset(div1);
    var off2 = this.getOffsetMaster(div2);
    // bottom right
    var x1 = off1.left + off1.width;
    var y1 = off1.top + off1.height/2;
    // top right
    var x2 = off2.left + off2.width/2;
    var y2 = off2.top;
    // distance
    var length = Math.sqrt(((x2-x1) * (x2-x1)) + ((y2-y1) * (y2-y1)));
    // center
    var cx = ((x1 + x2) / 2) - (length / 2);
    var cy = ((y1 + y2) / 2) - (thickness / 2);
    // angle
    var angle = Math.atan2((y1-y2),(x1-x2))*(180/Math.PI);
    // make hr
    var htmlLine = "<div style='padding:0px; margin:0px; height:" + thickness + "px; background-color:" + color + "; line-height:1px; position:absolute; left:" + cx + "px; top:" + cy + "px; width:" + length + "px; -moz-transform:rotate(" + angle + "deg); -webkit-transform:rotate(" + angle + "deg); -o-transform:rotate(" + angle + "deg); -ms-transform:rotate(" + angle + "deg); transform:rotate(" + angle + "deg);' />";
    //
    alert(htmlLine);
    document.body.innerHTML += htmlLine;
},

getOffset: function(el) {
     var rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.pageXOffset,
        top: rect.top + window.pageYOffset, //get top
        width: rect.width || el.offsetWidth,
        height: rect.height || el.offsetHeight
    };
},

getOffsetMaster: function(el) {
     var rect = el.getBoundingClientRect();
    return {
        left: rect.left + window.pageXOffset,
        top: rect.bottom + window.pageYOffset, //get bottom
        width: rect.width || el.offsetWidth,
        height: rect.height || el.offsetHeight
    };
}

     });

  // init
   var mindMap = $("#map")
       .mymindmap(700)
       .board()
       .master();

   // add minds
   mindMap
       .mind("Mind#1")
       .mind("Mind#2")
       .mind("Mind#3");

       // set exo 3 style around mind-master
        mindMap.setMinds();
        var div1 = $('.mind-container')[0];
        var div2 = $('#content-master')[0];
        mindMap.connect(div1, div2, "#0F0", 2);
        var div1 = $('.mind-container')[1];
        var div2 = $('#content-master')[0];
        mindMap.connect(div1, div2, "#0F0", 2);
        var div1 = $('.mind-container')[2];
        var div2 = $('#content-master')[0];
        mindMap.connect(div1, div2, "#0F0", 2);

       // exo 4 init
       mindMap.doubleClick();
 });
