document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enrollment-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);


        fetch('../server_side/post_enrollment_form_data.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert(data.message);

                setTimeout(() => {
                    window.location.href = '../userPages/User_Enrollees.php';
                }, 500);
            }
            else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Fetch error:' , error)
            alert('something went wrong');
        })
        })
});