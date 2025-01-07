let $ = jQuery.noConflict()

document.addEventListener("DOMContentLoaded", function () {
  navbar();
  header();
  smoothScroll();
  initScrollSpy('.sidebar-nav', {
    offset: 110,
    activeClass: 'active',
  });
  sliderFeatureServiceCategories();
  sliderIndustriesCategories();
  sliderBlogCategories();
  copyCurrentLink();
  updateBlogCat();
  updateBlogSearch();
  updateBlogPagination();
  AOS.init({once: true, duration: 400});
});

function updateBlogCat() {
  $(document).on('click', '.blog .swiper-slide .tab-btn-content', function (e) {
    e.preventDefault();

    if ($(this).parent().hasClass('active')) {
      return false;
    }

    $('.blog .swiper-slide .tab-btn').removeClass('active');
    $(this).parent().addClass('active');

    updateBlogPosts();
  });
}

function updateBlogSearch() {
  $(document).on('input', '.blog .blog-search-form input', function (e) {
    e.preventDefault();

    updateBlogPosts();
  });
}

function updateBlogPagination() {
  $(document).on('click', '.blog .blog__pagination .pagination-item a', function (e) {
    e.preventDefault();

    let paged = $(this).data('page');

    updateBlogPosts(paged);
  });
}

function updateBlogPosts(paged = false) {
  let data = collectBlogData();

  if (paged !== false) {
    data.append('paged', paged);
  }

  $.ajax({
    type: 'POST',
    url: theme_ajax_object.wp_ajax,
    data: data,
    processData: false,
    contentType: false,
    success: function (response) {
      if (response.success === true) {
        $('.blog .blog__details').html(response.data);
        $('html, body').animate({
          scrollTop: $('.blog').offset().top
        }, 500);
      } else {
        console.log('ERROR')
      }
    },
    error: function () {
      console.log('ERROR')
    }
  })
}

function collectBlogData() {
  let data = new FormData($('.blog .blog-search-form')[0]),
    cat = $('.blog .swiper-blog-categories .tab-btn.active .tab-btn-content').data('cat');

  data.append('action', 'update_blog');
  data.append('cat', cat);

  return data;
}

function copyCurrentLink() {
  $(document).on('click', '.copy-current-link', function (e) {
    e.preventDefault();

    // Get the current page URL
    var currentLink = window.location.href;

    // Use the Clipboard API if available
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(currentLink).then(function () {
      }, function (err) {
        console.error('Could not copy text: ', err);
      });
    } else {
      // Fallback for older browsers:
      var tempInput = $('<input>');
      $('body').append(tempInput);
      tempInput.val(currentLink).select();
      document.execCommand('copy');
      tempInput.remove();
    }
  });
}

function sliderBlogCategories() {
  if (!document.querySelector('.swiper-blog-categories')) {
    return false;
  }

  var blogCategories = new Swiper(".swiper-blog-categories", {
    slidesPerView: 1.5,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2.5,
      },
      992: {
        slidesPerView: 3,
      },
      1220: {
        slidesPerView: 3.5,
      },
      1440: {
        slidesPerView: 4,
      },
    }
  });
}

function sliderIndustriesCategories() {
  if (!document.querySelector('.swiper-industries-categories') || !document.querySelector('.swiper-industries-details')) {
    return false;
  }

  var industriesCategories = new Swiper(".swiper-industries-categories", {
    slidesPerView: 1.5,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    watchSlidesProgress: true,
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2.5,
      },
      992: {
        slidesPerView: 3,
      },
      1220: {
        slidesPerView: 3.5,
      },
      1440: {
        slidesPerView: 4,
      },
    },
    on: {
      slideChange: function (slider) {
        if (industriesDetails) {
          industriesDetails.slideTo(slider.activeIndex);
        }

      }
    }
  });
  var industriesDetails = new Swiper(".swiper-industries-details", {
    spaceBetween: 16,
    autoHeight: true,
    thumbs: {
      swiper: industriesCategories,
    },
  });
}

