$(document).ready(function () {
  $(".delete-inquiry-form").on("submit", function (event) {
    event.preventDefault();

    if (!confirm("Are you sure you want to delete this inquiry?")) {
      return;
    }

    var inquiryId = $(this).data("inquiry-id");

    $.ajax({
      type: "POST",
      url: "delete_inquiry",
      data: { inquiry_id: inquiryId },
      success: function (response) {
        console.log("Response:", response);
        if (response.success) {
          $("#inquiry-" + inquiryId).remove();
          alert("Inquiry deleted successfully.");
        } else {
          alert("Failed to delete inquiry: " + response.message);
        }
      },
      error: function () {
        alert("Request failed. Please try again later.");
      },
    });
  });
});
