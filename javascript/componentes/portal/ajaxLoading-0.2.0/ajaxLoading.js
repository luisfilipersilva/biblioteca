/*******************************************************************************************/
/* FAVOR NAO ALTERAR ESSE ARQUIVO. ALTERACOES PODEM GERAR POSSIVEIS ERROS EM CONSULTAS JA  */
/* EM PRODUCAO.																			   */
/*******************************************************************************************/

//alert('ajaxLoading carregado!!!\n              v.0.2.0\n  <VERSÃO EM TESTE>');

var windowTitle = document.title;
var ajaxInstances = new Array();
/***************************** AJAX OBJECT **************************************************/
/*	ajaxMethod	-> Metodo da funcao ajax. 
/*				   Valores validos - POST ou GET
/*	ajaxURL		-> URL do script a ser executado pelo AJAX
/*	ajaxMode	-> Modo de execucao do AJAX, com assincronismo ou nao. 
/*				   Valores validos - true ou false
/*	loadingMode	-> Modo de loading visual para AJAX.
/*				   Valores validos - WINDOW, CURSOR ou o ID de um DIV.
/********************************************************************************************/
/* Classe para uso de AJAX em páginas. Com definição de Metodo, Script, Assincronismo e 
/* acrescimo da funcionalidade de loading. Existem 3 tipos de loading, o primeiro é a
/* inclusão de uma animação de loading em uma DIV, o segundo é a inclusão de uma animação de
/* loading junto do cursor do mouse e o terceiro modelo de loading é a inclusão de uma camada
/* por cima de toda a janela da aplicação, bloqueando qualquer tipo de interação com a mesma,
/* com uma animação centralizada na camada.
/********************************************************************************************/
function ajaxLoading(ajaxMethod, ajaxURL, ajaxMode, loadingMode){
	this.ajaxMethod = (ajaxMethod) ? ajaxMethod: 'GET';
	this.ajaxURL = (ajaxURL) ? ajaxURL: '';
	this.ajaxMode = (ajaxMode) ? ajaxMode: true;
	this.loadingMode = (loadingMode) ? loadingMode: 'CURSOR';
		
	this.infoReturn = undefined;
	this.onMouseMove = undefined;
	this.onMouseLeave = undefined;
	this.onMouseEnter = undefined;
	this.interval = undefined;
	this.erroForm = new Array();
	/****** SWF LOAD ******/
	this.objLoading = 'http://'+document.domain+'/ajaxLoading/imagens/carregando.swf';
	this.objLoadingWidth = 70;
	this.objLoadingHeight = 70;
	/****** FIM SWF *******/

	
/******************************** PROTOTYPES ************************************************/
	this.preLoad = function(){
		preLoadObject = new Object();
		if(window.ActiveXObject){
			preLoadObject.classId = 'clsid:d27cdb6e-ae6d-11cf-96b8-444553540000';
			preLoadObject.codeBase = 'http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0';
			preLoadObject.id = 'swfLoading';
			preLoadObject.quality = 'high';
			preLoadObject.movie = this.objLoading;
			preLoadObject.wMode = 'transparent';
		}else{
			preLoadObject.type = 'application/x-shockwave-flash';
			preLoadObject.data = this.objLoading;
			preLoadObject.id = 'swfLoading';
			preLoadObject.quality = 'high';
			preLoadObject.movie = this.objLoading;
			preLoadObject.wMode = 'transparent';
		}
	}
	
	this.objInit = function(){
		
		if(!document.firstChild.nodeValue){
			alert("\t\t\t\tErro ao verificar compatibilidade do DOCTYPE.\n\t\t\t           Favor adicionar a linha abaixo no inicio do documento.\n<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">");
			return false;
		}
		try {
			this.conUsr = new ActiveXObject("Microsoft.xmlhttp");
		} catch(e) {
			try {
				this.conUsr = new ActiveXObject("Msxml2.xmlhttp");
			} catch(ex) {
				try {
					this.conUsr = new conUsrRequest();
				} catch(exc) {
					alert("Esse browser não tem recursos para uso do Ajax");
					return false;
				}
			}	
		}
		this.preLoad();
		return true;
	}
		
	/*****************************************************************************
	/* Get no scroll da janela, funcao utilizada para complementar a getPageSize
	/****************************************************************************/
	
	this.scrollLeft = function() {
		return this.filterResults (
		window.pageXOffset ? window.pageXOffset : 0,
		document.documentElement ? document.documentElement.scrollLeft : 0,
		document.body ? document.body.scrollLeft : 0
		);
	}
	this.scrollTop = function() {
		return this.filterResults (
		window.pageYOffset ? window.pageYOffset : 0,
		document.documentElement ? document.documentElement.scrollTop : 0,
		document.body ? document.body.scrollTop : 0
		);
	}
	this.filterResults = function(n_win, n_docel, n_body) {
		var n_result = n_win ? n_win : 0;
		if (n_docel && (!n_result || (n_result > n_docel)))
		n_result = n_docel;
		return n_body && (!n_result || (n_result > n_body)) ? n_body : n_result;
	}
	
	/*****************************************************************************
	/* Get nas dimensões da janela em px (Area visivel e tamanho do body)
	/****************************************************************************/
	
	this.getPageSize = function(){
		var xScroll, yScroll;
		if (window.innerHeight && window.scrollMaxY) {
			xScroll = document.body.scrollWidth;
			yScroll = window.innerHeight + window.scrollMaxY;
		} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
			xScroll = document.body.scrollWidth;
			yScroll = document.body.scrollHeight;
		} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
			xScroll = document.body.offsetWidth;
			yScroll = document.body.offsetHeight;
		}
		var windowWidth, windowHeight;
		if (self.innerHeight) {	// all except Explorer
			windowWidth = self.innerWidth;
			windowHeight = self.innerHeight;
		} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
			windowWidth = document.documentElement.clientWidth;
			windowHeight = document.documentElement.clientHeight;
		} else if (document.body) { // other Explorers
			windowWidth = document.body.clientWidth;
			windowHeight = document.body.clientHeight;
		}
		// for small pages with total height less then height of the viewport
		if(yScroll < windowHeight){
			pageHeight = windowHeight;
		} else {
			pageHeight = yScroll;
		}
		var arrayPageSize;
		//Largura Area Visivel, Altura Area Visivel, Largura do Body, Altura do Body, Scroll Horizontal, Scroll Vertical
		arrayPageSize = new Array(windowWidth,windowHeight,xScroll,pageHeight, this.scrollLeft(), this.scrollTop())
		return arrayPageSize;
	}
	
	/*****************************************************************************
	/* Cria os objetos HTML para o formato de loading com o bloqueio da tela
	/****************************************************************************/
	
	this.createElements = function(objSwfAni, objSwfHeight, objSwfWidth){
		var objDivBG;
		var objDivAni;
		var objBody;
		var objSwf;
		var arrPageSize;
		
		arrPageSize = this.getPageSize();
		objBody = document.getElementsByTagName('body');
		
		if(this.loadingMode == 'WINDOW'){
			/*** DIV LOADING ***/
			objDivBG = document.createElement('div');
			objBody[0].appendChild(objDivBG);
			objDivBG.setAttribute('id', 'loading');
			objDivBG.style.position = 'fixed';
			objDivBG.style.width = arrPageSize[0];
			objDivBG.style.height = arrPageSize[1];
			objDivBG.style.left = '0px';
			objDivBG.style.top = '0px';
			objDivBG.style.backgroundColor = 'black';
			objDivBG.style.zIndex = '100000';
			objDivBG.style.visibility = 'hidden';
			objDivBG.style.filter = 'alpha(opacity=65)';
		}
		
		if(!document.getElementById('ani_loading')){
			/*** DIV ANIMACAO ***/
			objDivAni = document.createElement('div');
			objBody[0].appendChild(objDivAni);
			objDivAni.setAttribute('id', 'ani_loading');
			objDivAni.style.position = 'fixed';
			objDivAni.style.backgroundPosition = '0px 0px';
			objDivAni.style.backbroundRepeat = 'no-repeat';
			objDivAni.style.width = '1px';
			objDivAni.style.height = '1px';
			objDivAni.style.top = '0px';
			objDivAni.style.left = '0px';
			objDivAni.style.marginLeft = '-25px';
			objDivAni.style.marginTop = '-25px';
			objDivAni.style.zIndex = '100001';
			objDivAni.style.visibility = 'hidden';
			objDivAni.style.border = '0px solid red';
			if(window.ActiveXObject) {
				objSwf =  "<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'";
				objSwf += "codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0'";
				objSwf += "width='"+ objSwfWidth +"' height='"+ objSwfHeight +"'>";
				objSwf += "<param name='movie' value='"+ objSwfAni +"'>";
				objSwf += "<param name='quality' value='high'>";
				objSwf += "<param name='wmode' value='transparent' >"; 
				objSwf += "<\/object>";
			} else {
				objSwf =  "<object type='application/x-shockwave-flash' data='"+ objSwfAni +"'";
				objSwf += "width='"+ objSwfWidth +"' height='"+ objSwfHeight +"'>";
				objSwf += "<param name='movie' value='"+ objSwfAni +"'>";
				objSwf += "<param name='wmode' value='transparent' >";
				objSwf += "<param name='quality' value='high'>";
				objSwf += "<\/object>";
			}
			document.getElementById('ani_loading').innerHTML = objSwf;
		}
	}
	
	/*****************************************************************************
	/* Posiciona a animação do loading
	/****************************************************************************/
	
	this.ajustaPosicaoLoading = function() {
		var divPosicao;
	    var arrPageSize;
	    
	    if(document.getElementById('ani_loading')){
	    	divPosicao = document.getElementById('ani_loading');
	    }else{
	    	return;
	    }
		arrPageSize = this.getPageSize();
	    switch(this.loadingMode){
	    	case 'WINDOW':{
			    divPosicao.style.left = (arrPageSize[0]/2);
			    divPosicao.style.marginLeft = -(this.objLoadingWidth/2);
			    divPosicao.style.top = (arrPageSize[1]/2);
			    divPosicao.style.marginTop = -(this.objLoadingHeight/2);
	    		break;
	    	}
	    	case 'CURSOR':{
			    divPosicao.style.marginLeft = '6px';
			    divPosicao.style.marginTop = '6px';
	    		break;
	    	}
	    	default:{
			    divPosicao.style.marginLeft = '10px';
			    divPosicao.style.marginTop = '10px';
	    		break;
	    	}
	    }
	}
	
	/*****************************************************************************
	/* Verifica se o mouse saiu ou voltou da janela do browser. Tirando ou
	/* habilitando a visibilidade do losding de CURSOR.
	/****************************************************************************/
	this.trataMouseLoading = function(){
		if(event){
			document.getElementById('ani_loading').style.visibility = 'visible';
		}else {
			document.getElementById('ani_loading').style.top = 0;
			document.getElementById('ani_loading').style.left = 0;
			document.getElementById('ani_loading').style.visibility = 'hidden';
		}
	}
	
	/*****************************************************************************
	/* Pega a posicao do mouse para gerar a movimentacao da DIV de loading
	/****************************************************************************/
	this.getMousePosition = function(){
		tempX = event.clientX + document.body.scrollLeft;
		tempY = event.clientY + document.body.scrollTop;
		document.getElementById('ani_loading').style.left = tempX;
		document.getElementById('ani_loading').style.top = tempY;
		return true;
	}
	
	/*****************************************************************************
	/* Trata se a funcionalidade de loading da classe mudou
	/****************************************************************************/
	this.changeLoading = function(){
		if((ajaxInstances.length-2) >= 0){
			if(ajaxInstances[(ajaxInstances.length-2)] != this.loadingMode){
				document.onmousemove = '';
				document.body.onmouseleave = '';
				document.body.onmouseenter = '';
				if(document.getElementById('loading')){
					if((ajaxInstances[(ajaxInstances.length-2)] == 'WINDOW')||(ajaxInstances[(ajaxInstances.length-2)] == 'CURSOR')){
						document.body.removeChild(document.getElementById('loading'));
					}else{
						document.getElementById(ajaxInstances[(ajaxInstances.length-2)]).removeChild(document.getElementById('loading'));
					}
				}
				if(document.getElementById('ani_loading')){
					if((ajaxInstances[(ajaxInstances.length-2)] == 'WINDOW')||(ajaxInstances[(ajaxInstances.length-2)] == 'CURSOR')){
						document.body.removeChild(document.getElementById('ani_loading'));
					}else{
						document.getElementById(ajaxInstances[(ajaxInstances.length-2)]).removeChild(document.getElementById('ani_loading'));
					}
				}
			}
		}
	}
	
	/*****************************************************************************
	/* Trata a exibição dos campos selects no IE versao abaixo de 7.0
	/****************************************************************************/
	this.trataSelect = function(strVisibility){
		if(navigator.appVersion.match(/MSIE \d+.\d+/) != 'MSIE 7.0'){
			var arrSelect = document.getElementsByTagName('select');
			for(i=0; i<arrSelect.length; i++){
				arrSelect[i].style.visibility = strVisibility;
			}
		}
	}
	
	/*****************************************************************************
	/* Trata a funcionalidade de loading da classe
	/****************************************************************************/
	this.trataLoading = function(statusLoading){
		/* Verifica se ja existe as DIVs para não cria-las novamente */
		if(statusLoading == 'ON'){
			ajaxInstances.push(this.loadingMode);
			switch(this.loadingMode){
				case 'WINDOW': {
					/* Verifica se tem mais de 1 instancia de AJAX e se mudou o modo do loading */
					this.changeLoading();
					/* Verifica se ja existe as DIVs para não cria-las novamente */
					if((!document.getElementById('loading'))&&(!document.getElementById('ani_loading'))){
						this.createElements(this.objLoading, this.objLoadingHeight, this.objLoadingWidth);
						this.ajustaPosicaoLoading();
					}
					this.trataSelect('hidden');
//					document.body.onscroll = this.ajustaPosicaoLoading;
//					this.interval = window.setInterval('this.ajustaPosicaoLoading()', 500);
					document.getElementById('loading').style.visibility = 'visible';
					document.getElementById('ani_loading').style.visibility = 'visible';
					break;
				}
				case 'CURSOR': {
					/* Verifica se tem mais de 1 instancia de AJAX e se mudou o modo do loading */
					this.changeLoading();
					/* Verifica se ja existe as DIVs para não cria-las novamente */
					if((!document.getElementById('ani_loading'))){
						this.createElements(this.objLoading, (this.objLoadingHeight/2), (this.objLoadingWidth/2));
						this.ajustaPosicaoLoading();
					}
					document.onmousemove = this.getMousePosition;
					document.body.onmouseleave = this.trataMouseLoading;
					document.body.onmouseenter = this.trataMouseLoading;
					document.getElementById('ani_loading').style.visibility = 'visible';
					break;
				}
				default: {
					/* Verifica se tem mais de 1 instancia de AJAX e se mudou o modo do loading */
					this.changeLoading();
					/* Verifica se ja existe as DIVs para não cria-las novamente */
					if((!document.getElementById('ani_loading'))){
						this.createElements(this.objLoading, (this.objLoadingHeight/1), (this.objLoadingWidth/1));
						this.ajustaPosicaoLoading();
					}
					document.getElementById(this.loadingMode).innerHTML = '';
					document.getElementById(this.loadingMode).appendChild(document.getElementById('ani_loading'));
					document.getElementById('ani_loading').style.visibility = 'visible';
					break;
				}
			}
			
		} else if(statusLoading == 'OFF') {
			ajaxInstances.pop();
			if(ajaxInstances.length == 0){
				if(this.loadingMode == 'WINDOW'){
					this.trataSelect('visible');
				}
				document.onmousemove = '';
				document.body.onmouseleave = '';
				document.body.onmouseenter = '';
//				document.body.onafterscroll = '';
				clearInterval(this.interval);
				this.interval = undefined;
				if(document.getElementById('loading')){
					document.body.removeChild(document.getElementById('loading'));
				}
				if(document.getElementById('ani_loading')){
					document.body.removeChild(document.getElementById('ani_loading'));
				}
			}
		}
	}
	
	/*****************************************************************************
	/* Trata os erros do AJAX
	/****************************************************************************/
	this.error = function(statusError){
		if(statusError){
			this.infoReturn=(this.conUsr && this.conUsr.status)? 'Erro Ajax: '+this.conUsr.status+': '+this.conUsr.statusText: 'Erro Ajax: O documento requisitado pode estar temporariamente indisponível.';
			alert(this.infoReturn);
			if(this.loadingMode){
				this.trataLoading('OFF');
			}
			return this.infoReturn;
		}else{
			return false;
		}
	}
	
	/*****************************************************************************
	/* Trata o estado de resposta do AJAX. Recebe como parametro uma funcao 
	/* que o usuario criou para tratar a resposta do AJAX.
	/****************************************************************************/
	this.getReadyState = function(obj){
		return function(){
			if(obj.conUsr.readyState == 1){
				obj.trataLoading('ON');
			}
			if(obj.conUsr.readyState == 4) {
				if(obj.conUsr.status != 200){
					return obj.error(1);				
				} else {
					obj.infoReturn = obj.conUsr.responseText;
					obj.trataAjax(obj.infoReturn);
					obj.trataLoading('OFF');
					document.title = windowTitle;
					return obj.infoReturn;
				}
			}
			return obj.error(0);
		}
	}
	
	/*****************************************************************************
	/* Trata a execucao do AJAX. Recebe como parametro a funcao que será passada
	/* para getReadyState()
	/****************************************************************************/
	this.executeAjax = function(trataAjax){
		if(typeof(trataAjax) == 'function'){
			this.trataAjax = trataAjax;
		}else{
			alert('Informações insuficientes para consulta Ajax!');
			return;
		}
		if(this.conUsr){
			if(this.ajaxMethod == 'POST'){
				this.conUsr.open(this.ajaxMethod, this.ajaxURL, this.ajaxMode);
				this.conUsr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
				this.conUsr.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");	
				this.conUsr.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");	
				this.conUsr.setRequestHeader("Pragma", "no-cache");
				
				this.conUsr.onreadystatechange = this.getReadyState(this);
				this.conUsr.send(this.formData);
			}else if(this.ajaxMethod == 'GET'){
				if(this.formData){
					this.conUsr.open(this.ajaxMethod, this.ajaxURL+"?"+this.formData, this.ajaxMode);
				}else{
					this.conUsr.open(this.ajaxMethod, this.ajaxURL, this.ajaxMode);
				}
				this.conUsr.setRequestHeader("Content-Type", "text/html; charset=iso-8859-1");
				this.conUsr.setRequestHeader("Cache-Control", "no-store, no-cache, must-revalidate");	
				this.conUsr.setRequestHeader("Cache-Control", "post-check=0, pre-check=0");	
				this.conUsr.setRequestHeader("Pragma", "no-cache");
				
				this.conUsr.onreadystatechange = this.getReadyState(this);
				this.conUsr.send(null);
			}
		}
		else {
			alert('AJAX não iniciado');
		}
	}
		
	this.verificaForm = function(objForm){
		if(typeof(objForm) != 'object'){
			return false;	
		}		
		var brokenId;
		for(var i=0; i<objForm.elements.length; i++){
			if(objForm.elements[i].campo){
				if(objForm.elements[i].valor){
					if(objForm.elements[i].value == objForm.elements[i].valor){
						this.erroForm.push(objForm.elements[i].campo);
					}
				}else{	
					if(objForm.elements[i].value == ''){
						this.erroForm.push(objForm.elements[i].campo);
					}
				}
			}else{
				brokenId = objForm.elements[i].id.split('#');
				if(brokenId.length > 1){
					if(objForm.elements[i].value == brokenId[1]){
						this.erroForm.push(objForm.elements[i].name);
					}
				}
			}
		}
		if(this.erroForm.length != 0){
			return false;
		}
		return true;
	}
	
	this.showErroForm = function(){
		var msgErro;
		if(this.erroForm.length == 0){
			msgErro = 'O Objeto Formulário não foi encontrado.';
		}else{
			var msgErro = 'Os seguintes campos não foram preenchidos corretamente:';
			for(var i=0; i<this.erroForm.length; i++){
				msgErro += '\n\t-> '+this.erroForm[i];
			}
			this.erroForm.length = 0;
		}
		alert(msgErro);
	}
	
	this.getForm = function(objForm, overrideVerificaForm){
		this.formData = '';
		var i;
		
		if(overrideVerificaForm){
			if(typeof(overrideVerificaForm) == 'function'){
				this.verificaForm = overrideVerificaForm;
			}else{
				alert("Erro na função de verificar formulário.");
				return false;
			}
		}
		if(!this.verificaForm(objForm)){
			if(!overrideVerificaForm){
				this.showErroForm();
			}
			return false;
		}
		for(i=0; i<objForm.elements.length; i++){
			switch(objForm.elements[i].type){
				case 'text':{
					if(objForm.elements[i].value != ''){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
				case 'password':{
					if(objForm.elements[i].value != ''){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
				case 'hidden':{
					this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					break;
				}
				case 'checkbox':{
					if(objForm.elements[i].checked){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
				case 'file':{
					if(objForm.elements[i].value != ''){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
				case 'radio':{
					if(objForm.elements[i].checked){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
				case 'select-one':{
					this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					break;
				}
				case 'select-multiple':{
					for(j=0; j<objForm.elements[i].options.length; j++){
						if(objForm.elements[i].options[j].selected){
							this.formData += objForm.elements[i].name+"[]="+objForm.elements[i].options[j].value+"&";
						}
					}
					break;
				}
				case 'textarea':{
					if(objForm.elements[i].value != ''){
						this.formData += objForm.elements[i].name+"="+objForm.elements[i].value+"&";
					}
					break;
				}
			}
		}
		this.formData = this.formData.substr(0, (this.formData.length)-1);
		return true;
	}
}
/***************************************** FIM *******************************************/
