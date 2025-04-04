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
  let isRegionFalse = false;
  const emptyError = "This field is required";

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
  function initialSelectValue(selectElement, parentElement) {
      selectElement.innerHTML = `<option value=""> Select a ${parentElement} first </option>`;
  }
  function replaceTextBox(replaceElement, addressType) {
    let createTBox = document.createElement("input");
        createTBox.type = "text";
        createTBox.id = addressType;
        createTBox.placeholder = `Enter ${addressType} manually`;
        createTBox.className = "textbox";
        replaceElement.replaceWith(createTBox);

        createTBox.addEventListener('keyup', ()=> validateEmpty(createTBox, `em-${addressType}`));
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
        }, 3000);
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
  });
  cityOrMunicipality.addEventListener("change", async function() {
    await getBarangay();
  });
  regions.addEventListener("change", async function() {
    await getProvinces();
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
    changeAddressValues();
    getBarangay;
    getCity;
    getProvinces;
    getRegions;
  });
});