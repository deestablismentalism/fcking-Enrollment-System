function menu()
{
    var sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}

function dashboarddrop()
{
    var dashboard = document.querySelector('.dashboard-ul');
    dashboard.classList.toggle('active');
}

function subjectsdrop()
{
    var subjects = document.querySelector('.subjects-ul');
    subjects.classList.toggle('active');
}

function teachersdrop()
{
    var teachers = document.querySelector('.teachers-ul');
    teachers.classList.toggle('active');
}

function accountDrop() {
    var account = document.querySelector('.account-settings-btn-content-wrapper');
    account.classList.toggle('show');
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
    if (!event.target.matches('.')) {
        var dropdowns = document.querySelector('.account-settings-btn-content-wrapper');
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}
