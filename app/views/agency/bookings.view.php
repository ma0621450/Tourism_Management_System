<?php require ("app/views/partials/header.php"); ?>
<table class="table table-bordered  table-secondary table-striped">
    <thead>
        <tr>
            <th scope="col">Booking Id</th>
            <th scope="col">Title</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Price</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?php echo $booking['id']; ?></td>
                <td><?php echo $booking['title']; ?></td>
                <td><?php echo $booking['start_date']; ?></td>
                <td><?php echo $booking['end_date']; ?></td>
                <td>$<?php echo $booking['price']; ?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<?php require ("app/views/partials/footer.php"); ?>