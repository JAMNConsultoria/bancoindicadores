<?php
require_once("../business/dados_business_class.php");

//recebe os dados da sess�o iniciada em mapa.php
$locnome = $arrUFs[$uf]['ufNome'];
$centroide =$arrUFs[$uf]['ufCentroide'];
$zoom = $arrUFs[$uf]['ufZoom'];
$sigla = $arrUFs[$uf]['ufSigla'];

?>
<script src="js/jquery.geo-1.0b1.min.js"></script>  
<div id="map">
    
    <div id="preloader"><img src="img/preloader3.gif"/></div>
    
</div>

<script>
/*legend color
 *prepara array com as cores da legenda
 **/

var corGrupo =new Array();
<?php
 foreach($arrMapa['mapa'][$indicador]['corGrupo'] as $indice => $cor){                   
               echo "corGrupo[$indice] ='".$cor."';";
           }
?>           
var legendaGrupo =new Array();
<?php
 foreach($arrMapa['mapa'][$indicador]['legenda'] as $indice => $legenda){                   
               echo "legendaGrupo[$indice] ='".$legenda."';";
           }
?>  
var arrUFs =new Array();
<?php
 foreach($arrUFs as $codUF => $listUFs){                   
               echo "arrUFs[$codUF] ='".$listUFs['ufNome']."';";
           }
?> 




  var objMapa = new Object();

/* Declara��o do Servi�o de Mapas */
  mapa = $("#map").geomap( { services: [ { "class": "osm",  type: "tiled",  getUrl: function( view ) {
    return "http://tile.openstreetmap.org/" + view.zoom + "/" + view.tile.column + "/" + view.tile.row + ".png";
   } } ],
  center: <?php echo $centroide; ?>,
  zoom: <?php echo $zoom; ?> ,  
  mode: "find",
  cursors: { find: "default" },
  click: function( e, geo ) {   
    objMapa = mapa.geomap( "find",geo, 1 );
    if(objMapa.length > 0){
       var cod = objMapa[0].properties.cod; 
       var nome = objMapa[0].properties.nome; 
       var grupos = objMapa[0].properties.grp;
       var cor = corGrupo[grupos];
       var nomegrupo = legendaGrupo[grupos];
       var coduf = cod.substring(0,2);
       var nomeuf = arrUFs[coduf];
       $("#divInfLoc").html("<p>UF: "+nomeuf+"<p>Regi�o: <b>"+nome+"</b><p><span style='padding:5px;background-color:"+cor+"'/> <b>"+nomegrupo+"</b>");
       listaMun(cod);
    }
  
  }
 } );
/* fim declara��o servi�o de mapa */

/*init map*/
 mapa.geomap();

/*config map*/
 $(".osm").geomap("opacity", .9);
 mapa.geomap( "option", "scroll", "off");
 mapa.geomap( "option", "pannable",true);
//mapa.geomap( "option", "cursors", {"static": "pointer" } );

/*load data temathic map*/
  loadDataMap(2,"<?php echo $uf;?>","<?php echo $indicador;?>");


  function showMap( data ) {
        // clear any existing demographic shapes
        //mapa.geomap( "empty" );

        if ( data && data.type == "FeatureCollection" ) {
          $.each( data.features, function( ) {
            // for each polygon, extract the requested data like cod-cir, gruposocio etc
            var idgrupo = parseInt(this.properties.grp);
            //alert($(this.properties.cod_cir));
              // append a color of gruposocio propertie,
               mapa.geomap( "append", this, { opacity: 1, fillOpacity: 1.0, color: corGrupo[idgrupo], strokeWidth: "1px",stroke: "#000" }, false);
          } );
          // refresh the map after appending all the new shapes
          mapa.geomap( "refresh" );
        }
  }

  //load properties of map
  function loadDataMap(v_nivel, v_uf, v_indicador){
    $("#preloader").show();    
    $.ajax( {
        url: "geojson.php",
        type:"POST",
        data:{uf:v_uf,nivel:v_nivel,indicador:v_indicador},
        dataType: "json",
        cache: true,
        success: function( result ) {
          // save a copy
          data = result;
          // generate new demographic shapes based on uf locate
          showMap( data );
          $("#preloader").hide();
        },
        error: function( xhr ) {
          // erro
          alert( "aguarde os dados est�o sendo carregados" );
          $("#preloader").hide();
        }
      } );
  }

  function listaMun(codCir){
	   //recebe da tag "<a href" o conteudo da propriedade name (onde coloco o link para o script)
   	    var linkLocalidade="listalocalidade.php";
 	    $.ajax({
                  type:"POST",
                  data:{cirId:codCir},
                  dataType: "html",
	          url: linkLocalidade,
	          success: function(msg){
   	          //passa para a div "divInfMun" o conteúdo retornado de listaMun.php
                  $("#informacoes").empty();
                  $("#informacoes").html(msg);
                  $("#informacoes").show(); //mostra lista municipios
		}
            });
  }//fim listaMun()
  
  
$(document).ready(function(){	
     $("#tituloInfo").click(function(){
         $("#informacoes").toggle(); //esconde a lista de localidades
     });
     $("#zoom-in").click(function(){
       mapa.geomap( "zoom", 1 )
     });
     $("#zoom-out").click(function(){
        mapa.geomap( "zoom", -2 )
     });
     
});
</script>
<div id="tooltip"></div>
<!--div id="legend">
  <table id="legenda">
    <tr><td colspan="2"><b>Agrupamentos 2012</b></td></tr>
    
      <?php      
      /*
           foreach($arrMapa['mapa'][$indicador]['corGrupo'] as $indice => $cor){                   
               echo "<tr><td><span style=\"background-color:{$cor}\"/></td><td>{$arrMapa['mapa'][$indicador]['legenda'][$indice]}</td></tr>";
           }
        
       */ ?>
      
   </table>
