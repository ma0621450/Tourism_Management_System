<?php require ("partials/header.php"); ?>
<div style="padding-top: 50px; padding-bottom: 50px;">

    <div class="d-flex flex-column border w-50 m-auto">
        <h1 class="text-bg-success text-center p-2">Login</h1>
        <form class="w-100 d-flex flex-column m-auto mt-2 p-3" id="loginForm">
            <div id="errorContainer" class="alert alert-danger" style="display:none;"></div>
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
            <button type="submit" class="btn btn-success p-2 w-75 m-auto mt-3">Submit</button>
        </form>
    </div>
</div>



<?php require ("partials/footer.php");
?>


<script>
    $(document).ready(function () {
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this).serialize();

            $.ajax({
                url: "login",
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