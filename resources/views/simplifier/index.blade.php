@extends('layout.app')

@section('title')
	Simplificador de Expressões
@endsection

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/page.css')}}">
@endsection

@section('scripts')
	<script type="text/javascript">
		$.fn.appendVal = function(Text){
			return $(this).val(
				$(this).val() + Text
			);
		};
		$(document).ready(function(){
			$("#expId").bind("keypress input blur keyup paste change keydown", function (event) {
				var node = $(this);
				if (event.charCode!=0) {
					node.val(node.val().toUpperCase());
					var regex = new RegExp("^[a-fv()+~A-FV]+$");
					var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
					if (!regex.test(key) || !check(String.fromCharCode(event.charCode))) {
						event.preventDefault();
						return false;
					}
				}else{
					if(event.charCode == 118 || event.charCode == 86){
						node.val(node.val().toLowerCase());
					}
				}
			});
			if($("#expId").val() != ""){
				$("#btnSubmit").removeAttr("disabled");
			}else{
				$("#btnSubmit").attr("disabled");
			}
			c = 0;
		    $('[data-toggle="tooltip"]').tooltip();		    
		});
		//$('textarea').keypress(function(e) {
		//    addTo($(this).val().split("")[$(this).val().length-1]);
		//});
		// function teste(charC){
		// 	if(addTo(charC)){

		// 	}
		// }
		function countPar(par, oc){
			var par = par.split(oc).length-1;
			return par;
		}
		function eraseAll(){
			$("#expId").val("");
		}
		function backspace(){
			$('#expId').val( $("#expId").val().slice(0,-1) );
		}
		function par(exp){
			var parClosed = countPar(exp, ")");

		}
		function simplify(){
			var exp = $("#expId").val();
			par(exp);
		}
		function check(charC){
			var expId = $("#expId").val();
			var op = ["^", "V", "+", "~^", "~V", "~+"];
			var words = ["A", "B", "C", "D", "E", "F", "~A", "~B", "~C", "~D", "~E", "~F"];
			var po = countPar(expId, "(");
			var pc = countPar(expId, ")");
			// if(charC.length > 0){
			// 	// Someone has put an operation
			// 	if(($.inArray(charC, op)) >= 0 || ($.inArray(charC, words)) >= 0){
			// 		if((charC != expId[expId.length-1]) && (charC != ")")){
			// 			c = true;
			// 		}else{
			// 			c = false;
			// 		}
			// 	}
			// }
			// return c;
			if(expId.length > 0){
				expId.split("\n");
				for (var i = 0; i < expId.length; i++){
					if(charC.length > 1){
						if((expId[expId.length-2] != charC.split("")[0]) || (expId[expId.length-1] != charC.split("")[1])){
							c = true;
						}else{
							c = false;
						}
					}else{
						if((charC != expId[expId.length-1]) && (charC != ")")){
							c = true;
						}else{
							if(po > pc){
								c = true;
								pc++;
								return c;
							}else{
								if(charC == "("){
									c = true;
								}else{
									c = false;
								}
							}
						}
					}
				}
			}else{
				if(charC != ")"  && (charC != "+") && (charC != "V") && (charC != "^")){
					c = true;
				}else{
					c = false;
				}
			}
			return c;
		}
		function addTo(charC){
			if(check(charC)){
				$("#expId").appendVal(charC);
			}
		}
		function simplify(){

		}
		function complement(id){
			var c = $("#btnA").html().split("")[0];
			if(id == "not"){
				if (c != "~"){
					$("button[name^=btn]").prepend("~");
					$("#funcXor").attr('title', "XNOR").tooltip('fixTitle').tooltip('setContent');
					$("#funcOr").attr('title', "NOR").tooltip('fixTitle').tooltip('setContent');
					$("#funcAnd").attr('title', "NAND").tooltip('fixTitle').tooltip('setContent');
				}else{
					$("button[name^=btn]").html(function(i, html) {
					    return html.replace("~",'');
					});

					$("#funcXor").attr('title', "XOR").tooltip('fixTitle').tooltip('setContent');
					$("#funcOr").attr('title', "OR").tooltip('fixTitle').tooltip('setContent');
					$("#funcAnd").attr('title', "AND").tooltip('fixTitle').tooltip('setContent');
				}
			}
		}
		function press(){
			$(document).on ('keydown', function (e) {
		        addTo(String.fromCharCode(e.which));
		    });
		}
	</script>
