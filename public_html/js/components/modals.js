// let calendar = flatpickr('#search-day', {
//   altInput: true,
//   altFormat: 'F j, Y',
//   dateFormat: 'Y-m-d',
//   minDate: 'today',
//   locale: 'de', // locale for this instance only
// })

const inputLocation = document.querySelector('#location-input'),
  inputLocation_2 = document.querySelector('#location-input_2'),
  inputServices = document.querySelector('#services-input'),
  inputServices_2 = document.querySelector('#services-input_2'),
  inputDate = document.querySelector('#search-day'),
  modalServices = document.querySelector('#modal-services'),
  modalLocation = document.querySelector('#modal-location'),
  modalAlert = document.querySelector('#modal-danger')
const modalOverlay = document.querySelector('.modal-overlay')
const infoLocationCart = document.querySelector('.cart .destination .info')

const cartForm = document.querySelector('.cart form')
const cartContainer = document.querySelector('.services-container')

let slashes = ''

// console.log(infoLocationCart)

// console.log(serviceList, locationList)

function limit(string = '', limit = 0) {
  return string.substring(0, limit)
}

import suggestions from './suggestionsLocation.js'

if (modalOverlay) {
  /** global function(s) */

  function suggestionsSearchLocation() {
    const searchInput = modalLocation.querySelector('#name')

    let slash
    if (document.querySelector('main#home')) {
      slash = './'
    } else {
      slash = '../'
    }
    if (window.location.toString().includes('cart')) {
      slash = '../../../'
    }

    searchInput.addEventListener('keyup', async (e) => {
      let value = e.target.value
      if (value !== '') {
        modalLocation.querySelector('.research').style.display = 'none'
        let results = await suggestions(value, slash)

        // console.log(results)
        let list = []
        if (results.length > 0) {
          results
            .map((result) => {
              let { name, state } = result
              list += `
            <span data-state="${state}" data-location="${name} ${state}">
            <i class="fa-solid fa-location-dot"></i>${name} ${state}</span>
            `
            })
            .join('')
          locationList.innerHTML = `
            <div class="list">
            ${list}
            </div>
            `
        } else {
          locationList.innerHTML = `
          <p class="error">
          We couldn't find any matches. Try checking the spelling and search
          again.
        </p>
              `
        }
      } else {
        locationList.innerHTML = ``
        modalLocation.querySelector('.research').style.display = 'block'
      }
    })
  }

  const locationList = modalLocation.querySelector('.list')
  const serviceList = modalServices.querySelector('.list')
  const services = [...serviceList.querySelectorAll('input')]
  const btn = serviceList.parentElement.querySelector('.btn')
  /******************** for search form ***********************/
  if (inputLocation) {
    inputServices.addEventListener('click', () => {
      modalServices.classList.add('show')
    })
    inputLocation.addEventListener('click', () => {
      modalLocation.classList.add('show')
      suggestionsSearchLocation()
    })

    /*** for input date */
    inputDate.addEventListener('input', () => {
      if (inputDate.value) {
        const clearBtn = inputDate.parentElement.querySelector('i:nth-child(2)')
        // console.log(closeBtn)
        clearBtn.style.display = 'block'
        sessionStorage.setItem('date', inputDate.value)

        clearBtn.addEventListener('click', () => {
          // inputDate.value = ''
          // calendar.clear()
          clearBtn.style.display = 'none'
        })
      }
    })

    /* getting values to add it on search form */
    // for location
    locationList.addEventListener('click', (e) => {
      // console.log(e.target)
      if (e.target.hasAttribute('data-location')) {
        let location = e.target.dataset.location
        let state = e.target.dataset.state
        inputLocation_2.value = state
        sessionStorage.setItem('location', state)
        sessionStorage.setItem('city_state', location) // added after

        if (location.length > 20) {
          location = limit(location, 20).concat('...')
        }
        inputLocation.value = location
        sessionStorage.setItem('location_2', location)
        if (inputLocation.value != '') {
          modalLocation.classList.remove('show')
          const clearBtn = inputLocation.parentElement.querySelector('i:nth-child(2)')
          clearBtn.style.display = 'block'
          clearBtn.addEventListener('click', () => {
            inputLocation.value = ''
            inputLocation_2.value = ''

            clearBtn.style.display = 'none'
          })
        }
      }
    })
    // for services
    btn.addEventListener('click', () => {
      let checkedList = [...new Set()]
      let values = []

      services.forEach((service) => {
        if (service.checked) {
          checkedList.push(service.value)
          values = checkedList.join(', ')
          console.log(values)
        }
      })
      modalServices.classList.remove('show')
      if (values != '') {
        inputServices_2.value = values
        sessionStorage.setItem('services', values)
        if (values.length > 25) {
          values = limit(values, 25).concat('...')
          // console.log(values)
        }
        inputServices.value = values
        sessionStorage.setItem('services_2', values)
        const clearBtn = inputServices.parentElement.querySelector('i:nth-child(2)')
        clearBtn.style.display = 'block'
        clearBtn.addEventListener('click', () => {
          inputServices.value = ''
          inputServices_2.value = ''

          clearBtn.style.display = 'none'
          services.forEach((service) => {
            if (service.checked) {
              service.checked = false
            }
          })
        })
      } else {
        inputServices.value = ''
      }
    })
  }
  modalServices.querySelector('.close').addEventListener('click', () => {
    modalServices.classList.remove('show')
  })

  modalLocation.querySelector('.close').addEventListener('click', () => {
    modalLocation.classList.remove('show')
  })
  modalAlert.querySelector('.close').addEventListener('click', () => {
    modalAlert.classList.remove('show')
  })

  //for check or services box modal

  let serviceValues = sessionStorage.getItem('services')
  if (serviceValues !== null && serviceValues) {
    serviceValues = serviceValues.split(',') // convert to array

    serviceValues = serviceValues.map((element) => {
      return element.trim()
    })

    services.forEach((checkbox) => {
      if (serviceValues.includes(checkbox.value)) {
        checkbox.checked = true
      }
      // console.log(checkbox)
    })
  }

  /************************************* for card form ***************************/

  const destinationBtn = document.querySelector('#destination-btn')
  const alertContainer = document.querySelector('.alert-section-cart')
  const alertText = document.querySelector('.alert-section-cart p')
  const alertbutton = document.querySelector('.alert-section-cart button')
  const successMssg = document.querySelector('.success-cart-message')
  // console.log(alertText)

  if (destinationBtn || successMssg) {
    // console.log('okooooo')
    let user_id = cartContainer.dataset.user_id
    let chosenLocation = sessionStorage.getItem('location')

    if (
      sessionStorage.getItem('location') &&
      sessionStorage.getItem('location') !== '' &&
      sessionStorage.getItem('city_state')
    ) {
      infoLocationCart.classList.remove('empty')
      infoLocationCart.innerHTML = `<p>${sessionStorage.getItem('city_state')}</p>`
    } else {
      infoLocationCart.classList.add('empty')
      infoLocationCart.innerHTML = `<p>please add your address</p>`
    }

    if (destinationBtn) {
      destinationBtn.addEventListener('click', (e) => {
        e.preventDefault()
        modalLocation.classList.add('show')
        suggestionsSearchLocation()
      })
    }

    const checkLocation = async (chosenLocation, user_id, _slashes) => {
      console.log(chosenLocation)
      if (window.location.toString().includes('cart')) {
        slashes = '../../../'
      } else {
        slashes = '../'
      }
      let data = await fetch(
        `${slashes}ajax/cart.php?chosenLocation=${chosenLocation}&user_id=${user_id}`,
        {
          method: 'GET',
        }
      )

      let response = await data.text()

      console.log(response)
      // console.log(response)
      if (response === 'false') {
        console.log('not in your city bro !!!')
        sessionStorage.setItem('checkLocation', 'false')
      } else {
        sessionStorage.setItem('checkLocation', 'true')
      }
      if (
        sessionStorage.getItem('checkLocation') === 'false' &&
        chosenLocation !== null
      ) {
        let height = alertContainer.offsetHeight
        alertContainer.style.display = 'block'
        alertText.innerHTML = `This stylist does not work at <strong>${chosenLocation}</strong>`
        alertbutton.value = `find a hairdresser at ${chosenLocation}`
        window.scrollTo(height, 0)
      } else {
        alertContainer.style.display = 'none'
      }
    }

    checkLocation(chosenLocation, user_id, slashes)

    locationList.addEventListener('click', async (e) => {
      if (e.target.hasAttribute('data-location')) {
        let location = e.target.dataset.state
        let city_state = e.target.dataset.location

        if (infoLocationCart) {
          sessionStorage.setItem('location', location)
          sessionStorage.setItem('location_2', limit(city_state, 20).concat('...')) // manologue
          sessionStorage.setItem('city_state', city_state) // added after
          infoLocationCart.innerHTML = `<p>${city_state}</p>`
          // console.log(infoLocationCart)
          modalLocation.classList.remove('show')
          checkLocation(location, user_id)
        }
      }
    })
  }
  // on submit cart in stylist page
  if (cartForm) {
    // console.log(cartContainer.dataset.services_count)

    const modalTextContainer = document.querySelector('#modal-danger .content')
    const modalHeader = document.querySelector('#modal-danger header span')
    const closeBtn = document.querySelector('#modal-danger .close')
    console.log(sessionStorage.getItem('checkLocation'))
    console.log(cartContainer.dataset.services_count)
    cartForm.addEventListener('submit', (e) => {
      e.preventDefault()
      // ceheck if location and services are filled

      if (
        sessionStorage.getItem('location') &&
        sessionStorage.getItem('location') !== '' &&
        cartContainer.dataset.services_count > 0
      ) {
        //  if location and services are filled check if location corresponds to the user location

        if (sessionStorage.getItem('checkLocation') === 'false') {
          modalAlert.style.display = 'block'

          modalTextContainer.innerHTML = `<p>
          This hairdresser is not in the submitted location,
          be sure to look for another hairdresser who is at this address or change location
          </p>`
          console.log('ok')
          return
        }

        cartForm.submit()
      } else {
        // if location or services are not filled
        modalAlert.style.display = 'block'
        if (cartContainer.dataset.services_count < 1) {
          modalHeader.innerHTML = `     
        <i class="fa-solid fa-circle-exclamation"></i> Services
          `
          modalTextContainer.innerHTML = `<p>
          please be sure to choose at least one service
          </p>`
          return
        }
        modalTextContainer.innerHTML = `<p>
        please enter your location
        so that we can put you in touch with the best hairdresser in your area
      </p>`
      }
    })
    closeBtn.addEventListener('click', (e) => {
      modalAlert.style.display = 'none'
    })
  }
}
