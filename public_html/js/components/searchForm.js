const homeForm = document.querySelector('.home-form')
const modal = document.querySelector('#modal-danger')
const modalTextContainer = document.querySelector('#modal-danger .content')
var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']

if (homeForm) {
  // document.getElementById('#search-day').setAttribute('min', new Date())

  const closeBtn = modal.querySelector('.close')
  const locationInput = homeForm.querySelector('#location-input')
  const locationInput_2 = document.querySelector('#location-input_2')

  const servicesInput = homeForm.querySelector('#services-input')
  const servicesInput_2 = document.querySelector('#services-input_2')

  const dateInput = homeForm.querySelector('#search-day')

  // some date input configurations
  // // Use Javascript
  var today = new Date()
  var dd = today.getDate()
  var mm = today.getMonth() + 1 //January is 0 so need to add 1 to make it 1!
  var yyyy = today.getFullYear()
  if (dd < 10) {
    dd = '0' + dd
  }
  if (mm < 10) {
    mm = '0' + mm
  }

  today = yyyy + '-' + mm + '-' + dd

  dateInput.setAttribute('min', today)

  //****************en of date input config */

  homeForm.addEventListener('submit', (e) => {
    e.preventDefault()
    sessionStorage.setItem('location', locationInput_2.value)
    sessionStorage.setItem('services', servicesInput_2.value)

    sessionStorage.setItem('location_2', locationInput.value)
    sessionStorage.setItem('services_2', servicesInput.value)

    sessionStorage.setItem('date', dateInput.value)
    if (locationInput.value === '') {
      modal.style.display = 'block'
      modalTextContainer.innerHTML = `<p>
      please enter your location
      so that we can put you in touch with the best hairdresser in your area
      </p>`
    } else {
      homeForm.submit()
    }
  })

  closeBtn.addEventListener('click', (e) => {
    modal.style.display = 'none'
  })

  // set inputs after loading page
  locationInput.value = sessionStorage.getItem('location_2')
  locationInput_2.value = sessionStorage.getItem('location')

  servicesInput.value = sessionStorage.getItem('services_2')
  servicesInput_2.value = sessionStorage.getItem('services')

  dateInput.value = sessionStorage.getItem('date')

  const inputs = homeForm.querySelectorAll('.field input')
  inputs.forEach((input) => {
    // if input value is not empty show close btn
    if (input.value !== '') {
      input.parentElement.querySelector('i:nth-child(2)').style.display = 'block'
    }
    console.log(input.parentElement.querySelector('i:nth-child(2)'))
    // on click of close btn
    input.parentElement.querySelector('i:nth-child(2)').addEventListener('click', () => {
      input.parentElement.querySelector('i:nth-child(2)').style.display = 'none'

      if (input.dataset.id === 'date') {
        // calendar.clear()
        input.value = null
      } else {
        input.value = ''
      }
      sessionStorage.removeItem(input.dataset.id) // remove sessionStorage of each input when you click on clear btn
    })
  })
}
