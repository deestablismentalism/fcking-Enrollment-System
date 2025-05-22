document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enrollment-form');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.textContent = 'Submitting...';

        fetch('../server_side/post_enrollment_form_data.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if(data.success) {
                // Show success message
                const successMessage = document.getElementById('success-message');
                successMessage.style.display = 'block';
                successMessage.textContent = data.message || 'Enrollment form submitted successfully!';

                setTimeout(() => {
                    window.location.href = '../userPages/User_Enrollees.php';
                }, 2000);
            } else {
                // Show error message
                const errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'block';
                errorMessage.textContent = data.message || 'Failed to submit enrollment form. Please try again.';
                // Remove error message after 5 seconds
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            
            // Show detailed error message
            const errorMessage = document.getElementById('error-message');
            errorMessage.style.display = 'block';
            errorMessage.textContent = 'An error occurred while submitting the form. Please check all input fields and try again.';
            // Remove error message after 5 seconds
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 5000);
        })
        .finally(() => {
            // Reset button state
            submitButton.disabled = false;
            submitButton.textContent = originalButtonText;
        });
    });
});