window.addEventListener('load', function() {
    var timerElement = document.getElementById('timer');
    var attemptsLeftElement = document.getElementById('attemptsLeft');
    var timer = 10; // Initial timer value
    var maxAttempts = 3; // Maximum number of attempts
    var countdown;

    function startTimer() {
        countdown = setInterval(function() {
            timer--;
            timerElement.innerText = timer;
            if (timer <= 0) {
                clearInterval(countdown);
                timerElement.innerText = '0';
                document.getElementById('guessInput').disabled = true;
                alert('Time is up! You lose.');
            }
        }, 1000);
    }

    startTimer();

    // Handle form submission
    var form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        if (timer > 0) {
            var guessInput = document.getElementById('guessInput');
            var guess = parseInt(guessInput.value);
            var attemptsLeft = maxAttempts - parseInt(attemptsLeftElement.innerText);

            if (!isNaN(guess) && attemptsLeft > 0) {
                // You can add your number checking logic here
                // For simplicity, let's just end the game when a guess is made
                clearInterval(countdown);
                timerElement.innerText = '0';
                guessInput.disabled = true;
                alert('You win! You guessed the number.');
            }
        }
    });
});
