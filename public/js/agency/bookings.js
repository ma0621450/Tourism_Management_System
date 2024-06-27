function deleteAgencyBooking(event, bookingId) {
  event.preventDefault();

  if (!confirm("Are you sure you want to cancel this booking?")) {
    return;
  }

  $.ajax({
    type: "POST",
    url: "delete_agency_booking",
    data: { booking_id: bookingId },
    success: function (response) {
      if (response.success) {
        $("#booking-" + bookingId).remove();
        alert("Booking canceled successfully.");

        const bookingCountElement = $("#bookingCount");
        const currentBookingCount = parseInt(bookingCountElement.text());
        bookingCountElement.text(currentBookingCount - 1);

        const price = parseFloat(response.price);
        const totalRevenueElement = $("#totalRevenue");
        const currentTotalRevenue = parseFloat(
          totalRevenueElement.text().replace(/[^\d.-]/g, "")
        );
        const newTotalRevenue = currentTotalRevenue - price;
        totalRevenueElement.text(newTotalRevenue.toFixed(2));
      } else {
        alert("Failed to cancel booking: " + response.message);
      }
    },
    error: function () {
      alert("Request failed. Please try again later.");
    },
  });
}
