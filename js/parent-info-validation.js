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
        {element: fatherMname, error: "em-father-middle-name"},
        {element: fatherFname, error: "em-father-first-name"},
        {element: motherLname, error: "em-mother-last-name"},
        {element: motherMname, error: "em-mother-middle-name"},
        {element: motherFname, error: "em-mother-first-name"},
        {element: guardianLname, error: "em-guardian-last-name"},
        {element: guardianMname, error: "em-guardian-middle-name"},
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
    const errorField = document.querySelector("." + errorElement);
    errorField.classList.remove("show");
    errorField.innerHTML = "";
    childElement.style.border = "1px solid #616161";
}
  function checkEmptyFocus(element, errorElement) {
    element.addEventListener('blur', ()=> clearError(errorElement, element));
  } 
  function errorMessages(errorElement, message, childElement) {
    document.querySelector("."+errorElement).classList.add("show");
    childElement.style.border = "1px solid red";
    document.querySelector("."+errorElement).innerHTML = message;
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
    else if(isEmpty(element) && currentIndex !== 0) {
        errorMessages(errorElement, emptyError, element);
        checkEmptyFocus(element, errorElement);
    }
    else {
        clearError(errorElement, element);
    }
  }
  phoneInfo.forEach(({element, error}) => {
    element.addEventListener('keydown', (e)=> validatePhoneNumber(element, error, e));
  });
  allInfo.forEach(({element, error}) => {
    element.addEventListener('keyup', ()=> validateEmpty(element, error));
  });
});