<!-- Footer Start -->
<?php if ($_SERVER['REQUEST_URI'] == '/Vacation_Management/'): ?>
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Company</h4>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Privacy Policy</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt me-3"></i>+012 345 67890
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i>info@example.com
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px">
                        <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Your email" />
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>

<!-- Footer End -->

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
<!-- JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/lib/wow/wow.min.js"></script>
<script src="public/assets/lib/easing/easing.min.js"></script>
<script src="public/assets/lib/waypoints/waypoints.min.js"></script>
<script src="public/assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="public/assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="public/assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="public/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="public/assets/js/main.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();
    })
    $(document).ready(function () {
        // Function to destroy DataTable instances
        function destroyDataTable(table) {
            if ($.fn.DataTable.isDataTable(table)) {
                $(table).DataTable().destroy();
            }
        }

        // Toggle Table 1
        $('#toggleTable1').click(function () {
            $('#myTable').toggle();
            $('#myTable caption').toggle();

            if ($('#myTable').is(':visible')) {
                if (!$.fn.DataTable.isDataTable('#myTable')) {
                    $('#myTable').DataTable({
                        // Add DataTable options if needed
                    });
                }
            } else {
                destroyDataTable('#myTable');
            }

            $('#myTable2').hide();
            $('#myTable2 caption').hide();
            destroyDataTable('#myTable2');
        });

        // Toggle Table 2
        $('#toggleTable2').click(function () {
            $('#myTable2').toggle();
            $('#myTable2 caption').toggle();

            if ($('#myTable2').is(':visible')) {
                if (!$.fn.DataTable.isDataTable('#myTable2')) {
                    $('#myTable2').DataTable({
                        // Add DataTable options if needed
                    });
                }
            } else {
                destroyDataTable('#myTable2');
            }

            $('#myTable').hide();
            $('#myTable caption').hide();
            destroyDataTable('#myTable');
        });

        // Initial hide for tables and their captions
        $('#myTable').hide();
        $('#myTable2').hide();
        $('#myTable caption').hide();
        $('#myTable2 caption').hide();

        // Center-align text in all columns of both tables
        $('#myTable, #myTable2,#table').find('th, td').addClass('text-center');
    });
</script>
</body>

</html>