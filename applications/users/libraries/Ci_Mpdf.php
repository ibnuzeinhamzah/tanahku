<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ci_Mpdf
{
	var $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}

	function generate_pdf($data,$template,$style,$layout,$paper_size)
	{
		include_once("MPDF/mpdf.php");
		$mpdf = new mPDF('c',$paper_size,'','Garuda',15,15,10,10,5,5,$layout); 
		$mpdf->cacheTables = true;
		$mpdf->SetDisplayMode('fullpage');
		
		// 1 or 0 - whether to indent the first level of a list
		$mpdf->list_indent_first_level = 0;
		$stylesheet = $style;
		
		// Clear headers before adding page
		//$mpdf->setHeader('||'.$data['header'].', '.date("d-m-Y"));
		$mpdf->setHeader('||'.$data['header']);
		$mpdf->AddPage($layout,'','','','',15,15,10,10,5,5);

		// The parameter 1 tells that this is css/style only and no body/html/text
		$mpdf->WriteHTML($stylesheet,1);
		$html = $this->CI->parser->parse($template, $data, TRUE);
		//$mpdf->setFooter('||'.$data['footer'].', '.date("d-m-Y")) ;
		$mpdf->setFooter('||'.$data['footer']) ;
		$mpdf->WriteHTML($html,2);
		$mpdf->Output($data['title'].'.pdf','I');
		exit;
	}

	
}