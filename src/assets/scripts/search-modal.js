export function modal(e) {
  const el = e.target,
    body = document.body,
    activeClass = "is-active";

  let modal = "";

  if (el.hasAttribute("data-modal")) {
    e.preventDefault();
    modal = document.getElementById(el.dataset.modal);
    modal.classList.add(activeClass);
    body.classList.add("u-overlay");
  }

  if (el.hasAttribute("data-modal-close")) {
    e.preventDefault();
    modal = document.getElementById(el.dataset.modalClose);
    modal.classList.remove(activeClass);
    body.classList.remove("u-overlay");
  }
}
