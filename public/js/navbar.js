document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.nav-item.menu');
    const navLinks = document.getElementById('nav-links');
    const headerDiv = document.querySelector('.header-div');
    const headerLogo = document.getElementById('brand-logo');
    const navActive = document.querySelector('.nav-item.active')

    hamburger.addEventListener('click', function() {
        event.preventDefault();
        navLinks.classList.toggle('show');
        headerDiv.classList.toggle('show');
    });
    
    window.addEventListener('scroll', function() {
        const section = document.getElementById('1');
        // Get the height of the section
        const sectionHeight = section.offsetHeight;
        // Get the scroll position
        const scrollPosition = window.scrollY || document.documentElement.scrollTop;; // Get the vertical scroll position
        const viewportWidth = window.innerWidth;
        console.log(scrollPosition);

        // Check if the scroll position is exactly equal to 100vh
        if (scrollPosition <= 1) {
            headerDiv.style.backgroundColor = 'transparent';
            if(headerLogo){
                headerLogo.style.width = '200px';
            }
            if(navLinks){
                if(viewportWidth <= 770){
                    navLinks.style.top = '60px';
                }
            }
        } else if (scrollPosition === (sectionHeight*(3/4))) {
            headerDiv.style.backgroundColor = 'rgba(0,0,0,0.8)';
            if(headerLogo){
                headerLogo.style.width = '150px';
            }
            if(navLinks){
                if(viewportWidth <= 770){
                    navLinks.style.top = '45px';
                }
            }
        } else if (scrollPosition < (sectionHeight*(3/4))) {
            headerDiv.style.backgroundColor = 'transparent';
            if(headerLogo){
                headerLogo.style.width = '200px';
            }
            if(navLinks){
                if(viewportWidth <= 770){
                    navLinks.style.top = '60px';
                }
            }
        } else {
            headerDiv.style.backgroundColor = 'rgba(0,0,0,0.8)';
            if(headerLogo){
                headerLogo.style.width = '150px';
            }
            if(navLinks){
                if(viewportWidth <= 770){
                    navLinks.style.top = '45px';
                }
            }
        }
    });
});

