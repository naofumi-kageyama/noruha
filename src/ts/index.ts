import './module/common';
import './module/modal';
import './module/profile';
import './module/set-attr-size';

document.addEventListener('DOMContentLoaded', () => {
  if (document.body.classList.contains('home') || document.body.classList.contains('front-page')) {
    import("./module/form");
    import("./module/top-profile");
  }
});
