$(document).ready(function () {
  $("#regForm").on("submit", function (e) {
    e.preventDefault();
    let form = $(this).serialize();

    $.ajax({
      url: "register",
      method: "post",
      data: form,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          window.location.href = response.redirect;
        } else {
          $("#errorContainer").html("");
          for (let error in response.errors) {
            $("#errorContainer").append(
              "<p>" + response.errors[error] + "</p>"
            );
          }
          $("#errorContainer").show();
        }
      },
      error: function () {
        $("#errorContainer")
          .html("<p>An unexpected error occurred. Please try again.</p>")
          .show();
      },
    });
  });
});
