<?php require ("app/views/partials/header.php"); ?>

<div class="container">

    <div class="d-flex flex-column border border-2 w-50 m-auto pb-3">
        <h3 class="text-bg-success text-center p-2">Add Destination</h3>
        <form class="m-auto w-75 d-flex flex-column" action="" method="POST">
            <?php if (isset($errors['d_name'])): ?>
                <div class="alert alert-danger text-center fw-bold">
                    <p><?php echo htmlspecialchars($errors['d_name']); ?></p>
                </div>
            <?php endif; ?>
            <input class="form-control mb-3" type="text" name="d_name">
            <button class="btn btn-success w-50 p-2 m-auto" type="submit">Add</button>
        </form>
    </div>

    <div class="container mt-5">
        <h4>All Destinations</h4>
        <table id="destinationsTable" class="table table-bordered w-75">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Destination</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($destinations as $destination): ?>
                    <tr>
                        <td><?php echo $destination['destination_id']; ?></td>
                        <td><?php echo $destination['name']; ?></td>
                        <td>
                            <form method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="destination_id"
                                    value="<?php echo $destination['destination_id']; ?>">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require ("app/views/partials/footer.php"); ?>

<script src="public/js/admin/destinations.js"></script>