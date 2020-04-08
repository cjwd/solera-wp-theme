import { setStepperState, add, minus } from "./stepper";

/** Toggle Search */
const btnSearch = document.getElementById("btn-search");
const searchEl = document.getElementById("site-search");
btnSearch.addEventListener("click", function(e) {
  e.preventDefault();
  searchEl.classList.add("is-active");
});

/** Add To Cart Stepper */
const productsEl = document.querySelector(".products");
productsEl.addEventListener("click", function(e) {
  let buttonEl = e.target,
    action = e.target.dataset.action;

  if (action === "add") {
    add(buttonEl);
  }

  if (action === "minus") {
    minus(buttonEl);
  }
});

productsEl.addEventListener("change", function(e) {
  if (e.target.matches(".qty")) {
    setStepperState(
      Number(e.target.value),
      e.target.parentElement.previousElementSibling,
    );
  }
});
/** Add To Cart Stepper End */
