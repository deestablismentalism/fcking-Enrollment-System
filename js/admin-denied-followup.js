document.addEventListener('DOMContentLoaded', function() {
     
    const row = document.querySelectorAll('.denied-followup-row');
    console.log(row);
    row.forEach(row=> {
        const status = row.querySelector('td:nth-child(5)');
        console.log(status);
       if (status) {
            const statusValue = status.textContent.trim().toLowerCase();
            status.innerHTML = `<span class="status-cell status-${statusValue}"> ${statusValue.toUpperCase()} </span>`;
       }
    })
    

});