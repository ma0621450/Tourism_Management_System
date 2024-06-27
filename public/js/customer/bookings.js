$(document).ready(function () {
  $(".delete-booking").on("click", function (event) {
    event.preventDefault();

    if (!confirm("Are you sure you want to delete this booking?")) {
      return;
    }

    var bookingId = $(this).data("booking-id");

    $.ajax({
      type: "POST",
      url: "delete_booking",
      data: { booking_id: bookingId },
      success: function (response) {
        console.log("Response:", response);
        if (response.success) {
          $("#booking-" + bookingId).remove();
          alert("Booking deleted successfully.");
        } else {
          alert("Failed to delete booking: " + response.message);
        }
      },
      error: function () {
        alert("Request failed. Please try again later.");
      },
    });
  });
});
