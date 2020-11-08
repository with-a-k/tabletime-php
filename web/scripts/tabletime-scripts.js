function bookAvailiability(user, event_id) {
  let user_id = user;
  let event_id = event_id;
  let event_type;
  $('input#booking-form-date');
  $('input#booking-form-time');
  $('input#day_of_week');
  $('input#hour_of_day');
  $('input#duration');
  $.ajax({
    url: "/book.php",
    method: "POST",
    data: {
      eventType: eventType
    },
    success: function( result ) {
      
    }
  });
}

function refreshBookings() {

}
