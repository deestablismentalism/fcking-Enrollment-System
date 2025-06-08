document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('enrollment-form');
    
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Force validation of all sections
        const validateAllFields = () => {

            const allInputs = form.querySelectorAll('input:not([type="radio"]), select, textarea');
            // Clear any existing error states first
            allInputs.forEach(input => {
                const errorContainer = input.parentElement.querySelector('.error-msg') || 
                                    input.closest('div').querySelector('.error-msg') || 
                                    input.parentElement.parentElement.querySelector('.error-msg');
                if (errorContainer) {
                    const errorClass = errorContainer.querySelector('span')?.className;
                    if (errorClass) {
                        ValidationUtils.clearError(errorClass, input);
                    }
                }
            });
            // Create validation events
            const blurEvent = new Event('blur', { bubbles: true });
            const changeEvent = new Event('change', { bubbles: true });
            const inputEvent = new Event('input', { bubbles: true });
            
            // Trigger validation events on all fields
            allInputs.forEach(input => {
                // Skip disabled fields
                if (!input.disabled) {
                    input.dispatchEvent(blurEvent);
                    input.dispatchEvent(changeEvent);
                    input.dispatchEvent(inputEvent);
                }
            });
            // Explicitly call each section's validation function
            const studentInfoValid = window.validateStudentInfo ? validateStudentInfo() : true;
            const parentInfoValid = window.validateParentInfo ? validateParentInfo() : true;
            const previousSchoolValid = window.validatePreviousSchoolInfo ? validatePreviousSchoolInfo() : true;
            const addressInfoValid = window.validateAddressInfo ? validateAddressInfo() : true;

            // Find all error messages that are currently shown
            const errorMessages = document.querySelectorAll('.error-msg.show');
            
            // If there are errors, scroll to the first one and focus its input
            if (errorMessages.length > 0) {
                const firstError = errorMessages[0];
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Find the associated input field and focus it
                const associatedInput = firstError.closest('div').querySelector('input, select, textarea');
                if (associatedInput) {
                    associatedInput.focus();
                }
                return false;
            }
            
            return studentInfoValid && parentInfoValid && previousSchoolValid && addressInfoValid;
        };
        const isFormValid = ValidationUtils.isFormValid();
        const areFieldsValid = validateAllFields();

        // Check if all validations pass
        if (!isFormValid || !areFieldsValid) {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'block';
                errorMessage.innerHTML = 'Please correct the errors in the form before submitting.';

                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
            return;
        }

        // Process address values before submission
        try {
            // Call changeAddressValues to update address fields
            const addressData = await window.changeAddressValues();
            if (!addressData) {
                throw new Error('Failed to process address data');
            }
        } catch (error) {
            console.error('Error processing address data:', error);
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'block';
                errorMessage.innerHTML = 'Error processing address information. Please try again.';
                setTimeout(() => {
                    errorMessage.style.display = 'none';
                }, 5000);
            }
            return;
        }

        const formData = new FormData(form);

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        const originalButtonText = submitButton.textContent;
        submitButton.disabled = true;
        submitButton.textContent = 'Submitting...';

        fetch('../server_side/users/post_enrollment_form_data.php', {
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
                successMessage.innerHTML = data.message || 'Enrollment form submitted successfully!';

                setTimeout(() => {
                    window.location.href = '../userPages/User_Enrollees.php';
                }, 2000);
            } else {
                // Show error message
                const errorMessage = document.getElementById('error-message');
                errorMessage.style.display = 'block';
                errorMessage.innerHTML = data.message || 'Failed to submit enrollment form. Please try again.';
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