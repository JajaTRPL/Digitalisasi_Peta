// resources/js/app.js
document.addEventListener('DOMContentLoaded', function() {
    const avatar = document.querySelector('.profile-avatar');
    const dropdown = document.querySelector('.dropdown-content');

    if (avatar && dropdown) {
        avatar.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdown.classList.toggle('hidden');
        });

        window.addEventListener('click', function(event) {
            if (!avatar.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
        });
    }
});