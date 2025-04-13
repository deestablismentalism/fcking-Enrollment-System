document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("registration-form").addEventListener("submit", function(event) {
        event.preventDefault();
        
        const formData = new FormData();
        formData.append("Guardian-First-Name", document.getElementById("Guardian-First-Name").value);
        formData.append("Guardian-Last-Name", document.getElementById("Guardian-Last-Name").value);
        formData.append("Guardian-Middle-Name", document.getElementById("Guardian-Middle-Name").value);
        formData.append("Contact-Number", document.getElementById("Contact-Number").value);


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
