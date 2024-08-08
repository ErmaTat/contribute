// Set CSRF token in the AJAX request headers
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('.invite').on('click', function(){
    var button = $(this); // Store reference to the clicked button
    var user_id = button.data('id');
    var contribution_id = button.data('cont_id');
    var baseUrl = $('meta[name="base-url"]').attr('content');

    button.html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
    button.attr('disabled', true);

    $.ajax({
        url: baseUrl + '/send_invite', 
        type: 'post',
        data: {
            'user_id': user_id,
            'contribution_id': contribution_id,
        },
        success: function(response) {
            if (response.success) {
                button.html(`Invite Sent <i class="fe fe-check-circle"></i>`);
                console.log('Created Invite:', response.data);
            } else {
                button.attr('disabled', false);
                button.html(`Invite`);
            }
        },
        error: function(xhr, status, error) {
            $('#err').html('An error occurred while sending the invite.');
            $('#error_block').css('display', '');

            button.attr('disabled', false);
            button.html(`Invite`);
            console.log('Error:', xhr.responseJSON ? xhr.responseJSON.error : error);
        }
    });
});