@endsection
<div class="container-fluid">
	@section('content')
		{{ Form::open(array('action' => 'Site\SimplifierController@simplified')) }}
		<div class="col-md-offset-2 container-fluid">
			<div class="row btnactions">
		      {{ Form::button('A', array('class' => 'btn btn-lg', 'name' => 'btn', 'id' => 'btnA', 'data-toggle' => 'tooltip', 'title' => 'A', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('B', array('class' => 'btn btn-lg', 'name' => 'btn', 'id' => 'btnB', 'data-toggle' => 'tooltip', 'title' => 'B', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('C', array('class' => 'btn btn-lg', 'name' => 'btn', 'id' => 'btnC', 'data-toggle' => 'tooltip', 'title' => 'C', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('(', array('class' => 'btn btn-lg', 'id' => 'parOpen', 'data-toggle' => 'tooltip', 'title' => '(', 'onclick' => 'addTo(this.innerHTML)')) }}
		    </div><br>
		    <div class="row btnactions">
		      {{ Form::button('D', array('class' => 'btn btn-lg', 'name' => 'btn','id' => 'btnD', 'data-toggle' => 'tooltip', 'title' => 'D', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('E', array('class' => 'btn btn-lg', 'name' => 'btn', 'id' => 'btnE', 'data-toggle' => 'tooltip', 'title' => 'E', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('F', array('class' => 'btn btn-lg', 'name' => 'btn', 'id' => 'btnF', 'data-toggle' => 'tooltip', 'title' => 'F', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button(')', array('class' => 'btn btn-lg', 'id' => 'parClose', 'onclick' => 'addTo(this.innerHTML)', 'data-toggle' => 'tooltip', 'title' => ')')) }}
		    </div><br>
		    <div class="row btnactions">
		      {{ Form::button('^', array('class' => 'btn btn-lg', 'name' => 'btnFunc', 'id' => 'funcAnd', 'data-toggle' => 'tooltip', 'title' => 'AND', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('V', array('class' => 'btn btn-lg', 'name' => 'btnFunc', 'id' => 'funcOr', 'data-toggle' => 'tooltip', 'title' => 'OR', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('+', array('class' => 'btn btn-lg', 'name' => 'btnFunc', 'id' => 'funcXor', 'data-toggle' => 'tooltip', 'title' => 'XOR', 'onclick' => 'addTo(this.innerHTML)')) }}
		      {{ Form::button('~', array('class' => 'btn btn-lg', 'id' => 'not', 'onclick' => 'complement(this.id)', 'data-toggle' => 'tooltip', 'title' => 'Complement')) }}
		    </div><br>
		</div><br>
		<div class="form-group">
			{{ Form::label('expName', 'Expressão para simplificar:') }}
			{{ Form::input('text', 'expName', null, array('class' => 'form-control col-md-3 input', 'id' => 'expId')) }}
		</div><br>
		<div class="form-group">
			{{ Form::button('Apagar', array('class' => 'btn btn-default', 'onclick' => 'backspace()'))}}
			{{ Form::button('Limpar tudo', array('class' => 'btn btn-default', 'onclick' => 'eraseAll()'))}}
			{{ Form::submit('Simplificar', array('class' => 'btn btn-group btn-primary pull-right', 'id' => 'btnSubmit')) }}
		</div>
		<div class="col-md-auto">
			@yield('simplified')
		</div><br>
		@yield('error')
		{{ Form::close() }}
	@endsection	
</div>