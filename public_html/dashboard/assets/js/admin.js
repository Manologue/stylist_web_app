/***************************************   categoriesPage ***********/
const categoriesPage = document.querySelector('.categories-page')

if (categoriesPage) {
  const forms = categoriesPage.querySelectorAll('.category-delete-form')
  const infoAlertButton = categoriesPage.querySelector('#info-alert-modal .btn-danger')
  const alert = categoriesPage.querySelector('.categories-alert')

  if (forms) {
    forms.forEach((form) => {
      form.addEventListener('submit', async (e) => {
        // console.log(form.action)
        e.preventDefault()

        const formData = new FormData(form)
        const categoryId = formData.get('category_id')
        formData.append('delete_category', 1)
        infoAlertButton.addEventListener('click', async () => {
          const data = await fetch(`../ajax/admin/delete_category.php`, {
            method: 'POST',
            body: formData,
          })
          const response = await data.text()
          console.log(response)

          // scroll to the top of window
          window.scrollTo(0, 0)
          if (response == 'true') {
            alert.classList.add('alert-success')
            alert.innerHTML = `category ${categoryId} removed successfully`
            const parent =
              form.parentElement.parentElement.parentElement.parentElement.parentElement
            // remove parent
            parent.remove()
            // console.log(parent)
            setTimeout(() => {
              alert.classList.remove('alert-success')
              alert.innerHTML = ''
            }, 3000)
          } else {
            alert.classList.add('alert-danger')
            alert.innerHTML = `category ${categoryId} cannot be removed surely because it is already used in another table`
            setTimeout(() => {
              alert.classList.remove('alert-danger')
              alert.innerHTML = ''
            }, 5000)
          }
        })
      })
    })
  }
}

/***************************************************  categoryPage ***********/

const categoryPage = document.querySelector('.category-page')

if (categoryPage) {
  const form = categoryPage.querySelector('.form-category')
  const fileInput = categoryPage.querySelector('#category-file')
  const closeIcon = categoryPage.querySelector('.img-container-category i')
  const image = categoryPage.querySelector('#output')
  const filenameContainer = categoryPage.querySelector('.filename-container')
  const alert = categoryPage.querySelector('.category-alert')
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
    if (confirm('Are you sure you to delete this file?') == true) {
      closeIcon.style.display = 'none'
      image.src = ''
      fileInput.value = null
      // console.log(fileInput.files[0])
      image.style.display = 'none'
      filenameContainer.textContent = ''
      let id = getLastPathValue(form.action)
      console.log(id)
      if (id !== '') {
        const data = await fetch(
          `../../ajax/admin/delete_image_category.php?delete=${id}`,
          {
            method: 'GET',
          }
        )
        const response = await data.text()
        if (response === 'true') {
          alert.classList.add('alert-success')
          alert.innerHTML = `picture removed successfully`
          setTimeout(() => {
            alert.classList.remove('alert-success')
            alert.innerHTML = ''
          }, 3000)
        }
      }
    }
  })

  function getLastPathValue(source) {
    source = source.replace(/^.*[\\\/]/, '')
    return source
  }
  // let hiddenInput = categoryPage.querySelector('#hiddenInput')

  // form.addEventListener('submit', function (e) {
  //   // e.preventDefault()
  //   hiddenInput.value = categoryPage.querySelector('#snow-editor').innerHTML
  // })

  window.addEventListener('DOMContentLoaded', () => {
    let image_file_name = getLastPathValue(image.src)
    console.log(image_file_name)
    if (image_file_name !== '' && image_file_name !== 'blank.png') {
      closeIcon.style.display = 'block'
      filenameContainer.textContent = image_file_name
    } else {
      image.style.display = 'none'
      closeIcon.style.display = 'none'
    }
  })
}

/********************************************** services page */
const servicesPage = document.querySelector('.services-page')

