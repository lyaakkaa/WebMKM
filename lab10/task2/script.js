const quizData = [
    {
        question: "Какая столица Франции?",
        options: ["Лондон", "Берлин", "Париж", "Рим"],
        correctAnswer: "Париж"
    },
    {
        question: "Какой язык говорят в Испании?",
        options: ["Английский", "Французский", "Испанский", "Немецкий"],
        correctAnswer: "Испанский"
    },
    {
        question: "Какое озеро самое глубокое в мире?",
        options: ["Онтарио", "Байкал", "Виктория", "Мичиган"],
        correctAnswer: "Байкал"
    }
];

let currentQuestion = 0;
let score = 0;

const questionContainer = document.getElementById("question-container");
const optionsContainer = document.getElementById("options-container");
const resultContainer = document.getElementById("result");
const restartBtn = document.getElementById("restart-btn");

function startQuiz() {
    currentQuestion = 0;
    score = 0;
    restartBtn.style.display = "none";
    resultContainer.textContent = "";
    optionsContainer.style.display = "block"; // Отображаем контейнер с вариантами ответов
    showQuestion();
}

function showQuestion() {
    if (currentQuestion < quizData.length) {
        questionContainer.textContent = quizData[currentQuestion].question;
        optionsContainer.innerHTML = "";
        quizData[currentQuestion].options.forEach((option, index) => {
            const button = document.createElement("button");
            button.textContent = option;
            button.addEventListener("click", () => checkAnswer(option));
            optionsContainer.appendChild(button);
        });
    } else {
        showResult();
    }
}

function checkAnswer(answer) {
    const correctAnswer = quizData[currentQuestion].correctAnswer;

    optionsContainer.innerHTML = `<button disabled>${answer}</button>`;

    if (answer === correctAnswer) {
        optionsContainer.firstChild.style.backgroundColor = "#4caf50"; // зеленый
        score++;
    } else {
        optionsContainer.firstChild.style.backgroundColor = "#f44336"; // красный
        // Подсветим правильный ответ
        quizData[currentQuestion].options.forEach((option) => {
            if (option === correctAnswer) {
                optionsContainer.innerHTML += `<button disabled style="background-color: #4caf50;">${option}</button>`;
            }
        });
    }

    currentQuestion++;
    setTimeout(showQuestion, 1000); // Подождем 1 секунду перед переходом к следующему вопросу
}

function showResult() {
    questionContainer.textContent = "";
    optionsContainer.style.display = "none";
    resultContainer.textContent = `Вы набрали ${score} из ${quizData.length} баллов!`;
    restartBtn.style.display = "block";
}

startQuiz();