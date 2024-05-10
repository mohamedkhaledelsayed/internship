let countdown
document.getElementById('startTimer').addEventListener('click', function () {
  const minutes = document.getElementById('minutes').value
  let time = minutes * 60 
  countdown = setInterval(() => {
    time--
    const minutesLeft = Math.floor(time / 60)
    const secondsLeft = time % 60
    document.getElementById('timer',).textContent = 
    `${minutesLeft.toString().padStart(2, '0')}:${secondsLeft.toString().padStart(2, '0')}`

    if (time <= 0) {
      clearInterval(countdown)

      const audio = new Audio('../audio/01. Gamda Bas.mp3')
      audio.play()
      document.getElementById('timer').textContent = audio.play()
    }
  }, 1000)
})

document.getElementById('stopTimer').addEventListener('click', function () {
  clearInterval(countdown)
})

document.getElementById('resetTimer').addEventListener('click', function () {
  clearInterval(countdown)
  document.getElementById('minutes').value
  document.getElementById('timer').textContent = document.getElementById('minutes',).value

})
