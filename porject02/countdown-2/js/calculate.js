const { calculateTime } = require('.')

export function calculate() {
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
