<?php
include_once "aplicacion/modelos/supertablero.php";
include_once "vendor/autoload.php";
class reportecomprascontrolador extends controlador {
    private $compra;
    //Metodo constructor
    public function __construct($parametro) {
        $this->compra=new supertablero();
        parent::__construct("reportecompras",$parametro,true);
        // el parent::__construct es lo que llamas en el js para el frameReporte en este caso es reportecompras
    }
        public function getReporte() {
            // getReporte es lo que llamas en el js despues del parent::__construct dividido por una pleca en el frameReporte
            $registros=$this->compra->getcomprasReporte($_GET);
            // obtiene los datos del modelo que el nombre getcomprasReporte
            $htmlheader="<img src='publico/images/LOGO TRANSPARENTE CBUES' width='150px'>";
            $htmlheader.="<h3>Reporte de compras</h3>";
            $html="<table width='100%' style='text-align: center;' border=1><thead><tr>";
            $html.="<th>Id</th>";
            $html.="<th>Producto</th>";
            $html.="<th>Costo</th>";
            $html.="<th>Cantidad</th>";
            $html.="<th>Total</th>";
            $html.="<th>Fecha de compra</th>";
            $html.="<th>Proveedor</th>";
            $html.="<th>N° factura</th>";
            $html.="<th>Responsable</th>";
            $html.="<th>Proyecto</th>";
            $html.="</tr></thead><tbody>";
            // todo esto son los datos que obtienes de la consulta que hiciste en el modelo con la funcion con el nombre de getcomprasReporte
            foreach ($registros as $key => $value) {
                $html.="<tr>";
                $html.="<td>".($key+1)."</td>";
                $html.="<td>{$value["producto"]}</td>";
                $html.="<td>"."$"."{$value["costo"]}</td>";
                $html.="<td>{$value["cantidad"]}</td>";
                $html.="<td>"."$"."{$value["total_a_pagar"]}</td>";
                $html.="<td>{$value["fecha_compra"]}</td>";
                $html.="<td>{$value["proveedor"]}</td>";
                $html.="<td>{$value["num_factura"]}</td>";
                $html.="<td>{$value["responsable"]}</td>";
                $html.="<td>{$value["evento"]}</td>";
                $html.="</tr>";
            }
            $html.="</tbody></table>";
            $html.="<br>";
            $html.="<h3 style='text-align: center;'>Solicitado   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aprobado          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Revisado</h3>";
            $html.="<h3 style='text-align: center;'>Aprobado   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aprobado          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Aprobado</h3>";
            $mpdfConfig=array(
                'mode'=>'utf-8',
                'format'=>'Letter',
                'default_font_size'=>0,
                'default_font'=>'',
                'margin_left'=>10,
                'margin_right'=>10,
                'margin_top'=>40,
                'margin_header'=>10,
                'margin_footer'=>20,
                'orientation'=>'P'
            );
            $mpdf= new \Mpdf\Mpdf($mpdfConfig);
            $mpdf->SetHTMLHeader($htmlheader);
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }