/* 
 * Disclaimer popup functionality
 */
(function ($, Drupal) {
  $(document).ready(function() {
    showDisclaimer();
  });
  
  function showDisclaimer() {
    var disclaimer = $('#disclaimer');
    var acceptBtn = disclaimer.find('.disclaimer__buttons-accept');
    var nid = disclaimer.data('nid');
    var cookie = $.cookie('disclaimer_' + nid);

    if (!cookie) {
      $('body').css('overflow', 'hidden');
      disclaimer.addClass('visible');
    }

    acceptBtn.click(function() {
      $.cookie('disclaimer_' + nid, true, { expires: 364 });
      disclaimer.fadeOut('500');
      $('body').css('overflow', 'auto');
      setTimeout(function(){disclaimer.removeClass('visible');}, 500);      
    })

  }
  
})(jQuery, Drupal);