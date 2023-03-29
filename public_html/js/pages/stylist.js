const servicesBox = [...document.querySelectorAll('.service')]

if (servicesBox) {
  servicesBox.forEach((box) => {
    toggleBox(box)
  })

  function toggleBox(box) {
    box.addEventListener('click', (e) => {
      const articleParent = box.parentElement
      // console.log(articleParent)
      const productsContainer = articleParent.querySelector('.products')
      const icon = articleParent.querySelector('.icons > i')

      // console.log(productsContainer)
      if (!productsContainer.classList.contains('show')) {
        productsContainer.classList.add('show')

        // console.log('true')
      } else {
        productsContainer.classList.remove('show')

        // console.log('false')
      }
      if (icon.classList.contains('fa-chevron-down')) {
        icon.classList.add('fa-chevron-up')
        icon.classList.remove('fa-chevron-down')
      } else {
        icon.classList.add('fa-chevron-down')
        icon.classList.remove('fa-chevron-up')
      }
    })
  }
}
