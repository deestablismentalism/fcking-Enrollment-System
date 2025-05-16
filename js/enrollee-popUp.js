document.addEventListener('DOMContentLoaded', function (){ 
        const modal = document.getElementById('enrolleeModal');
        const modalContent = document.querySelector('.modal-content');
    document.addEventListener('click', function (e) {
       if (e.target.classList.contains('view-button')) {
            const enrolleeId = e.target.getAttribute('data-id');
            console.log(enrolleeId);
                
            modal.style.display = 'block';
            modalContent.innerHTML = '<p> Wait for data to load... </p>'; // Show loader while fetching data
            fetch('../server_side/adminEnrolleeStatusView.php?id=' + encodeURIComponent(enrolleeId))
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML = data;
                modalContent.innerHTML += `
                    <button class="accept-btn" data-action="accept"data-id="${enrolleeId}">Accept</button>
                    <button class="reject-btn" data-action="reject" data-id="${enrolleeId}">Reject</button>
                    <button class="toFollow-btn" data-action="toFollow" data-id="${enrolleeId}">To Follow</button>
                `;

                const close = document.querySelector('.close');
                close.addEventListener('click', function(){
                    modal.style.display = 'none';
                });
            })
            .catch(error => console.error('Error loading data:', error));
       }
    })

    document.addEventListener('click', function(e){
        if (e.target.matches('.accept-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const action = e.target.getAttribute('data-action');
            const status = 0
            if (action === "accept") {
                status = 4
            } 
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
                    alert("successfully submitted");
                    this.location.reload();
                }
                else {
                    alert('Error updating status: ' + data.message);
                }
            })
        }
        if (e.target.matches('.toFollow-btn') || e.target.matches('.reject-btn')) {
            const enrolleeId = e.target.getAttribute('data-id');
            const action = e.target.getAttribute('data-action');
            const status = action === 'toFollow' ? 1 : 2;
            modalContent.innerHTML = `
                <span class="close">&times;</span>
                <form id="deny-followup">
                    <input type="hidden" name="id" value="${enrolleeId}">
                    <input type="hidden" name="status" value="${status}">
                    <p> What is the reason for following up/Denying this enrollee? </p>
                    <input type="checkbox" id="wrong-input" name="reasons[]" value="Wrong input" class="checkboxes">
                    <label for="wrong-input">There are fields with wrong input</label><br>
                    <input type="checkbox" id="no-input" name="reasons[]" value="No input" class="checkboxes">
                    <label for="no-input">There are fields without input</label><br>
                    <input type="checkbox" id="blurred-image" name="reasons[]" value="Blurred Image" class="checkboxes">
                    <label for="blurred-image"> Blurred Image </label>
                    <p> State Accurate description </p>
                    <textarea id="description" class="description-box" name="description" rows="6" cols="40" placeholder="write description here.."></textarea><br>
                    <button type="submit"> Submit followup </button>
                </form>
            `;
            const close = document.querySelector('.close');
                close.addEventListener('click', function(){
                    modal.style.display = 'none';
                });
            const form = document.getElementById('deny-followup');
            const formData = new FormData(form);

            for(const[key, value] of formData.entries()){
                console.log(`${key}: ${value}`);
            }
            fetch('../server_side/adminEnrolleeFollowup.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data);
                } else {
                    console.log('Error sending data: ' + data.message);
                }
            })
        }
    });
    
});