	function showLoading(mensagem){
		(mensagem) ? mensagem : mensagem = 'Carregando...';
		$('body div#msgLoading SPAN').text(mensagem);
		$('body div#fundoLoading').show();
		$('body div#msgLoading').show();
		return false;
	 }
	 
	function hideLoading(mensagem){
		(mensagem) ? mensagem : mensagem = 'Carregando...';
		$('body div#msgLoading SPAN').text(mensagem);
		$('body div#fundoLoading').hide();
		$('body div#msgLoading').hide();
		return false;
	 }
	 
	 function carregarAjax(caminho, tipo, divAlvo, form, sucesso){
	 
	 if ((!sucesso) || (sucesso == '')){
	 	if ((divAlvo) || (divAlvo != '')){
			sucesso = function(txt){
	 		$(divAlvo).html(txt);
	 	};
		}else {
		 	alert ('É necessário definir o "divAlvo"!');
		 	return false;
		}
	 }
	 
	 $.ajax({
		type: tipo,
		url:  caminho,
		data: $(form).serialize(),
		beforeSend: function(){
		 	showLoading();
	 	},
	 	complete: function(){
	 		hideLoading();
	 	},
	 	success: sucesso
	 });
	 
	 return $(divAlvo);
	 }

(function( $ ){
	$.fn.desativar = function( ) {  
		return this.each(function() {
			var $this = $(this);
			$this.removeClass('error').addClass('disabled').attr('disabled', 'disabled');
		});
	};
})( jQuery );

(function( $ ){
	$.fn.ativar = function( ) {  
		return this.each(function() {
			var $this = $(this);
			$this.removeClass('disabled').removeAttr('disabled');
		});
	};
})( jQuery );

$(document).ready(function(){

	$('<div id="msgLoading" style="color:#000000; z-index:1000; text-align:center; width:215px; height:78px; position:fixed; top:50%; left:50%; margin-top:-39px; margin-left:-107px; background-color:#FFFFFF; border:4px solid #cccccc; display:none; font-family: verdana; font-size: 11px"><table style="margin-top: 16px"><tr><td width="65"><img src="/biblioteca/javascript/jquery/colorbox/images/loading.gif" align="middle" width="40px" height="40px"/></td><td><span>Carregando...</span></td></tr></table></div>').appendTo('body');
	$('<div id="fundoLoading" style="display:none; background-color:#000000; display:none; width:100%; height:100%; z-index:500; position:fixed; top:0px; filter:alpha(opacity=60); opacity:.20;" ></div>').appendTo('body');

});