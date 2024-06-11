<?php require ("partials/header.php"); ?>

<form method="POST" class="w-25 d-flex flex-column m-auto border border-1 mt-5 p-3 rounded">
    <div class="form-group mb-3">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <button type="submit" class="btn btn-info w-75 m-auto mt-3">Submit</button>
</form>


<?php require ("partials/footer.php");
// var_dump($_SESSION['$role_id'])
?>