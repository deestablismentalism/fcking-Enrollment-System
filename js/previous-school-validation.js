document.addEventListener('DOMContentLoaded',function(){
    const form = document.getElementById("enrollment-form"); //form
    const startYear = document.getElementById("start-year"); //taong panuruan start textbox
    const endYear = document.getElementById("end-year"); //taong panuruan end textbox
    const lastYear = document.getElementById("last-year"); //huling natapos na taon textbox
    const lschool = document.getElementById("lschool"); //last school textbox
    const lschoolAddr = document.getElementById("lschoolAddress");//last shcool address
    const lschoolId = document.getElementById("lschoolID"); //last school ID
    const fschool = document.getElementById("fschool"); //nais paaralan
    const fschoolAddr = document.getElementById("fschoolAddress"); //nais paaralan address
    const fschoolId = document.getElementById("fschoolID"); //nais paaralan ID

   //set default academic year
    const year = new Date().getFullYear();
    startYear.value = year;
    endYear.value = year + 1;
    //regex
    const yearRegex = /^(1[0-9]{3}|2[0-9]{3}|3[0-9]{3})$/;//checker if number input is a valid year
    const charRegex = /^[A-Za-z0-9\s.,'-]{3,100}$/;
    //error messages
    const emptyError = "This field is required";
    const invalidYear = "Enter a valid year";
    const invalidChar = "Enter 3 or more characters";
   //ensure that the start year is always higher or equal to the current year
   function validateStartYear() {
        let startYearVal = parseInt(startYear.value);
        let endYearVal = parseInt(endYear.value);
        if(isEmpty(startYear)) {
            console.log(startYear);
            errorMessages("em-start-year", emptyError, startYear);
        }
        else if (!yearRegex.test(startYear.value)) {
            errorMessages("em-start-year", invalidYear, startYear);
        }
        else if(startYearVal < year) {
            errorMessages("em-start-year", "Year is lower than the current year", startYear);
        }
        else if(startYearVal > endYearVal) {
            console.log(startYear);
            errorMessages("em-start-year", "Starting year cannot be lower than the end year", startYear);
        }
        else {
            clearError("em-start-year", startYear);
        }
   }
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        const startYearVal = parseInt(startYear.value);
        if (isEmpty(endYear)) {
            endYear.style.border = "1px solid red";
            errorMessages("em-start-year", emptyError, endYear);
        }
        else if (!yearRegex.test(endYear.value) ) {
            errorMessages("em-start-year", invalidYear, endYear);
        }
            //ensure that the end year is not equal to the start year
        else if (endYearVal == startYearVal) {
            errorMessages("em-start-year", "End year cannot be equal to the starting year", endYear);
        }     
       //ensure that the end year is always greater than the start year 
        else if(endYearVal < startYearVal) {
            errorMessages("em-start-year", "End year cannot be lower than the starting year", endYear);
        }
        else if(endYearVal != startYearVal + 1) {
            errorMessages("em-start-year", "Academic year should be 1 year apart", endYear);
        }
        else {
            clearError("em-start-year", endYear);
        }
    }
    //check if huling natapos na taon is not greater than the current year
    function validateYearFinished(){
        const lastYearVal = parseInt(lastYear.value);
        if (isEmpty(lastYear)) {
            errorMessages("em-last-year-finished", emptyError, lastYear);
        }
        else if (!yearRegex.test(lastYear.value)){
            errorMessages("em-last-year-finished", invalidYear, lastYear);
        }
        else if (lastYearVal > year) {
            errorMessages("em-last-year-finished", "Value cannot be greater than the current year", lastYear);
        }
        else {
            clearError("em-last-year-finished", lastYear);
        }
    }
    //validate empty character fields and school name validity
    const fields = [
        {element: lschool, error: "em-lschool"},
        {element: lschoolAddr, error: "em-lschoolAddress"},
        {element: fschool, error: "em-fschool"},
        {element: fschoolAddr, error: "em-fschoolAddress"},
    ];
    function validateSchool(element, errorElement){
        if (isEmpty(element)) { 
            errorMessages(errorElement, emptyError, element);
        }
        else if (!charRegex.test(element.value)) {
            errorMessages(errorElement, invalidChar, element);
        }
        else {
            clearError(errorElement, element);
        }
    }
    //function to check empty fields
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
    //Event triggers
    fields.forEach(({element, error}) => {
        element.addEventListener('keyup', ()=> validateSchool(element, error));
    });
    startYear.addEventListener('keyup',validateStartYear);
    endYear.addEventListener('keyup',validateAcademicYear);
    lastYear.addEventListener('keyup',validateYearFinished);

    form.addEventListener('submit', function(e){
        e.preventDefault();
        //validate again upon submission
       fields.forEach(({element, error}) =>{
        validateSchool(element, error);
       });
        validateStartYear();
        validateYearFinished();
        validateAcademicYear();
    });

});    
 