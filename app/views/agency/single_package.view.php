<?php require_once ("app/views/partials/header.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <img width="1080px" src="https://media.tacdn.com/media/attractions-content--1x-1/12/85/9e/df.jpg"
                class="img-fluid d-block mx-auto" alt="Package Image" style="object-fit-cover">
        </div>
        <div class="col-lg-8">
            <div class="mb-4">
                <h1><?php echo $package['title']; ?></h1>
                <p>Description: <?php echo $package['description']; ?></p>
                <p>Price: $<?php echo $package['price']; ?></p>
                <p>Start Date: <?php echo $package['start_date']; ?></p>
                <p>End Date: <?php echo $package['end_date']; ?></p>
            </div>

            <h2>Destinations</h2>
            <ul>
                <?php
                $visitedDestinations = [];

                foreach ($vp_info as $info):
                    if (!in_array($info['destination_name'], $visitedDestinations)):
                        ?>
                        <li><?php echo $info['destination_name']; ?></li>
                        <?php
                        $visitedDestinations[] = $info['destination_name'];
                    endif;
                endforeach;
                ?>
            </ul>

            <h2>Services</h2>
            <ul>
                <?php
                $visitedServices = [];

                foreach ($vp_info as $info):
                    if (!in_array($info['service_description'], $visitedServices)):
                        ?>
                        <li><?php echo $info['service_description']; ?></li>
                        <?php
                        $visitedServices[] = $info['service_description'];
                    endif;
                endforeach;
                ?>
            </ul>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Update Package
            </button>
            <a class='btn btn-danger'>Delete</a>
        </div>
    </div>
</div>

<?php require_once ("app/views/partials/footer.php"); ?>









<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Package</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatePackageForm" method="POST">
                    <input type="hidden" name="vp_id" id="vp_id" value="<?php echo $package['vp_id']; ?>">
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
                    <button type="submit" class="btn btn-primary">Update Package</button>
                </form>
            </div>
        </div>
    </div>
</div>