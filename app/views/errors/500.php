<?php
require_once ("app/views/partials/header.php");
require_once ("app/middleware/middleware.php");

?>

<div class="d-flex flex-column align-items-center">
    <h1 class="fw-bolder">500 Internal Server Error</h1>
    <p>Something went wrong on the server. We apologize for the inconvenience.</p>
    <p><a href="<?php echo getUserHomeRoute() ?>">Back to Home</a></p>
</div>

<?php
require_once ("app/views/partials/footer.php");