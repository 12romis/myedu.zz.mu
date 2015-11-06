/**
 * Created by Романенко Ігор on 25.06.2015.
 */


$(function(){

         var animTime = 900;
         var modal = $('#modalDiv');
         var oldDiv=null;

    $('.sameDiv').on('click', function (e){

        if(oldDiv){
            oldDiv.css('opacity', 1);
        }

    var jthis = $(this);


        modal.css({'top': jthis.offset().top,
                    'left': jthis.offset().left,
                    'width': jthis.width(),
                    'height': jthis.height(),
                    'background-color': jthis.css('background-color'),
                    'opacity': 1,
                    'display': 'block'
        });
        jthis.css('opacity', 0);

        modal.animate({'height': 400, 'width': 400}, 1000)
             .animate({'top': (window.innerHeight -400)/2,
                        'left': (window.innerWidth - 400)/2}, {
                duration: 1000,
                queue: true,
                specialEasing: {
                    height: 'linear',
                    width: 'swing'
                }
            });




  //      modal.css('top', (window.innerHeight - modal.height())/2);
    //    modal.css('left', (window.innerWidth - modal.width())/2);
        //  modal.fadeIn(animTime);
        oldDiv = jthis;

});

    $('.sameDiv').on('click', function (){



    });
    modal.on('click', function(){
        $(this).fadeOut(animTime);


    });




  /*  var CenterW = $(window).width()/2-$('#modal').width()/2;
    var CenterH = $(window).height()/2-$('#modal').height()/2;
    $('#modal').css({
        'opacity': 0,
        'left': CenterW,
        'top': CenterH
    });

    $('.sameDiv').on('click', function(){
        var color = $(event.target).css('background-color');
      // $('#modal').css('background-color', color).animate({'opacity': 1}, 2500);
        $(this).animate({
            'opacity': 1,
            'position': 'absolute',
            'left': CenterW,
            'top': CenterH,
            'width': '400px',
            'height': '400px'
        }, 2500);

    });

    $('#modal').on('click', function(){
        $(this).animate({'opacity': 0}, 1500);
    });
*/

});