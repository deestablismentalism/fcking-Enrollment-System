document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("registration-form");
    
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData(form);
        
        fetch("../server_side/post_registration_form.php", {
            method: "POST",
            body: formData,
        })
        .then(response => {
            console.log(response);
            return response.json();
        })
        .then(data => {
            try {
                const jsonData = json.parse(data);
                if (jsonData.status === "success") {
                    alert(jsonData.message); 
                } else if (jsonData.status === "failed") {
                    alert(jsonData.message);
                }
            }   catch (error) {
                console.error("Error parsing JSON:", error);
            }
        })
        .catch(error => console.error("Fetch Error:", error));
    });
});
