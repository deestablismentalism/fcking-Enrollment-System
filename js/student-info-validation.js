document.addEventListener('DOMContentLoaded', function(){
    const psaNumber = document.getElementById("PSA-number");
    const lrn = document.getElementById("LRN");
    const lname = document.getElementById("lname");
    const fname = document.getElementById("fname");
    const mname = document.getElementById("mname");
    const suffix = document.getElementById("extension");
    //regex
    const lrnRegex = /^([0-9]){12}$/;
    const bCertRegex = /^([0-9]){13}$/;

    function validatePSA() {
        if(isEmpty(psaNumber)) {
            errorMessages("em-PSA-number", "Please enter your PSA number", psaNumber);
            checkEmptyFocus(psaNumber, "em-PSA-number");
        }
    }
    function isEmpty(element) {
        return !element.value.trim();
    }
    //Function for displaying error messages
    function errorMessages(errorElement, message, childElement) {
        document.querySelector("."+errorElement).classList.add("show");
        childElement.style.border = "1px solid red";
        document.querySelector("."+errorElement).innerHTML = message;
    }
    //clear error messages
    function clearError(errorElement, childElement) {
        const errorField = document.querySelector("." + errorElement);
        errorField.classList.remove("show");
        errorField.innerHTML = "";
        childElement.style.border = "1px solid #616161";
    }
    function checkEmptyFocus(element, errorElement) {
        element.addEventListener('blur', ()=> clearError(errorElement, element));
    } 
    //event trigger
    psaNumber.addEventListener('keyup', validatePSA);
});