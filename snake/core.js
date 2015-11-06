//
// ядро
function Core()
{
	this.matrix;
	var snake;
	var time;
	var count;
	// итд, переменных сколько вам нужно (можете вместо переменных использовать пол€)
	
	var that = this;
	
	this.load = function(){
		that.matrix = new Matrix('matrix1', 20, 20);
        that.matrix.Create();

         $('#matrix1').after("<div class='info'>Score = <span id='count'></span> <br> Time = <span id='time'></span> s.</div>");
	};

	this.start = function()	{
        var i =0;
        time=0;
		count = 0;
        snake = new Snake();
        snake.newFruit();
        snake.Create();

        $('#count').html(count);
        process = function(){
            if (!snake.alive) {
                that.gameover();
            }
            if (snake.eated) {
                count++;
                $('#count').html(count);
            }
            i++;
            time=i/10;
            $('#time').html(time);

            snake.Move();
        };
        setInterval(process, 100);
	};
	
	this.gameover = function()
	{
        alert ("GAME OVER \n\n Your score: " + count + "\n\nAbout time: " + time + " s.\n\nDo you want to play again?");
        $(location).attr('href', 'index.html');
  //      window.location.href = "index.html"
	};
	
	this.cmdRight = function()
	{
		//мен€ем курс змеи вправо, если это возможно
        if (snake.course != 'left'){
            snake.course = 'right';
        }
	};
	
	this.cmdLeft = function()
	{
		//мен€ем курс змеи влево, если это возможно
        if (snake.course != 'right'){
            snake.course = 'left';
        }
	};
	
	this.cmdUp = function()
	{
		//мен€ем курс змеи вверх, если это возможно
        if (snake.course != 'down'){
            snake.course = 'up';
        }
	};
	
	this.cmdDown = function()
	{
		//мен€ем курс змеи вниз, если это возможно
        if (snake.course != 'up'){
            snake.course = 'down';
        }
	};

    this.Pause = function()
    {
        alert("Pause :: \n\n Do you want return to game?? \n\n than press <- Backspace");
    }
}