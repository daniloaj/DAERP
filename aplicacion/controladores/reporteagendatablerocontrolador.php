<?php
include_once "aplicacion/modelos/supertablero.php";
include_once "vendor/autoload.php";
class reporteagendatablerocontrolador extends controlador {
    private $agenda;
    //Metodo constructor
    public function __construct($parametro) {
        $this->agenda=new supertablero();
        parent::__construct("reporteagendatablero",$parametro,true);
    }
        public function getReporte() {
            $registros=$this->agenda->getagendaReporte($_GET);
            $htmlheader="<img src='publico/images/LOGO TRANSPARENTE CBUES' width='150px'>";
            $htmlheader.="<h3>Reporte de actividades</h3>";
            $html="<table style='text-align: center;' width='100%' border=1><thead><tr>";
            $html.="<th>Id</th>";
            $html.="<th>Responsable</th>";
            $html.="<th>Actividad</th>";
            $html.="<th>Fecha prevista</th>";
            $html.="<th>Fecha final</th>";
            $html.="<th>Estado</th>";
            $html.="</tr></thead><tbody>";
            foreach ($registros as $key => $value) {
                $html.="<tr>";
                $html.="<td>".($key+1)."</td>";
                $html.="<td>{$value["responsables"]}</td>";
                $html.="<td>{$value["proyecto"]}</td>";
                $html.="<td>{$value["fecha_prevista"]}</td>";
                $html.="<td>{$value["fecha_final"]}</td>";
                $html.="<td>{$value["estado"]}</td>";
                $html.="</tr>";
            }
            $html.="</tbody></table>";
            $html.="<br>";
            $html.="<h3 style='text-align: center;'>_______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________</h3>";
            $html.="<h3 style='text-align: center;'>Solicitado   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aprobado          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Revisado</h3>";
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