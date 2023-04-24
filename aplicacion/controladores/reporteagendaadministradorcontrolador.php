<?php
//llamamos las funciones de supertablero en los modelos y de autoload en vendor
include_once "aplicacion/modelos/supertablero.php";
include_once "vendor/autoload.php";
class reporteagendaadministradorcontrolador extends controlador {
    private $agenda;
    //Metodo constructor
    public function __construct($parametro) {
        $this->agenda=new supertablero();
        parent::__construct("reporteagendaadministrador",$parametro,true);
    }
    //creamos el reporte en pdf
        public function getReporte() {
            $registros=$this->agenda->getagendaReporte($_GET);
           
            //creamos el encabezado
            $htmlheader="<img src='publico/images/LOGO TRANSPARENTE CBUES' width='150px'>";
            $htmlheader.="<h3>Reporte de actividades</h3>";
            $html="<table style='text-align: center;' width='100%' border=1><thead><tr>";
           
            //creamos los campos que se mostrarán
            $html.="<th>Id</th>";
            $html.="<th>Responsable</th>";
            $html.="<th>Actividad</th>";
            $html.="<th>Fecha prevista</th>";
            $html.="<th>Fecha final</th>";
            $html.="<th>Estado</th>";
            $html.="</tr></thead><tbody>";
           
            //se llaman los datos de la bd que aparecerán en la tabla
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
            
            //firmas o sellos
            $html.="<h3 style='text-align: center;'>_______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;_______________________</h3>";
            $html.="<h3 style='text-align: center;'>Solicitado   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aprobado          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Revisado</h3>";
            
            //configuración del formato pdf
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