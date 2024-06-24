<?php require ("app/views/partials/header.php"); ?>
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
            <h3>No Bookings</h3>
        <?php endif ?>
    </tbody>
</table>

<script>
    function deleteAgencyBooking(event, bookingId) {
        event.preventDefault();

        if (!confirm('Are you sure you want to cancel this booking?')) {
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_agency_booking', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            try {
                const response = JSON.parse(xhr.responseText);
                if (xhr.status === 200) {
                    if (response.success) {
                        document.getElementById('booking-' + bookingId).remove();
                        alert('Booking canceled successfully.');
                    } else {
                        alert('Failed to cancel booking: ' + response.message);
                    }
                } else {
                    alert('Request failed. Status: ' + xhr.status);
                }
            } catch (e) {
                console.error('Error parsing JSON response:', xhr.responseText);
                alert('Request failed. Response was not valid JSON.');
            }
        };
        xhr.onerror = function () {
            alert('Request failed. Please try again later.');
        };
        xhr.send('booking_id=' + bookingId);
    }

</script>

<?php require ("app/views/partials/footer.php"); ?>