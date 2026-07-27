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

menuButton.addEventListener('click', openMenu);
overlay.addEventListener('click', openMenu);

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
const footerMenuLinkList = document.querySelectorAll('.footer_menu_box nav>ul>li>a[href=""]');

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
  },
  // breakpoints: {
  //   890: {
  //     centeredSlides: true,
  //   },
  // },
});