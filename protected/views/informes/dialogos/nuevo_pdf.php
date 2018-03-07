<!-- subir pdf -->
<div id="modal-pdf" class="modal hide" tabindex="-1">
	<div class="modal-header">
		<button class="close" data-dismiss="modal" type="button">×</button>
		<h4 class="blue bigger">Subir .PDF</h4>
	</div>

	<div class="modal-body overflow-visible">
		<div class="row-fluid">
			<div id="info_archivo"></div>
			<form name="form_subir" method="post" action="" enctype="multipart/form-data">
				<input id="ytLiFormato_UPLOAD" type="hidden" name="LiFormato[UPLOAD]" value="">
				<input id="LiFormato_UPLOAD" type="file" name="LiFormato[UPLOAD]">
			</form>
		</div>
	</div>

	<div class="modal-footer">
		<button class="btn btn-small" data-dismiss="modal" onclick="limpiar();">
			<i class="icon-remove"></i>
			Cerrar
		</button>
		<button class="btn btn-small btn-primary" id="SubirA" onclick="comprueba_extension($('#form_subir'))">
			Subir
		</button>
	</div>
</div>