(function($){
    $.fn.extend({
        //pass the size parameter of the mindmap variable to the function
        mymindmap: function(size) {
          ///add option size for create the structure of mindmap
          var mapObject  = this.attr('id'); //set value id of balise in the DOM
          var mindSize   = size;
          var mapSize   = (4 * mindSize);
          var offset = 0;
            board(); //add a div board
            master ();//add a div master

            function board() {
              //function fo create div "board" during the call of plugin
                var div = $("<div></div>"); // Create text with DOM
                div.attr("id", "board"); // create attribut in div
                $(div).css({"width":" 100%", "margin":" 0 auto", "text-align":"center", "border-style": "solid",
                 "border-color":"#0074D9", "height": "400px"});
                $("#"+mapObject).append(div);  // Append new elements
            }

function master() {
$("#board").append("<div id='mind-master' style='background-color: grey; top: 50%; margin: 0 auto;\
 text-align: center', width:200px><p id='content' style='background-color: grey; text-align: center';>Project name<button id='add'>+</button><p></div>");
}

function mind(parent ,string) {
  alert(parent);
  $("#"+parent).append("<div id='mind-master' style='background-color: blue; top: 50%; margin: 0 auto;\
   text-align: center', width:200px><p id='content' style='background-color: grey; text-align: center';>Project name<button id='add'>+</button><p></div>");

  $("#"+parent).append("<div style='text-align: center; position:relative; background-color: blue; float:left;'>\
  <div id='"+ offset+++"' class='mind-container'><div id='content' >"+string+"</div><div id='add'>+</div></div></div>");
}

            $('#board').bind().on( "click", "#content", function() {
              var linkText = $(this).text();
              $(this).html("<input value='"+linkText+"'></input>");
            });

              //add a div master
            $('#board').bind().on( "click", "#add", function() {
              input = prompt("Enter your new mind?");
              if (input.trim() === "") {
                display();
              }
              else if (input != "") {
                var state;
                state = confirm("Are you sure to create this new mind?", input);
                if (state === false) {
                  display();
                }
                else {
                  alert("Your new mind is create !");
                  var parent = $(this).parent().attr('id');
                  mind(parent ,input);
                }
              }
              else {
                display();
              }
            });

            //method for create slave div
            function minds(string) {
              // get the contents of the link that was clicked

              // replace the contents of the div with the link text
              //$('#content-container').html(linkText);
              //this.append("<div id='mind' style='height:"+mindSize+"'>"+string+"</div>");
            }
            return this;
        },
    });
})(jQuery);

$(document).ready(function () {
  $.fn.extend({
       mymindmap: function (size) {
         this.mapObject = $(this).attr("id");
           this.mindSize = size/10;
           this.mapSize = size;
           return (this);
       },

       board: function () {
           $("#" + this.mapObject).append("<div id='board' style='height:"+ this.mapSize + "px;width:" + this.mapSize + "px;background-color:grey' ></div>");
           return (this);
       },

       master: function () {
           $("#board").append("<div id='mind-master' style='background-color: light-blue:" + this.mapSize + "px;text-align: center;margin: 20px;'><div style=''><span style='top: " + (this.mindSize*2) + "px;' class='span-mind-master'>mind-master</span></div></div>");
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
    var off2 = this.getOffset(div2);
    // bottom right
    var x1 = off1.left + off1.width;
    var y1 = off1.top + off1.height;
    // top right
    var x2 = off2.left + off2.width;
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
        top: rect.top + window.pageYOffset,
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
       .mind("Mind#1");

       // set exo 3 style around mind-master
        mindMap.setMinds();
        var div1 = $('.mind-container')[0];
        var div2 = $('#mind-master')[0];
        mindMap.connect(div1, div2, "#0F0", 5);

       // exo 4 init
       mindMap.doubleClick();
 });
