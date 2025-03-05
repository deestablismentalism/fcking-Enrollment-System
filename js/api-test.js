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
  let barangayCode = "";

  async function getRegions() {
    try {
        let response = await fetch("https://psgc.gitlab.io/api/regions");
        let data = await response.json();                     
        
        regions.innerHtml = `<option value=""> Select a Region</option>`;
        data.forEach(region=>{
            let option = document.createElement("option");
            option.value = region.code;
            option.textContent = region.name;
            regions.appendChild(option);
        });
    }
    catch (error) {
      console.error(error);
    }
  }
  function getProvinces() {
      try {
        regions.addEventListener("change", async function() {
            regionCode = this.value;
            let response = await fetch(`https://psgc.gitlab.io/api/regions/${regionCode}/provinces`);
            console.log(regionCode);        
            let data = await response.json();
            
            provinces.innerHtml = `<option value=""> Select a Province</option>`;
            data.forEach(province=>{
                let option = document.createElement("option");
                option.value = province.code;
                option.textContent = province.name;
                option.style.fontSize = "0.88em";
                provinces.appendChild(option);
            });
        });
      }
      catch (error) {
        console.error(error);
      }
  }
  function getCity() {
    try {
      provinces.addEventListener("change", async function(){
          provinceCode = this.value;
          let response = await fetch(`https://psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities`);
          let data = await response.json();
          console.log(data);

          cityOrMunicipality.innerHtml = `<option value=""> Select a Region</option>`;
          data.forEach(city=> {
              let option = document.createElement("option");
              option.value = city.code;
              option.textContent = city.name;
              cityOrMunicipality.appendChild(option);
          });
      });
    }
    catch (error) {
      console.error(error);
    }
  }
  function getBarangay() {
    try {
        cityOrMunicipality.addEventListener("change", async function() {
          cityCode = this.value;
          let response = await fetch(`https://psgc.gitlab.io/api/cities-municipalities/${cityCode}/barangays`);
          let data = await response.json();
          
          barangay.innerHtml = `<option value=""> Select a Region</option>`;
          data.forEach(barangays=> {
              let option = document.createElement("option");
              option.value = barangays.code;
              option.textContent = barangays.name;
              barangay.appendChild(option);
            });
          });
    }
    catch(error) {
      console.error(error);
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
        let selectedCity = cityOrMunicipality.option[cityOrMunicipality.selectedIndex];
        selectedCity.value = selectedCity.text;
        console.log(selectedCity.value);
        }
        if(barangay.value) {  
        let selectedBarangay = barangay.option[barangay.selectedIndex];
        selectedBarangay.value = selectedBarangay.text;
        console.log(selectedBarangay.value);
        }
    }
    catch(error) {
      console.error(error);
    }
  }
  //set the address values
  getRegions();
  getProvinces();
  getCity();
  getBarangay();

  form.addEventListener("submit", changeAddressValues);
  getBarangay;
  getCity;
  getProvinces;
  getRegions;
});