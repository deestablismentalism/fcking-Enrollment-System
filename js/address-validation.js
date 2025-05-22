document.addEventListener("DOMContentLoaded", function() {
  const form = document.getElementById("enrollment-form");
  const regions = document.getElementById("region");
  const provinces = document.getElementById("province");
  const cityOrMunicipality = document.getElementById("city-municipality");
  const barangay = document.getElementById("barangay");
  const subdivsion = document.getElementById("subdivision");
  const houseNumber = document.getElementById("house-number"); 
  
  let regionCode = "";
  let provinceCode = "";
  let cityCode = "";
  const emptyError = "This field is required";
  const notNumber = "This field must be a number";

  // Function to clear error messages on user interaction
  function clearAddressErrors(element) {
    const container = element.parentElement.querySelector('.error-msg');
    if (container) {
      container.classList.remove("show");
      const errorSpan = container.querySelector('span');
      if (errorSpan) {
        errorSpan.innerHTML = '';
      }
    }
    element.style.border = "1px solid #616161";
  }

  // Add error clearing to address fields
  [regions, provinces, cityOrMunicipality, barangay, subdivsion, houseNumber].forEach(element => {
    if (element) {
      element.addEventListener('change', () => clearAddressErrors(element));
      element.addEventListener('input', () => clearAddressErrors(element));
    }
  });

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
    const container = childElement.parentElement.querySelector('.error-msg');
    const errorSpan = container.querySelector('.' + errorElement);

    container.classList.add("show");
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
  function validateSubdivision() {
    if(isEmpty(subdivsion)) {
        errorMessages("em-subdivision", emptyError, subdivsion);
        checkEmptyFocus(subdivsion, "em-subdivision");
    }
    else {
        clearError("em-subdivision", subdivsion);
    }
  }
  function validateHouseNumber(e) {
    if(isEmpty(houseNumber)) {
        errorMessages("em-house-number", emptyError, houseNumber);
        checkEmptyFocus(houseNumber, "em-house-number");
        return;
    }
    if(isNaN(e.key) && e.key !== "Backspace") {
        errorMessages("em-house-number", notNumber, houseNumber);
        checkEmptyFocus(houseNumber, "em-house-number");
        e.preventDefault();
    }
    else {
        clearError("em-house-number", houseNumber);
    }
  }
  function initialSelectValue(selectElement, parentElement) {
      selectElement.innerHTML = `<option value=""> Select a ${parentElement} first </option>`;
  }
  async function getRegions() {
    try {
        const controller = new AbortController();
        const signal = controller.signal;
        const timeOut = setTimeout(() => {
          controller.abort();
          console.error("Request timed out");
          isRegionFalse = true;
          replaceTextBox(regions, "region");
          replaceTextBox(provinces, "province");
          replaceTextBox(cityOrMunicipality, "city");
          replaceTextBox(barangay, "barangay");
        }, 10000);
        const response = await fetch("https://psgc.gitlab.io/api/regions", {signal});
                        
        if (!response.ok) {
          throw new Error(`HTTP error! ${response.status}`);
        }
          clearTimeout(timeOut);
          const data = await response.json();    
          regions.innerHTML = `<option value=""> Select a Region</option>`;
          data.forEach(region=>{
              let option = document.createElement("option");
              option.value = region.code;
              option.textContent = region.name;
              regions.appendChild(option);
          });
    }
    catch (error) {
      console.error("error fetching regions", error);
      if (regions.tagName === "SELECT") {
        replaceTextBox(regions, "region");
      }
    }
  }
  async function getProvinces() {
        try {
          regionCode = regions.value;
          console.log(regionCode);
          const response = await fetch(`https://psgc.gitlab.io/api/regions/${regionCode}/provinces`);     
          if (!response.ok) {
            throw new Error(`HTTP error! ${response.status}`);
          }
          const data = await response.json();
          
          provinces.innerHTML = `<option value=""> Select a Province</option>`;
          data.forEach(province=>{
              let option = document.createElement("option");
              option.value = province.code;
              option.textContent = province.name;
              provinces.appendChild(option);
          });
        }
        catch (error) {
          console.error(error);
          console.error("error fetching provinces", error);
          if (provinces.tagName === "SELECT" && regions.value !== "") {
              replaceTextBox(provinces, "province");
          }
        }
      }  
      
async function getCity() {
    try {
          provinceCode = provinces.value;
          console.log(provinceCode);
          const response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities`);
          if (!response.ok) {
            throw new Error(`HTTP error! ${response.status}`);
          }
          const data = await response.json();
          console.log(data);
          cityOrMunicipality.innerHTML = `<option value=""> Select a City/Municipality</option>`;
          data.forEach(city=> {
              let option = document.createElement("option");
              option.value = city.code;
              option.textContent = city.name;
              cityOrMunicipality.appendChild(option);
          });
    }
    catch (error) {
      console.error(error);
      console.error("error fetching regions", error);
      if (cityOrMunicipality.tagName === "SELECT" && provinces.value !== "") {
        replaceTextBox(cityOrMunicipality, "city");
      } 
  }
}  

async  function getBarangay() {
    try {
          cityCode = cityOrMunicipality.value;
          console.log(cityCode);
          const response = await fetch(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays`);
          if (!response.ok) {
            throw new Error(`HTTP error! ${response.status}`);
          }
          const data = await response.json();
          barangay.innerHTML = `<option value=""> Select a Barangay</option>`;
          data.forEach(barangays=> {
              let option = document.createElement("option");
              option.value = barangays.code;
              option.textContent = barangays.name;
              barangay.appendChild(option);
            });
    }
    catch(error) {
      console.error(error);
      console.error("error fetching barangays", error);
      if (barangay.tagName === "SELECT" && cityOrMunicipality.value !== "") {
        replaceTextBox(barangay, "barangay");
      }
    }
  }
  provinces.addEventListener("change", async function(){
    await getCity();
    if (provinceCode == "") {
      initialSelectValue(cityOrMunicipality, "Province");
    }
  });
  cityOrMunicipality.addEventListener("change", async function() {
    await getBarangay();
    if (cityCode == "") {
      initialSelectValue(barangay, "City/Municipality");
    }
  });
  regions.addEventListener("change", async function() {
    await getProvinces();
    if (regionCode == "") {
      initialSelectValue(provinces, "Region");
    }
  });
  subdivsion.addEventListener('keyup', validateSubdivision);
  houseNumber.addEventListener('keydown', validateHouseNumber);
  houseNumber.addEventListener('blur', function() {
    if(isEmpty(houseNumber)) {
      errorMessages("em-house-number", emptyError, houseNumber);
      checkEmptyFocus(houseNumber, "em-house-number");
    }
  });
  async function changeAddressValues() {
    try {

        if(regions.value) {
        let selectedRegion = regions.options[regions.selectedIndex];
        selectedRegion.value = selectedRegion.text;
        console.log(selectedRegion.value);
        }
        if(provinces.value) { 
        let selectedProvince = provinces.options[provinces.selectedIndex];
        selectedProvince.value = selectedProvince.text;
        console.log(selectedProvince.value);
        }
        if(cityOrMunicipality.value) {  
        let selectedCity = cityOrMunicipality.options[cityOrMunicipality.selectedIndex];
        selectedCity.value = selectedCity.text;
        console.log(selectedCity.value);
        }
        if(barangay.value) {  
        let selectedBarangay = barangay.options[barangay.selectedIndex];
        selectedBarangay.value = selectedBarangay.text;
        console.log(selectedBarangay.value);
        }
    }
    catch(error) {
      console.error(error);
    }
  }
    getRegions(); 
    if (regions.value) {
      getProvinces();
    }
    else{
      initialSelectValue(provinces, "Region");
    }
    if (provinces.value) {
      getCity();
    }
    else {
      initialSelectValue(cityOrMunicipality, "Province");
    }
    if (cityOrMunicipality.value) {
      getBarangay();
    }
    else {
      initialSelectValue(barangay, "City/Municipality");
    }
  form.addEventListener("submit", function(e){
    e.preventDefault();

    // Validate required fields
    if(isEmpty(houseNumber)) {
      errorMessages("em-house-number", emptyError, houseNumber);
    }
    validateEmpty(subdivsion, "em-subdivision");
    
    // Validate address selections
    if (regions.tagName === "SELECT") {
      if(!regions.value) {
        errorMessages("em-region", emptyError, regions);
      }
    } else if(isEmpty(regions)) {
      errorMessages("em-region", emptyError, regions);
    }

    if (provinces.tagName === "SELECT") {
      if(!provinces.value) {
        errorMessages("em-province", emptyError, provinces);
      }
    } else if(isEmpty(provinces)) {
      errorMessages("em-province", emptyError, provinces);
    }

    if (cityOrMunicipality.tagName === "SELECT") {
      if(!cityOrMunicipality.value) {
        errorMessages("em-city", emptyError, cityOrMunicipality);
      }
    } else if(isEmpty(cityOrMunicipality)) {
      errorMessages("em-city", emptyError, cityOrMunicipality);
    }

    if (barangay.tagName === "SELECT") {
      if(!barangay.value) {
        errorMessages("em-barangay", emptyError, barangay);
      }
    } else if(isEmpty(barangay)) {
      errorMessages("em-barangay", emptyError, barangay);
    }

    // Change address values for submission
    changeAddressValues();

    // Check for any validation errors
    const errors = document.querySelectorAll('.show');
    if (errors.length > 0) {
      const firstError = errors[0];
      firstError.scrollIntoView({behavior: "smooth", block: "center"});
      return false;
    }
  });

  async function replaceTextBox(replaceElement, addressType) {
    let createTBox = document.createElement("input");
    createTBox.type = "text";
    createTBox.id = addressType;
    createTBox.placeholder = `Enter ${addressType} manually`;
    createTBox.className = "textbox";
    replaceElement.replaceWith(createTBox);

    // Add error clearing to the new textbox
    createTBox.addEventListener('input', () => clearAddressErrors(createTBox));
    createTBox.addEventListener('keyup', ()=> validateEmpty(createTBox, `em-${addressType}`));
  }
});