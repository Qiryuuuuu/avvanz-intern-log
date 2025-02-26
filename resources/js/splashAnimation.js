document.addEventListener('DOMContentLoaded', function() {
    const splashImg = document.querySelector('.splash');
    const logo = document.querySelector('.avvanz-logo');
    const mainContent = document.querySelector('.main-content');
    const footer = document.querySelector('.footer');

    footer.classList.add('hidden');

    // Check if the user has visited during this session
    const hasVisited = sessionStorage.getItem('hasVisited');

    if (!hasVisited) {
        // If it's the first visit in this session, show the splash and set sessionStorage
        sessionStorage.setItem('hasVisited', 'true');

        setTimeout(() => {
            logo.classList.add('fade-out');

            setTimeout(() => {
                splashImg.style.display = "none";
                mainContent.classList.add('visible');
                document.body.classList.add('home');
                footer.classList.remove('hidden');

            }, 2000); 
        }, 2000);
    } else {
        splashImg.style.display = "none";
        mainContent.classList.add('visible');
        document.body.classList.add('home');
        footer.classList.remove('hidden'); 
    }
});
