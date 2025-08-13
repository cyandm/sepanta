import PhotoSwipeLightbox from "photoswipe/lightbox";
import "photoswipe/style.css";

export default function photoswipe() {
  const lightbox = new PhotoSwipeLightbox({
    gallery: "#product-gallery",
    children: "a",
    pswpModule: () => import("photoswipe"),
  });
  lightbox.init();
}
