
function Core()
{
	this.matrix;
	var puzzle;
	var time;
	var count;
	
	var that = this;

    // Создание матрицы
	this.load = function(){
		that.matrix = new Matrix('matrix1', 20, 15);
        that.matrix.Create();
    };

    // Запуск игры
	this.start = function()	{
        var i =0;
        time=0;
		count = 0;
        puzzle = new Puzzle();
        puzzle.FirstCreate(that.matrix);
        puzzle.Create();

        $('#count').html(count);
        // Главный процес программы
        process = function(){
            i++;
            time=i/5;
            $('#time').html(time);
            $('#count').html(count);
			if (puzzle.alive){
				puzzle.Move();
			}
			else {
                puzzle.alive = true;
                if(that.matrix.cheсkMatrix()){
                    count++;
                }
				puzzle.Create();
			}
            if(that.matrix.checkGameOver())
                that.gameover();
        };
        setInterval(process, 500);
	};
	
	// когда конец игры
	this.gameover = function()	{
        alert ("GAME OVER \n\n Your score: " + count + "\n\nAbout time: " + time + " s.\n\nDo you want to play again?");
        $(location).attr('href', '/');
	};
	
	this.cmdRight = function() {
            puzzle.courseSide = 'right';
	};
	
	this.cmdLeft = function() {
            puzzle.courseSide = 'left';
	};

    this.cmdDown = function() {

    };

    this.Pause = function() {
        alert("Pause :: \n\n Do you want return to game?? \n\n");
    }
}