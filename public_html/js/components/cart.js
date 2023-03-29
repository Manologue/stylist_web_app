const addForms = document.querySelectorAll('#add-service-form')
const cartForm = document.querySelector('.cart form')
const modalSuccess = document.querySelector('#modal-success')
const cartContainer = document.querySelector('.services-container')
const totalContainer = document.querySelector('.total-cart-amount')
const alertContainer = document.querySelector('.alert-section-cart')

let continuation_of_cart_process = 'false' // remove delete icon in cart if true
let slashes
if (window.location.toString().includes('cart')) {
  continuation_of_cart_process = 'true'
  slashes = '../../../'
} else {
  slashes = '../'
}

if (cartContainer) {
  // fetch cart items function
  const userId = cartContainer.dataset.user_id
  const fetchAllCartItems = async () => {
    const data = await fetch(
      `${slashes}ajax/cart.php?read=${userId}&continuation_of_cart_process=${continuation_of_cart_process}`,
      {
        method: 'GET',
      }
    )
    const response = await data.text()
    cartContainer.innerHTML = response
    // console.log(response)
  }
  const fechtTotalPrice = async () => {
    const data = await fetch(`${slashes}ajax/cart.php?readTotalPrice=${userId}`, {
      method: 'GET',
    })
    const response = await data.text()
    totalContainer.innerHTML = response
    // console.log(response)
  }

  fechtTotalPrice()
  fetchAllCartItems()

  if (addForms) {
    //add to cart
    addForms.forEach((addForm) => {
      addForm.addEventListener('submit', async (e) => {
        e.preventDefault()
        // console.log('submit')

        const formData = new FormData(addForm)

        formData.append('add', 1) //at post add value 1

        let data = await fetch(`${slashes}ajax/cart.php`, {
          method: 'POST',
          body: formData,
        })

        let response = await data.text()
        modalSuccess.style.display = 'block'
        modalSuccess.innerHTML = response
        console.log(response)
        setTimeout(() => {
          modalSuccess.style.display = 'none'
        }, 1000)
        cartContainer.dataset.services_count++
        fechtTotalPrice()
        fetchAllCartItems()
      })
    })
  }
  cartContainer.addEventListener('click', (e) => {
    if (e.target && e.target.matches('.services-cart .price > i')) {
      // deleteUser(id)
      let service_id = e.target.parentElement.parentElement.dataset.service_id
      let user_id = e.target.parentElement.parentElement.dataset.user_id
      // console.log(user_id, service_id)
      deleteCartItem(user_id, service_id)
    }
  })

  const deleteCartItem = async (user_id, service_id) => {
    let data = await fetch(`${slashes}ajax/cart.php`, {
      method: 'POST',
      body: JSON.stringify({
        delete: 'delete',
        service_id: service_id,
        user_id: user_id,
      }),
    })
    let response = await data.text()
    modalSuccess.style.display = 'block'
    modalSuccess.innerHTML = response
    // console.log(response)
    setTimeout(() => {
      modalSuccess.style.display = 'none'
    }, 1000)

    cartContainer.dataset.services_count--
    fechtTotalPrice()
    fetchAllCartItems()
  }

  // on submit form in alert cart container
  const alertCartForm = alertContainer.querySelector('form')
  const inputLocaionAlert = alertContainer.querySelector('.location') // the input location for alert cart ahen you enter a wrong location
  // console.log(alertCartForm)
  alertCartForm.addEventListener('submit', (e) => {
    e.preventDefault()
    console.log(inputLocaionAlert)
    inputLocaionAlert.value = sessionStorage.getItem('location')
    console.log(inputLocaionAlert.value)

    sessionStorage.removeItem('services')
    sessionStorage.removeItem('date')

    alertCartForm.submit()
  })
}
