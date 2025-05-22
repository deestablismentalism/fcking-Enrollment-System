document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("enrollment-form");
    const fatherLname = document.getElementById("Father-Last-Name");
    const fatherMname = document.getElementById("Father-Middle-Name");
    const fatherFname = document.getElementById("Father-First-Name");
    const fatherCPnum = document.getElementById("F-number");
    const motherLname = document.getElementById("Mother-Last-Name");
    const motherMname = document.getElementById("Mother-Middle-Name");
    const motherFname = document.getElementById("Mother-First-Name");
    const motherCPnum = document.getElementById("M-number");
    const guardianLname = document.getElementById("Guardian-Last-Name");
    const guardianMname = document.getElementById("Guardian-Middle-Name");
    const guardianFname = document.getElementById("Guardian-First-Name");
    const guardianCPnum = document.getElementById("G-number");
    
    const emptyError = "This field is required";
    const notNumber = "This field must be a number";

    const allInfo = [
        {element: fatherLname, error: "em-father-last-name"},
        {element: fatherFname, error: "em-father-first-name"},
        {element: motherLname, error: "em-mother-last-name"},
        {element: motherFname, error: "em-mother-first-name"},
        {element: guardianLname, error: "em-guardian-last-name"},
        {element: guardianFname, error: "em-guardian-first-name"}
    ];
    const phoneInfo = [
        {element: fatherCPnum, error: "em-f-number"},
        {element: motherCPnum, error: "em-m-number"},   
        {element: guardianCPnum, error: "em-g-number"}
    ];
  function isEmpty(element) {
    return !element.value.trim();
  }
  function clearError(errorElement, childElement) {
        const container = childElement.parentElement.querySelector('.error-msg');
        const errorSpan = container.querySelector('.' + errorElement);

        container.classList.remove('show');
        childElement.style.border = "1px solid #616161";
        errorSpan.innerHTML = '';
  }
  function checkEmptyFocus(element, errorElement) {
    element.addEventListener('blur', ()=> clearError(errorElement, element));
  } 
  function errorMessages(errorElement, message, childElement) {
    const container = childElement.parentElement.querySelector('.error-msg');
    const errorSpan = container.querySelector('.' + errorElement);

    container.classList.add('show');
    childElement.style.border = "1px solid red";
    errorSpan.innerHTML = message;
  }

  function validateEmpty(element, errorElement) {
    if(isEmpty(element)) {
        errorMessages(errorElement, emptyError, element);
        checkEmptyFocus(element, errorElement);
    }
    else {
        clearError(errorElement, element);
    }
  }
  function validatePhoneNumber(element, errorElement, e) {
    const currentIndex = element.selectionStart; 
    if(isEmpty(element)) {
        errorMessages(errorElement, emptyError, element);
        checkEmptyFocus(element, errorElement);
        return;
    }
    if(isNaN(e.key) && e.key !== "Backspace") {
        errorMessages(errorElement, notNumber, element);
        checkEmptyFocus(element, errorElement);
        e.preventDefault();
    }
    else if(element.value.length >= 11 && e.key !== "Backspace") {
        errorMessages(errorElement, "Not a valid phone number", element);
        checkEmptyFocus(element, errorElement);
        e.preventDefault();
    }
    else {
        clearError(errorElement, element);
    }
  }
  phoneInfo.forEach(({element, error}) => {
    element.addEventListener('keydown', (e)=> validatePhoneNumber(element, error, e));
    element.addEventListener('blur', function() {
        if(isEmpty(element)) {
            errorMessages(error, emptyError, element);
            checkEmptyFocus(element, error);
        }
    });
  });
  allInfo.forEach(({element, error}) => {
    element.addEventListener('keyup', ()=> validateEmpty(element, error));
  });

  form.addEventListener('submit', function(e) {
    e.preventDefault();

    // Validate all required name fields
    allInfo.forEach(({element, error}) => {
      validateEmpty(element, error);
    });

    // Validate all phone numbers
    phoneInfo.forEach(({element, error}) => {
      if(isEmpty(element)) {
        errorMessages(error, emptyError, element);
      }
      else if (element.value.length !== 11) {
        errorMessages(error, "Phone number must be 11 digits", element);
      }
    });

    // Check for any validation errors
    const errors = document.querySelectorAll('.show');
    if (errors.length > 0) {
      const firstError = errors[0];
      firstError.scrollIntoView({behavior: "smooth", block: "center"});
      return false;
    }
  });
});