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
            <a class='btn btn-primary'>Update</a>
            <a class='btn btn-danger'>Delete</a>
        </div>
    </div>
</div>

<?php require_once ("app/views/partials/footer.php"); ?>