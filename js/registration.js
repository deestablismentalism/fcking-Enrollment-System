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
            body: formData
        })
        .then(response => response.json()) 
        .then(data => alert(data.message))
        .catch(error => console.error("Error:", error));
    });
});

