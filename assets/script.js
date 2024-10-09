jQuery(document).ready(function () {
  // Add form validation
  jQuery('#frm_add_employee').validate();

  // form submit
  jQuery('#frm_add_employee').on('submit', function (event) {
    event.preventDefault();
    var formData = new FormData(this);

    // jQuery.ajax({
    //   ulr: wce_object.ajax_url,     
    //   method: 'POST',
    //   dataType: 'json',
    //   contentType: false,
    //   processData: false,
    //   data: {
    //     action: "wp_ajax_wce_add_employee",  // the action to fire in the server
    //     data: formData,         // any JS object
    //   },
    //   complete: function (response) {
    //     console.log(response);
    //   },
    // });

    jQuery.ajax({
      url: wce_object.ajax_url,  // Correct URL key
      method: 'POST',
      dataType: 'json', 
      contentType: false,  // Prevent jQuery from setting the content type
      processData: false,  // Don't process the files (necessary for FormData)
      data: formData,      // Use FormData directly to handle file uploads
      success: function(response) {
        // Handle successful response
        if (response.success) {
          console.log('Employee added successfully!', response);
          // You can add more actions like clearing the form, showing a success message, etc.
        } else {
          console.log('Error in response', response);
        }
      },
      error: function(xhr, status, error) {
        // Handle errors
        console.error('AJAX Error:', error);
        console.error('Status:', status);
        console.error('Response:', xhr.responseText);
      },
      complete: function() {
        console.log('AJAX request finished.');
      }
    });


  });
});
