export function Popups() {
  VideoPopup();
}

function VideoPopup() {
  const videoPopups = document.querySelectorAll(
    '[modal][data-modal-name="introduction-modal"]'
  );

  videoPopups.forEach((videoPopup) => {
    videoPopup.addEventListener("modal-state-change", (e) => {
      const video = videoPopup.querySelector("video");

      const videoIsOpening = videoPopup.dataset.active === "true";
      !videoIsOpening && video.pause();

      video.src = e.detail.handler.dataset.videoUrl;
    });
  });
}
