// Reference the tab links.
const tabLinks = document.querySelectorAll("#tab-links li a");

// Watch for link clicks.
tabLinks.forEach(function(link) {
  link.addEventListener("click", onTabLinkClick, false);
});

// Function that handles the tab link clicks.
export function onTabLinkClick(event) {
  // Get the active link and remove the active class from the link and the target section.
  document
    .querySelector("#tab-links a.is-active")
    .classList.remove("is-active");
  document.querySelector("section.is-active").classList.remove("is-active");

  // Add the active class to the current link and corresponding section.
  event.target.classList.add("is-active");

  document
    .getElementById(event.target.href.split("#")[1])
    .classList.add("is-active");
}
