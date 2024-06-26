<?php require_once ("app/views/partials/header.php"); ?>



<table class="table table-bordered  table-secondary table-striped">
    <thead>
        <tr>
            <th>Package Title</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($bookings as $booking) {
            ?>
            <td><?php echo $booking['title'] ?></td>
            <td><?php echo $booking['start_date'] ?></td>
            <td><?php echo $booking['end_date'] ?></td>
            <td>$<?php echo $booking['price'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>




<?php require_once ("app/views/partials/footer.php"); ?>