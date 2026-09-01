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

  // Fancybox.bind('[data-fancybox="popup_box"]', {});
  Fancybox.bind('[data-popup_box]', {
    type: 'inline'
  });

  // ======================= validate input  =============
	const allForms = document.querySelectorAll('.wpcf7-form');

	allForms.forEach(form => {
		const phoneInput = form.querySelector('input[type="tel"]');
		const submitButton = form.querySelector('button[type="submit"]');
		const checkbox = form.querySelector('input[type="checkbox"][name^="acceptance"]');

		// деактивируем кнопку
		submitButton.disabled = true;

		checkbox.addEventListener('change', () => {
			if (phoneInput.value.length == 18) { submitButton.disabled = !checkbox.checked; }
		});

		phoneInput.addEventListener('focus', () => {
			if (!phoneInput.value) { phoneInput.value = '+7 '; }
			if (phoneInput.value.length < 18) { phoneInput.classList.remove('wpcf7-not-valid'); }
		});

		phoneInput.addEventListener('blur', () => {
			if (phoneInput.value === '+7 ') { phoneInput.value = ''; phoneInput.classList.remove('wpcf7-not-valid'); }
			if (phoneInput.value.length < 18 && phoneInput.value.length > 3) { phoneInput.classList.add('wpcf7-not-valid'); }
		});

		phoneInput.addEventListener('input', (e) => {
			let input = e.target.value.replace(/\D/g, '');
			let formatted = '';

			if (['7', '8', '9'].includes(input[0])) {
				if (input[0] === '9') input = '7' + input;
				input = input.substring(1);
			}

			formatted = '+7 ';

			if (input.length > 0) { formatted += '(' + input.substring(0, 3); }
			if (input.length >= 4) { formatted += ') ' + input.substring(3, 6); }
			if (input.length >= 7) { formatted += '-' + input.substring(6, 8); }
			if (input.length >= 9) { formatted += '-' + input.substring(8, 10); }

			e.target.value = formatted;

			// делаетм кнопку активной, не активной
			if (phoneInput.value.length == 18 && checkbox.checked) {
				submitButton.disabled = false;
			} else {
				submitButton.disabled = true;
			}
		});

		phoneInput.addEventListener('keydown', (e) => {
			if (e.target.value.length <= 4 && e.keyCode === 8) { e.preventDefault(); }
		});

		form.addEventListener('submit', (e) => {
			if (phoneInput.value.length < 18) {
				// alert('Пожалуйста, введите номер телефона полностью');
				e.preventDefault();
				phoneInput.classList.add('wpcf7-not-valid');
				e.stopImmediatePropagation();
				return false;
			} else {
				phoneInput.classList.remove('wpcf7-not-valid');
			}
		}, true);
	});

  // ======================= show more content =======================
  document.querySelectorAll('.hide').forEach(hideContainer => {
  const hideTextContainer = hideContainer.querySelector('.hide_text');
  const btnMore = hideContainer.querySelector('.more');

  if (!hideTextContainer || !btnMore) return;

  if (hideTextContainer.scrollHeight > 300) {
    hideTextContainer.style.maxHeight = '300px';

    btnMore.addEventListener('click', () => {
      const isActive = hideTextContainer.classList.toggle('active');
      
      hideContainer.classList.toggle('active', isActive);
      btnMore.classList.toggle('active', isActive);
      if (isActive) {
        btnMore.textContent = 'Свернуть';
				btnMore.classList.add('active');

        hideTextContainer.style.maxHeight = hideTextContainer.scrollHeight + 'px';
      } else {
        btnMore.textContent = 'Подробнее';
				btnMore.classList.remove('active');

        hideTextContainer.style.maxHeight = '300px';
      }
    });
  } else {
    btnMore.style.display = 'none';
    setTimeout(()=>{hideContainer.classList.remove('hide');},500);
  }
});
	
	// $('.gdpr > a').click(function(e){
	// 	e.preventDefault();
	// 	document.cookie='gdpr_site=gdpr;path=/;max-age=86400000';
	// 	$(this).closest('.gdpr').remove();
	// });


});