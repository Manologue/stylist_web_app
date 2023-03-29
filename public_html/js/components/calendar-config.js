;(function ($) {
  let picker = document.querySelector('#picker')
  let array_list = []
  if (picker) {
    let serviceContainer = document.querySelector('.services-container')
    let stylistProilePageContainer = document.querySelector(
      '.stylist-profile-page-services'
    )

    let user_id
    let slash = '../../../'
    if (serviceContainer) {
      user_id = serviceContainer.dataset.user_id
    }
    if (stylistProilePageContainer) {
      user_id = stylistProilePageContainer.dataset.id
      slash = '../'
    }

    // console.log(user_id)
    $.ajax({
      type: 'GET',
      url: `${slash}ajax/date-time.php?user_id=${user_id}`,
      success: function (result) {
        console.log(result)
        array_list = $.parseJSON(result)

        $('#picker').markyourcalendar({
          availability: [
            array_list[0],
            array_list[1],
            array_list[2],
            array_list[3],
            array_list[4],
            array_list[5],
            array_list[6],
          ],
          startDate: new Date(),

          selectedDates: [],

          // onClick: function (ev, data) {
          //   // data is a list of datetimes
          //   var d = data[0].split(' ')[0]
          //   var t = data[0].split(' ')[1]
          //   $('#selected-date').html(d)
          //   $('#selected-time').html(t)
          // },
          onClickNavigator: function (ev, instance) {
            var arr = [
              [
                array_list[0],
                array_list[1],
                array_list[2],
                array_list[3],
                array_list[4],
                array_list[5],
                array_list[6],
              ],
            ]

            instance.setAvailability(arr[0])
          },
        })
      },
    })
  }
})(jQuery)
