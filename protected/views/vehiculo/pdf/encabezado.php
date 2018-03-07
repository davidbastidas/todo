<?php
$ruta_imagenes = Yii::app() -> params['imagenes_proyecto'];?>
<style>
@page {
  margin: 0;
}

body {
  margin-top: 3.5cm;
  margin-bottom: 2cm;
  margin-left: 1cm;
  margin-right: 1cm;
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
  padding: 0.1cm;
  margin-left: 1cm;
  margin-right: 1cm;
}

div.header {
  top: 0cm;
  left: 0cm;
  height: 2.5cm;
}

div.footer {
  bottom: 0cm;
    left: 0cm;
  height: 1cm;
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
    width: 150px;
}

</style>
<div class="header">
    <table class="encabezado">
        <tbody>
            <tr>
                <td style="width: 80%;">
                    <p class="texto_cabeza">
                        Applus Norcontrol Colombia Ltda.<br>
                        Carrera 11 No. 73-32 Piso 2 Bogota<br>
                        PBX: (571) 3212944 - FAX:(571) 3212942 <br>
                        Calle 58 N 59B-09   Barranquilla<br>
                        PBX: (575 3851256<br>
                        www.appluscorp.com
                    </p>
                </td>
                <td style="width: 20%;"><img class="logo1" src="<?php echo $ruta_imagenes?>logo1.jpg"></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="footer">
    <p class="page"></p>
</div>
