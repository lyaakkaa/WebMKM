document.addEventListener('DOMContentLoaded', () => {
    const grid = document.querySelector('.grid');
    let squares = Array.from(document.querySelectorAll('.grid div'));
    const scoreDisplay = document.querySelector('#score');
    const startBtn = document.querySelector('#start-button');
    const width = 10;
    let nextRandom = 0;
    let timerId;
    let score = 0;
    const colors = [
        '#FFBE0B', 
        '#FB5607', 
        '#FF006E', 
        '#8338EC', 
        '#3A86FF'
    ];
  

    const lTetromino = [
        [1, width+1, width*2+1, 2],
        [width, width+1, width+2, width*2+2],
        [width*2, width*2+1, width+1, 1],
        [width, width*2, width*2+1, width*2+2]
    ];

    const oTetromino = [
        [0, 1, width, width+1],
        [0, 1, width, width+1],
        [0, 1, width, width+1],
        [0, 1, width, width+1]
    ];

    const zTetromino = [
        [width, width+1, width*2+1, width*2+2],
        [1, width, width+1, width*2],
        [width, width+1, width*2+1, width*2+2],
        [1, width, width+1, width*2]
    ];

    const tTetromino = [
        [width*2, width*2+1, width+1, width+2],
        [0, width, width+1, width*2+1],
        [width*2, width*2+1, width+1, width+2],
        [0, width, width+1, width*2+1]
    ];

    const iTetromino = [
        [1, width+1, width*2+1, width*3+1],
        [width, width+1, width+2, width+3],
        [1, width+1, width*2+1, width*3+1],
        [width, width+1, width+2, width+3]
    ];

    const theTetrominoes = [lTetromino, oTetromino, tTetromino, zTetromino, iTetromino];

    let currentPosition = 4;
    let currentRotation = 0;

    let random = Math.floor(Math.random()*theTetrominoes.length);

    let current = theTetrominoes[random][currentRotation];

    const draw = () => {
        current.forEach(index => {
            squares[currentPosition + index].classList.add('tetromino')

            squares[currentPosition + index].style.backgroundColor = colors[random]
        })
    };

    const undraw = () => {
        current.forEach(index => {
            squares[currentPosition + index].classList.remove('tetromino')

            squares[currentPosition + index].style.backgroundColor = ''
        })
    };

    const control = (e) => {
        if(e.keyCode === 37) {
            moveLeft();
        } else if (e.keyCode === 38) {
            rotate();
        } else if (e.keyCode === 39) {
            moveRight();
        } else if (e.keyCode === 40) {
            moveDown();
        }
    };

    document.addEventListener('keyup', control);

    const moveDown = () => {
        undraw();
        currentPosition += width;
        draw();
        freeze();
    };

    const freeze = () => {
        if(current.some(index => squares[currentPosition + index + width].classList.contains('taken'))) {
            current.forEach(index => squares[currentPosition + index].classList.add('taken'));
 
            random = nextRandom;
            nextRandom = Math.floor(Math.random () * theTetrominoes.length);
            current = theTetrominoes[random][currentRotation];
            currentPosition = 4;
            draw();
            displayShape();
            addScore();
            gameOver();
        }
    };


    const moveLeft = () => {
        undraw();
        const isAtLeftEdge = current.some(index => (currentPosition + index) % width === 0);

        if(!isAtLeftEdge) {
            currentPosition -=1;
        };
        if(current.some(index => squares[currentPosition + index].classList.contains('taken'))) {
            currentPosition +=1
        };

        draw();
    };


    const moveRight = () => {
        undraw();
        const isAtRightEdge = current.some(index => (currentPosition + index) % width === width -1);

        if(!isAtRightEdge) {
            currentPosition +=1;
        };
        if(current.some(index => squares[currentPosition + index].classList.contains('taken'))) {
            currentPosition =-1;
        };

        draw();
    };

    const rotate = () => {
        undraw();
        currentRotation ++ ;
        if(currentRotation === current.length) { 
            currentRotation = 0;
        };
        current = theTetrominoes[random][currentRotation];
        draw();
    }


    const displaySquares = document.querySelectorAll('.mini-grid div');
    const displayWidth = 4;
    const displayIndex = 0;

    const upNextTetrominoes = [
        [1, displayWidth+1, displayWidth*2+1, 2], 
        [0, 1, displayWidth, displayWidth+1], 
        [displayWidth, displayWidth+1, displayWidth*2+1, displayWidth*2+2], 
        [displayWidth*2, displayWidth*2+1, displayWidth+1, displayWidth+2], 
        [1, displayWidth+1, displayWidth*2+1, displayWidth*3+1] 
    ]

//отоброжать след фигуру
    const displayShape = () => {
        displaySquares.forEach(square => {
            square.classList.remove('tetromino');
            //this removes the color
            square.style.backgroundColor = '';
        });

        //добавить след фигуру
        upNextTetrominoes[nextRandom].forEach(index => {
            displaySquares[displayIndex + index].classList.add('tetromino');
            displaySquares[displayIndex + index].style.backgroundColor = colors[nextRandom];
        });
    }

    startBtn.addEventListener('click', () => {
        if (timerId) {
            clearInterval(timerId);
            timerId = null;
        } else {
            draw();
            timerId = setInterval(moveDown, 1000);
            nextRandom = Math.floor(Math.random()*theTetrominoes.length);
            displayShape();
        }
    });
 
    const addScore = () => {
        for (let i = 0; i < 199; i += width) {
            const row = [i, i+1, i+2, i+3, i+4, i+5, i+6, i+7, i+8, i+9];

            if(row.every(index => squares[index].classList.contains('taken'))) {
                score += 10;
                scoreDisplay.innerHTML = score;
                row.forEach(index => {
                    squares[index].classList.remove('taken');
                    squares[index].classList.remove('tetromino');
                    // удалить цвет
                    squares[index].style.backgroundColor = '';
                })
                const squaresRemoved = squares.splice(i, width);
                squares = squaresRemoved.concat(squares);
                squares.forEach(cell => grid.appendChild(cell));
            }
        }
    }

    const gameOver = () => {
        if(current.some(index => squares[currentPosition + index].classList.contains('taken'))) {
            scoreDisplay.innerHTML = 'Game Over!';
            clearInterval(timerId);
        }
    }
}) ;




  
  