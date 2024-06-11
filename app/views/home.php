<?php
require ("app/views/partials/header.php");
?>
<div class="packages-cards d-flex justify-content-around">
    <div class="m-4 border  rounded border-muted border-2" style="width: 20rem;">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVAh02ZiYBmSOMvLGUE3S22Tw-4Mbg_1Xpdg&s"
            class="card-img-top" alt="...">
        <div class="card-body p-2">
            <h5 class="card-title">Las Vegas</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
            <p class="text-secondary">Price: $123</p>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Book Now
            </button>
        </div>
    </div>

</div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <h6 class="text-muted text-center">Please confirm your credentials</h6>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require ("app/views/partials/footer.php");
