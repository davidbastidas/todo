<?php
$ruta_imagenes = Yii::app() -> params['imagenes_proyecto'];?>
<style>
@page {
  margin: 0;
}

body {
  margin-top: 3.1cm;
  margin-bottom: 0cm;
  margin-left: 0.5cm;
  margin-right: 0.5cm;
  font-family: DejaVu Sans, sans-serif;
  text-align: justify;
}

div.header,
div.footer {
  position: fixed;
  background: #fff;
  width: 100%;
  border: 0px solid #888;
  overflow: hidden;
  padding: 0;
  margin-left: 0.5cm;
  margin-right: 0.5cm;
}
div.header {
  top: 0cm;
  left: 0cm;
  height: 1.0cm;
}

div.footer {
  margin-top: -1.0cm;
  bottom: 0cm;
  left: 0cm;
  height: 0.7cm;
  margin-bottom: 0.2cm;
}
div.footer .page:after { content: "Pagina " counter(page); font-size: 9px;}
hr {
  page-break-after: always;
  border: 0;
}
.bordertd_size9{
    border: 1px solid black;
    font-size: 9px;
    padding: 5px;
}
.border_equipo {
    border-collapse: collapse;
}
table.border {
    border-collapse: collapse;
    border: 0.5pt solid black;
}
table.border td, 
table.border th {
    border-collapse: collapse;
    border: 0.5pt solid black;
    font-size: 9px;
}
.critica_r{
    font-size: 9px;
}
.encabezado{
    width: 100%;
    border:none;
    outline:none;
}
.texto_cabeza{
    font-size: 9px;
}
.logo1{
    width: 100px;
    height: 50px;
}
#content{
  margin-top: -70px;
}
</style>
<div class="header">
    <table class="encabezado">
        <tbody>
            <tr>
                <td style="width: 100%;font-size: 11px"></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="footer">
  <table style="font-size:8px;width:100%;">
    <tr>
      <td style="text-align:left;width:40%;"></td>
      <td style="text-align:center;width:10%;"></td>
      <td style="text-align:right;width:50%;">MO.00142.CO-MA-FO.05<br>Ed: 01</td>
    </tr>
  </table>
</div>
