import './module/page-scroll';
import './module/modal';
import './module/lightbox';
import './module/nav';
import './module/header';
import './module/profile';
import './module/set-attr-size';

document.addEventListener('DOMContentLoaded', () => {
  if (document.body.classList.contains('home') || document.body.classList.contains('front-page')) {
    import("./module/form");
    import("./module/top-profile");
  } else if (document.body.classList.contains('page-template-page-about')) {
    import("./module/about");
  } else if (document.body.classList.contains('page-template-page-26tamashii-diary')) {
    import("./module/ogp-loader");
  }
});
