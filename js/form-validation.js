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
    const startYearVal = parseInt(startYear.value);
   //ensure that the start year is always higher or equal to the current year
   function validateStartYear() {
        if(startYearVal < year) {
            startYear.style.border = "1px solid red";
        }
   }
    //ensure that the end year is always greater than the start year 
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        if (endYearVal < startYearVal || endYearVal == startYearVal) {
            endYear.style.border = "1px solid red";
        }
        else {
            endYear.style.border = "1px solid #616161";
        }
    }
      //check if the last school  year finished is not greater than the current year
    function validateYearFinished(){
      
        const lastYearVal = parseInt(lastYear.value);
        
        if (lastYearVal < year) {
            lastYear.style.border = "1px solid red";
        }
        else {
            lastYear.style.border = "1px solid #616161";
        }
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
 