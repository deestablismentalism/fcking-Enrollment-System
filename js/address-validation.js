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

  function replaceTextBox(replaceElement, addressType) {
    let createTBox = document.createElement("input");
        createTBox.type = "text";
        createTBox.id = `"${addressType}"`;
        createTBox.placeholder = `Enter ${addressType} manually`;
        createTBox.className = "textbox";
        replaceElement.replaceWith(createTBox);
  }
  async function getRegions() {
    try {
        const controller = new AbortController();
        const signal = controller.signal;
        const timeOut = setTimeout(() => {
          controller.abort();
          console.error("Request timed out");
          replaceTextBox(regions, "region");
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
  regions.addEventListener("change", async function() {
    await getProvinces();
  });
  async function getProvinces() {
        try {
        regionCode = regions.value;
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
          if (regions.tagName === "INPUT" && provinces.tagName === "SELECT") {
              replaceTextBox(provinces, "province");
          }
        }
      }  
      provinces.addEventListener("change", async function(){
        await getCity();
      });
async function getCity() {
    try {
          provinceCode = provinces.value;
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
        replaceTextBox(cityOrMunicipality, "city");
  }
}  
cityOrMunicipality.addEventListener("change", async function() {
  await getBarangay();
});
async  function getBarangay() {
    try {
          cityCode = cityOrMunicipality.value;
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
        replaceTextBox(barangay, "barangay");
    }
  }
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
  //set the address values
  getBarangay();
  getCity();
  getProvinces();
  getRegions();

  form.addEventListener("submit", changeAddressValues);
  getBarangay;
  getCity;
  getProvinces;
  getRegions;
});