// Navigation toggle
window.addEventListener('load', function () {
      let main_navigation = document.querySelector('#primary-menu');
      document.querySelector('#primary-menu-toggle').addEventListener('click', function (e) {
            e.preventDefault();
            main_navigation.classList.toggle('hidden');
      });
});

jQuery(document).ready(($) => {
      
	var $form = $("#search-btn");
      $(".search-btn").on('click', function(event) {
            event.preventDefault();
            $("#search-container").toggle();
      });

      function submitform(){
            event.preventDefault();
            var form = $('#search-container');

            var s = form.find('input[name="s"]').val();
            if(s==""){
                  return;
            }
            if(s==""){
                  form.find('input[name="s"]').val(' ');
            }

            form.submit();
      }

      $('.eventos-filters select').change(function() {
            $('.eventos-filters').submit();
      });

});
