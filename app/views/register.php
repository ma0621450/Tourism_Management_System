<?php require ("partials/header.php");
?>

<form class="w-25 d-flex flex-column m-auto border border-1 mt-5 p-3 rounded" id="regForm">
    <div id="errorContainer" class="alert alert-danger" style="display:none;"></div>
    <div class="form-group mb-3">
        <label for="email">Username:</label>
        <input type="text" class="form-control" id="username" name="username"
            value="<?php echo htmlspecialchars($input['username'] ?? '', ENT_QUOTES); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email"
            value="<?php echo htmlspecialchars($input['email'] ?? '', ENT_QUOTES); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="password"
            value="<?php echo htmlspecialchars($input['password'] ?? '', ENT_QUOTES); ?>">
    </div>
    <div class="form-group mb-3">
        <label for="pwd">Phone Number:</label>
        <input class="form-control" id="phone_number" name="phone_number"
            value="<?php echo htmlspecialchars($input['phone_number'] ?? '', ENT_QUOTES); ?>">
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


<script>
    $(document).ready(function () {
        $('#regForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this).serialize();

            $.ajax({
                url: "register",
                method: 'post',
                data: form,
                dataType: 'json',
                success: function (response) {
                    if (response.success) {
                        window.location.href = response.redirect;
                    } else {
                        $('#errorContainer').html('');
                        for (let error in response.errors) {
                            $('#errorContainer').append('<p>' + response.errors[error] + '</p>');
                        }
                        $('#errorContainer').show();
                    }
                },
                error: function () {
                    $('#errorContainer').html('<p>An unexpected error occurred. Please try again.</p>').show();
                }
            });
        });
    });
</script>