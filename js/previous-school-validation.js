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
    const enrollingGradeLevel = document.getElementById("grades-tbe");
    const  lastGradeLevel = document.getElementById("last-grade");    

    function replaceSelectValues(replaceElement, replaceId) {
    let createTBox = document.createElement("input");
        createTBox.type = "text";
        createTBox.id = replaceId;
        createTBox.placeholder = `eg. Grade 5`;
        createTBox.className = "textbox";
        replaceElement.replaceWith(createTBox);
    }

    if (lastGradeLevel &&  enrollingGradeLevel ) {
        if (lastGradeLevel.options.length === 0 && enrollingGradeLevel.options.length === 0) {
            enrollingGradeLevel.innerHTML = `
                <option value="1">Kinder I</option>
                <option value="2">Kinder II</option>
                <option value="3">Grade 1</option>       
                <option value="4">Grade 2</option>
                <option value="5">Grade 3</option>
                <option value="6">Grade 4</option>
                <option value="7">Grade 5</option>
                <option value="8">Grade 6</option>
           `;
           lastGradeLevel.innerHTML = `
                <option value="1">Kinder I</option>
                <option value="2">Kinder II</option>
                <option value="3">Grade 1</option>       
                <option value="4">Grade 2</option>
                <option value="5">Grade 3</option>
                <option value="6">Grade 4</option>
                <option value="7">Grade 5</option>
                <option value="8">Grade 6</option>
           `;
        }
        else {
            enrollingGradeLevel.innerHTML = `
                <option value=""> Select grade level </option>
            `;
             lastGradeLevel.innerHTML = `
                <option value=""> Select grade level </option>
            `;
        }
        enrollingGradeLevel.selectedIndex = lastGradeLevel.selectedIndex + 1;
        lastGradeLevel.options[lastGradeLevel.options.length - 1].disabled = true;

        lastGradeLevel.addEventListener('change' ,function() {
        const nextIndex = this.selectedIndex + 1;
        if (nextIndex < enrollingGradeLevel.options.length) {
                enrollingGradeLevel.selectedIndex = nextIndex;
        }
        });
        enrollingGradeLevel.addEventListener('change' ,function() {
            const prevIndex = this.selectedIndex - 1;
            if (prevIndex >= 0) {
                lastGradeLevel.selectedIndex = prevIndex;
            }
        });
        
    }
    else {
        replaceSelectValues(enrollingGradeLevel, 'grades-tbe');
        replaceSelectValues(lastGradeLevel, 'last-grade')
    }
   //set default academic year
    const year = new Date().getFullYear();
    startYear.value = year;
    endYear.value = year + 1;
    //regex
    const idRegex = /^([0-9]){6}$/;
    const yearRegex = /^(1[0-9]{3}|2[0-9]{3}|3[0-9]{3})$/;//checker if number input is a valid year
    const charRegex = /^[A-Za-z0-9\s.,'-]{3,100}$/;
    //error messages
    const emptyError = "This field is required";
    const invalidYear = "Enter a valid year";
    const invalidSchoolId = "Not a valid school Id";
    const invalidChar = "Enter 3 or more characters";
   //ensure that the start year is always higher or equal to the current year
   function validateStartYear() {
        let startYearVal = parseInt(startYear.value);
        let endYearVal = parseInt(endYear.value);
        if(isEmpty(startYear)) {
            errorMessages("em-start-year", emptyError, startYear);
            checkEmptyFocus(startYear, "em-start-year");
        }
        else if (!yearRegex.test(startYear.value)) {
            errorMessages("em-start-year", invalidYear, startYear);
        }
        else if ( startYearVal == endYearVal) {
            errorMessages("em-start-year", "Academic year cannot be equal", startYear);
        }
        else if(startYearVal < year) {
            errorMessages("em-start-year", "Year is lower than the current year", startYear);
        }
        else if(startYearVal > endYearVal) {
            errorMessages("em-start-year", "Starting year cannot be greater than the end year", startYear);
        }
        else {
            clearError("em-start-year", startYear);
        }
   }
    function validateAcademicYear(){
        const endYearVal = parseInt(endYear.value);
        const startYearVal = parseInt(startYear.value);
        if (isEmpty(endYear)) {
            errorMessages("em-start-year", emptyError, endYear);
            checkEmptyFocus(endYear, "em-start-year");
        }
        else if (!yearRegex.test(endYear.value) ) {
            errorMessages("em-start-year", invalidYear, endYear);
        }
        //ensure that the end year is not equal to the start year
        else if (endYearVal == startYearVal) {
            errorMessages("em-start-year", "Academic year cannot be equal", endYear);
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
            checkEmptyFocus(lastYear, "em-last-year-finished");
        }
        else if (!yearRegex.test(lastYear.value)){
            errorMessages("em-last-year-finished", invalidYear, lastYear);
        }
        else if (lastYearVal > year) {
            errorMessages("em-last-year-finished", "Value cannot be greater than the current year", lastYear);
        }
        else if (lastYearVal < 1950) {
            errorMessages("em-last-year-finished", "Year is too low", lastYear);
        }
        else {
            clearError("em-last-year-finished", lastYear);
        }   
    }
    //validate school Id
    const idFields = [
        {element: lschoolId, error: "em-lschoolID"},
        {element: fschoolId, error: "em-fschoolID"}
    ];
    //validate empty character fields and school name validity
    const fields = [
        {element: lschool, error: "em-lschool"},
        {element: lschoolAddr, error: "em-lschoolAddress"},
        {element: fschool, error: "em-fschool"},
        {element: fschoolAddr, error: "em-fschoolAddress"}
    ];
    const yearFields = [
        {element: startYear, error: "em-start-year"},
        {element: endYear, error: "em-start-year"},
        {element: lastYear, error: "em-last-year-finished"}
    ]
    function validateSchoolId(element, errorElement) {
        if (isEmpty(element)) {
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else if(!idRegex.test(element.value)) {
            errorMessages(errorElement, invalidSchoolId, element);
        }
        else {
            clearError(errorElement, element);
        }
    }
    function validateSchool(element, errorElement){
        if (isEmpty(element)) { 
            errorMessages(errorElement, emptyError, element);
            checkEmptyFocus(element, errorElement);
        }
        else if (!charRegex.test(element.value)) {
            errorMessages(errorElement, invalidChar, element);
        }
        else {
            clearError(errorElement, element);
        }
    }
    function checkEmptyFocus(element, errorElement) {
        element.addEventListener('blur', ()=> clearError(errorElement, element));
    } 
    //function to check empty fields
    function isEmpty(element) {
        return !element.value.trim();
    }
    //Function for displaying error messages
    function errorMessages(errorElement, message, childElement) {
        // Find the closest ancestor that contains the error message container
        let container = childElement.parentElement.querySelector('.error-msg');
        if (!container) {
            container = childElement.closest('div').querySelector('.error-msg');
        }
        if (!container) {
            container = childElement.parentElement.parentElement.querySelector('.error-msg');
        }
        const errorSpan = container.querySelector('.' + errorElement);

        container.classList.add('show');
        childElement.style.border = "1px solid red";
        errorSpan.innerHTML = message;
    }

    //clear error messages
    function clearError(errorElement, childElement) {
        let container = childElement.parentElement.querySelector('.error-msg');
        if (!container) {
            container = childElement.closest('div').querySelector('.error-msg');
        }
        if (!container) {
            container = childElement.parentElement.parentElement.querySelector('.error-msg');
        }
        const errorSpan = container.querySelector('.' + errorElement);

        container.classList.remove('show');
        childElement.style.border = "1px solid #616161";
        errorSpan.innerHTML = '';
    }
    //Event triggers
    fields.forEach(({element, error}) => {
        element.addEventListener('input', ()=> validateSchool(element, error));
    });
    yearFields.forEach(({element, error}) => {
        element.addEventListener('input', function(e) {
            const value = e.target.value;

            if (/\D/.test(value)) {
                const cursorPos = e.target.selectionStart;
                const sanitizedValue = value.replace(/\D/g, '');
                e.target.value = sanitizedValue;
                const posDiff = value.length - sanitizedValue.length;
                e.target.setSelectionRange(cursorPos - posDiff, cursorPos - posDiff);
                value = sanitizedValue;
            }
            if (value.length > 4) {
                e.target.value = value.slice(0, 4);
            }
            validateYear(element, error);
        });
    });
    idFields.forEach(({element, error}) => {
        element.addEventListener('input', function(e) {
            const value = e.target.value;
            
            // Only sanitize if there are actual changes to sanitize
            if (/\D/.test(value)) {
                // Preserve cursor position
                const cursorPos = e.target.selectionStart;
                const sanitizedValue = value.replace(/\D/g, '');
                e.target.value = sanitizedValue;
                // Restore cursor position accounting for removed characters
                const posDiff = value.length - sanitizedValue.length;
                e.target.setSelectionRange(cursorPos - posDiff, cursorPos - posDiff);
                value = sanitizedValue;
            }
            
            // Limit to 6 digits
            if (value.length > 6) {
                e.target.value = value.slice(0, 6);
            }
            
            validateSchoolId(element, error);
        });

        // Add keydown handler for special keys
        element.addEventListener('keydown', function(e) {
            // Allow: backspace, delete, tab, escape, enter
            if ([46, 8, 9, 27, 13].indexOf(e.key) !== -1 ||
                // Allow: Ctrl+A, Command+A
                (e.key === 'a' && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl+C, Command+C
                (e.key === 'c' && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl+V, Command+V
                (e.key === 'v' && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: Ctrl+X, Command+X
                (e.key === 'x' && (e.ctrlKey === true || e.metaKey === true)) ||
                // Allow: home, end, left, right, up, down
                (e.key >= 35 && e.key <= 40)) {
                return;  // let it happen, don't do anything
            }
            
            // Prevent if not a number
            if (!/^\d$/.test(e.key) && !e.ctrlKey && !e.metaKey) {
                e.preventDefault();
            }
        });

        element.addEventListener('blur', () => validateSchoolId(element, error));
    });
    startYear.addEventListener('input',validateStartYear);
    endYear.addEventListener('input',validateAcademicYear);
    lastYear.addEventListener('input',validateYearFinished);

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        //validate again upon submission
       fields.forEach(({element, error}) =>{
        validateSchool(element, error);
       });
       idFields.forEach(({element, error})=>{
            if(isEmpty(element)) {
                errorMessages(error, emptyError, element);
            }
            else if (element.value.length !== 6) {
                errorMessages(error, "school ID must be 6 digits", element);
            }
            else {
                validateSchoolId(element, error);
            }
        });
        validateStartYear();
        validateYearFinished();
        validateAcademicYear();

        const errors = document.querySelectorAll('.show');

        if(errors.length > 0) {

            const firstError = errors[0];

            firstError.scrollIntoView({behavior: "smooth", block: "center"});
        }
        else {
            form.submit();
        }
    });
});    
 