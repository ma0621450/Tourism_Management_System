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


<script src="public/js/agency/bookings.js"></script>