let timerInterval;
let timerSeconds = 0;
let timerMinutes = 0;

function startTimer() {
    timerInterval = setInterval(updateTimer, 1000);
}

function updateTimer() {
    timerSeconds++;
    if (timerSeconds === 60) {
        timerMinutes++;
        timerSeconds = 0;
    }
    const formattedSeconds = timerSeconds < 10 ? "0" + timerSeconds : timerSeconds;
    const formattedMinutes = timerMinutes < 10 ? "0" + timerMinutes : timerMinutes;
    document.getElementById("timer").textContent = formattedMinutes + ":" + formattedSeconds;
    addtimer()
}

function stopTimer() {
    clearInterval(timerInterval); 
}

function addtimer(){
const timerValue = timerMinutes * 60 + timerSeconds;
document.getElementById("timer-input").value = timerValue;
}

startTimer();