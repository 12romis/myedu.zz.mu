/**
 * Created by Романенко Ігор on 06.08.2015.
 */

function Puzzle () {

    this.bodyX = [];
    this.bodyY = [];
    this.matrix;
    this.course = 'down';
    this.courseSide = '';
    this.alive = true;
    this.speed = 200;

    var that = this;
    // Получить ссылку на обьект класса matrix
    this.FirstCreate = function (matrix){
        that.matrix = matrix;
    };

    //Создание пузлей
    this.Create = function () {
        switch (this.rand(1, 7)) {
            case 1: this.Square(); break;
            case 2: this.Line(); break;
            case 3: this.GoryzontLine(); break;
            case 4: this.trianglePuz(); break;
            case 5: this.overL(); break;
            case 6: this.myL(); break;
            case 7: this.shortLine(); break;
        }
    };

    //Пулучить рандомное число
    this.rand = function (min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    };

    // Движение пузла
    this.Move = function () {

        for (var j=0; j<that.bodyX.length-1; j++) {
            for (var k=0; k<that.bodyY.length-1; k++) {
                if (that.matrix.getCell(that.bodyX[j] + 1, that.bodyY[k]) == "cell stay") {
                    that.alive = false;
                    $('div.cell.on').removeClass('on').addClass('stay');
                    return;
                }
                else if (that.bodyX[j]+1 > that.matrix.rows) {
                    that.alive = false;
                    $('div.cell.on').removeClass('on').addClass('stay');
                    return;
                }
                else if (that.matrix.getCell(that.bodyX[j], that.bodyY[k]+1) == "cell stay" ||
                    that.matrix.getCell(that.bodyX[j], that.bodyY[k]-1) == "cell stay" ||
                    that.bodyY[k] + 1 > that.matrix.cols || that.bodyY[k]-1 < 1) {
                    that.courseSide = '';
                }
            }
        }


        for (var i=that.bodyX.length-1; i>=0; i--){
            that.matrix.setCell(that.bodyX[i], that.bodyY[i]);

            switch (that.courseSide){
                case 'right':
                        that.bodyY[i]++;
                    break;
                case 'left':
                    that.bodyY[i]--;
                    break;
            }
            //if (that.alive) {
                that.bodyX[i]++;
                that.matrix.setCell(that.bodyX[i], that.bodyY[i]);
           // }
        }
        that.courseSide = '';
    };



    //================================================ П У З Л И ===================================
    this.Square = function () {
        that.bodyX[0] = 1;
        that.bodyY[0] = 8;
        that.bodyX[1] = 2;
        that.bodyY[1] = 8;
        that.bodyX[2] = 1;
        that.bodyY[2] = 9;
        that.bodyX[3] = 2;
        that.bodyY[3] = 9;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
        that.matrix.setCell(that.bodyX[3], that.bodyY[3]);
    };

    this.Line = function () {
        that.bodyX[3] = 1;
        that.bodyY[3] = 8;
        that.bodyX[2] = 2;
        that.bodyY[2] = 8;
        that.bodyX[1] = 3;
        that.bodyY[1] = 8;
        that.bodyX[0] = 4;
        that.bodyY[0] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
        that.matrix.setCell(that.bodyX[3], that.bodyY[3]);
    };

    this.GoryzontLine = function () {
        that.bodyX[2] = 1;
        that.bodyY[2] = 6;
        that.bodyX[1] = 1;
        that.bodyY[1] = 7;
        that.bodyX[0] = 1;
        that.bodyY[0] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
    };

    this.trianglePuz = function () {
        that.bodyX[3] = 1;
        that.bodyY[3] = 7;
        that.bodyX[2] = 2;
        that.bodyY[2] = 6;
        that.bodyX[1] = 2;
        that.bodyY[1] = 7;
        that.bodyX[0] = 2;
        that.bodyY[0] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
        that.matrix.setCell(that.bodyX[3], that.bodyY[3]);
    };

    this.overL = function () {
        that.bodyX[3] = 1;
        that.bodyY[3] = 8;
        that.bodyX[2] = 2;
        that.bodyY[2] = 6;
        that.bodyX[1] = 2;
        that.bodyY[1] = 7;
        that.bodyX[0] = 2;
        that.bodyY[0] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
        that.matrix.setCell(that.bodyX[3], that.bodyY[3]);
    };

    this.myL = function () {
        that.bodyX[3] = 1;
        that.bodyY[3] = 6;
        that.bodyX[2] = 2;
        that.bodyY[2] = 6;
        that.bodyX[1] = 2;
        that.bodyY[1] = 7;
        that.bodyX[0] = 2;
        that.bodyY[0] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
        that.matrix.setCell(that.bodyX[3], that.bodyY[3]);
    };

    this.shortLine = function () {
        that.bodyX[0] = 1;
        that.bodyY[0] = 8;
        that.bodyX[1] = 2;
        that.bodyY[1] = 8;
        that.bodyX[2] = 3;
        that.bodyY[2] = 8;
        that.matrix.setCell(that.bodyX[0], that.bodyY[0]);
        that.matrix.setCell(that.bodyX[1], that.bodyY[1]);
        that.matrix.setCell(that.bodyX[2], that.bodyY[2]);
    };

}


