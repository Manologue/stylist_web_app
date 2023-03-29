const date1 = new Date()
// We initialize a past date
// const date2 = new Date('2018-04-07 12:30:00');

const selectedDate = document.querySelector('#selected-date')
const selectedTime = document.querySelector('#selected-time')
const picker = document.querySelector('#picker')

const dangerAlert = document.querySelector('.modal-overlay#modal-danger')
const cartContainer = document.querySelector('.services-container')

const headerAlert = document.querySelector('.modal-overlay#modal-danger header > span')
const headerContent = document.querySelector('.modal-overlay#modal-danger .content')
const closeBtnAlert = document.querySelector('.modal-overlay#modal-danger .close')
const calendarForm = document.querySelector('.calendar-container form')
const modalSuccess = document.querySelector('#modal-success')

let slashes = ''

if (window.location.toString().includes('cart')) {
  slashes = '../../../'
} else {
  slashes = '../'
}
// if (selectedDate.value !== undefined && selectedTime.value !== undefined) {
//   console.log('you entered something my brother')
// } else {
//   console.log('empty my brother')
// }
if (picker && cartContainer) {
  picker.addEventListener('click', async (e) => {
    if (e.target && e.target.matches('#picker .myc-available-time')) {
      let time = e.target.dataset.time
      let date = e.target.dataset.date

      const date2 = new Date(`${date} ${time}:00`)

      // console.log(date2)

      if (date2 < date1) {
        // console.log('Ce temps est déjà obscellete veuillez choisir un autre.')
        dangerAlert.style.display = 'block'
        headerAlert.innerHTML = `<i class="fa-solid fa-circle-exclamation"></i> Expired`
        headerContent.innerHTML = `<p>
        This date is already obscured please choose another.
   </p>`
        return
      }
      let valid_date = `${date} ${time}`
      // console.log(valid_date)
      sessionStorage.setItem('valid_date', valid_date)
      let user_id = cartContainer.dataset.user_id

      let data = await fetch(
        `${slashes}ajax/date-time.php?valid_date_time=${valid_date}&id=${user_id}`,
        {
          method: 'GET',
        }
      )
      try {
        const response = await data.text()
        console.log(response)
        if (response === 'true') {
          console.log('good response')
          modalSuccess.style.display = 'block'
          calendarForm.submit()
        }
      } catch (error) {
        console.log(error)
      }
    }
  })

  closeBtnAlert.addEventListener('click', () => {
    dangerAlert.style.display = 'none'
    console.log('ok to close')
  })
}
