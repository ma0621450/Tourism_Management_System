$(document).ready(function () {
  $("#inquiryForm").on("submit", function (e) {
    e.preventDefault();
    let form = $(this).serialize();

    $.ajax({
      url: $(this).attr("action"),
      method: "post",
      data: form,
      dataType: "json",
      success: function (response) {
        $("#errorContainer").hide().html("");
        if (response.success) {
          $("#errorContainer")
            .removeClass("alert-danger")
            .addClass("alert-success")
            .html("<p>Inquiry submitted successfully!</p>")
            .show();
        } else {
          $("#errorContainer")
            .removeClass("alert-success")
            .addClass("alert-danger");
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
          .removeClass("alert-success")
          .addClass("alert-danger")
          .html("<p>An unexpected error occurred. Please try again.</p>")
          .show();
      },
    });
  });
});
