$( document ).ready(function() {
  
  
//////////////////////////////////
// DELETE ////////////////////////

	$('#confirm-delete').on('show.bs.modal', function(e) {
		$(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
	})
  
// END DELETE ////////////////////
//////////////////////////////////








  
});