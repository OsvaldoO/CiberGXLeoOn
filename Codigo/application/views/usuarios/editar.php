<div id="editar">
<h2>Editar Perfil</h2>
<div id="frm_edi" class="frm hide">
<form method="post" action="<?php APPPATH ?>editar">
<h6 class="error" style="color:red;"><?php echo validation_errors(); ?></h6>
    <input id="nik" type="hidden" name="nick" value="" /></p>
    <label>Nombre:<label />
    <input id="nom" class="input-xlarge" type="text" name="nombre" value="" />
    
    <label>Email</label>
    <input id="emi" type="text" class="input-xlarge" name="email" value="" />
    
    <label>Avatar</label>
    <input id="ava" class="input-xlarge" type="text" name="avatar" value="" />
    
    <p><input type="submit" class="btn btn-success" value="Editar" /></p>
</form>
</div>
</div>

<script type="text/javascript" >
$.getJSON( "<?php echo base_url(); ?>usuarios/seccion", function( usuario ) {
				if (usuario){ 
				 		$("#nik").attr("value",usuario['user']);
				 		$("#nom").attr("value",usuario['nombre']);
				 		$("#emi").attr("value",usuario['email']);
				 		$("#ava").attr("value",usuario['avatar']);
				 		$("#frm_edi").after('<h6 class="btn"><?php echo anchor("usuarios/cambiarPass","Cambiar Password");?></h6>');
				 		$("#frm_edi").show();
		 		}
		 		else 		 $("#editar").html('<h4>No has iniciado Seccion</h4>');
		 });

</script>							