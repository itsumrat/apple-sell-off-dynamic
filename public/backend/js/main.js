/*!
 Theme name: Admin panel
 Author: Morshed Khan Rana
 Description: Software Engineer
 */
(function($) {
    "use strict";

    // Enable Bootstrap tooltips via data-attributes globally
    $('[data-toggle="tooltip"]').tooltip();

    // Enable Bootstrap popovers via data-attributes globally
    $('[data-toggle="popover"]').popover();

    $(".popover-dismiss").popover({
      trigger: "focus"
    });

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sidenav a.nav-link").each(function() {
      if (this.href === path) {
        $(this).addClass("active");
      }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
      e.preventDefault();
      $("body").toggleClass("sidenav-toggled");
    });

    // Activate Feather icons
    // feather.replace();

    // Activate Bootstrap scrollspy for the sticky nav component
    $("body").scrollspy({
      target: "#stickyNav",
      offset: 82
    });

    // Scrolls to an offset anchor when a sticky nav link is clicked
    $('.nav-sticky a.nav-link[href*="#"]:not([href="#"])').click(function() {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length ? target : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html, body").animate(
            {
              scrollTop: target.offset().top - 81
            },
            200
          );
          return false;
        }
      }
    });

    // Click to collapse responsive sidebar
    $("#layoutSidenav_content").click(function() {
      const BOOTSTRAP_LG_WIDTH = 992;
      if (window.innerWidth >= 992) {
        return;
      }
      if ($("body").hasClass("sidenav-toggled")) {
          $("body").toggleClass("sidenav-toggled");
      }
    });

    // Init sidebar
    let activatedPath = window.location.pathname.match(/([\w-]+\.html)/, '$1');

    if (activatedPath) {
      activatedPath = activatedPath[0];
    }
    else {
      activatedPath = 'index.html';
    }

    let targetAnchor = $('[href="' + activatedPath + '"]');
    let collapseAncestors = targetAnchor.parents('.collapse');

    targetAnchor.addClass('active');

    collapseAncestors.each(function() {
      $(this).addClass('show');
      $('[data-target="#' + this.id +  '"]').removeClass('collapsed');

    });

    // message auto delete
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
            });
}, 4000);

//message auto delete end

// product delete alert
$('button.delete-btn').on('click', function(e){
   e.preventDefault();
   var self = $(this);
   swal({
       title             : "Are you sure?",
       text              : "You will not be able to recover this!",
       type              : "warning",
       showCancelButton  : true,
       confirmButtonColor: "#DD6B55",
       confirmButtonText : "Yes, Delete it!",
       cancelButtonText  : "No, Cancel delete!",
       closeOnConfirm    : false,
       closeOnCancel     : false
   },
   function(isConfirm){
       if(isConfirm){
           swal("Deleted!","It has been deleted", "success");
           setTimeout(function() {
               self.parents(".delete_form").submit();
           }, 2000); //2 second delay (2000 milliseconds = 2 seconds)
       }
       else{
             swal("Cancelled","It is safe", "error");
       }
   });
});



  })(jQuery);
