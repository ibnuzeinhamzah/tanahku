<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard
{
	var $name = 'Dashboard';
	
	function dashboard()
	{
		$CI =& get_instance();
		
		$formasi = $CI->admin_model->get_all_data('formasi_jabatan');
		$pendaftar = array();
		$selectedformasi = $CI->admin_model->get_data_by_sql('SELECT jurusan_formasi FROM pendaftar');
		$sformasi = array();
		for ($i=0; $i < count($selectedformasi); $i++) { 
			$t = explode('#', $selectedformasi[0]->jurusan_formasi);
			if(!in_array($t[0], $sformasi)) $sformasi[] = $t[0];
			if(!in_array($t[1], $sformasi)) $sformasi[] = $t[1];
		}

		for($i=0;$i<count($formasi);$i++){
			$tmp = $CI->admin_model->get_data_by_sql('SELECT IFNULL(count(*),0) as total FROM pendaftar GROUP BY jurusan_formasi HAVING jurusan_formasi = ' . $formasi[$i]->id);
			$pendaftar[$i] = (count($tmp) == 0) ? 0 : $tmp[0]->total;
		}

		$chart1 = '';
		$chart1 .= "element: 'bar-chart',";
		$chart1 .= "resize: true,";
		$chart1 .= "xLabelAngle: 60,";
		$chart1 .= "data: [";
		for($i=0;$i<count($formasi);$i++){
			if($i>0) $chart1 .= ",";
			$chart1 .= "{y: '".$formasi[$i]->nama."', a: ".$pendaftar[$i]."}";
		}
		$chart1 .= "],";
		$chart1 .= "barColors: ['#B61B12'],"; //, '#09355C'
		$chart1 .= "xkey: 'y',";
		$chart1 .= "ykeys: ['a'],"; //, 'b'
		$chart1 .= "labels: [";
		for($i=0;$i<count($formasi);$i++){
			if($i>0) $chart1 .= ",";
			$chart1 .= "'".$formasi[$i]->nama."'";
		}
		$chart1 .= "],"; //, 'DISK'
		$chart1 .= "hideHover: 'auto'";

		$CI->session->set_userdata(array('chartdata' => $chart1));

		$view = '';		
		$view .= '<div class="row">';
		
		$view .= '<div class="col-md-6">';
		$view .= '<div class="box box-primary">';
		$view .= '<div class="box-header with-border">';
		$view .= '<h3 class="box-title">Komposisi Pendaftar</h3>';
		$view .= '<div class="box-tools pull-right">';
		$view .= '<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>';
		$view .= '<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>';
		$view .= '</div>';
		$view .= '</div>';
		$view .= '<div class="box-body chart-responsive">';
		$view .= '<div class="chart" id="bar-chart" style="height: 350px;"></div>';
		$view .= '</div><!-- /.box-body -->';
		$view .= '</div><!-- /.box -->';
		$view .= '</div><!-- /.col -->';
		

		
		$view .= '</div>'; // row

		return $view;
	}
}
