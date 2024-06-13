<?php
require ("app/views/partials/header.php"); ?>
<button class="m-1 btn btn-info" id="toggleTable1">Users</button>
<button class="m-1 btn btn-info" id="toggleTable2">Travel Agencies</button>
<table class="table table-bordered  table-secondary table-striped " id="myTable">
    <caption class="text-center p-3">ALL CUSTOMERS</caption>
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer) {
            ?>
            <td><?php echo $customer['user_id'] ?></td>
            <td><?php echo $customer['username'] ?></td>
            <td><?php echo $customer['email'] ?></td>
            <td><?php echo $customer['phone_number'] ?></td>
            <td><a href="admin_bookings?user_id=<?php echo $customer['user_id'] ?>" type="button" class="btn btn-primary">
                    View Bookings
                </a><a href="" class="btn btn-danger">Delete</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<table class="table table-bordered  table-secondary table-striped" id="myTable2">
    <caption class="text-center p-3">ALL TRAVEL AGENCIES</caption>
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($agencies as $agency) {
            ?>
            <td><?php echo $agency['user_id'] ?></td>
            <td><?php echo $agency['username'] ?></td>
            <td><?php echo $agency['email'] ?></td>
            <td><?php echo $agency['phone_number'] ?></td>
            <td> <a href="admin_package?user_id=<?php echo $agency['user_id'] ?>" type="button" class="btn btn-primary">
                    View Packages
                </a>
                <a class="btn btn-danger">Delete</a>
            </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
require ("app/views/partials/footer.php"); ?>