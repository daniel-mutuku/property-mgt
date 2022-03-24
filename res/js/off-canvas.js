// if(day > ts){
//     $("#mainbody").hide();
//     alert("The project has auto destroyed itself! Trial version ended.");
// }
(function($) {
  'use strict';
  $(function() {
    $('[data-bs-toggle="offcanvas"]').on("click", function() {
      $('.sidebar-offcanvas').toggleClass('active')
    });
  });
})(jQuery);