
function Matrix (containerId, rows, cols)
{
	this.containerId = containerId;
	this.rows = rows;
	this.cols = cols;
 //   this.n = this.cols * this.rows;

    // Создает игровую матрицу
	this.Create = function (){
		for (var i = 0; i < this.rows; i++)
        {
            $('#matrix1').append("<div class='line'></div>");
			for (var j = 0; j < this.cols; j++){
				$('.line').eq(i).append("<div class='cell'></div>");
			}
		}
	};

    //  Получить классы что присвоены конкретному диву
    this.getCell = function (row, col){
        var ind = (row-1)*this.cols + col-1;
        return $('div.cell').eq(ind).attr('class');
    };

    // toggle Class 'on' для конкретного дива
    this.setCell = function (row, col){
        var ind = (row-1)*this.cols + col-1;
        $('div.cell').eq(ind).toggleClass('on');
    };

    // Проверка всей матрицы
    this.cheсkMatrix = function () {
        for (var i =0; i< this.rows; i++){
            if( $('.line').eq(i).children().filter('.stay').length == this.cols){
                this.deleteLine(i);
                return true;
            }
        }
    };

    // Удалить строчку
    this.deleteLine = function (row) {
        for (var i = row; i > 0; i--)
        {
            var temp = $('.line').eq(i-1).html();
            $('.line').eq(i).html(temp);
        }
    };

    // проверка на конец игры
    this.checkGameOver = function () {
        for (var i = 15; i > 0; i--)
        {
            if (this.getCell(1, i)=="cell stay") {
                return true;
            }
        }
        return false;
    };


}