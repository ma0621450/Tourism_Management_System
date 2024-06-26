<?php require_once ("app/views/partials/header.php");
?>
<div class="container">
    <div class="d-flex border rounded-4 align-items-center" style="gap: 20px;">
        <div>
            <img width="900px"
                src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/f5/de/london.jpg?w=1400&h=1400&s=1"
                class="" alt="Package Image">
        </div>
        <div class="">
            <h1 class="text-decoration-underline"><?php echo $package['title']; ?></h1>
            <p class=" "><?php echo $package['description']; ?></p>

        </div>
    </div>
    <?php if ($package): ?>
        <div style="width: 870px; margin-top: 40px;">
            <h2 style="margin-left: 10px;" class="text-decoration-underline">About Travel Agency</h2>
            <div class="border rounded-4 p-3">
                <h5><?php echo $package['agency_name']; ?></h5>
                <p><?php echo $package['agency_desc']; ?></p>
            </div>
        </div>
    <?php endif ?>
    <h2 style="margin-left: 30px;" class="mt-5 text-decoration-underline">Reviews</h2>
    <div class="d-flex">
        <div style="width: 250px;height: 300px;"
            class="m-4 p-3 border border-2 rounded-4 border-muted d-flex flex-column align-items-center text-center ">
            <img width="160px"
                src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg"
                class="rounded-circle border" alt="...">
            <div class="card-body p-2">
                <h3>John Smith</h3>
                <p class="card-text fw-bold">Lorem ipsum tempore optio recusandae
                    itaque natus.Lorem ipsum tempore optio recusandae
                    itaque natus.</p>
            </div>
        </div>
        <div style="width: 250px;height: 300px;"
            class="m-4 p-3 border border-2 rounded-4 border-muted d-flex flex-column align-items-center text-center ">
            <img width="160px"
                src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg"
                class="rounded-circle border" alt="...">
            <div class="card-body p-2">
                <h3>John Smith</h3>
                <p class="card-text fw-bold">Lorem ipsum tempore optio recusandae
                    itaque natus.Lorem ipsum tempore optio recusandae
                    itaque natus.</p>
            </div>
        </div>
        <div style="width: 250px;height: 300px;"
            class="m-4 p-3 border border-2 rounded-4 border-muted d-flex flex-column align-items-center text-center ">
            <img width="160px"
                src="https://t3.ftcdn.net/jpg/02/43/12/34/360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg"
                class="rounded-circle border" alt="...">
            <div class="card-body p-2">
                <h3>John Smith</h3>
                <p class="card-text fw-bold">Lorem ipsum tempore optio recusandae
                    itaque natus.Lorem ipsum tempore optio recusandae
                    itaque natus.</p>
            </div>
        </div>
        <div style="margin-top: -250px;">
            <div class="border rounded-4 py-5 px-4 mx-5">
                <h3 class="text-decoration-underline">Package Details</h3>
                <p class="fw-bold">Price: $<?php echo $package['price']; ?></p>
                <p class="fw-bold">Start Date: <?php echo $package['start_date']; ?></p>
                <p class="fw-bold">End Date: <?php echo $package['end_date']; ?></p>





                <h3 class="text-decoration-underline">Destinations</h3>
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


                <h3 class="text-decoration-underline">Services</h3>
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
                </li>
                </ul>

                <div class="d-flex align-items-center">

                    <form method="POST">
                        <button class='btn btn-primary'>BOOK NOW</button>
                    </form>
                    <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Inquiry
                    </button>
                </div>
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
                <div id="errorContainer" class="alert alert-danger" style="display:none;"></div>
                <form id="inquiryForm" action="inquiry?vp_id=<?php echo $package['vp_id']; ?>">

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subject:</label>
                        <input type="text" name="subject" class="form-control" id="exampleInputEmail1"></input>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message:</label>
                        <textarea type="text" rows="5" name="message" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#updatePackageForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'post',
                data: form,
                dataType: 'json',
                success: function (response) {
                    $('#errorContainer').hide().html('');
                    if (response.success) {
                        $('#errorContainer').removeClass('alert-danger').addClass('alert-success').html('<p>Package updated successfully!</p>').show();
                        setTimeout(function () {
                            window.location.href = "single_package?vp_id=" + <?php echo $package['vp_id']; ?>;
                        }, 2000);
                    } else {
                        $('#errorContainer').removeClass('alert-success').addClass('alert-danger');
                        for (let error in response.errors) {
                            $('#errorContainer').append('<p>' + response.errors[error] + '</p>');
                        }
                        $('#errorContainer').show();
                    }
                },
                error: function () {
                    $('#errorContainer').removeClass('alert-success').addClass('alert-danger').html('<p>An unexpected error occurred. Please try again.</p>').show();
                }
            });
        });
    });
    $(document).ready(function () {
        $('#inquiryForm').on('submit', function (e) {
            e.preventDefault();
            let form = $(this).serialize();

            $.ajax({
                url: $(this).attr('action'),
                method: 'post',
                data: form,
                dataType: 'json',
                success: function (response) {
                    $('#errorContainer').hide().html('');
                    if (response.success) {
                        $('#errorContainer').removeClass('alert-danger').addClass('alert-success').html('<p>Inquiry submitted successfully!</p>').show();
                    } else {
                        $('#errorContainer').removeClass('alert-success').addClass('alert-danger');
                        for (let error in response.errors) {
                            $('#errorContainer').append('<p>' + response.errors[error] + '</p>');
                        }
                        $('#errorContainer').show();
                    }
                },
                error: function () {
                    $('#errorContainer').removeClass('alert-success').addClass('alert-danger').html('<p>An unexpected error occurred. Please try again.</p>').show();
                }
            });
        });
    });
</script>