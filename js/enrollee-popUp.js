document.addEventListener('DOMContentLoaded', function (){ 

    document.querySelectorAll('.view-button').forEach(button=>{
        const enrolleeId = button.getAttribute('data-id');
        button.addEventListener('click', function(){
            const modal = document.getElementById('enrolleeModal');
            const modalContent = document.querySelector('.modal-content');
                
            modal.style.display = 'block';
            modalContent.innerHTML = '<p> Wait for data to load... </p>'; // Show loader while fetching data
            fetch('../server_side/adminEnrolleeStatusView.php?id=' + encodeURIComponent(enrolleeId))
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML = data;
                modalContent.innerHTML += `
                    <button class="accept-btn" data-action="accept"data-id="${enrolleeId}">Accept</button>
                    <button class="reject-btn" data-action="reject" data-id="${enrolleeId}">Reject</button>
                `;

                const close = document.querySelector('.close');
                close.addEventListener('click', function(){
                    modal.style.display = 'none';
                });
            })
            .catch(error => console.error('Error loading data:', error));
        })
    })

    document.addEventListener('click', function(e){
        if (e.target.matches('.accept-btn') || e.target.matches('.reject-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const action = e.target.getAttribute('data-action');

            const status = action === 'accept' ? 1 : 2; //ternary operator: 1 if accepted, 2 if rejected

            console.log(status);
            fetch('../server_side/updateEnrolleeStatus.php', {
                method: 'POST',
                headers: {
                    'Content-type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    id: enrolleeId,
                    status: status})
            })
            .then(response => response.json())
            .then(data=> {
                if (data.success) {
                    this.location.reload();
                }
                else {
                    alert('Error updating status: ' + data.message);
                }
            })
        }
    });

});