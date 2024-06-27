$(document).ready(function () {
  $(".response-form").on("submit", function (e) {
    e.preventDefault();

    var form = $(this);
    var formData = {
      inquiry_id: form.find('[name="inquiry_id"]').val(),
      response: form.find(".response-textarea").val(),
    };

    $.ajax({
      type: "POST",
      url: "a_inquiry",
      data: formData,
      dataType: "json",
      success: function (data) {
        if (data.success) {
          form.closest(".response-column").html(formData.response);
        } else {
          console.error("Error:", data.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error sending response:", error);
      },
    });
  });
});
