fetch("https://psgc.gitlab.io/api/regions/")
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error("Error:", error));  
