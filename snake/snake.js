/**
 * Created by Романенко Ігор on 06.08.2015.
 */

function Snake () {

    this.bodyX = [];
    this.bodyY = [];
    this.len = 2;
    this.course = 'up';
    this.eated = false;
    this.alive = true;
    var matrix = new Matrix('matrix1', 20, 20);
    var that = this;

    this.Create = function () {
        that.bodyX[0] = 8;
        that.bodyY[0] = 10;
        that.bodyX[1] = 9;
        that.bodyY[1] = 10;
        matrix.setCell(that.bodyX[0], that.bodyY[0]);
        matrix.setCell(that.bodyX[1], that.bodyY[1]);
    };

    this.Move = function () {
        that.eated = false;

        matrix.setCell(that.bodyX[that.len-1], that.bodyY[that.len-1]);

        for (var i=that.len-1; i>0; i--){
            that.bodyX[i] = that.bodyX[i-1];
            that.bodyY[i] = that.bodyY[i-1];
        }

        switch (that.course){
            case 'right':
                that.bodyY[0]++;
                break;
            case 'left':
                that.bodyY[0]--;
                break;
            case 'up':
                that.bodyX[0]--;
                break;
            case 'down':
                that.bodyX[0]++;
                break;
        }

        if (matrix.getCell(that.bodyX[0], that.bodyY[0])== "cell on" ||
                    that.bodyX[0] < 1 ||
                    that.bodyX[0] >= 20 ||
                    that.bodyY[0] < 1 ||
                    that.bodyY[0] >= 20 ){
            that.alive = false;
        }
        if (matrix.getCell(that.bodyX[0], that.bodyY[0])=="cell fruit"){
            that.len++;
            that.eated = true;
            // ===================interesting----------------------
            matrix.addNewFruit(that.bodyX[0], that.bodyY[0]);
            that.newFruit();
        }

        matrix.setCell(that.bodyX[0], that.bodyY[0]);

    };

    this.newFruit = function () {

        var rand = function (min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        };

        do {
            var row = rand(1, 19);
            var col = rand(1, 20);
        } while (matrix.getCell(row, col)=="cell on");

        matrix.addNewFruit (row, col);
    };
}


