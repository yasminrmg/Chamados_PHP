
function RunAjax() {
    this._url = '';
	this._method = 'POST';
	this._tipo_data = 'json';
	this._postdata = {};
	this._timeout = 900000;
	this._crossDomain = false,
	this._jsonp = false,
	this._jsonpCallback = null;
	var _mostra_carregando = true;
	var _fecha_carregando = true;
	var _mostra_erro = true;
	var _funcaoInicia = null;
	var _funcaoFinaliza = null;
	var _funcaoErro = null;
	
	this.setMostraCarregando = function(obj){
		_mostra_carregando = obj;
	};
	
	this.setMostraErro = function(obj){
		_mostra_erro = obj;
	};	
	
	this.setFechaCarregando = function(obj){
		_fecha_carregando = obj;
	};
	
	this.setFuncaoInicia = function(obj){
		_funcaoInicia = obj;
	};
	this.setFuncaoFinaliza = function(obj){
		_funcaoFinaliza = obj;
	};
	this.setFuncaoErro = function(obj){
		_funcaoErro = obj;
	};

    this.Execute = function(){
		$.ajax({
            url : this._url,
            async:true,
            type : this._method,
            data : this._postdata,
			crossDomain: this._crossDomain,
			jsonp: this._jsonp,
			jsonpCallback: this._jsonpCallback,
			dataType: this._tipo_data,
			timeout: this._timeout,
            beforeSend: function(){		
			  if (_funcaoInicia!=null){
				var obj = _funcaoInicia;
				new obj(); 
			  };
			  
			  if (_mostra_carregando){
				Master.exibeCarregamento();
			   };
			},
			success: function(data){   
                
				if (_fecha_carregando){
					Master.fechaCarregamento();
				};
				
				if (_funcaoFinaliza!=null){
				  var obj = _funcaoFinaliza;
				  new obj(data);
				};
			},
			error: function(erro){ 
			  
			  if (_funcaoErro!=null){
				  var obj = _funcaoErro;
				  new obj();
			  };
			  
			  if (_mostra_erro){
				  Master.exibeModalAviso("erro", 'Ocorreu um erro durante o processamento dos dados', "Atenção!")
			  };
			}
		  });
		
	};

};