function sliderFeatureServiceCategories() {
  if (!document.querySelector('.swiper-feature-service-categories') || !document.querySelector('.swiper-feature-service-details')) {
    return false;
  }

  var featureServiceCategories = new Swiper(".swiper-feature-service-categories", {
    slidesPerView: 1.5,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    watchSlidesProgress: true,
    breakpoints: {
      576: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2.5,
      },
      1220: {
        slidesPerView: 3,
      },
    },
    on: {
      slideChange: function (slider) {
        if (featureServiceDetails) {
          featureServiceDetails.slideTo(slider.activeIndex);
        }

      }
    }
  });
  var featureServiceDetails = new Swiper(".swiper-feature-service-details", {
    spaceBetween: 16,
    autoHeight: true,
    //- navigation: {
    //- nextEl: ".swiper-button-next",
    //- prevEl: ".swiper-button-prev",
    //- },
    thumbs: {
      swiper: featureServiceCategories,
    },
  });
}

function navbar() {
  const navigation = document.querySelector(".navigation");
  const navigationButton = document.querySelector(".js-navigation-btn");
  navigation.addEventListener('click', function (e) {
    if (e.target.tagName === "A") {
      navigation.classList.remove("open");
    }
  })
  if (!navigationButton) return;
  navigationButton.addEventListener("click", function () {
    navigation.classList.toggle("open");
  });
}

function header() {
  const header = document.querySelector("header");
  checkHeaderOffset();
  document.addEventListener("scroll", function () {
    checkHeaderOffset();
  }, {passive: true});

  function checkHeaderOffset() {
    let offsetTop = document.documentElement.scrollTop;
    if (offsetTop > 1) {
      header.classList.add("active");
    } else {
      header.classList.remove("active");
    }
  }
}

function smoothScroll() {
  let linkNav = document.querySelectorAll('[href^="#"]');
  let headerHeight = document
    .querySelector(".header")
    .getBoundingClientRect().height;
  let V = 0.2;
  for (let i = 0; i < linkNav.length; i++) {
    linkNav[i].addEventListener("click", function (e) {
      e.preventDefault();
      scroll(e.currentTarget)
    });
  }

  function scroll(element) {
    let w = window.pageYOffset;
    let hash = element.href.replace(/[^#]*(.*)/, "$1");
    let tar = document.querySelector(hash);
    let t = tar.getBoundingClientRect().top - headerHeight;
    let start = null;

    requestAnimationFrame(step);

    function step(time) {
      if (start === null) {
        start = time;
      }
      var progress = time - start,
        r =
          t < 0
            ? Math.max(w - progress / V, w + t)
            : Math.min(w + progress / V, w + t);
      window.scrollTo(0, r);
      if (r != w + t) {
        requestAnimationFrame(step);
      } else {
        location.hash = hash;
      }
    }

    if (t > 1 || t < -1) {
      requestAnimationFrame(step);
    }
  }
}

function initScrollSpy(navSelector, options = {}) {
  const nav = document.querySelector(navSelector);
  if (!nav) {
    console.warn("ScrollSpy: Navigation not found.");
    return;
  }

  const links = Array.from(nav.querySelectorAll('a[href^="#"]'));
  const sections = links.map((link) =>
    document.querySelector(link.getAttribute("href"))
  );
  const offset = options.offset || 0;
  const activeClass = options.activeClass || "active";

  if (!links.length || !sections.length) {
    console.warn("ScrollSpy: Links or sections not found.");
    return;
  }

  function handleScroll() {
    const scrollPosition = window.scrollY + offset;

    sections.forEach((section, index) => {
      const sectionTop = section.offsetTop;
      const sectionBottom = sectionTop + section.offsetHeight;

      if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
        setActiveLink(links[index]);
      }
    });
  }

  function setActiveLink(activeLink) {
    links.forEach((link) => link.classList.remove(activeClass));
    if (activeLink) {
      activeLink.classList.add(activeClass);
    }
  }

  window.addEventListener("scroll", handleScroll, {passive: true});

  handleScroll();
}
