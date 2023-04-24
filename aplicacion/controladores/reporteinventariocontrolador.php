<?php
include_once "aplicacion/modelos/supertablero.php";
include_once "vendor/autoload.php";
class reporteinventariocontrolador extends controlador {
    private $inventario;
    //Metodo constructor
    public function __construct($parametro) {
        $this->inventario=new supertablero();
        parent::__construct("reporteinventario",$parametro,true);
    }
        public function getReporte() {
            $registros=$this->inventario->getinventarioReporte($_GET);
            $htmlheader="<img src='publico/images/LOGO TRANSPARENTE CBUES' width='150px'>";
            $htmlheader.="<h3>Reporte de inventario</h3>";
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
            $html.="</tr></thead><tbody>";
            foreach ($registros as $key => $value) {
                $html.="<tr>";
                $html.="<td>".($key+1)."</td>";
                $html.="<td>{$value["insumo"]}</td>";
                $html.="<td>"."$"."{$value["precio"]}</td>";
                $html.="<td>{$value["unidades"]}</td>";
                $html.="<td>"."$"."{$value["total"]}</td>";
                $html.="<td>{$value["fecha"]}</td>";
                $html.="<td>{$value["provee"]}</td>";
                $html.="<td>{$value["n_factura"]}</td>";
                $html.="<td>{$value["comprador"]}</td>";
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