<?php
require ("app/views/partials/header.php"); ?>
<table class="table table-bordered  table-secondary table-striped " id="table">
    <thead class="">
        <tr>


            <th>Title</th>
            <th>Price</th>
            <th>Start Date</th>
            <th>End Date</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($packages as $package) {
            ?>
            <td><?php echo $package['title'] ?></td>
            <td><?php echo $package['price'] ?></td>
            <td><?php echo $package['start_date'] ?></td>
            <td><?php echo $package['end_date'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
require ("app/views/partials/footer.php"); ?>