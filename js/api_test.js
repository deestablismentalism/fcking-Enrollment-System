document.addEventListener("DOMContentLoaded", function() {
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
  let subdivisionCode = "";
  async function getRegions( ) {
    
    try {
        let response = await fetch("https://psgc.gitlab.io/api/regions");
        let data = await response.json();                     
        
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
            console.log(regionCode);
            let response = await fetch(`https://psgc.gitlab.io/api/regions/${regionCode}/provinces`);
            let data = await response.json();

            data.forEach(province=>{
                let option = document.createElement("option");
                option.value = province.code;
                option.textContent = province.name;
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
          let response = await fetch(`https:/psgc.gitlab.io/api/provinces/${provinceCode}/cities-municipalities`);
          let data = await response.json();
          console.log(data);

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
  getBarangay();
  getCity();
  getProvinces();
  getRegions();
});