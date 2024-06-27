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
                    <button class="btn btn-danger delete-booking"
                        data-booking-id="<?php echo $booking['id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endforeach; ?>
        <?php if (empty($bookings)): ?>
            <h1>No Bookings</h1>
        <?php endif ?>
    </tbody>
</table>

<?php require ("app/views/partials/footer.php"); ?>

<script src="public/js/customer/bookings.js"></script>