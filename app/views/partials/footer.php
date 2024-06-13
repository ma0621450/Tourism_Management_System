</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
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