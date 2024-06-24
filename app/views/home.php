<?php
require ("app/views/partials/header.php");
?>


<div class="packages-cards d-flex flex-wrap justify-content-center">
    <?php foreach ($packages as $package) { ?>
        <div class="m-4 border  rounded border-muted " style="width: 25rem;">
            <img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/33/f5/de/london.jpg?w=1400&h=1400&s=1"
                class="card-img-top" alt="...">
            <div class="card-body p-2">
                <h5 class="card-title"><?php echo $package['title'] ?></h5>
                <p class="card-text"><?php echo $package['description'] ?></p>
                <a href="package?vp_id=<?php echo $package['vp_id']; ?>" type="button" class="btn btn-primary">
                    View More Details
                </a>
            </div>
        </div>
    <?php } ?>
</div>











<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">
                Services
            </h6>
            <h1 class="mb-5">Our Services</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5>WorldWide Tours</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                        <h5>Hotel Reservation</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user text-primary mb-4"></i>
                        <h5>Travel Guides</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                        <h5>Event Management</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5>WorldWide Tours</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-hotel text-primary mb-4"></i>
                        <h5>Hotel Reservation</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user text-primary mb-4"></i>
                        <h5>Travel Guides</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                        <h5>Event Management</h5>
                        <p>
                            Diam elitr kasd sed at elitr sed ipsum justo dolor sed clita
                            amet diam
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->














<?php
require ("app/views/partials/footer.php");
