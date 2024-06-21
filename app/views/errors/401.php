<?php
require_once ("app/views/partials/header.php");
require_once ("app/middleware/middleware.php");

?>

<div class="d-flex flex-column align-items-center">
    <h1 class="fw-bolder">401 Unauthorized</h1>
    <p>Authentication is required to access this page.</p>
    <p><a href="<?php echo getUserHomeRoute() ?>">Back to Home</a></p>
</div>

<?php
require_once ("app/views/partials/footer.php");