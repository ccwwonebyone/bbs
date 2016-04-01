$(function () {
	 $('#img').click(function () {
	 	 window.open('face.php','face','width=450,height=450,top=0,left=0,scrollbars=1');
	 })
	 $('img').click(function () {
	 	 _opener(this.alt);
	 })
	function _opener(alt) {
	opener.document.getElementById('img').src=alt;
	opener.document.reg.face.value=alt;
	}

});
