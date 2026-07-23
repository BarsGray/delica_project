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
footerMenuLinkList.forEach((e) => {
  e.addEventListener('click', (e) => {
    e.preventDefault();
    let subMenu = event.currentTarget.nextElementSibling; 
    console.log(subMenu.scrollHeight);
    // subMenu.classList.toggle('active');
    // console.log(e.currentTarget);
  });
});