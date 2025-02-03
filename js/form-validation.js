document.addEventListener('DOMContentLoaded',function(){
    const form = document.getElementById("enrollment-form");
    const startYear = document.getElementById("start-year");
    const endYear = document.getElementById("end-year");
    const lastYear = document.getElementById("last-year");
    const errorMsg = document.getElementById("error-messages");

   //set default academic year
    const year = new Date().getFullYear();
    startYear.value = year;
    endYear.value = year + 1;
    const yearRegex = /^(1[0-9]{3}|2[0-9]{3}|3[0-9]{3})$/;//checker if number input is a valid year

   //ensure that the start year is always higher or equal to the current year
   function validateStartYear() {
    const startYearVal = parseInt(startYear.value);
        if (yearRegex.test(startYearVal) == true) {
            if(startYearVal < year) {
                startYear.style.border = "1px solid red";
                errorMessages("em-start-year", "year is lower than the current year");
            }
            else {
                startYear.style.border = "1px solid #616161";
                document.querySelector(".em-start-year").innerHTML = "";
            }
        }
        else {
            startYear.style.border = "1px solid red";
            errorMessages("em-start-year", "enter a valid year");
        }
   }
    //ensure that the end year is always greater than the start year 
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        if (yearRegex.test(endYearVal) == true) {
            if (endYearVal < startYearVal || endYearVal == startYearVal) {
                endYear.style.border = "1px solid red";
            }
            else {
                endYear.style.border = "1px solid #616161";
            }
        }
        else {
            endYear.style.border = "1px solid red"; 
        }
    }
      //check if the last school  year finished is not greater than the current year
    function validateYearFinished(){
      
        const lastYearVal = parseInt(lastYear.value);
        
       if (yearRegex.test(lastYearVal)==true){
        if (lastYearVal < year) {
            lastYear.style.border = "1px solid red";
        }
        else {
            lastYear.style.border = "1px solid #616161";
        }
       }
       else {
            lastYear.style.border = "1px solid red";
       }
    }
    function errorMessages(errorElement, message) {
        document.querySelector("."+errorElement).classList.add("show");
        document.querySelector("."+errorElement).innerHTML = message;
    }
        startYear.addEventListener('change', validateStartYear);
        endYear.addEventListener('change',validateAcademicYear);
        lastYear.addEventListener('change', validateYearFinished);

        form.addEventListener('submit', function(e){
            e.preventDefault();
            validateYearFinished();
            validateAcademicYear();
        });

});    
 