if (servicesPage) {
  const addForm = document.querySelector('#add-modal form')
  const editForm = document.querySelector('#edit-modal form')
  const showAlert = document.querySelector('.services-alert')

  const editModal = new bootstrap.Modal(document.getElementById('edit-modal'))
  const addModal = new bootstrap.Modal(document.getElementById('add-modal'))

  const tableBody = servicesPage.querySelector('.services-table tbody')
  const category_id = tableBody.dataset.category_id
  console.log(category_id)
  const fetchAllServices = async () => {
    const data = await fetch(`../../ajax/admin/action_services.php?read=${category_id}`, {
      method: 'GET',
    })
    const response = await data.text()
    // console.log(response)
    tableBody.innerHTML = response
  }

  fetchAllServices()

  addForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    const formData = new FormData(addForm)
    formData.append('add', category_id)
    if (addForm.checkValidity() === false) {
      e.preventDefault()
      e.stopPropagation()
      addForm.classList.add('was-validated')
      return false
    } else {
      // console.log('good')
      servicesPage.querySelector('form #add-btn').innerHTML = 'please wait..'

      const data = await fetch('../../ajax/admin/action_services.php', {
        method: 'POST',
        body: formData,
      })
      const response = await data.text()
      console.log(response)
      showAlert.innerHTML = response
      setTimeout(() => {
        showAlert.innerHTML = ''
      }, 3000)
      servicesPage.querySelector('form #add-btn').innerHTML = 'Add User'
      addForm.reset()
      addForm.classList.remove('was-validated')
      addModal.hide()
      fetchAllServices()
    }
  })

  //Edit user
  tableBody.addEventListener('click', (e) => {
    if (e.target && e.target.matches('i.uil-edit')) {
      e.preventDefault()
      let id = e.target.parentElement.getAttribute('id')
      console.log(id)
      editUser(id)
    }
  })

  const editUser = async (id) => {
    const data = await fetch(`../../ajax/admin/action_services.php?edit=${id}`, {
      method: 'GET',
    })
    const response = await data.json()
    // console.log(response)
    editForm.querySelector('#id').value = response.id
    editForm.querySelector('#title').value = response.title
    editForm.querySelector('#price').value = response.price
    editForm.querySelector('#description').value = response.description
  }

  editForm.addEventListener('submit', async (e) => {
    e.preventDefault()
    const formData = new FormData(editForm)
    formData.append('update', 1)

    if (editForm.checkValidity() === false) {
      e.preventDefault()
      e.stopPropagation()
      editForm.classList.add('was-validated')
      return false
    } else {
      servicesPage.querySelector('form #edit-btn').innerHTML = 'please wait..'

      const data = await fetch('../../ajax/admin/action_services.php', {
        method: 'POST',
        body: formData,
      })
      const response = await data.text()
      console.log(response)
      showAlert.innerHTML = response
      setTimeout(() => {
        showAlert.innerHTML = ''
      }, 3000)
      servicesPage.querySelector('form #edit-btn').innerHTML = 'Update Service'
      editForm.reset()
      editForm.classList.remove('was-validated')
      editModal.hide()
      fetchAllServices()
    }
  })

  tableBody.addEventListener('click', (e) => {
    if (e.target && e.target.matches('i.mdi.mdi-delete')) {
      e.preventDefault()
      let id = e.target.parentElement.getAttribute('id')
      // console.log(id)
      deleteService(id)
    }
  })

  const deleteService = async (id) => {
    const data = await fetch(`../../ajax/admin/action_services.php?delete=${id}`, {
      method: 'GET',
    })
    const response = await data.text()
    showAlert.innerHTML = response
    setTimeout(() => {
      showAlert.innerHTML = ''
    }, 3000)
    fetchAllServices()
  }
}

/*******************users page *****/
const usersPage = document.querySelector('.users-page')

if (usersPage) {
  const tableBody = usersPage.querySelector('.users-table tbody')
  const editForm = document.querySelector('#edit-modal form')
  const showAlert = document.querySelector('.services-alert')

  const editModal = new bootstrap.Modal(document.getElementById('edit-modal'))

  usersPage.addEventListener('click', async (e) => {
    if (e.target && e.target.matches('a.edit-btn')) {
      e.preventDefault()
      let id = e.target.dataset.id
      console.log(id)

      const data = await fetch(`../ajax/admin/action_users.php?edit=${id}`, {
        method: 'GET',
      })

      const response = await data.json()
      console.log(response)

      editForm.querySelector('#id').value = response.id
      editForm.querySelector('#role').value = response.role
      if (response.published == 1) {
        editForm.querySelector('#published').checked = true
        editForm.querySelector('#published').value = 1
      } else {
        editForm.querySelector('#published').checked = false
      }
      // editForm.querySelector('#description').value = response.description
    }
  })
}

const notifContainer = document.querySelector('.dropdown-menu .notif-items')
const clearNotifBtn = document.querySelector('.clear-notif-btn')
const notifAlert = document.querySelector('.notif-alert')
const notificationBell = document.querySelector('.notif-container-list .nav-link > i')

async function load_notifications() {
  // an error in category page edit category the link needs to start with ../../ for it to work
  const data = await fetch(`../ajax/admin/notifications.php?read=1`, {
    method: 'GET',
  })
  const response = await data.text()
  console.log(response)
  if (response == '') {
    clearNotifBtn.style.display = 'none'
  }
  notifContainer.innerHTML = response

  const data2 = await fetch(`../ajax/admin/notifications.php?check_status=1`, {
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

    const data = await fetch(`../ajax/admin/notifications.php?delete=1`, {
      method: 'GET',
    })
    const response = await data.text()
    console.log(response)
  })

  notificationBell.addEventListener('click', async () => {
    const data = await fetch(`../ajax/admin/notifications.php?set_status=1`, {
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
