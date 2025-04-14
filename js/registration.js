document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("registration-form");
    
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        
        fetch("../server_side/post_registration_form.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                window.location.href = "login.php"; // Redirect to login page
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
        });
    });
});

