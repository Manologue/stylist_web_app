/*********sidebar ************/

const menuBtn = document.querySelector('#menu-btn')
const closeBtn = document.querySelector('#close-btn')
const sidebar = document.querySelector('.sidebar')

menuBtn.addEventListener('click', () => {
  sidebar.classList.add('open')
  console.log('menu clicked')
})

closeBtn.addEventListener('click', () => {
  sidebar.classList.remove('open')
  console.log('close clicked')
})

// close sidebar after clicking links
const links = [...sidebar.querySelectorAll('li > a')]

links.forEach((link) => {
  link.addEventListener('click', () => {
    document.querySelector('.sidebar').classList.remove('open')
  })
})

/*********haeder************/

let header = document.querySelector('.header')

window.addEventListener('scroll', () => {
  const currentScroll = window.pageYOffset
  // console.log(currentScroll)
  if (currentScroll > 100) {
    header.classList.add('sticky')
  } else {
    header.classList.remove('sticky')
  }
})
