<div id="body">
	<form action="./?view=facturatotal" method="POST" accept-charset="utf-8">
		<div class="container">
			<br>
			<div class="form-group col-lg-3">
			</div>
			<div class="form-group col-lg-6 text-center">
				<label>Dia de Reporte</label>
				<input type="text" required id="datetimepicker4" autocomplete="off" class="form-control" name="fecha1">
			</div>
			<div class="form-group col-lg-3">
				<!-- <label>Fecha Fin</label>
					<input type="text" id="datetimepicker5" class="form-control" name="fecha2"> -->
			</div>
			<div class="text-center form-group col-lg-12">
				<button class="btn sombra btn-info">Buscar</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
	$(function() {
		$('#datetimepicker4').datetimepicker({
			format: ("YYYY-MM-DD")
		});
	});
</script>
<script type="text/javascript">
	$(function() {
		$('#datetimepicker5').datetimepicker({
			format: ("YYYY-MM-DD HH:mm:ss")
		});
	});
</script>