<?php
/*
 * define os labels da tabela resumo
 */
$labels=array(
    0=>'Número de Regões de Saúde',
    1=>'% no total de Regiões',
    2=>'Número de Municípios',
    3=>'% no total de municípios',
    4=>'População (projeção 2013)',
    5=>'% no total da população',
    6=>'Média de municípios por Região',
    7=>'Média da população por município',
    8=>'Beneficiários de plano de saúde na população (em %)',
   // 9=>'População cadastrada na ESF (em %)',
    9=>'Médicos por mil habitantes',
    10=>'Médicos SUS no total de médicos (em %)',
    11=>'Leitos por mil habitantes',
    12=>'Leitos SUS no total de leitos (em %)');
/*
 * define a formatação para cada variáveis
 */
$arredondar[0] =0;
$arredondar[1] =1;
$arredondar[2] =0;
$arredondar[3] =1;
$arredondar[4] =0;
$arredondar[5] =1;
$arredondar[6] =0;
$arredondar[7] =0;
$arredondar[8] =1;
//$arredondar[9] =1;
$arredondar[9] =2;
$arredondar[10] =1;
$arredondar[11] =1;
$arredondar[12] =1;


/*
 * Estrutura para Mapas - legendas, cores
 * 
 */
$arrMapa['mapa']['grupo_socio']['titulo'] = "Distribuição das Regiões segundo os Cinco Grupos Socioeconômicos";
$arrMapa['mapa']['grupo_socio']['corGrupo']=array(1=>"#0209f3",2=>"#00fdfe",3=>"#bff715",4=>"#fbfdc6",5=>"#fd7b00");
$arrMapa['mapa']['grupo_socio']['legenda']=array(1=>"Grupo 1",2=>"Grupo 2",3=>"Grupo 3",4=>"Grupo 4",5=>"Grupo 5");
$arrMapa['mapa']['grupo_socio']['descricao']=array(1=>"Baixo desenvolvimento socioeconômico e baixa oferta de serviços",2=>"Médio/alto desenvolvimento socioeconômico e baixa oferta de serviços",3=>"Médio desenvolvimento socioeconômico e média/alta oferta de serviços",4=>"Alto desenvolvimento socioeconômico e média oferta de serviços",5=>"Alto desenvolvimento socioeconômico e alta oferta de serviços");


$arrMapa['mapa']['grupo_prestador']['titulo'] = "Distribuição das Regiões segundo os Perfis de Prestador SUS";
$arrMapa['mapa']['grupo_prestador']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_prestador']['legenda']=array(0=>"Divisão não disponível",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_prestador']['descricao']=array(0=>"Divisão não disponível",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

//perfil prestadores do grupo socio 1
$arrMapa['mapa']['grupo_socio_prestador_1']['titulo'] = "Distribuição das Regiões  do  grupo socioeconômico 1, segundo perfil do prestador do SUS";
$arrMapa['mapa']['grupo_socio_prestador_1']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_socio_prestador_1']['legenda']=array(0=>"Não se aplica",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_socio_prestador_1']['descricao']=array(0=>"Não se aplica",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

//perfil prestadores do grupo socio 2
$arrMapa['mapa']['grupo_socio_prestador_2']['titulo'] = "Distribuição das Regiões do grupo socioeconômico 2, segundo perfil do prestador do SUS";
$arrMapa['mapa']['grupo_socio_prestador_2']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_socio_prestador_2']['legenda']=array(0=>"Não se aplica",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_socio_prestador_2']['descricao']=array(0=>"Não se aplica",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

//perfil prestadores do grupo socio 3
$arrMapa['mapa']['grupo_socio_prestador_3']['titulo'] = "Distribuição das Regiões do grupo socioeconômico 3, segundo perfil do prestador do SUS";
$arrMapa['mapa']['grupo_socio_prestador_3']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_socio_prestador_3']['legenda']=array(0=>"Não se aplica",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_socio_prestador_3']['descricao']=array(0=>"Não se aplica",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

//perfil prestadores do grupo socio 4
$arrMapa['mapa']['grupo_socio_prestador_4']['titulo'] = "Distribuição das Regiões do grupo socioeconômico 4, segundo perfil do prestador do SUS";
$arrMapa['mapa']['grupo_socio_prestador_4']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_socio_prestador_4']['legenda']=array(0=>"Não se aplica",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_socio_prestador_4']['descricao']=array(0=>"Não se aplica",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

//perfil prestadores do grupo socio 5
$arrMapa['mapa']['grupo_socio_prestador_5']['titulo'] = "Distribuição das Regiões do grupo socioeconômico 5, segundo perfil do prestador do SUS";
$arrMapa['mapa']['grupo_socio_prestador_5']['corGrupo']=array(0=>"#ffffff",1=>"#808080",2=>"#ff9b36",3=>"#eaeaae");
$arrMapa['mapa']['grupo_socio_prestador_5']['legenda']=array(0=>"Não se aplica",1=>"Predominantemente público",2=>"Predominantemente privado",3=>"Situação intermediário");
$arrMapa['mapa']['grupo_socio_prestador_5']['descricao']=array(0=>"Não se aplica",1=>"presença expressiva do prestador público",2=>"presença expressiva do prestado privado no SUS",3=>"perfil intermediário entre os dois anteriores");

?>