</div-->
<div class="control-zoom control">
    <a id="zoom-in" class="control-zoom-in" ></a>
    <a id="zoom-out" class="control-zoom-out"></a>
</div>

<div id="grupodesc">
    <div style="padding:10px;text-align: left;border-bottom: 1px dotted #069;"><strong>LEGENDA</strong></div>    
    <table style="margin-left:2px;margin-right:2px;width:99%">
            <?php
            echo "<tr>";
            foreach($arrMapa['mapa'][$indicador]['corGrupo'] as $indice => $cor){                   
               echo "<th>{$arrMapa['mapa'][$indicador]['legenda'][$indice]}</th>";
            }
            echo"</tr><tr>";            
            foreach($arrMapa['mapa'][$indicador]['corGrupo'] as $indice => $cor){                   
               echo "<td style=\"background-color:{$cor}\"></td>";
            }
            echo"</tr><tr>";
            foreach($arrMapa['mapa'][$indicador]['descricao'] as $i => $desc){                   
               echo "<td>{$desc}</td>";
            }
            echo "</tr>";
            ?>         
    </table>
    <div style="width:auto;padding: 10px;text-align: right;border-top: 1px dotted #069">Para maiores detalhes consulte a <a href="pdf/metodologia.pdf" target="_blank">metodologia.</a></div>
</div>

<div id="divtabela">    
<h1>Principais Caracter�sticas dos Agrupamentos das Regi�es de Sa�de</h1>    
<?php echo"<h1> {$locnome} - {$sigla}</h2>"; ?>
<?php
if(isset($_REQUEST['indicador'])){
   $grupo = $_REQUEST['indicador'];
}else{
   $grupo = "grupo_socio";//nome do campo da tabela ref. ao grupo (prestador ou socio)    
}
$arrGrpDesc=array();
//legenda grupo_socio
$arrGrpDesc['grupo_socio']=
array(
1=>"Baixo desenvolvimento socioecon�mico e baixa oferta de servi�os",
2=>"M�dio/alto desenvolvimento socioecon�mico e baixa oferta de servi�os",
3=>"M�dio desenvolvimento socioecon�mico e m�dia/alta oferta de servi�os",
4=>"Alto desenvolvimento socioecon�mico e m�dia oferta de servi�os",
5=>"Alto desenvolvimento socioecon�mico e alta oferta de servi�os");

//legenda grupo_prestador
$arrGrpDesc['grupo_prestador'][1]="Predominantemente p�blico";
$arrGrpDesc['grupo_prestador'][2]="Predominantemente privado";
$arrGrpDesc['grupo_prestador'][3]="Situa��o intermedi�rio";
//legenda grupo_socio_prestador
$arrGrpDesc['grupo_socio_prestador_1']=array(0=>"N�o se aplica",1=>"Predominantemente p�blico",2=>"Predominantemente privado",3=>"Situa��o intermedi�rio");
$arrGrpDesc['grupo_socio_prestador_2']=array(0=>"N�o se aplica",1=>"Predominantemente p�blico",2=>"Predominantemente privado",3=>"Situa��o intermedi�rio");
$arrGrpDesc['grupo_socio_prestador_3']=array(0=>"N�o se aplica",1=>"Predominantemente p�blico",2=>"Predominantemente privado",3=>"Situa��o intermedi�rio");
$arrGrpDesc['grupo_socio_prestador_4']=array(0=>"N�o se aplica",1=>"Predominantemente p�blico",2=>"Predominantemente privado",3=>"Situa��o intermedi�rio");
$arrGrpDesc['grupo_socio_prestador_5']=array(0=>"N�o se aplica",1=>"Predominantemente p�blico",2=>"Predominantemente privado",3=>"Situa��o intermedi�rio");

$oBDados = new DadosBusiness();

$arrTab = $oBDados->findTotaisCirByUfIdAndGrupo($uf,$grupo);
echo "<table id='tabela'>";
$m=0;
$i=0;
foreach ($arrTab as $var => $arrGrp){
    if($i==0){
        echo "<tr><th>Caracter�sticas</th>";
        foreach(array_keys($arrGrp) as $j => $p){
           echo "<th><a alt='".$arrGrpDesc["$grupo"][$p]."' title='".$arrGrpDesc["$grupo"][$p]."'>".($grupo=="grupo_socio"?"Grupo ".$p: $arrGrpDesc["$grupo"][$p])."</a></th>";
        }    
        echo "</tr>";
        $i=1;
    }
    if($m==1){
        $zebra = "class ='alt'";
        $m=0;
    }else{
        $zebra="";
        $m=1;
    }
    echo "<tr {$zebra}><td>$labels[$var]</td>";
    foreach($arrGrp as $indice => $valor){
         $valor = number_format($valor,$arredondar[$var],",",".");
        echo "<td class='tnum'>{$valor}</td>";
    }
    echo "</tr>";
}

echo "</table>";
?>       
    <h3>fonte: Datasus.IBGE; elabora��o dos autores</h3>    
</div>