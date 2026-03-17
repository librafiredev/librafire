function intersection() {
  const elements = document.querySelectorAll(".js-observe");
  const animate = (el) => {
    // do your animation
    el.classList.add("active");
  };
  // Check if IntersectionObserver is supported by the browser
  if (!('IntersectionObserver' in window)) {
    // Fallback for browsers that do not support IntersectionObserver
    elements.forEach((el) => {
      el.classList.add('active');
    });
    return;
  }
  const myObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animate(entry.target);
          observer.unobserve(entry.target); // Stop observing once animation is triggered
        }
      });
    },
    {
      rootMargin: "0px 0px -100px 0px", // Trigger intersection when top of the element is 100px inside of the screen
    }
  );
  elements.forEach((el) => {
    myObserver.observe(el);
  });
}
intersection();



// Logo menu wrapper

setTimeout(() => {
  const logoMenuWrapper = document.querySelector('.logo-menu-wrapper');
  logoMenuWrapper.classList.add('top-fixed');
}, 500);


