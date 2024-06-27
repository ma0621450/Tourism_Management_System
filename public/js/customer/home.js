$(document).ready(function () {
  $("#sortPrice").on("change", function () {
    var sortOrder = $(this).val();
    var packagesContainer = $("#packagesContainer");
    var packages = packagesContainer.children(".package-card").get();

    packages.sort(function (a, b) {
      var priceA = parseFloat($(a).data("price"));
      var priceB = parseFloat($(b).data("price"));

      if (sortOrder === "asc") {
        return priceA - priceB;
      } else if (sortOrder === "desc") {
        return priceB - priceA;
      } else {
        return 0;
      }
    });

    $.each(packages, function (index, package) {
      packagesContainer.append(package);
    });
  });

  $("#filterDate").on("click", function () {
    var startDate = $("#startDate").val();
    var endDate = $("#endDate").val();

    $(".package-card").each(function () {
      var packageStartDate = $(this).data("start-date");
      var packageEndDate = $(this).data("end-date");

      var packageStart = new Date(packageStartDate);
      var packageEnd = new Date(packageEndDate);

      var filterStart = startDate ? convertDate(startDate, "filter") : null;
      var filterEnd = endDate ? convertDate(endDate, "filter") : null;

      if (filterStart && filterEnd) {
        if (packageStart >= filterStart && packageEnd <= filterEnd) {
          $(this).show();
        } else {
          $(this).hide();
        }
      } else if (filterStart) {
        if (packageStart >= filterStart) {
          $(this).show();
        } else {
          $(this).hide();
        }
      } else if (filterEnd) {
        if (packageEnd <= filterEnd) {
          $(this).show();
        } else {
          $(this).hide();
        }
      } else {
        $(this).show();
      }
    });
  });

  $("#searchTitle").on("keyup", function () {
    var searchValue = $(this).val().toLowerCase();

    $(".package-card").each(function () {
      var title = $(this).find(".card-title").text().toLowerCase();

      if (title.includes(searchValue)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  function convertDate(dateString, format) {
    if (format === "package") {
      var parts = dateString.split("/");
      return new Date(parts[0], parts[1] - 1, parts[2]);
    } else if (format === "filter") {
      var parts = dateString.split("-");
      return new Date(parts[0], parts[1] - 1, parts[2]);
    }
  }
});
