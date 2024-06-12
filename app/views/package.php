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
            <div class="d-flex align-items-center">

                <form method="POST">
                    <button class='btn btn-primary'>BOOK NOW</button>
                </form>
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Inquiry
                </button>
            </div>

        </div>
    </div>
</div>

<?php require_once ("app/views/partials/footer.php"); ?>




<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Inquiry</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="inquiry">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject:</label>
                        <input type="text" name="subject" class="form-control" id="exampleInputEmail1"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message:</label>
                        <textarea type="text" rows="5" name="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>