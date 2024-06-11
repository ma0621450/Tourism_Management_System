<?php require ("partials/header.php");
?>

<form method="POST" class="w-25 d-flex flex-column m-auto border border-1 mt-5 p-3 rounded">
    <div class="form-group mb-3">
        <label for="email">Username:</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="form-group mb-3">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group mb-3">
        <label for="pwd">Phone Number:</label>
        <input class="form-control" id="phone_number" name="phone_number">
    </div>
    <div class="input-group mb-3">
        <select style="width:100%; padding:4px" class="" name="role_id" id="">
            <option>Please select your type</option>
            <option value="2">Travel Agency</option>
            <option value="3">Traveler</option>
        </select>

    </div>
    <button type="submit" class="btn btn-info w-75 m-auto mt-3">Submit</button>
</form>




<?php require ("partials/footer.php");
?>