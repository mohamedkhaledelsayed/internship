// console.log('fvjsnlksmcns')
window.onload = () => {
  document.querySelector('#calculate').onclick = calculate
  document.querySelector('#reset').onclick = reset
}
function calculate() {
  const date = document.querySelector('#date').value
  const time = document.querySelector('#time').value
  const stop = document.querySelector('#stop')
  const endtime = new Date(`${date}T${time}`)
  //   console.log(endtime)
  const interval = setInterval(() => calculateTime(endtime), 1000)
  stop.addEventListener('click', () => {
    clearInterval(interval)
  })
}
function calculateTime(endtime) {
  const currentTime = new Date()
  //   console.log(currentTime)
  const day = document.querySelector('#day')
  const houer = document.querySelector('#houer')
  const minute = document.querySelector('#minute')
  const second = document.querySelector('#second')
  if (endtime > currentTime) {
    // console.log('A7A')
    const timeLeft = (endtime - currentTime) / 1000
    // console.log(timeLeft)
    day.innerHTML = Math.floor(timeLeft / (24 * 60 * 60))
    houer.innerHTML = Math.floor((timeLeft / (60 * 60)) % 24)
    minute.innerHTML = Math.floor((timeLeft / 60) % 60)
    second.innerHTML = Math.floor(timeLeft % 60)
  } else {
    day.innerHTML = 0
    houer.innerHTML = 0
    minute.innerHTML = 0
    second.innerHTML = 0
  }
}

function reset() {
  document.querySelector('#day').innerHTML = 0
  document.querySelector('#houer').innerHTML = 0
  document.querySelector('#minute').innerHTML = 0
  document.querySelector('#second').innerHTML = 0
}

//   if (endtime > currentTime) {
//     console.log('Aaaaa')
//   }
