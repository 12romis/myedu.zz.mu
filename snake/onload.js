//
// Точка входа.
//
window.onload = function()
{

	var game;
	//обрабатываем нажатие на кнопку старт -

    $('#buttonPlay').on('click', function (){
        $('#buttonPlay').remove();
        $('body').css('background-image', 'none');
        $('#buttonPause').css('display', 'inline');
        game = new Core;
        game.load();
        game.start();
    });


	
//	window.onkeydown = function (event)
    $(document).keydown (function (event)
	{
        if (event.which!=null)
            var code = event.which;
        else code = event.keyCode;

		switch(code)
		{
			case 37: //left
				game.cmdLeft();
			break;
			
			case 38: //up
				game.cmdUp();
			break;
			
			case 39: //right
				game.cmdRight();
			break;
			
			case 40: //down
				game.cmdDown();
			break;

            case 8: //pause
                game.Pause();
            break;
			
			default:
			break;
		}
	});
    $('#buttonPause').on('click', function(){game.Pause()});
};