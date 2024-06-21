<?php require ("app/views/partials/header.php"); ?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Booking Id</th>
            <th scope="col">Title</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Price</th>
            <th scope="col">View</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr id="booking-<?php echo $booking['id']; ?>">
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo $booking['vacation_title']; ?></td>
                <td><?php echo $booking['start_date']; ?></td>
                <td><?php echo $booking['end_date']; ?></td>
                <td>$<?php echo $booking['price']; ?></td>
                <td><a href="package?vp_id=<?php echo $booking['vp_id']; ?>">View Package</a></td>
                <td>
                    <button class="btn btn-danger"
                        onclick="deleteBooking(event, <?php echo $booking['id']; ?>)">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    function deleteBooking(event, bookingId) {
        event.preventDefault();

        if (!confirm('Are you sure you want to delete this booking?')) {
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_booking', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    document.getElementById('booking-' + bookingId).remove();
                    alert('Booking deleted successfully.');
                } else {
                    alert('Failed to delete booking: ' + response.message);
                }
            } else {
                alert('Request failed. Status: ' + xhr.status);
            }
        };
        xhr.onerror = function () {
            alert('Request failed. Please try again later.');
        };
        xhr.send('booking_id=' + bookingId);
    }
</script>

<?php require ("app/views/partials/footer.php"); ?>