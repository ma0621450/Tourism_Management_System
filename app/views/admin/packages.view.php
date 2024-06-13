<?php
require ("app/views/partials/header.php"); ?>
<table class="table table-bordered  table-secondary table-striped " id="table">
    <thead class="">
        <tr>


            <th>Title</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($packages as $package) {
            ?>
            <td><?php echo $package['title'] ?></td>
            <td><?php echo $package['price'] ?></td>
            <td><button class="btn btn-danger">Delete</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
require ("app/views/partials/footer.php"); ?>