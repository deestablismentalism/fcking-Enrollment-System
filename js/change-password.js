document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("change-password-form");
    
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        
        fetch("../server_side/post_change_password.php", {
            method: "POST", 
            body: formData,
        })
        .then(response => {
            return response.text().then(text => {
                console.log('Raw response:', text);
                try {
                    return JSON.parse(text);
                } catch (e) {
                    throw new Error('Invalid JSON response: ' + text);
                }
            });
        })
        .then(data => {
            if (data.success) {
                alert(data.message);
                form.reset();
            } else {
                switch(data.error) {
                    case 'duplicate_entry':
                        alert('This contact number is already registered. Please use a different number.');
                        break;
                    case 'database':
                        alert('Database Error: ' + data.message);
                        break;
                    case 'sms_error':
                        alert('Registration successful but failed to send password: ' + data.message);
                        break;
                    default:
                        alert(data.message);
                }
            }
        })
        .catch(error => {
            console.error("Fetch Error:", error);
            alert("Change Password failed. Please check the console for details.");
        });
    });
});
