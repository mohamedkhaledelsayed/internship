$(document).ready(function () {
  $('#toggle-1').click(function () {
    $('#team-data-1').toggle() // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-2').click(function () {
    $('#team-data-2').toggle() // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-3').click(function () {
    $('#team-data-3').toggle() // Toggle the display of myElement
  })
})
$(document).ready(function () {
  $('#toggle-4').click(function () {
    $('#team-data-4').toggle() // Toggle the display of myElement
  })
})

const transitions = {
  en: {
    Home: 'Home',
    Services: 'Services',
    Connect: 'Connect Us',
    requests: 'My requests',
    sign: 'sign in',
    en: 'EN',
    ar: 'عربي',
    coll: '+966-353623255',
    headtitle: 'Incident of individuals',
    disc:
      'It is a legal phrase that receives cases related to an individual against a company, or an individual against an individual, and vice versa, with its various jurisdictions',
    btnstart: 'Start the service',
    we: 'Who are we',
    company: 'It is a leading company targeting one of the legal markets',
    indiv: 'Individuals (representation of law)',
    law: 'Law needs',
    Companies: 'Companies',
    almost: 'almost',
    service:
      'It is a leading company targeting one of the legal markets in regulating litigation service. We are a connecting tool',
    more: ' Learn more',
    problem: ' Problem ',
    probfin:
      ' The problem is finding a lawyer who specializes in reaching the target client',
    solution: 'Solution',
    solcrea:
      'The solution is to create a simple entity and a legal guide for it',
    team: 'Team & Experiences',
    experiences: 'We have more than 30 years of experience',
    name: 'Ibrahim Al-Hamdan',
    inf1: 'Executive Director and Sales',
    inf2:
      'Bachelor’s degree in Sharia and Law, commercial entrepreneur and labor market, founder of two companies (food and technology) for years.',
    send: 'send',
    titl: 'An incident',
    regs1: 'Register with us if you need legal advice',
    regs2:
      'Register if you are a lawyer and would like to be a member of the Waqaa team',
    forany: 'for any thing you want send a message to us',
    follow: 'Follow us',
    connect: 'Connect with us',
    heatit: 'An incident',
    consultation: 'Waqea Legal Consultation Office',
    platform:
      'It is a platform that manages your business and legal procedures with the best lawyers',
  },
  ar: {
    Home: 'الرئيسة',
    Services: 'خدماتنا',
    Connect: 'تواصل معنا',
    requests: 'طلباتي',
    sign: 'تسجيل الدخول',
    en: 'EN',
    ar: 'عربي',
    coll: '966-353623255+',
    headtitle: 'واقعةالأفراد',
    disc:
      'هي عبارة قانونية تستقبل القضايةالمتعلقة بالفرد ضد الشركةاو فرد ضد فرد و العكس بمختلف اختصاصاتها',
    btnstart: 'أبداء الخدمة',
    we: 'من نحن',
    company: 'هي الشركة رائدة تستهدف سوق واحد من الاسواق القانونية',
    indiv: 'أفراد (تمثيل القانون)',
    law: 'أحتياجات القانون',
    Companies: '1-شركات',
    almost: 'قريبا',
    service:
      'هي الشركة رائدة تستهدف سوق واحد من الاسواق القانونية في التنظيم خدمة التقاضي. و نحن أداة ربط',
    more: ' أعرف المزيد  ',
    problem: ' المشكلة ',
    probfin: ' المشكلة هي البحث عن محامي مختصاو الوصول للعميل المستهدف',
    solution: 'الحل',
    solcrea: 'الحل هو وضع كيان بسيط ومرشد قانوني و له',
    team: 'الفريق و خبراتهم',
    experiences: 'نحن نمتلك أكثر من 30عام من الخبره',
    name: 'إبراهيم ناصر الحمدان',
    inf1: 'المدير التنفيذي و المبيعات',
    inf2:
      'بكالوريوس شريعة و قانون و رائد أعمال تجاري و سوق العمل من سنوات مؤسس لشركاتين (غذاية و تقنية)',
    send: 'أرسال',
    titl: 'وقعة',
    regs1: 'سجل معنا أذا كنت محتاج أستشارة قانونية',
    regs2: 'سجل أذا كنت محامي و حابب تكون عضو من فريق وقعة',
    forany: 'لأي شئ ترغب أرسل رسالة لنا',
    follow: 'تابعنا',
    connect: 'تواصل معنا',
    heatit: 'واقعة',
    Consultation: 'مكتب واقعة للاستشارات القانونية',
    platform: 'هي منصة تدير أعمالك و أجرائتك القانونية مع أفضل المحامين',
  },
}

// const theme = document.querySelector('#theme')
// console.log(theme)
// if (theme.getAttribute('href') === 'style/style.css') {
//   theme.setAttribute('href', 'style/rtl.css')
// } else {
//   theme.setAttribute('href', 'style/style.css')
// }

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
  //   console.log(elements)
  elements.forEach((element) => {
    const translationKey = element.getAttribute('data-i18n')
    // console.log(translationKey)
    element.textContent = transitions[language][translationKey]
    console.log(element.textContent)
  })
  const en = document.querySelector('.EN')
  const ar = document.querySelector('.AR')
  const bghader = document.querySelector('.bg-hader')
  const bgcon = document.querySelector('.bg-con')
  const head = document.querySelector('.head-left')
  const header = document.querySelector('.head-right')
  const bort1 = document.querySelector('.bort-1')
  const bort2 = document.querySelector('.bort-2')
  const bort3 = document.querySelector('.bort-3')
  const bort4 = document.querySelector('.bort-4')
  if (language === 'ar') {
    bghader.classList.add('bg-header-ar')
    bghader.classList.remove('bg-header-en')
    bgcon.classList.add('bg-ar-con')
    bgcon.classList.remove('bg-en-con')
    // bort1.style.borderLeft = '1px solid white'
    // bort4.style.backgroundColor = 'red'
    // bort4.style.borderLeft = 'none ! important'
    // console.log(bghader)
    // bort4.style.backgroundColor = 'red'
    document.dir = 'rtl'
    bort4.classList.remove('bort-2-4')
    bort2.classList.remove('bort-2-4')
    bort1.classList.add('bort-2-4')
    bort3.classList.add('bort-2-4')
    bort4.classList.remove('border-start')
    bort1.classList.add('border-start')
    en.classList.remove('active')
    ar.classList.add('active')
    // bort1.classList.add('bort-no')
    // bort3.style.backgroundColor = 'blue'
    // bort2.style.backgroundColor = 'black'
    // bort1.classList.add('bort-2-4')
  } else {
    // console.log(bghader)
    bort1.style.borderLeft = 'none'
    bort4.style.borderLeft = '1px solid white'
    bghader.classList.remove('bg-header-ar')
    bghader.classList.add('bg-header-en')
    bgcon.classList.remove('bg-ar-con')
    bgcon.classList.add('bg-en-con')
    document.dir = 'ltr'
    bort1.classList.remove('bort-2-4')
    bort2.classList.add('bort-2-4')
    bort3.classList.remove('bort-2-4')
    bort4.classList.add('bort-2-4')
    bort4.classList.add('border-start')
    bort1.classList.remove('border-start')
    en.classList.add('active')
    ar.classList.remove('active')
  }
}
