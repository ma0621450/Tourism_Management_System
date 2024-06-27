<?php
require ("app/views/partials/header.php"); ?>
<div class="d-flex justify-content-center ">
    <button class="m-1 btn btn-success" id="toggleTable1">Users</button>
    <button class="m-1 btn btn-success" id="toggleTable2">Travel Agencies</button>
</div>
<table class="table table-bordered  table-secondary table-striped " id="myTable">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach ($customers as $customer) {
            ?>
            <tr>
                <td><?php echo $customer['user_id'] ?></td>
                <td><?php echo $customer['username'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['phone_number'] ?></td>
                <td class="d-flex align-items-center"><a href="admin_bookings?user_id=<?php echo $customer['user_id'] ?>"
                        type="button" class="btn btn-primary mx-1 ">
                        View Bookings
                    </a>
                    <?php if (is_null($customer['deleted_at'])): ?>
                        <form class="block-form" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="user_id" value="<?php echo $customer['user_id'] ?>">
                            <button type="submit" class="btn btn-danger block-button">Block</button>
                        </form>
                    <?php else: ?>
                        <form class="unblock-form" method="post">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="user_id" value="<?php echo $customer['user_id'] ?>">
                            <button type="submit" class="btn btn-success unblock-button">Unblock</button>
                        </form>
                    <?php endif ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<table class="table table-bordered  table-secondary table-striped" id="myTable2">
    <thead>
        <tr>
            <th>User Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach ($agencies as $agency) {
            ?>
            <tr>
                <td><?php echo $agency['user_id'] ?></td>
                <td><?php echo $agency['username'] ?></td>
                <td><?php echo $agency['email'] ?></td>
                <td><?php echo $agency['phone_number'] ?></td>
                <td class="d-flex align-items-center"> <a href="admin_package?user_id=<?php echo $agency['user_id'] ?>"
                        type="button" class="btn btn-primary mx-2">
                        View Packages
                    </a>
                    <?php if (is_null($agency['deleted_at'])): ?>
                        <form class="block-form" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="user_id" value="<?php echo $agency['user_id'] ?>">
                            <button type="submit" class="btn btn-danger block-button">Block</button>
                        </form>
                    <?php else: ?>
                        <form method="post" class="unblock-form">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="user_id" value="<?php echo $agency['user_id'] ?>">
                            <button type="submit" class="btn btn-success unblock-button">Unblock</button>
                        </form>
                    <?php endif ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
require ("app/views/partials/footer.php"); ?>




<script src="public/js/admin/users.js"></script>