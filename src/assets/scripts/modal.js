export function modal(el) {
  const body = document.body,
    activeClass = 'is-active';

  let modal = '';

  if (el.hasAttribute('data-modal')) {
    modal = document.getElementById(el.dataset.modal);
    modal.classList.add(activeClass);
    body.classList.add('u-overlay');
  }

  if (el.hasAttribute('data-modal-close')) {
    console.log(el);
    modal = document.getElementById(el.dataset.modalClose);
    modal.classList.remove(activeClass);
    body.classList.remove('u-overlay');
  }
}
