<?php require ("app/views/partials/header.php"); ?>


<div style="padding-bottom: 100px;" class="container w-50">
    <h1 class="text-center text-decoration-underline">Manage Your Profile</h1>
    <form action="" class="border p-3" method="POST">
        <?php if (isset($errors['username'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($errors['username']); ?></div>
        <?php endif; ?>
        <?php if (isset($errors['password'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($errors['password']); ?></div>
        <?php endif; ?>
        <?php if (isset($errors['agency_name'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($errors['agency_name']); ?></div>
        <?php endif; ?>
        <?php if (isset($errors['agency_desc'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($errors['agency_desc']); ?></div>
        <?php endif; ?>
        <label for="username">Username</label>
        <input name="username" class="form-control mb-3" type="text"
            value="<?php echo htmlspecialchars($formValues['username']); ?>">


        <label for="password">Password</label>
        <input name="password" class="form-control mb-3" type="password">


        <label for="agency_name">Travel Agency Name</label>
        <input name="agency_name" class="form-control mb-3" type="text"
            value="<?php echo htmlspecialchars($formValues['agency_name']); ?>">


        <label for="agency_desc">About Agency</label>
        <textarea rows="5" name="agency_desc"
            class="form-control mb-3"><?php echo htmlspecialchars($formValues['agency_desc']); ?></textarea>


        <button class="btn btn-success" type="submit">Submit</button>
    </form>
</div>


<?php require ("app/views/partials/footer.php"); ?>