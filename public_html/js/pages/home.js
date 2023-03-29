/**** home section */

let slides = document.querySelectorAll('.home .slide')
let index = 0
const controls = document.querySelectorAll('.home .controls')

function next() {
  slides[index].classList.remove('active')
  index = (index + 1) % slides.length
  slides[index].classList.add('active')
}

function prev() {
  slides[index].classList.remove('active')
  index = (index - 1 + slides.length) % slides.length
  slides[index].classList.add('active')
}

controls.forEach((control) => {
  control.addEventListener('click', (e) => {
    if (e.target.getAttribute('target') === 'prev') {
      prev()
    } else {
      next()
    }
  })
})

// faq section

const items = document.querySelectorAll('.accordion button')

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded')

  items.forEach((item) => {
    item.setAttribute('aria-expanded', 'false')
  })

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true')
  }
}

items.forEach((item) => item.addEventListener('click', toggleAccordion))

// var elem = document.querySelector('.main-carousel')
// var flkty = new Flickity(elem, {
//   cellAlign: 'left',
//   wrapAround: true,
//   freeScroll: true,
//   // prevNextButtons: false,
//   autoPlay: true,
//   contain: true,
// })
