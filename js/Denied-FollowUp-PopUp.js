$(document).on('click', 'button[data-id]', function() {
    const enrolleeId = $(this).data('id');
    $.ajax({
        url: '../server_side/admin/fetchEnrolleeTransactions.php',
        type: 'POST',
        data: { id: enrolleeId },
        success: function(response) {
            if (response.success) {
                let content = '<ul>';
                response.data.forEach(item => {
                    content += `<li>${item.Reason} </li>`;
                });
                content += `<li> ${response.data[0].Description}</li>`;
                content += '</ul>';
                $('#modalContent').html(content);
                $('#reasonModal').show();
            } else {
                $('#modalContent').html('No reasons found.');
                $('#reasonModal').show();
            }
        },
        error: function() {
            $('#modalContent').html('Error fetching data.');
            $('#reasonModal').show();
        }
    });
    
});