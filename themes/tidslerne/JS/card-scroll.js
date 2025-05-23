let page = 2;
let isLoading = false;
let hasMore = true;



document.addEventListener('DOMContentLoaded', () => {
        // Re-initialize Fancybox for dynamically loaded content
        Fancybox.bind('[data-fancybox="gallery"]', {});
  const cardContainer = document.getElementById("cardCarousel");
  const galleryContainer = document.getElementById("galleryCarousel");

  // CARD: Load More
  function maybeLoadMoreCards() {
    if (!cardContainer || isLoading || !hasMore) return;

    const scrollRight = cardContainer.scrollWidth - cardContainer.scrollLeft - cardContainer.clientWidth;

    if (scrollRight < 100 || cardContainer.scrollWidth <= cardContainer.clientWidth) {
      isLoading = true;

      fetch(cardScrollAjax.ajaxurl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({
          action: 'load_more_cards',
          page: page
        })
      })
      .then(res => res.json())
      .then(data => {
        const temp = document.createElement('div');
        temp.innerHTML = data.html;

        temp.querySelectorAll('.article-card').forEach(card => {
          cardContainer.appendChild(card);
        });

        hasMore = data.has_more;
        page++;
        isLoading = false;

        maybeLoadMoreCards();
      })
      .catch(err => {
        console.error('Card AJAX error:', err);
        isLoading = false;
      });
    }
  }

  

  // Scroll + Init triggers
  if (cardContainer) {
    cardContainer.addEventListener('scroll', maybeLoadMoreCards);
    maybeLoadMoreCards();

    window.scrollCarousel = function (direction) {
      const cardWidth = 355;
      const gap = 40;
      const scrollAmount = cardWidth + gap;

      gsap.to(cardContainer, {
        scrollLeft: cardContainer.scrollLeft + direction * scrollAmount,
        duration: 0.6,
        ease: "power2.out"
      });
    };
  }

  
  
});