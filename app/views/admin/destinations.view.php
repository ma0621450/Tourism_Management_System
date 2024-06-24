<?php require ("app/views/partials/header.php"); ?>

<div class="container">

    <div class="d-flex flex-column border border-2 w-50 m-auto pb-3">
        <h3 class="text-bg-success text-center p-2">Add Destination</h3>
        <form class="m-auto w-75 d-flex flex-column" action="">
            <input class="form-control mb-3" type="text">
            <button class="btn btn-success w-50 p-2 m-auto">Add</button>
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
                <tr>
                    <td>1</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
                <tr>
                    <td>3</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
                <tr>
                    <td>4</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
                <tr>
                    <td>5</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
                <tr>
                    <td>6</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
                <tr>
                    <td>7</td>
                    <td>Lorem Ipsum</td>
                    <td><button class="btn btn-danger">Delete</button></td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require ("app/views/partials/footer.php"); ?>



<script>
    $(document).ready(function () {
        $('#destinationsTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "columnDefs": [
                { "width": "10%", "targets": 0 },
                { "width": "80%", "targets": 1 },
                { "width": "10%", "targets": 2 }
            ],
            "autoWidth": false
        });
    });
</script>