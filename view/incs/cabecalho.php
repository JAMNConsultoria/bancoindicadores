<?php header('Content-Type: text/html; charset=iso-8859-1'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
        
        <title>Banco de Indicadores</title>
        <script src="js/validation.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">

        function checkForm(form) {
        
            var arrFld = new Array('tipo');

            if(!validationForm(form, arrFld)) {
            	return false;
            }
            return true;
        }
        
        $(document).ready(function()     {
            //submete formulario de grupo
            $('#frmGrupo:first').click(function() {
                $('#frmGrupo').submit();
            });
            //submete formulario botao Prosseguir>>>
            $('#btnEnviar').click(function() {
				if(jQuery("input:checkbox=:checked").length == 0) {
					alert("Por favor, selecione algum indicador.");
					return;
				}
                $('#frmIndicadores').submit();
            });
        }); //fim ready
    </script>

<link rel="stylesheet" href="css/fm_ms.css" type="text/css" />
<link id="open-sans-css" media="all" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&subset=latin%2Clatin-ext&ver=3.8.1" rel="stylesheet">


</head>

<body>
    
<div class="fundo_cabec" style="background-color:#213b5e">

<div class="container dmbs-container" style="padding-right:0px;">

<h1 id="logo">
		<a href="/" title="Região e Redes" rel="home"><img src="/wp-content/uploads/2015/02/regiao_redes.png" width="312" height="74" alt="Região e Redes" /></a>
</h1>


 </div>
</div>

    
<div align="center" class="center">
	<div id="wrapper">      
    
<div id="fios">
  <div align="center"><h3 style="color:#036;padding:25px 0 15px 0;">Banco de Indicadores</h3></div>
