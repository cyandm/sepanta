/**
 * Main entry point for the theme's JavaScript.
 * you must add any functions for every javascript file to the import statement below.
 */

import { Modals } from "./functions/modals";
import { SubMenuMobile } from "./functions/subMenuMobile";
import { AddIcons } from "./functions/subMenu";
import { register } from "swiper/element/bundle";
import videoCover from "./modules/videoCover";
import { ThemePlyr } from "./modules/plyr";
import { Popups } from "./functions/popups";

Modals();
SubMenuMobile();
AddIcons();
register();
videoCover();
ThemePlyr();
Popups();
