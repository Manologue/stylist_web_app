const suggestions = async (value, slash) => {
  // console.log(value)
  let data = await fetch(`${slash}ajax/suggestions.php?search=${value}`, {
    method: 'GET',
  })
  let response = await data.json()

  return response
}

export default suggestions

// index ./
// search ../
// stylist ../
