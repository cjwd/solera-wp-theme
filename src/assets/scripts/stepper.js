export function setStepperState(currentValue, button) {
  if (currentValue === 1) {
    button.classList.add("is-disabled");
  } else {
    button.classList.remove("is-disabled");
  }
}

export function add(buttonEl) {
  const stepperInput = buttonEl.previousElementSibling.querySelector(".qty"),
    btnDown = stepperInput.parentElement.previousElementSibling;
  let currentValue = Number(stepperInput.value);

  stepperInput.value = currentValue + 1;
  currentValue = Number(stepperInput.value);
  setStepperState(currentValue, btnDown);
}

export function minus(buttonEl) {
  const stepperInput = buttonEl.nextElementSibling.querySelector(".qty");
  let currentValue = Number(stepperInput.value);

  stepperInput.value = currentValue - 1;
  currentValue = Number(stepperInput.value);
  setStepperState(currentValue, buttonEl);
}
