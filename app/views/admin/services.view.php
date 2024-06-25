<?php require ("app/views/partials/header.php");
?>

<div class="container">

    <div class="d-flex flex-column border border-2 w-50 m-auto pb-3">
        <h3 class="text-bg-success text-center p-2">Add Service</h3>
        <form class="m-auto w-75 d-flex flex-column" method="POST" action="">
            <input class="form-control mb-3" type="text" name="s_desc">
            <button class="btn btn-success w-50 p-2 m-auto">Add</button>
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
            <?php foreach ($services as $service): ?>
                <tbody>
                    <tr>
                        <td><?php echo $service['service_id'] ?></td>
                        <td><?php echo $service['description'] ?></td>
                        <td><button class="btn btn-danger">Delete</button></td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<?php require ("app/views/partials/footer.php"); ?>



<script>
    $(document).ready(function () {
        $('#servicesTable').DataTable();
    })
</script>