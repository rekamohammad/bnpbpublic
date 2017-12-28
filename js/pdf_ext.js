$('a').on('click', function() {
	var href = $(this).attr('href');
	var rules = new RegExp('([a-zA-Z0-9\s_\\.\-:])+(.doc|.docx|.pdf)$');
	if (rules.test(href)) {
		var title = $(this).html();
		$('#myModal').find('.modal-title').html(title);
		PDFObject.embed(href, "#pdf-template");
		//$('#myModal').find('iframe').attr('src', href);
		$('#myModal').modal('show');
		return false;	
	}
});