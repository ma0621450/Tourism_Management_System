<?php require ("app/views/partials/header.php");
$totalRevenue = 0;
foreach ($bookings as $booking) {
    $totalRevenue += $booking['price'];
}
?>

<div class="container mt-5">
    <table class="table table-bordered table-secondary table-striped">
        <thead>
            <tr class="text-center">
                <th scope="col">Booking Id</th>
                <th scope="col">Title</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Price</th>
                <th col="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
                <tr class="text-center" id="booking-<?php echo $booking['id']; ?>">
                    <td><?php echo $booking['id']; ?></td>
                    <td><?php echo $booking['title']; ?></td>
                    <td><?php echo $booking['start_date']; ?></td>
                    <td><?php echo $booking['end_date']; ?></td>
                    <td>$<?php echo $booking['price']; ?></td>
                    <td><button class="btn btn-danger"
                            onclick="deleteAgencyBooking(event, <?php echo $booking['id']; ?>)">Cancel</button></td>
                </tr>
            <?php endforeach; ?>
            <?php if (empty($bookings)): ?>
                <tr>
                    <td colspan="6" class="text-center">
                        <h3>No Bookings</h3>
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>

<div class="sticky-bottom bg-light py-3">
    <div class="container text-center">
        <div class="row">
            <div class="col">
                <h5>Number of Bookings: <span id="bookingCount"><?php echo count($bookings); ?></span></h5>
            </div>
            <div class="col">
                <h5>Total Revenue: $<span id="totalRevenue"><?php echo number_format($totalRevenue, 2); ?></span></h5>
            </div>
        </div>
    </div>
</div>

<?php require ("app/views/partials/footer.php"); ?>


<script>

    function deleteAgencyBooking(event, bookingId) {
        event.preventDefault();

        if (!confirm('Are you sure you want to cancel this booking?')) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: 'delete_agency_booking',
            data: { booking_id: bookingId },
            success: function (response) {
                if (response.success) {
                    $('#booking-' + bookingId).remove();
                    alert('Booking canceled successfully.');

                    const bookingCountElement = $('#bookingCount');
                    const currentBookingCount = parseInt(bookingCountElement.text());
                    bookingCountElement.text(currentBookingCount - 1);

                    const price = parseFloat(response.price);
                    const totalRevenueElement = $('#totalRevenue');
                    const currentTotalRevenue = parseFloat(totalRevenueElement.text().replace(/[^\d.-]/g, ''));
                    const newTotalRevenue = currentTotalRevenue - price;
                    totalRevenueElement.text(newTotalRevenue.toFixed(2));

                } else {
                    alert('Failed to cancel booking: ' + response.message);
                }
            },
            error: function () {
                alert('Request failed. Please try again later.');
            }
        });
    }

</script>