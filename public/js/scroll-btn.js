document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll("section"); // Replace 'section' with your desired selector
    const scrollButton = document.querySelector('.scroll-btn');
    const observerOptions = {
        root: null, // Use the viewport as the root
        threshold: 0.5, // Element is considered dominant if 50% of it is visible
    };

    let currentDominantSection = null;

    const observerCallback = (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                currentDominantSection = entry.target.id || 1;
                currentDominantSection ++;

                scrollButton.setAttribute('href', '#'+currentDominantSection);
                
                if(isNaN(currentDominantSection)) {
                    document.getElementById("scroll-btn").className = "fa fa-arrow-up";
                } else {
                    document.getElementById("scroll-btn").className = "fa fa-arrow-down";
                }
            }
        });
    };

    const observer = new IntersectionObserver(observerCallback, observerOptions);
    sections.forEach((section) => observer.observe(section));
});

$(function() {
  $('.scroll-btn').on('click', function(e) {
    e.preventDefault(); // Prevent default anchor behavior
    const target = $($(this).attr('href')); // Get the target element by its href

    if (target.length) {
      // Scroll to the target's top position minus 45px
      $('html, body').animate(
        {
          scrollTop: target.offset().top - 44,
        },
        600 // Duration in milliseconds
      );
    } else {
      // If no target, scroll back to the top
      $('html, body').animate(
        {
          scrollTop: 0, // Scroll to the top of the page
        },
        600 // Duration in milliseconds
      );
    }
  });
});


