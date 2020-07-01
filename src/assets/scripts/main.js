import { setStepperState, add, minus } from './stepper';
import { modal } from './modal';
import { slideToggle, slideUp } from './slideToggle';

const parent = document.getElementById('page-container');
parent.addEventListener('click', function(e) {
  /** Toggle Menu */
  if (e.target.id == 'btn-menu') {
    var mobileMenu = document.querySelector('.c-mobileMenuWrapper');
    mobileMenu.classList.add('open');
    document.body.classList.add('has-overlay');
  }
  /** Toggle Search */
  if (e.target.id == 'btn-search' || e.target.id == 'btn-close-search') {
    modal(e.target);
    const searchField = document.getElementById(
      'woocommerce-product-search-field-0',
    );
    if (searchField) {
      setTimeout(function() {
        searchField.focus();
      }, 1000);
    }
  }
});

var mobileMenuWrapper = document.querySelector('.c-mobileMenuWrapper');
var btnCloseMobileMenu = document.querySelector('.c-btn--close');
btnCloseMobileMenu.addEventListener('click', function() {
  mobileMenuWrapper.classList.remove('open');
  document.body.classList.remove('overlay');
});

/** Toggle Mobile Menu Submenus */
var mobileNav = document.getElementById('mobile-primary-menu');
mobileNav.addEventListener('click', function(e) {
  if (e.target.parentElement.classList.contains('c-menu-item-has-children')) {
    slideToggle(e.target.nextElementSibling, 500);
    if (e.target.classList.contains('is-active')) {
      e.target.classList.remove('is-active');
    } else {
      e.target.classList.add('is-active');
    }
  }
});

/** Add To Cart Stepper */
const productsEl = document.querySelector('.products');
if (productsEl) {
  productsEl.addEventListener('click', function(e) {
    let buttonEl = e.target,
      action = e.target.dataset.action;

    if (action === 'add') {
      add(buttonEl);
    }

    if (action === 'minus') {
      minus(buttonEl);
    }
  });

  productsEl.addEventListener('change', function(e) {
    if (e.target.matches('.qty')) {
      setStepperState(
        Number(e.target.value),
        e.target.parentElement.previousElementSibling,
      );
    }
  });
}
/** Add To Cart Stepper End */
