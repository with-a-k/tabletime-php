function bookAvailability(user_id, event_id, username) {
  let date = $('input#booking-form-date').val();
  let time = $('input#booking-form-time').val();
  let dow = $('input#day_of_week').val();
  let hod = $('input#hour_of_day').val();
  let duration = $('input#booking-form-duration').val();
  let event_type = (date == undefined ? "recurring" : "one-time");
  let dataObj;
  switch (event_type) {
    case "recurring":
      dataObj = {
        event_type: event_type,
        user_id: user_id,
        event_id: event_id,
        day_of_week: day_of_week,
        hour_of_day: hour_of_day,
        duration: duration
      }
      break;
    case "one-time":
      console.log(date);
      console.log(time);
      date_time = new Date(date + " " + time).toISOString();
      //date_time_string = "YYYY-MM-DD HH:mm:ss+TZ"
      date_time_string = (Date.getFullYear()).toString() + "-" +
        (Date.getMonth()+1).toString() + "-" +
        (Date.getDate()+1).toString() + "- " +
        (Date.getHours()+1).toString() + ":" +
        (Date.getMinutes()+1).toString() + ":" +
        (Date.getSeconds()+1).toString() + "+00";
      dataObj = {
        event_type: event_type,
        user_id: user_id,
        event_id: event_id,
        date_time: date_time,
        duration: duration
      }
      break;
    default:
      return;
  }
  $.ajax({
    url: "/book.php",
    method: "POST",
    data: dataObj,
    success: function( result ) {
      //Write the new booking into the page
      let availability_line =
        (date == undefined ? "<p>Available on " + dow + " at " + hod + " for " + duration + "</p>" :
        "<p>Available at " + date_time + " for " + duration + "</p>");
      let newBooking = '<li class="booking"><h5>' + username + '</h5>' + availability_line + '</li>';
      $('ul.attendees').append(newBooking);
      alert('Successfully added.');
    }
  });
}
