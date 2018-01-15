$(function(){
	$('[data-toggle="tooltip"]').tooltip();

	$('#homeModal').modal('show');
	
	var alturaTela = $(window).height();
	$('#login .row').css('height', alturaTela+'px');

	$('#myModal').on('hidden.bs.modal', function() {
  		window.location.href = window.location.href;
	})

	$('#usuario').on('focus', function(){
		$(this).val('');

		var texto = $(this).val();

		$.ajax({
			url:BASE_URL+'usuario/busca',
			type:'POST',
			dataType:'json',
			data:{texto:texto},
			success:function(json) {
				var html = '<a onclick="preencher(this);" href="javascript:;" id="0" class="list-group-item list-group-item-action">Todos</a>';

				for(var i in json) {
					html += '<a onclick="preencher(this);" href="javascript:;" id="'+json[i].id+'" class="list-group-item list-group-item-action">'+json[i].nome+'</a>';
				}

				$('#resultado').html(html);
				$('#resultado').show();
			}
		});
	});

	$('#usuario').on('keyup', function(){
		var texto = $(this).val();

		$.ajax({
			url:BASE_URL+'usuario/busca',
			type:'POST',
			dataType:'json',
			data:{texto:texto},
			success:function(json) {
				var html = '<a onclick="preencher(this);" href="javascript:;" id="0" class="list-group-item list-group-item-action">Todos</a>';

				for(var i in json) {
					html += '<a onclick="preencher(this);" href="javascript:;" id="'+json[i].id+'" class="list-group-item list-group-item-action">'+json[i].nome+'</a>';
				}

				$('#resultado').html(html);
				$('#resultado').show();
			}
		});
	});

});

function excluirMensagem(id, nome){
	$('#myModal').find('.modal-body').html('Deseja realmente excluir a mensgem para o usuário '+nome+'?');
	$('#myModal').find('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-primary" onclick="excluirMensagemBanco('+id+')">Sim</button>');

	$('#myModal').modal('show');
}

function excluirMensagemBanco(id){
	$.ajax({
		url:BASE_URL+'mensagem/excluir',
		type:'POST',
		data:{id:id},
		success:function(){
			$('#myModal').find('.modal-body').html('<div class="alert alert-success" role="alert"><strong>Feito!</strong> Mensagem excluída com sucesso.</div>');
			$('#myModal').find('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>');
		}
	});
}

function excluirUsuario(id, nome){
	$('#myModal').find('.modal-body').html('Deseja realmente excluir o usuário '+nome+'?');
	$('#myModal').find('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button><button type="button" class="btn btn-primary" onclick="excluirUsuarioBanco('+id+')">Sim</button>');

	$('#myModal').modal('show');
}

function excluirUsuarioBanco(id){
	$.ajax({
		url:BASE_URL+'usuario/excluir',
		type:'POST',
		data:{id:id},
		success:function(){
			$('#myModal').find('.modal-body').html('<div class="alert alert-success" role="alert"><strong>Feito!</strong> Usuário excluído com sucesso.</div>');
			$('#myModal').find('.modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>');
		}
	});
}

function preencher(obj){
	var id = obj.id;
	var value = $('#'+id).text();
	
	$('input[name="busuario"]').val(value);
	$('input[name="usuario"]').val(id);
	$('#resultado').hide();
}