// ======================= menu =============
const menuButton = document.querySelector('.menu_btn');
const svgMenuButton = document.querySelector('.menu_btn .ham');
// const headerMenu = document.querySelector('.menu_wrap');
// const overlay = document.querySelector('.overlay');

function openMenu() {
  // document.querySelector('body').classList.toggle('scroll-nane');

  menuButton.classList.toggle('menu_btn--active');
  svgMenuButton.classList.toggle('active');
  // headerMenu.classList.toggle('active');
  // overlay.classList.toggle('visible');
}

menuButton.addEventListener('click', openMenu);
// overlay.addEventListener('click', openMenu);

// let isExecuted = false;
// window.addEventListener('resize', () => {
//   if (window.innerWidth >= 1320) {
//     if (!isExecuted && headerMenu.classList.contains('active')) {
//       openMenu();
//       isExecuted = true;
//     }
//   } else {
//     isExecuted = false;
//   }
// });