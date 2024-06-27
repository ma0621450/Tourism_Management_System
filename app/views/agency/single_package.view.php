<?php require_once ("app/views/partials/header.php");

?>

<div class="container my-5">
    <div class="d-flex border align-items-center gap-4">
        <div>
            <img width="900px"
                src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/f5/de/london.jpg?w=1400&h=1400&s=1"
                class="" alt="Package Image">
        </div>
        <div>
            <h1 class="text-decoration-underline"><?php echo $package['title']; ?></h1>
            <p><?php echo $package['description']; ?></p>
        </div>
    </div>

    <div class="border py-4 px-5 mt-5">
        <h3 class="text-decoration-underline">Package Details</h3>
        <p class="fw-bold">Price: $<?php echo $package['price']; ?></p>
        <p class="fw-bold">Start Date: <?php echo $package['start_date']; ?></p>
        <p class="fw-bold">End Date: <?php echo $package['end_date']; ?></p>

        <h3 class="text-decoration-underline mt-4">Destinations</h3>
        <ul>
            <?php
            $visitedDestinations = [];
            foreach ($vp_info as $info):
                if (!in_array($info['destination_name'], $visitedDestinations)):
                    ?>
                    <li class="fw-bold"><?php echo $info['destination_name']; ?></li>
                    <?php
                    $visitedDestinations[] = $info['destination_name'];
                endif;
            endforeach;
            ?>
        </ul>

        <h3 class="text-decoration-underline mt-4">Services</h3>
        <ul>
            <?php
            $visitedServices = [];
            foreach ($vp_info as $info):
                if (!in_array($info['service_description'], $visitedServices)):
                    ?>
                    <li class="fw-bold"><?php echo $info['service_description']; ?></li>
                    <?php
                    $visitedServices[] = $info['service_description'];
                endif;
            endforeach;
            ?>
        </ul>

        <div class="d-flex align-items-center mt-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Update
                Package</button>
            <form method="POST" id="deletePackageForm" class="ms-2">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="vp_id" value="<?php echo $package['vp_id']; ?>">
                <button type="submit" id="deletePackageButton" class="btn btn-danger">Delete</button>
            </form>
        </div>


    </div>
</div>

<?php require_once ("app/views/partials/footer.php"); ?>










<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatePackageForm" method="POST">
                    <input type="hidden" name="vp_id" id="vp_id" value="<?php echo $package['vp_id']; ?>">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputEmail1"
                            value="<?php echo htmlspecialchars($package['title']) ?>">

                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea type="text" name="description" rows="5" class="form-control"
                            value=""><?php echo htmlspecialchars($package['description']) ?></textarea>
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
                        <input value="<?php echo htmlspecialchars($package['persons']) ?>" type="number" name="persons"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input value="<?php echo htmlspecialchars($package['price']) ?>" type="number" name="price"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Start Date</label>
                        <input value="<?php echo htmlspecialchars($package['start_date']) ?>" type="date"
                            name="start_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">End Date</label>
                        <input type="date" name="end_date" class="form-control"
                            value="<?php echo htmlspecialchars($package['end_date']) ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Package</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="public/js/agency/package.js"></script>