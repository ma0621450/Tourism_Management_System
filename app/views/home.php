<?php
require ("app/views/partials/header.php");
?>
<div class="packages-cards d-flex justify-content-around">
    <?php foreach ($packages as $package) { ?>
        <div class="m-4 border  rounded border-muted border-2" style="width: 21rem;">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVAh02ZiYBmSOMvLGUE3S22Tw-4Mbg_1Xpdg&s"
                class="card-img-top" alt="...">
            <div class="card-body p-2">
                <h5 class="card-title"><?php echo $package['title'] ?></h5>
                <p class="card-text limited-description"><?php echo $package['description'] ?></p>
                <p class="text-secondary">$<?php echo $package['price'] ?></p>
                <a href="package?vp_id=<?php echo $package['vp_id']; ?>" type="button" class="btn btn-primary">
                    View More Details
                </a>
            </div>
        </div>
    <?php } ?>
</div>




<?php
require ("app/views/partials/footer.php");
