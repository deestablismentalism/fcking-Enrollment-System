document.addEventListener('DOMContentLoaded',function(){
    const form = document.getElementById("enrollment-form");
    const startYear = document.getElementById("start-year");
    const endYear = document.getElementById("end-year");
    const gradesTbe = document.getElementById("grades-tbe");
    const lastGrade = document.getElementById("last-grade");
    const lastYear = document.getElementById("last-year");

    
    const year = new Date().getFullYear();
    startYear.value = year;
    endYear.value = year + 1;
   
    form.addEventListener('submit', function(e){
            e.preventDefault();
             //ensure that the end year is always greater than the start year 
    endYear.addEventListener('change', function(){
        const startYearVal = parseInt(startYear.value);
        const endYearVal = parseInt(endYear.value);

        if (endYearVal < startYearVal) {
            endYear.style.border = "1px solid red";
        }
        else if (startYearVal < year) {
            startYear.style.border = "1px solid red";
        }
        else {
            endYear.style.border = "1px solid #616161";
        }
    });
      //check if the last school  year finished is not greater than the current year
            lastYear.addEventListener('change', function(){
      
                const lastYearVal = parseInt(lastYear.value);
        
                if (lastYearVal > year) {
                    lastYear.style.border = "1px solid red";
                }
                else {
                    lastYear.style.border = "1px solid #616161";
                }
            });
        
    });

    const lastGradeVal = parseInt(lastGrade.value);
});    
 