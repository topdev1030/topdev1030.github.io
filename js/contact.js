$(function() {
  $("#btn_submit").on('click', function(event) {
    event.preventDefault(); // Prevent the form from submitting in the default way

    // Get form data
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      subject: $("#subject").val(),
      message: $("#message").val()
    };

    // Send the data to the server using AJAX
    $.ajax({
      type: "POST",
      url: "sendform.php", // Replace with your server-side script URL
      data: formData,
      success: function(res) {
        console.log('Success!!!')
      }
    });
  });
});