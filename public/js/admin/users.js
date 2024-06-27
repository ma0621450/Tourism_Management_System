$(document).ready(function () {
  $(document).on("submit", ".block-form, .unblock-form", function (event) {
    event.preventDefault();
    var form = $(this);
    var formData = form.serialize();
    var button = form.find("button[type=submit]");
    var isBlocking = button.hasClass("block-button");

    $.ajax({
      url: "admin",
      method: "POST",
      data: formData,
      success: function (response) {
        if (isBlocking) {
          button
            .text("Unblock")
            .removeClass("btn-danger block-button")
            .addClass("btn-success unblock-button")
            .closest("form")
            .removeClass("block-form")
            .addClass("unblock-form")
            .attr("method", "post")
            .find("input[name='_method']")
            .val("PATCH");
        } else {
          button
            .text("Block")
            .removeClass("btn-success unblock-button")
            .addClass("btn-danger block-button")
            .closest("form")
            .removeClass("unblock-form")
            .addClass("block-form")
            .attr("method", "post")
            .find("input[name='_method']")
            .val("DELETE");
        }
      },
      error: function () {
        alert("Error: Unable to change user status.");
      },
    });
  });
});

$(document).ready(function () {
  function destroyDataTable(table) {
    if ($.fn.DataTable.isDataTable(table)) {
      $(table).DataTable().destroy();
    }
  }

  $("#myTable").show();

  $("#myTable2").hide();

  $("#myTable").DataTable();

  $("#toggleTable1").click(function () {
    $("#myTable").toggle();

    if ($("#myTable").is(":visible")) {
      if (!$.fn.DataTable.isDataTable("#myTable")) {
        $("#myTable").DataTable({});
      }
      destroyDataTable("#myTable2");
      $("#myTable2").hide();
    } else {
      destroyDataTable("#myTable");
    }
  });

  $("#toggleTable2").click(function () {
    $("#myTable2").toggle();

    if ($("#myTable2").is(":visible")) {
      if (!$.fn.DataTable.isDataTable("#myTable2")) {
        $("#myTable2").DataTable({});
      }
      destroyDataTable("#myTable");
      $("#myTable").hide();
    } else {
      destroyDataTable("#myTable2");
    }
  });
});
