<?php require ("app/views/partials/header.php"); ?>

<style>
    .hidden {
        display: none;
    }
</style>

<div style="padding-bottom: 100px" class="container w-50">
    <h1 class="text-center text-decoration-underline">Manage your Profile</h1>
    <form action="" id="updateForm" class="border p-5" method="post">

        <?php if (isset($errors['new_username']) || isset($errors['new_password'])): ?>
            <div class="alert alert-danger">
                <?php if (isset($errors['new_username'])): ?>
                    <p><?php echo htmlspecialchars($errors['new_username']); ?></p>
                <?php endif; ?>
                <?php if (isset($errors['new_password'])): ?>
                    <p><?php echo htmlspecialchars($errors['new_password']); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <label for="username">Username</label>
        <input id="username" name="new_username" class="form-control mb-3" type="text" disabled
            value="<?php echo htmlspecialchars($formValues['username']); ?>">
        <label for="password">Password</label>
        <input id="password" name="new_password" class="form-control mb-3" type="password" disabled>
        <div id="button-container" style="gap: 5px;" class="d-flex justify-content-center">
            <button id="edit-button" type="button" class="btn btn-primary" onclick="enableEditing()">Edit</button>
            <button id="cancel-button" type="button" class="btn btn-secondary hidden"
                onclick="cancelEditing()">Cancel</button>
            <button id="submit-button" type="submit" class="btn btn-success hidden">Submit</button>
        </div>

    </form>
</div>

<?php require ("app/views/partials/footer.php"); ?>

<script src="public/js/customer/profile.js"></script>