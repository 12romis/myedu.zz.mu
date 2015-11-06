//
// ����� �����.
//
window.onload = function()
{

	var game;
    game = new Core;
    game.load();
    $('#buttonPlay').on('click', function (){
        game.start();
    });



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