$(document).ready(function () {
  $("#destinationsTable").DataTable({
    columnDefs: [
      { width: "10%", targets: 0 },
      { width: "80%", targets: 1 },
      { width: "10%", targets: 2 },
    ],
    autoWidth: false,
  });
});
