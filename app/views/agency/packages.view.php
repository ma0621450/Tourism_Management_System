<?php
require ("app/views/partials/header.php");
?>
<div class="m-4">

    <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
        Create Packages
    </button>
</div>
<div class="packages-cards d-flex flex-wrap justify-content-center">
    <?php foreach ($packages as $package): ?>

        <div class="m-4 border rounded border-muted border-2" style="width: 22rem;">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/f5/de/london.jpg?w=1400&h=1400&s=1"
                class="card-img-top" alt="...">
            <div class="card-body p-2">
                <a href="single_package?vp_id=<?php echo $package['vp_id']; ?>" class="card-link">
                    <h5 class="card-title text-decoration-underline"><?php echo $package['title']; ?></h5>
                </a>
                <p class="card-text limited-description"><?php echo $package['description']; ?></p>
                <p class="text-secondary">Price: $<?php echo $package['price']; ?></p>
            </div>
        </div>

    <?php endforeach; ?>
</div>



<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Services</label>
                        <select name="services[]" class="form-select" multiple>
                            <?php foreach ($services as $service): ?>
                                <option value="<?= $service['service_id'] ?>"><?= $service['description'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Destinations</label>

                        <select name="destinations[]" class="form-select" multiple>
                            <?php foreach ($destinations as $destination): ?>
                                <option value="<?= $destination['destination_id'] ?>"><?= $destination['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Persons</label>
                        <input type="number" name="persons" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Create Package</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require ("app/views/partials/footer.php");
