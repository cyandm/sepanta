export function FaqTabs() {
  const handlers = document.querySelectorAll(".faq-handler");
  const panels = document.querySelectorAll(".faq-panel");

  if (!panels || !handlers) return;

  function activateTab(element) {
    if (!element) return;

    element.classList.replace("bg-[#9C9FB9]", "bg-cynBlue");
  }

  function deActivateTab(element) {
    if (!element) return;

    element.classList.replace("bg-cynBlue", "bg-[#9C9FB9]");
  }

  function activatePanel(element) {
    if (!element) return;

    element.classList.replace("grid-rows-[0fr]", "grid-rows-[1fr]");
  }

  function deActivatePanel(element) {
    if (!element) return;

    element.classList.replace("grid-rows-[1fr]", "grid-rows-[0fr]");
  }

  activateTab(handlers[0]);
  activatePanel(panels[0]);

  handlers.forEach((handler) => {
    handler.addEventListener("click", () => {
      //disable others handlers
      handlers.forEach((innerHandler) => deActivateTab(innerHandler));

      //enable clicked handler
      activateTab(handler);

      //enable related panel
      panels.forEach((panel) => {
        const isRelatedPanel =
          panel.getAttribute("controlled-by") === handler.id;

        if (isRelatedPanel) {
          activatePanel(panel);
        } else {
          deActivatePanel(panel);
        }
      });
    });
  });
}

export function FaqCard() {
  const faqCards = document.querySelectorAll(".faq-card");
  if (!faqCards) return;

  function activateFaq(faq, expert) {
    expert.classList.replace("grid-rows-[0fr]", "grid-rows-[1fr]");
    faq.querySelector("svg")?.classList.add("rotate-45");
  }

  function deActivateFaq(faq, expert) {
    expert.classList.replace("grid-rows-[1fr]", "grid-rows-[0fr]");
    faq.querySelector("svg")?.classList.remove("rotate-45");
  }

  faqCards.forEach((faq) => {
    const faqToggle = faq.querySelector(".faq-toggle");
    const expert = faq.querySelector(".faq-expert");
    if (!expert) return;

    faqToggle?.addEventListener("click", () => {
      const faqIsActive = expert.classList.contains("grid-rows-[1fr]");

      if (faqIsActive) {
        deActivateFaq(faq, expert);
      } else {
        activateFaq(faq, expert);
      }
    });
  });
}
