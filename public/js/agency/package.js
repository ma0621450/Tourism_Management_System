$(document).ready(function () {
  $("#updatePackageForm").on("submit", function (e) {
    e.preventDefault();

    let formData = $(this).serialize();

    $.ajax({
      url: "single_package",
      method: "post",
      data: formData,
      success: function (response) {
        console.log("Package updated successfully!");
        window.location.href = "single_package?vp_id=" + $("#vp_id").val();
      },
      error: function () {
        console.error(
          "An error occurred while updating the package. Please try again."
        );
      },
    });
  });
});
