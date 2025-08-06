export function SelectBox() {
  const selectBoxGroup = document.querySelectorAll(".select-box");
  if (!selectBoxGroup) return;

  function toggleActivatePanel(panel, icon, selector) {
    panel.classList.toggle("opacity-0");
    panel.classList.toggle("-translate-y-4");
    panel.classList.toggle("pointer-events-none");
    icon.classList.toggle("rotate-180");
    icon.classList.toggle("text-accent-40");
    selector.classList.contains("border-accent-40")
      ? selector.classList.replace("border-accent-40", "border-primary-70")
      : selector.classList.replace("border-primary-70", "border-accent-40");
  }

  selectBoxGroup.forEach((selectBox) => {
    const selector = selectBox.querySelector(".select-box-selector");
    const panel = selectBox.querySelector(".select-box-panel");
    const value = selectBox.querySelector(".select-box-value");
    const options = selectBox.querySelectorAll(".select-box-option");
    const icon = selectBox.querySelector("svg");

    selector.addEventListener("click", () => {
      toggleActivatePanel(panel, icon, selector);
    });

    options.forEach((option) => {
      option.addEventListener("click", () => {
        value.innerText = option.innerText;

        toggleActivatePanel(panel, icon, selector);
      });
    });
  });
}
