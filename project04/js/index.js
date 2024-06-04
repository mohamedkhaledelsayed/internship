import en from './transition/en.js'
import ar from './transition/ar.js'
// console.log(en)
$(document).ready(function () {
  $('#toggle-1').click(function () {
    $('#team-data-1').toggle('blind', 5000) // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-2').click(function () {
    $('#team-data-2').toggle('blind', 5000) // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-3').click(function () {
    $('#team-data-3').toggle('blind', 5000) // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-4').click(function () {
    $('#team-data-4').toggle('blind', 5000) // Toggle the display of myElement
  })
})

const transitions = {
  en,
  ar,
}
// console.log(transitions)

const theme = document.querySelector('#theme')
const langSelec = document.querySelector('#lang')
langSelec.addEventListener('click', (event) => {
  setLanguage(event.target.value)
  localStorage.setItem('lang', event.target.value)
})
document.addEventListener('DOMContentLoaded', () => {
  const lang = localStorage.getItem('lang')
  setLanguage(lang)
})

const setLanguage = (language) => {
  const elements = document.querySelectorAll('[data-i18n]')
  elements.forEach((element) => {
    const translationKey = element.getAttribute('data-i18n')
    element.textContent = transitions[language][translationKey]
  })
  const en = document.querySelector('.EN')
  const ar = document.querySelector('.AR')
  const navbar = document.querySelector('.navbar')
  const header = document.querySelector('.header')
  const bgcon = document.querySelector('.bg-con')
  const head = document.querySelector('.head-left')
  if (language === 'ar') {
    navbar.dir = 'rtl'
    header.dir = 'rtl'
    bgcon.dir = 'rtl'
    head.dir = 'rtl'
    theme.setAttribute('href', 'style/rtl.css')
    en.classList.remove('active')
    ar.classList.add('active')
  } else {
    navbar.dir = 'ltr'
    header.dir = 'ltr'
    bgcon.dir = 'ltr'
    head.dir = 'ltr'
    theme.setAttribute('href', 'style/ltr.css')
    en.classList.add('active')
    ar.classList.remove('active')
  }
}
