document.addEventListener('DOMContentLoaded', function () {
    // Get the theme toggle button
    const themeToggle = document.querySelector('.theme-toggle');

    if (themeToggle) {
        themeToggle.addEventListener('click', function (e) {
            e.preventDefault();

            // Toggle dark mode class on body
            document.body.classList.toggle('dark-mode');

            // Update icons and text
            const isDarkMode = document.body.classList.contains('dark-mode');
            const darkIcon = document.querySelector('.dark-icon');
            const lightIcon = document.querySelector('.light-icon');
            const themeText = document.querySelector('.theme-text');

            if (isDarkMode) {
                darkIcon.style.display = 'none';
                lightIcon.style.display = 'inline-block';
                themeText.textContent = 'Light Mode';
            } else {
                darkIcon.style.display = 'inline-block';
                lightIcon.style.display = 'none';
                themeText.textContent = 'Dark Mode';
            }

            // Save preference to cookie
            fetch('/toggle-theme')
                .then(response => {
                    console.log('Theme preference saved');
                })
                .catch(error => {
                    console.error('Error saving theme preference:', error);
                });
        });
    }
});