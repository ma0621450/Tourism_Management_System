<?php
require_once ("app/views/partials/header.php");
require_once ("app/middleware/middleware.php");
?>

<div class="d-flex flex-column align-items-center">
    <h1 class="fw-bolder">403 Forbidden</h1>
    <p>Access to this page is forbidden.</p>
    <p><a href="<?php echo getUserHomeRoute() ?>">Back to Home</a></p>

</div>

<?php
require_once ("app/views/partials/footer.php");