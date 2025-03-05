document.addEventListener('DOMContentLoaded', function(){
    const psaNumber = document.getElementById("PSA-number");
    const lrn = document.getElementById("LRN");
    const lname = document.getElementById("lname");
    const fname = document.getElementById("fname");
    const mname = document.getElementById("mname");
    const suffix = document.getElementById("extension");
    const birthDate = document.getElementById("bday");
    const age = document.getElementById("age");
    const nameSection = [
        {element: lname, error: "em-lname"},
        {element: fname, error: "em-fname"},
        {element: mname, error: "em-mname"},
        {element: suffix, error: "em-extension"}
    ];
    const today = new Date();
    //regex
    const lrnRegex = /^([0-9]){12}$/;
    const bCertRegex = /^([0-9]){13}$/;
    //emptyError
    const emptyError = "This field is required";
    
    //functions
    function setBirthYear() {
        let ageValue = parseInt(age.value, 10);
        let currentYear = today.getFullYear();
        let setYear = currentYear - ageValue;
        let formattedDate = `${setYear}-01-01`;
        birthDate.value = formattedDate;
    }
    function getAge() {
        let currentYear = today.getFullYear();
        let currentMonth = today.getMonth()+1;
        let currentDay = today.getDate(); 

        let bday = birthDate.value;
        let getDate = new Date(bday);

        let birthYear = getDate.getFullYear();
        let birthMonth = getDate.getMonth()+1;
        let birthDay = getDate.getDate();

        let ageValue = currentYear - birthYear;
        if (currentMonth < birthMonth || (currentMonth === birthMonth && currentDay < birthDay)) {
            ageValue--;
        }
        age.value = ageValue;
        console.log(ageValue);
         
    }
    function validateName(element, errorElement) {
        if(isEmpty(element)) {
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else {
            clearError(errorElement, element);
        }
    } 
    function validatePSA() {
        if(isEmpty(psaNumber)) {
            errorMessages("em-PSA-number", emptyError, psaNumber);
            checkEmptyFocus(psaNumber, "em-PSA-number");
        }
        else if(!bCertRegex.test(psaNumber.value)) {
            errorMessages("em-PSA-number", "Enter a valid birth certificate number", psaNumber);
        }
        else {
            clearError("em-PSA-number", psaNumber);
        }
    }
    function validateLRN() {
        if(isEmpty(lrn)) {
            errorMessages("em-LRN", emptyError, lrn);
            checkEmptyFocus(psaNumber, "em-PSA-number");
        }
        else if(!lrnRegex.test(lrn.value)) {
            errorMessages("em-LRN", "Enter a valid LRN", lrn);
        }
        else {
            clearError("em-LRN", lrn);
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
    age.addEventListener('change', setBirthYear);
    birthDate.addEventListener('change', getAge);
    psaNumber.addEventListener('keyup', validatePSA);
    lrn.addEventListener('keyup', validateLRN);
    nameSection.forEach(({element, error}) => {
        element.addEventListener('keyup', ()=>validateName(element, error));
    });
});