<?php require ("app/views/partials/header.php"); ?>

<div class="container">

    <div class="d-flex flex-column border border-2 w-50 m-auto pb-3">
        <h3 class="text-bg-success text-center p-2">Add Service</h3>
        <form class="m-auto w-75 d-flex flex-column" method="POST" action="">

            <?php if (isset($errors['s_desc'])): ?>
                <div class="alert alert-danger text-center fw-bold">
                    <p><?php echo htmlspecialchars($errors['s_desc']); ?></p>
                </div>
            <?php endif; ?>
            <input class="form-control mb-3" type="text" name="s_desc" placeholder="Enter service description">
            <button class="btn btn-success w-50 p-2 m-auto" type="submit">Add</button>
        </form>
    </div>

    <div class="container mt-5">
        <h4>All Services</h4>
        <table id="servicesTable" class="table table-bordered w-75">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?php echo $service['service_id']; ?></td>
                        <td><?php echo $service['description']; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="service_id" value="<?php echo $service['service_id']; ?>">
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

<script>
    $(document).ready(function () {
        $('#servicesTable').DataTable({
            "columnDefs": [
                { "width": "10%", "targets": 0 },
                { "width": "80%", "targets": 1 },
                { "width": "10%", "targets": 2 }
            ],
            "autoWidth": false
        });
    });
</script>