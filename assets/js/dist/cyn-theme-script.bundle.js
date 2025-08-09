(() => {
  // assets/js/functions/common.js
  var ENVIRONMENT = "development";
  function isDev() {
    return ENVIRONMENT === "development";
  }
  function devLog(...variable) {
    if (isDev() === false) return;
    console.log(...variable);
  }

  // assets/js/functions/modals.js
  function Modals() {
    devLog("Modal function is running");
    const popupBackdrop = document.querySelector("[modal-backdrop]");
    const modals = document.querySelectorAll("[modal]");
    popupBackdrop.addEventListener("click", (e) => {
      e.stopPropagation();
      modals.forEach((modal) => {
        modal.dataset.active = "false";
        document.body.style.overflow = "auto";
        modal.dispatchEvent(
          new CustomEvent("modal-state-change", {
            detail: {
              handler: popupBackdrop
            }
          })
        );
      });
      popupBackdrop.dataset.active = "false";
    });
    const handleModalState = (modalName, state) => {
      const modals2 = document.querySelectorAll(
        '[modal][data-modal-name="'.concat(modalName, '"]')
      );
      if (!modals2) {
        devLog('Modal "'.concat(modalName, '" not found.'));
        return;
      }
      modals2.forEach((modal) => {
        modal.dataset.active = state;
        if (state === "true") {
          document.body.style.overflow = "hidden";
          popupBackdrop.dataset.active = "true";
        } else {
          document.body.style.overflow = "auto";
          popupBackdrop.dataset.active = "false";
        }
      });
      devLog('Modal "'.concat(modalName, '" state set to "').concat(state, '".'));
    };
    const addEventListeners = (selector, action, actionName) => {
      const elements = document.querySelectorAll(selector);
      elements.forEach((element) => {
        const modalName = element.dataset.modalName;
        const modal = document.querySelector(
          '[modal][data-modal-name="'.concat(modalName, '"]')
        );
        element.addEventListener("click", () => {
          action(modalName);
          modal.dispatchEvent(
            new CustomEvent("modal-state-change", {
              detail: {
                handler: element
              }
            })
          );
        });
        devLog('"'.concat(actionName, '" triggered for modal "').concat(modalName, '".'));
      });
    };
    addEventListeners(
      "[modal-opener]",
      (modalName) => handleModalState(modalName, "true"),
      "Open"
    );
    addEventListeners(
      "[modal-closer]",
      (modalName) => handleModalState(modalName, "false"),
      "Close"
    );
    addEventListeners(
      "[modal-toggler]",
      (modalName) => {
        const modal = document.querySelector(
          '[modal][data-modal-name="'.concat(modalName, '"]')
        );
        if (!modal) {
          devLog('Toggle failed: Modal "'.concat(modalName, '" not found.'));
          return;
        }
        const newState = modal.dataset.active === "true" ? "false" : "true";
        devLog('Toggling modal "'.concat(modalName, '" to "').concat(newState, '".'));
        handleModalState(modalName, newState);
      },
      "Toggle"
    );
  }

  // assets/js/functions/subMenuMobile.js
  function subMenuMobile() {
    jQuery(document).ready(function($) {
      var arrowIcon = '<i class="sub-menu-icon mt-1.5 flex justify-end" style="transition:transform 0.3s;vertical-align:middle;">\n      <svg width="20" height="20" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-6 rotate-90 transition-all duration-300">\n        <path d="M10 8L14 12.5L10 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>\n      </svg>\n    </i>';
      $("#mobile-menu .menu-item-has-children").each(function() {
        var $menuItem = $(this);
        var $subMenuToggle = $(arrowIcon);
        $menuItem.prepend($subMenuToggle);
        $subMenuToggle.on("click", function(e) {
          e.stopPropagation();
          var $subMenu = $menuItem.children("ul");
          if ($subMenu.is(":visible")) {
            $subMenu.slideUp();
            $subMenuToggle.find("svg").removeClass("rotate-[270deg]");
          } else {
            $subMenu.slideDown();
            $subMenuToggle.find("svg").addClass("rotate-[270deg]");
          }
        });
      });
    });
  }

  // assets/js/functions/submenu.js
  function addIcons() {
    var _a;
    (_a = document.querySelectorAll("#main-menu .menu-item-has-children")) == null ? void 0 : _a.forEach((menu) => {
      var _a2;
      const svg = (_a2 = document.querySelector("div#chevron-down")) == null ? void 0 : _a2.cloneNode(true);
      const link = menu.querySelector("a");
      svg.classList.remove("hidden");
      svg.classList.add("mr-1", "size-3", "transition-all", "duration-300");
      link.appendChild(svg);
    });
  }

  // assets/js/index.js
  Modals();
  subMenuMobile();
  addIcons();
})();
