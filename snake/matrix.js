
function Matrix (containerId, rows, cols)
{
	this.containerId = containerId;
	this.rows = rows;
	this.cols = cols;
 //   this.n = this.cols * this.rows;

	this.Create = function (){
		for (var i = 0; i < 400; i++)
        {
			$('#matrix1').append("<div class='cell'></div>");
		}
	};

    this.getCell = function (row, col){
        var ind = (row-1)*this.cols + col-1;
        return $('div.cell').eq(ind).attr('class');
    };

 /*   this.getCellFruit = function (row, col){
        var ind = (row-1)*this.cols + col-1;
        if($('div.cell').eq(ind).attr('class')=="cell fruit"){
            return true;
        }
        else return false;
    };
*/
    this.setCell = function (row, col){
        var ind = (row-1)*this.cols + col-1;
        $('div.cell').eq(ind).toggleClass('on');
    };

    this.addNewFruit = function (row, col)  {
        var ind = (row-1)*this.cols + col-1;
        $('div.cell').eq(ind).toggleClass('fruit');
    }



}

