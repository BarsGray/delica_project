jQuery(function ($) {
  // ======================= header =============
  function scrollTop() {
    let scroll_scr = window.scrollY;
    if (scroll_scr > document.querySelector('.header_top_row').scrollHeight)
      document.querySelector('.header').classList.add('scroll');
    else
      document.querySelector('.header').classList.remove('scroll');
  }
  scrollTop();
  window.addEventListener('scroll', scrollTop);
  // ======================= menu ==========================
  const menuButton = document.querySelector('.menu_btn');
  const svgMenuButton = document.querySelector('.menu_btn .ham');
  const headerMenu = document.querySelector('.header_menu');
  const overlay = document.querySelector('.overlay');

  function openMenu() {
    document.querySelector('body').classList.toggle('scroll-nane');

    menuButton.classList.toggle('menu_btn--active');
    svgMenuButton.classList.toggle('active');
    headerMenu.classList.toggle('header_menu--active');

    overlay.classList.toggle('overlay--visible');
  }

  menuButton.addEventListener('click', (e) => {e.preventDefault(); openMenu();});
  overlay.addEventListener('click', (e) => {e.preventDefault(); openMenu();});

  let isExecuted = false;
  window.addEventListener('resize', () => {
    if (window.innerWidth >= 1100) {
      if (!isExecuted && headerMenu.classList.contains('header_menu--active')) {
        openMenu();
        isExecuted = true;
      }
    } else {
      isExecuted = false;
    }
  });
  // ======================= footer_menu ==========================
  const footerMenuLinkList = document.querySelectorAll('.footer_menu_box nav>ul>li.menu-item-has-children>a');

  function resetSubMenu() {
    footerMenuLinkList.forEach((link) => {
      if (!link.nextElementSibling) return;
      link.classList.remove('active');
      link.nextElementSibling.classList.remove('active');
      link.nextElementSibling.removeAttribute('style');
    });
  }

  footerMenuLinkList.forEach((link) => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      if (window.innerWidth > 920) return;
      
      const subMenu = e.currentTarget.nextElementSibling;
      if (!subMenu) return;
      const isOpen = subMenu.classList.contains('active');
      
      resetSubMenu();
      
      if(!isOpen) {
        subMenu.classList.add('active');
        e.currentTarget.classList.add('active');
        subMenu.setAttribute('style', 'max-height:' + subMenu.scrollHeight + 'px;');
      }
    });
  });
  // ======================= swiper_bunner ==========================
  const bunner_swiper = new Swiper('.bunner_swiper', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 1,
    slidesPerGroup: 1,
    // spaceBetween: 24,
    navigation: {
      nextEl: ".bunner_btn_next",
      prevEl: ".bunner_btn_prev"
    },
    pagination: {
      el: ".bunner_pagination",
      clickable: true,
    }
  });
  // ======================= swiper_product ==========================
  document.querySelectorAll('.product_gallery').forEach((galleryEl) => {
    const thumbs = new Swiper(galleryEl.querySelector('.product_thumb_slider'), {
        slidesPerView: 5,
        spaceBetween: 11,
        watchSlidesProgress: true,
        slideToClickedSlide: true,
        watchOverflow: true,
        breakpoints: {
        1100: {
          direction: 'vertical',
          spaceBetween: 15,
        },
        870: {
          direction: 'vertical',
          spaceBetween: 11,
        },
      },
    });

    const gallery = new Swiper(galleryEl.querySelector('.product_main_slider'), {
        spaceBetween: 10,
        thumbs: {swiper: thumbs}
    });
  });
  // ======================= swiper_foto_slider =============
  const foto_slider_swiper = new Swiper('.foto_slider', {
    loop: true,
    centeredSlides: false,
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 26,
    navigation: {
      nextEl: ".foto_slider_on_main .btn_next",
      prevEl: ".foto_slider_on_main .btn_prev"
    },
    pagination: {
      el: ".foto_slider__pagination",
      clickable: true,
    },
    breakpoints: {
      890: {
        centeredSlides: true,
      },
    },
  });
  // ======================= other_prod_slider =============
  const other_prod_slider = new Swiper('.other_prod_slider', {
    slidesPerView: 4,
    slidesPerGroup: 1,
    spaceBetween: 12,
    scrollbar: {el: ".swiper-scrollbar"},
    navigation: {nextEl: ".other_prod_slider_btn_next",prevEl: ".other_prod_slider_btn_prev"},
    breakpoints: {
      1100: {spaceBetween: 24},
      750: {slidesPerView: 4},
      500: {slidesPerView: 3},
      310: {slidesPerView: 1.5}
    }
  });
  // ======================= fancybox =============
  const galleryParams = {
    dragToClose: false,
    animated: false,
    placeFocusBack: false,
    Carousel: {Toolbar: {display: {left: [],middle: [],right: ['close']}}}
  }
  const sectionProduct = document.querySelectorAll('.section_product');

  sectionProduct.forEach((e, i) => {
    e.querySelectorAll('a').forEach(link => { link.setAttribute('data-fancybox', `gallery-${i}`); });
    Fancybox.bind(`.product_main_slider [data-fancybox="gallery-${i}"]`, galleryParams);
  });
  Fancybox.bind('.foto_slider_on_main [data-fancybox="gallery_foto_slider"]', galleryParams);

  // ======================= show more content =======================
	const hideContainer = document.querySelector('.hide');
	const hideTextContainer = document.querySelector('.hide_text');
	const btnMore = document.querySelector('.more');

	if (btnMore) {
		btnMore.addEventListener('click', () => {
      hideContainer.classList.toggle('active');
			hideTextContainer.classList.toggle('active');

			if (hideTextContainer.classList.contains('active')) {
        hideTextContainer.setAttribute('style', 'max-height: '+hideTextContainer.scrollHeight+'px;');
        
				btnMore.innerHTML = 'Cвернуть';
				btnMore.classList.add('active');
			} else {
				btnMore.innerHTML = 'Подробнее';
				btnMore.classList.remove('active');

        hideTextContainer.setAttribute('style', 'max-height: 300px;');
			}
		});
	}
	
	// $('.gdpr > a').click(function(e){
	// 	e.preventDefault();
	// 	document.cookie='gdpr_site=gdpr;path=/;max-age=86400000';
	// 	$(this).closest('.gdpr').remove();
	// });
});