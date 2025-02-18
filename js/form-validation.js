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
    const endYearVal = parseInt(endYear.value);
        if (yearRegex.test(startYearVal) == true) {
            if(startYearVal < year) {
                startYear.style.border = "1px solid red";
                errorMessages("em-start-year", "Year is lower than the current year");
            }
            else if(startYearVal > endYearVal) {
                startYear.style.border = "1px solid red";
                errorMessages("em-start-year", "Starting year cannot be lower than the end year");
            }
            else {
                startYear.style.border = "1px solid #616161";
                document.querySelector(".em-start-year").innerHTML = "";
            }
        }
        else {
            startYear.style.border = "1px solid red";
            errorMessages("em-start-year", "Enter a valid year");
        }
   }
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        const startYearVal = parseInt(startYear.value);
        if (yearRegex.test(endYearVal) == true) {
            //ensure that the end year is not equal to the start year
            if (endYearVal == startYearVal) {
                endYear.style.border = "1px solid red";
                errorMessages("em-start-year", "End year cannot be equal to the starting year");
            }
            
            //ensure that the end year is always greater than the start year 
            else if(endYearVal < startYearVal) {
                endYear.style.border = "1px solid red";
                errorMessages("em-start-year", "End year cannot be lower than the starting year");
            }
            else if(endYearVal != startYearVal + 1) {
                endYear.style.border = "1px solid red";
                errorMessages("em-start-year", "Academic year should be 1 year apart");
            }
            else {
                endYear.style.border = "1px solid #616161";
                document.querySelector(".em-start-year").innerHTML = "";
            }
        }
        else {
            endYear.style.border = "1px solid red"; 
            errorMessages("em-start-year", "enter a valid year");
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
 