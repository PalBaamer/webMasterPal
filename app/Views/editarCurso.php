<!doctype html>
<html lang="es">
  <head>
  <title>webMasterPal</title>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript" src="<?php echo site_url('../js/jquery-1.12.0')?>"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"> </script>
  <script type="text/javascript" src="<?php echo site_url('../js/editor.js')?>"> </script>  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('../css/editor.css')?>">
	


<script type="text/javascript">
		$(document).ready(function(){
			$('#txt-content').Editor();

			$('#txt-content').Editor('setText', ['<p style="color:Black;">Escribe aquí el contenido del tema seleccionado</p>']);

			$('#btn-enviar').click(function(){
				$('#txt-content').text($('#txt-content').Editor('getText'));
				$('#frm-test').submit();				
			});
		});	
	</script>
</head>
<body>
<a class="btn btn-primary" href="<?php echo site_url('menuProfesor/index'); ?>" role="button">Atrás</a>

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<form action="<?php echo site_url('menuProfesor/insertarHTML'); ?>" method="post" id="frm-test">
				
					<input id="prodId" name="id_curso" type="hidden" value="<?php echo $id_curso; ?>">
					<input id="prodId" name="temaNombre" type="hidden" value="<?php echo $temaNombre; ?>">
					<div class="form-group">
						<textarea id="txt-content" name="txt-content">
							<?php echo $tema->cuerpo_tema?>
						</textarea>
					</div>
					<input type="submit" class="btn btn-default" id="btn-enviar" value="Guardar">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<div id="texto" style="border:1px solid #000; padding:10px;margin-top:20px;">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>


        


		