/******* services page */

const servicesPage = document.querySelector('.account-services-page')

if (servicesPage) {
  // deleteBtn = servicesPage.querySelector('.delete-service-btn')
  const deleteForms = servicesPage.querySelectorAll('.delete-form')

  deleteForms.forEach((form) => {
    form.addEventListener('submit', (e) => {
      // console.log('ok')
      e.preventDefault()
      const form = e.target

      const deleteBtn =
        form.parentElement.parentElement.parentElement.parentElement.querySelector(
          '.delete-service-btn'
        )
      deleteBtn.addEventListener('click', () => {
        form.submit()
      })
    })
  })
}

// const servicesPage = document.querySelector('.services-page')

// if (servicesPage) {
//   // deleteBtn = servicesPage.querySelector('.delete-service-btn')
//   deleteBtns = servicesPage.querySelectorAll('.delete-form-btn')

//   deleteBtns.forEach((btn) => {
//     btn.addEventListener('submit', (e) => {
//       e.preventDefault()
//       const btn = e.target
//       confirm('Are you sure you want to delete')
//     })
//   })
// }

/*****************************profile page */
const profilePage = document.querySelector('.profile-page')

if (profilePage) {
  const form = profilePage.querySelector('.form-profile')
  const fileInput = profilePage.querySelector('#profile-file')
  const closeIcon = profilePage.querySelector('.img-container-profile i')
  const image = profilePage.querySelector('#output')
  const filenameContainer = profilePage.querySelector('.filename-container')
  const alert = profilePage.querySelector('.profile-alert')
  // console.log(alert)

  fileInput.addEventListener('change', (e) => {
    image.style.display = 'block'
    image.src = URL.createObjectURL(e.target.files[0])
    let filename = getLastPathValue(e.target.files[0].name)
    console.log(filename)
    filenameContainer.textContent = filename
    closeIcon.style.display = 'block'
  })

  // closeIcon
  closeIcon.addEventListener('click', async () => {
    closeIcon.style.display = 'none'
    image.src = ''
    console.log(fileInput.value)
    fileInput.value = null
    // console.log(fileInput.files[0])
    image.style.display = 'none'
    filenameContainer.textContent = ''

    const data = await fetch(`../ajax/account/delete_profile_picture.php`, {
      method: 'GET',
    })
    const response = await data.text()
    console.log(response)
    if (response === 'true') {
      alert.classList.add('alert-success')
      alert.innerHTML = `picture removed successfully`
      setTimeout(() => {
        alert.classList.remove('alert-success')
        alert.innerHTML = ''
      }, 3000)
    }
  })

  function getLastPathValue(source) {
    source = source.replace(/^.*[\\\/]/, '')
    return source
  }

  window.addEventListener('DOMContentLoaded', () => {
    let image_file_name = getLastPathValue(image.src)
    console.log(image_file_name)
    if (image_file_name !== '' && image_file_name !== 'empty-profile.png') {
      closeIcon.style.display = 'block'
      filenameContainer.textContent = image_file_name
    } else {
      image.style.display = 'none'
      closeIcon.style.display = 'none'
    }
  })
}

/************day_time */

const day_time_page = document.querySelector('.day-time-page')
// console.log(day_time_page)

if (day_time_page) {
  const range1 = day_time_page.querySelector('#range_1')
  const range2 = day_time_page.querySelector('#range_2')
  const result = day_time_page.querySelector('#result')

  result.value = range1.value

  range1.addEventListener('change', (e) => {
    let value = e.target.value

    if (value == range2.value) {
      result.value = value
    } else {
      result.value = `${value}-${range2.value}`
    }
  })

  range2.addEventListener('change', (e) => {
    let value = e.target.value
    if (value == range1.value) {
      result.value = value
    } else {
      result.value = `${range1.value}-${value}`
    }
  })
}

/** service location page*/
import suggestions from '../../../js/components/suggestionsLocation.js'

const serviceLocationPage = document.querySelector('.service-location-page')
if (serviceLocationPage) {
  const locationList = serviceLocationPage.querySelector('.list-group')
  const form = serviceLocationPage.querySelector('.service_location_form')
  const locationInput = serviceLocationPage.querySelector('form #city_of_work')
  const cityInput = serviceLocationPage.querySelector('form #city')
  const stateInput = serviceLocationPage.querySelector('form #state')

  const submitBtn = serviceLocationPage.querySelector('.service-location-btn')

  form.addEventListener('submit', (e) => {
    e.preventDefault()
  })

  locationInput.addEventListener('keyup', async (e) => {
    let value = e.target.value
    submitBtn.style.display = 'none'
    if (value !== '') {
      let results = await suggestions(value, '../')
      // console.log(results)
      let list = []
      if (results.length > 0) {
        results
          .map((result) => {
            let { name, state } = result
            list += `
            <li data-location="${name} ${state}" data-city="${name}" data-state="${state}" class="list-group-item"><i class="uil-location-point"></i>${name} ${state}</li>
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
          <p class="error text-danger">
          We couldn't find any matches. Try checking the spelling and search
          again.
        </p>
              `
      }
    } else {
      locationList.innerHTML = ''
    }
  })

  locationList.addEventListener('click', (e) => {
    if (e.target.hasAttribute('data-location')) {
      let location = e.target.dataset.location
      let city = e.target.dataset.city
      let state = e.target.dataset.state

      locationInput.value = location
      cityInput.value = city
      stateInput.value = state

      submitBtn.style.display = 'block'

      locationList.innerHTML = ''
    }
  })
  // Aachen North Rhine-Westphali

  submitBtn.addEventListener('click', () => {
    form.submit()
  })
}
const notifContainer = document.querySelector('.dropdown-menu .notif-items')
const clearNotifBtn = document.querySelector('.clear-notif-btn')
const notifAlert = document.querySelector('.notif-alert')
const notificationBell = document.querySelector('.notif-container-list .nav-link > i')

async function load_notifications() {
  const data = await fetch(`../ajax/account/notifications.php?read=1`, {
    method: 'GET',
  })
  const response = await data.text()
  if (response == '') {
    clearNotifBtn.style.display = 'none'
  }
  notifContainer.innerHTML = response

  const data2 = await fetch(`../ajax/account/notifications.php?check_status=1`, {
    method: 'GET',
  })
  const response2 = await data2.text()
  if (response2 == 'true') {
    notifAlert.style.display = 'block'
  } else {
    notifAlert.style.display = 'none'
  }

  clearNotifBtn.addEventListener('click', async () => {
    notifContainer.innerHTML = ''
    clearNotifBtn.style.display = 'none'

    const data = await fetch(`../ajax/account/notifications.php?delete=1`, {
      method: 'GET',
    })
    const response = await data.text()
    console.log(response)
  })

  notificationBell.addEventListener('click', async () => {
    const data = await fetch(`../ajax/account/notifications.php?set_status=1`, {
      method: 'GET',
    })
    const response = await data.text()
    notifAlert.style.display = 'none'
  })
}
load_notifications()

setInterval(function () {
  load_notifications()
}, 5000)
