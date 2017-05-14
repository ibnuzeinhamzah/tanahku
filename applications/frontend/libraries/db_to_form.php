<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Db_To_Form 
{
	var $CI = '';
	public function __construct()
	{
		$this->CI =& get_instance();
	}

	/*
	* iterate field from controller
	* generate table from data
	*/
	function create_table_view($mod, $modvars, $data)
	{
		$field = $modvars->field;
		$view = '';
		$view .= '<div class="box box-solid">';
		$view .= '<div class="box-header with-border">';
		$view .= '</div>';

		$view .= '<div class="box-body">';		
		$view .= $this->header_table($field);

		for($i=0;$i<count($data);$i++)
		{
			$url_detail = '<a href="'.base_url().$mod.'/detail/'.$data[$i]->id.'">';
			$view .= '<tr>';
			$view .= '<td style="text-align:right;">'.($i+1).'.</td>';

			foreach ($field as $k => $v) {
				$show = true;
				if(isset($v['show_on_table'])) $show = $v['show_on_table'];
				if($show) $view .= '<td>'.$url_detail.$this->generate_field_value($v,$k,$data[$i]->{$k}).'</a></td>'; 
			}
			
			$view .= '</tr>';
		}

		$view .= '</table>';
		$view .= '</div>';
		$view .= '</div>';

		return $view;
	}

	function create_list_view($mod, $modvars, $data)
	{
		$field = $modvars->field;
		$view = '';
		$view .= '<div class="box box-solid">';
		$view .= '<div class="box-header with-border">';
		$view .= '</div>';

		$view .= '<div class="box-body">';		
		
		for($i=0;$i<count($data);$i++)
		{
			$url_detail = '<h3><a href="'.base_url().$mod.'/detail/'.$data[$i]->id.'">';
			
			foreach ($field as $k => $v) {
				$show = true;
				$link = false;
				$view .= '<div class="field">';
				$link = (isset($v['link_to_detail'])) ? $v['link_to_detail'] : $link;
				$show = (isset($v['show_on_table'])) ? $v['show_on_table'] : $show;

				$view .= ($link) ? $url_detail : '';
				$view .= ($show) ? $this->generate_field_value($v,$k,$data[$i]->{$k}) : '';
				$view .= ($link) ? '</a></h3>' : '';

				$view .= '</div>';
			}
		}

		$view .= '</div>';
		$view .= '</div>';

		return $view;
	}

	function create_detail_view($mod, $modvars, $data)
	{
		$field = $modvars->field;
		$view = '';		

		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
		$view .= '<div class="box-header with-border">';
		$view .= '</div>';

		$view .= '<div class="box-body">';
		foreach ($field as $k => $v) {
			$show = true;
			$show = (isset($v['show_on_detail'])) ? $v['show_on_detail'] : $show;
			if($show){
				$text = (isset($v['text'])) ? $v['text'] : ucwords($k);
				$value = $data[0]->{$k};
				$view .= '<dl class="dl-horizontal">';
				$view .= '<dt>'.$text.'</label></dt>';
				$view .= '<dd>'.$this->generate_field_value($v,$k,$value).'</dd>';
				$view .= '</dl>';
			}
		}
		$view .= '</div>';
		
		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}

	function create_insert_view($mod, $modvars)
	{
		$field = $modvars->field;
		$view = '';		

		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
		$view .= '<div class="box-header with-border"><i class="fa fa-fw fa-pencil"></i> <h3 class="box-title">Insert '.$modvars->name.'</h3></div>';

		$view .= '<form role="form" method="post" action="'.base_url().'admin/'.$mod.'/save-insert" enctype="multipart/form-data">';
		$view .= '<div class="box-body">';
		foreach ($field as $k => $v) {
			if($v['type'] != 'primary_key')
			{
				$text = (isset($v['text'])) ? $v['text'] : ucwords($k);
				$view .= '<div class="form-group">';
                $view .= '<label for="'.$k.'">'.$text.'</label>';
                $view .= $this->generate_field_form($v,$k);
               	$view .= '</div>';
			}
		}
		$view .= '</div>';

		$view .= '<div class="box-footer">';
		$view .= $this->generate_hidden_form($field,$this->CI->security->get_csrf_token_name(),$this->CI->security->get_csrf_hash());
        $view .= '<button type="submit" class="btn btn-sm btn-flat btn-primary">Submit</button>&nbsp;';
        $view .= '<button type="reset" class="btn btn-sm btn-flat btn-default" onclick="location.href=\''.base_url().'admin/'.$mod.'\'">Cancel</button>';
      	$view .= '</div>';
		$view .= '</form>';
		
		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}

	function create_edit_view($mod, $modvars, $data)
	{
		$field = $modvars->field;
		$view = '';		

		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
		$view .= '<div class="box-header with-border"><i class="fa fa-fw fa-pencil"></i> <h3 class="box-title">Insert '.$modvars->name.'</h3></div>';

		$view .= '<form role="form" method="post" action="'.base_url().'admin/'.$mod.'/save-update" enctype="multipart/form-data">';
		$view .= '<div class="box-body">';
		foreach ($field as $k => $v) {
			if($v['type'] != 'primary_key')
			{
				$text = (isset($v['text'])) ? $v['text'] : ucwords($k);
				$view .= '<div class="form-group">';
                $view .= '<label for="'.$k.'">'.$text.'</label>';
                $view .= $this->generate_field_form($v,$k,$data[0]->{$k});
               	$view .= '</div>';
			}
		}
		$view .= '</div>';

		$view .= '<div class="box-footer">';
		$view .= $this->generate_hidden_form($field,'id',$data[0]->id);
		$view .= $this->generate_hidden_form($field,$this->CI->security->get_csrf_token_name(),$this->CI->security->get_csrf_hash());
        $view .= '<button type="submit" class="btn btn-sm btn-flat btn-primary">Update</button>&nbsp;';
        $view .= '<button type="reset" class="btn btn-sm btn-flat btn-default" onclick="location.href=\''.base_url().'admin/'.$mod.'\'">Cancel</button>';
      	$view .= '</div>';
		$view .= '</form>';
		
		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}

	function create_delete_view($mod, $modvars, $data)
	{
		$field = $modvars->field;
		$view = '';		

		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
		
		$view .= '<form role="form" method="post" action="'.base_url().'admin/'.$mod.'/delete/'.$data[0]->id.'" enctype="multipart/form-data">';
		$view .= '<div class="box-header with-border">';
		$view .= '<div class="col-xs-10"><h4 class="text-red"><i class="fa fa-fw fa-warning text-red"></i> Do You Want To Delete This ?</h4>';
		$view .= '<button type="submit" class="btn btn-sm btn-flat btn-default">Delete</button>&nbsp;';
        $view .= '<button type="reset" class="btn btn-sm btn-flat btn-primary" onclick="location.href=\''.base_url().'admin/'.$mod.'\'">Cancel</button>';
        $view .= '</div>'; // col-xs-10
		$view .= '<div class="col-xs-2 pull-right"><h5><a href="'.base_url().'admin/'.$mod.'"><i class="fa fa-fw fa-bars"></i> Back to list</a></h5></div>';
		$view .= '</div>'; // box-header
		
		$view .= '<div class="box-body">';
		$view .= '<div class="col-lg-12">';
		foreach ($field as $k => $v) {
			$text = (isset($v['text'])) ? $v['text'] : ucwords($k);
			$value = $data[0]->{$k};

			$view .= '<div class="form-group">';
            $view .= '<label for="'.$k.'">'.$text.'</label>';
            $view .= '<div>'.$value.'</div>';
           	$view .= '</div>';
		}
		$view .= '</div>';
		$view .= '</div>';
		
		$view .= '<div class="box-footer">';
		$view .= $this->generate_hidden_form($field,'id',$data[0]->id);
		$view .= $this->generate_hidden_form($field,$this->CI->security->get_csrf_token_name(),$this->CI->security->get_csrf_hash());
		$view .= '<div class="col-xs-12"><h4 class="text-red"><i class="fa fa-fw fa-warning text-red"></i> Do You Want To Delete This ?</h4>';
        $view .= '<button type="submit" class="btn btn-sm btn-flat btn-default">Delete</button>&nbsp;';
        $view .= '<button type="reset" class="btn btn-sm btn-flat btn-primary" onclick="location.href=\''.base_url().'admin/'.$mod.'\'">Cancel</button>';
      	$view .= '</div>'; // col-xs-12
      	$view .= '</div>'; // box-footer
      	$view .= '</form>';

		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row
		
		return $view;
	}

	function header_table($field)
	{
		$header = '<table class="table table-bordered table-striped" id="list-data">';
		$header .= '<thead>';
		$header .= '<tr>';

		foreach ($field as $key => $value) {
			if(isset($value['width'])) $width = ($value['width'] == '') ? '':'width="'.$value['width'].'"';
			else $width = '';
			
			if(isset($value['show_on_table'])) $show = $value['show_on_table'];
			if($show) $header .= '<th '.$width.'>'.ucwords($value['text']).'</th>'; 
		}
		
		$header .= '</tr>';
		$header .= '</thead>';

		return $header;
	}

	function header_admin_table($field)
	{
		$header = '<table class="table table-bordered table-striped" id="list-data">';
		$header .= '<thead>';
		$header .= '<tr>';

		$header .= '<th width="10px">No</th>'; 
		foreach ($field as $key => $value) {
			if(isset($value['width'])) $width = ($value['width'] == '') ? '':'width="'.$value['width'].'"';
			else $width = '';
			$show = true;
			if(isset($value['show_on_table'])) $show = $value['show_on_table'];
			if($show) $header .= '<th '.$width.'>'.ucwords($value['text']).'</th>';
		}
		$header .= '<th width="100px">Edit / Delete</th>'; 
		$header .= '</tr>';
		$header .= '</thead>';

		return $header;
	}

	function generate_field_form($field, $field_name, $value = "", $id = "")
	{	
		$field_type = $field['type'];
		if($field_type == "hidden") return $this->generate_hidden_form($field, $field_name, $value);
		if($field_type == "currency") return $this->generate_currency_form($field, $field_name, $value);
		if($field_type == "flag") return $this->generate_flag_form($field, $field_name, $value);
		if($field_type == "option") return $this->generate_option_form($field, $field_name, $value);
		if($field_type == "file") return $this->generate_file_form($field, $field_name, $value);
		if($field_type == "multifile") return $this->generate_multifile_form($field, $field_name, $value);
		if($field_type == "image") return $this->generate_file_form($field, $field_name, $value);
		if($field_type == "date") return $this->generate_date_form($field, $field_name, $value);
		if($field_type == "time") return $this->generate_time_form($field, $field_name, $value);
		if($field_type == "datetime") return $this->generate_datetime_form($field, $field_name, $value);
		if($field_type == "year") return $this->generate_year_form($field, $field_name, $value);
		if($field_type == "static_pages") return $this->generate_static_pages_form($field, $field_name, $value);
		if($field_type == "rentang_nilai") return $this->get_rentang_nilai_form($field, $field_name, $value);
		if($field_type == "onetomany") return $this->get_foreign_key_form($field, $field_name, $value);
		if($field_type == "onetoone") return $this->get_fkey_form($field, $field_name, $value);
		if($field_type == "password") return $this->generate_password_form($field, $field_name, $value);
		if($field_type == "text") return $this->generate_textarea_form($field, $field_name, $value, $id);
		if($field_type == "normaltext") return $this->generate_normaltext_form($field, $field_name, $value, $id);
		if($field_type == "int") return $this->generate_int_form($field, $field_name, $value);
		if($field_type == "varchar") return $this->generate_text_form($field, $field_name, $value);
	}

	function generate_field_value($field, $field_name, $value = "")
	{	
		$field_type = $field['type'];
		if($field_type == "#") return $value;
		if($field_type == "hidden") return $this->generate_hidden_form($field, $field_name, $value);
		if($field_type == "currency") return $this->generate_currency_value($field, $field_name, $value);
		if($field_type == "flag") return $this->generate_flag_value($field, $field_name, $value);
		if($field_type == "option") return $this->generate_option_value($field, $field_name, $value);
		if($field_type == "file") return $this->generate_file_value($field, $field_name, $value);
		if($field_type == "multifile") return $this->generate_multifile_value($field, $field_name, $value);
		if($field_type == "image") return $this->generate_file_value($field, $field_name, $value);
		if($field_type == "date") return $this->generate_date_value($field, $field_name, $value);
		if($field_type == "time") return $this->generate_time_value($field, $field_name, $value);
		if($field_type == "datetime") return $this->generate_datetime_value($field, $field_name, $value);
		if($field_type == "year") return $this->generate_year_value($field, $field_name, $value);
		if($field_type == "static_pages") return $this->generate_static_pages_value($field, $field_name, $value);
		if($field_type == "rentang_nilai") return $this->get_rentang_nilai_value($field, $field_name, $value);
		if($field_type == "onetomany") return $this->get_foreign_key_value($field, $field_name, $value);
		if($field_type == "onetoone") return $this->get_fkey_value($field, $field_name, $value);
		if($field_type == "password") return $this->generate_password_value($field, $field_name, $value);
		if($field_type == "text") return $this->generate_textarea_value($field, $field_name, $value);
		if($field_type == "int") return $this->generate_int_value($field, $field_name, $value);
		if($field_type == "varchar") return $this->generate_text_value($field, $field_name, $value);
		if($field_type == "hitung_umur") return $this->generate_hitung_umur_value($field, $field_name, $value);
		if($field_type == "primary_key") return $this->generate_int_value($field, $field_name, $value);
	}

	function generate_hidden_form($field, $field_name, $value = "")
	{
		return '<input type="hidden" name="'.$field_name.'" value="'.$value.'" />';
	}

	function generate_int_form($field, $field_name, $value = "")
	{
		$text = (isset($field['text'])) ? $field['text'] : $field_name;
		$placeholder = ($value == "") ? $text : $value;
		$forms .= '<input type="text" class="form-control input-sm" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'name="'.$field_name.'" id="'.$field_name.'" placeholder="'.$placeholder.'" value="'.$value.'">';
		return $forms;
	}

	function generate_int_value($field, $field_name, $value = "") { return '<div>'.$value.'</div>'; }

	function generate_text_form($field, $field_name, $value = "")
	{
		$text = (isset($field['text'])) ? $field['text'] : $field_name;
		$placeholder = ($value == "") ? $text : $value;
		$forms = '';
		$forms .= '<input type="text" class="form-control input-sm" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'name="'.$field_name.'" id="'.$field_name.'" placeholder="'.$placeholder.'" value="'.$value.'">';
		return $forms;
	}

	function generate_text_value($field, $field_name, $value = "") { return $value; }

	function generate_normaltext_form($field, $field_name, $value = "", $id = "")
	{
		$forms = '';
		$forms .= '<textarea id="'.$field_name.'" name="'.$field_name.'"  ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'class="form-control" rows="10" cols="80">'.$value.'</textarea>';
		return $forms; 
	}

	function generate_textarea_form($field, $field_name, $value = "", $id = "")
	{
		$forms = '';
		$forms .= '<textarea id="'.$field_name.'" name="'.$field_name.'"  ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'class="form-control texteditor" rows="10" cols="80">'.$value.'</textarea>';
		return $forms; 
	}

	function generate_textarea_value($field, $field_name, $value = "") { return '<div>'.$value.'</div>'; }

	function generate_password_form($field, $field_name, $value = "")
	{
		$forms = '';
		$text = (isset($field['text'])) ? $field['text'] : $field_name;
		$placeholder = $text;
		$forms .= '<input type="password" class="form-control input-sm" name="'.$field_name.'" id="'.$field_name.'" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'placeholder="'.$placeholder.'" value="">';
		$forms .= '<input type="hidden" name="old-'.$field_name.'" value="'.$value.'">';
		return $forms;
	}

	function generate_password_value($field, $field_name, $value = "") { return '<div>************</div>'; }

	function get_rentang_nilai_form($field, $field_name, $value = "")
	{
		$forms .= $this->generate_int_form($field, $field_name."_1", $value = "");
		$forms .= ' &nbsp; s.d. &nbsp; ';
		$forms .= $this->generate_int_form($field, $field_name."_2", $value = "");
		return $forms;
	}

	function get_fkey_form($field, $fieldname, $value = ""){
		$CI =& get_instance();
		include_once APPPATH.'/controllers/Admin/'.$field['fkey'].'.php';
		$modvars = new $field['fkey'];
		$modtable = $modvars->table;
		$fkey = $modvars->fkey;
		$data = $CI->admin_model->get_all_data($modtable);

		$v = '<select name="'.$fieldname.'" class="form-control input-sm">';
		for($i=0;$i<count($data);$i++){ 
			$selected = ($value == $data[$i]->$fkey['value']) ? "selected" : "";
			$v .= '<option value="'.$data[$i]->$fkey['value'].'" '.$selected.'>'.$data[$i]->$fkey['text'].'</option>'; 
		}
		$v .= '</select>';
		return $v;
	}
	/*
	function get_foreign_key_form($field, $field_name, $value = "")
	{
		$parent_table = $field['parent_table'];
		$parent_field = $field['parent_field'];
		$field_to_show = $field['field_to_show'];
		$field_type = $field['type'];
		if($field_type == "onetomany"){
			if(!is_array($value)) $value = explode(",", $value);
		}
		$not_in = array();
		if(isset($field['exclude']) && $field['exclude'] != ""){
			$not_in = explode(",", $field['exclude']);
		}

		$parent_data = $this->get_parent_data($field, $parent_table, $parent_field, $field_to_show);

		$forms = '';
		$forms .= (isset($field['width'])) ? '<div style="width:'.$field['width'].'">' : '<div class="col-xs-7">';
		$readonly = '';
		if(isset($field['readonly']) && $field['readonly'] == true) $readonly = 'disabled=true';

		if($field_type == "onetomany") $forms .= '<select name="'.$field_name.'[]" multiple="multiple" id="multiSelect" '.$readonly.' class="form-control chzn-select span4">';
		else $forms .= '<select name="'.$field_name.'" id="'.$field_name.'" '.$readonly.' class="form-control chzn-select span4">';
		$forms .= '<option value="">-- Select --</option>';
		for ($i=0; $i < count($parent_data); $i++) { 
			if(!in_array($parent_data[$i]->$parent_field, $not_in)){
				if($field_type == "onetomany") $selected = (in_array($parent_data[$i]->$parent_field, $value)) ? "selected":"";
				else $selected = ($parent_data[$i]->$parent_field == $value) ? "selected":"";
				$forms .= '<option value="'.$parent_data[$i]->$parent_field.'" '.$selected.'>';
				$forms .= (is_array($field_to_show)) ? $parent_data[$i]->concat_field : $parent_data[$i]->$field_to_show;
				$forms .= '</option>';
			}
		}
		$forms .= '</select>';
	
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= '<input type="hidden" name="'.$field_name.'" value="'.$value.'">';

		$forms .= '</div>';
        return $forms;
	}
	*/

	function get_rentang_nilai_value($field, $field_name, $value = "")
	{
		$value = explode(" AND ", $value);
		$forms = '';
		$forms .= $this->generate_int_value($field, $field_name, $value[0]) . ' s.d '.$this->generate_int_value($field, $field_name, $value[1]);
		return $forms;
	}

	function get_fkey_value($field, $fieldname, $value = ""){
		$CI =& get_instance();
		include_once APPPATH.'/controllers/Admin/'.$field['fkey'].'.php';
		$modvars = new $field['fkey'];
		$modtable = $modvars->table;
		$fkey = $modvars->fkey;
		$data = $CI->admin_model->get_data_by_id($modtable,$value,$fkey['value']);
		$v = '<div>';
		$v .= $data[0]->$fkey['text'];
		$v .= '</div>';
		return $v;
	}
	/*
	function get_foreign_key_value($field, $field_name, $value = "")
	{
		if($value == "") return "";

		$parent_table = $field['parent_table'];
		$parent_field = $field['parent_field'];
		$field_to_show = $field['field_to_show'];
		$field_type = $field['type'];

		$forms = '';
		if($field_type == "onetomany")
		{
			$value = explode(",", $value);
			$parent_data = $this->get_parent_data($field, $parent_table, $parent_field, $field_to_show, $value[0]);
			if(count($parent_data) > 0) $forms .= (is_array($field_to_show)) ? $parent_data[0]->concat_field : $parent_data[0]->$field_to_show;
			
			for ($i=1; $i < count($value); $i++) { 
				$parent_data = $this->get_parent_data($field, $parent_table, $parent_field, $field_to_show, $value[$i]);
				if(count($parent_data) > 0){ 
					$forms .= '<br/>';
					$forms .= (is_array($field_to_show)) ? $parent_data[0]->concat_field : $parent_data[0]->$field_to_show; 
				}
			}
		}
		else{
			$parent_data = $this->get_parent_data($field, $parent_table, $parent_field, $field_to_show, $value);
			if(count($parent_data) > 0){
				if(is_array($field_to_show)) $forms .= $parent_data[0]->concat_field;
				else $forms .= $parent_data[0]->$field_to_show;	
			}
		}
		
        return $forms;
	}
	*/

	function generate_time_form($field, $field_name, $value = "")
	{
		$forms = '<div class="col-xs-2">';
		$forms .= '<input type="text" class="form-control timepicker" ';
        if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
        $forms .= 'name="'.$field_name.'" id="'.$field_name.'" placeholder="hh:ii:ss" value="'.$value.'">';
        $forms .= '</div>';
        return $forms;
	}

	function generate_time_value($field, $field_name, $value = "") { return '<div>'.$value.'</div>'; }

	function generate_datetime_form($field, $field_name, $value = "")
	{
		$forms = '';
		$forms .= '<input type="text" class="form-control datetimepicker" ';
        if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
        $forms .= 'name="'.$field_name.'" id="'.$field_name.'" placeholder="YYYY-MM-DD hh:ii:ss" value="'.$value.'">';
        return $forms;
	}

	function generate_datetime_value($field, $field_name, $value = "") { return '<div>'.$value.'</div>'; }

	function generate_date_form($field, $field_name, $value = "")
	{
		$value = ($value == "") ? "" : str_replace("-", "/", $value);
		$forms = '<div class="input-group">';
		$forms .= '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
		$forms .= '<input type="text" class="form-control" name="'.$field_name.'" id="'.$field_name.'" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'data-inputmask="\'alias\': \'yyyy/mm/dd\'" data-mask value="'.$value.'">';
        $forms .= '</div>';
        return $forms;
	}

	function generate_date_value($field, $field_name, $value = "") { return '<div><h6><i>'.$value.'</i></h6></div>'; }

	function generate_year_form($field, $field_name, $value = "")
	{
		$forms = '<div class="input-group">';
		$forms .= '<div class="input-group-addon"><i class="fa fa-calendar"></i></div>';
        $forms .= '<input type="text" class="form-control" ';
        if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
        $forms .= 'name="'.$field_name.'" id="'.$field_name.'" data-inputmask="\'alias\': \'yyyy\'" data-mask value="'.$value.'">';
        $forms .= '</div>';
        return $forms;
	}

	function generate_year_value($field, $field_name, $value = "") { return '<div>'.$value.'</div>'; }

	function generate_file_form($field, $field_name, $value = "")
	{
		$forms = '';
		$forms .= '<div class="input-group">';
		if(!isset($field['readonly']) || $field['readonly'] == false){
			$forms .= '<input type="file" name="'.$field_name.'" multiple="">';
		}
		if($value != ""){
			$icon = $this->get_filetipe_icon($value);
			$forms .= '<p class="help-block"><i class="fa '.$icon.'"></i> '.$value.'</p>';
			$forms .= $this->generate_hidden_form($field,$field_name.'_old',$value);
		}
		$forms .= '</div>';
		return $forms;
	}

	function generate_file_value($field, $field_name, $value = "") { return ($value == "") ? "" : '<a href="'.base_url().$field['dir_to_save'].'/'.$value.'">'.$value.'</a>'; }

	function generate_multifile_form($field, $field_name, $value = "")
	{
		$forms = '';
		$forms .= '<div class="col-xs-12 list-upload-file-form">';
        $forms .= '    <input class="fileupload" name="'.$field_name.'[]" type="file" />';
      	$forms .= '</div>';
      	$forms .= '<div id="add_more_'.$field_name.'" class="col-xs-12 list-upload-file-form">';
        $forms .= '    <button class="add_more" data-id="'.$field_name.'" data-number="2" data-maxnumber="'.$field['maxnumber'].'">Add More Files</button>';
		$forms .= '</div>';
		
		return $forms;
	}

	function generate_multifile_value($field, $field_name, $value = "") { 
		$forms = '';
		if($value != ""){
			$v = explode(",", $value);
			for ($i=0; $i < count($v); $i++) { 
				$pos = strpos($v[$i], "_");
				if ($pos === false) { $pos = -1; }
				$forms .= '<div class="col-xs-12">';
				$forms .= '<a href="'.base_url().$field['dir_to_save'].'/'.$v[$i].'">'.substr($v[$i],$pos+1).'</a>'; 
				$forms .= '</div>';
			}
		}
		return $forms;
	}

	function generate_currency_form($field, $field_name, $value = "")
	{
		$forms = '<div class="col-xs-4">';
        $forms .= '<div class="input-group">';
		$forms .= '<span class="input-group-addon">'.$field['currency_symbol'].'</span>';
		$forms .= '<input type="text" class="form-control" name="'.$field_name.'" id="'.$field_name.'" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'readonly="readonly" ';
		$forms .= 'placeholder="Enter text.." value="'.$value.'">';
        $forms .= '</div>';
        $forms .= '</div>';
		return $forms; 
	}

	function generate_option_form($field, $field_name, $value = "")
	{
		$not_in = array();
		if(isset($field['exclude']) && $field['exclude'] != ""){ $not_in = explode(",", $field['exclude']); }

		$forms = '<div class="col-xs-3">';
		$forms .= '<select name="'.$field_name.'" ';
		if(isset($field['readonly']) && $field['readonly'] == true) $forms .= 'disabled=true ';
		$forms .= 'class="form-control chzn-select span4">';

		foreach ($field['option_value'] as $k => $v) 
		{
			if(!in_array($k,$not_in)){
				$selected = ($value == $k)?"selected":"";
				$forms .= '<option value="'.$k.'" '.$selected.'>'.$v.'</option>';
			}
		}

		$forms .= '</select>';
		$forms .= '</div>';
		return $forms; 
	}

	function generate_option_value($field, $field_name, $value = "") { 
		if($value == "") return "";
		$value = explode(",", $value);
		if(count($value) == 1) return $field['option_value'][$value[0]]; 
		else{
			$v = $field['option_value'][$value[0]];
			for ($i=1; $i < count($value); $i++) { $v .= $field['option_value'][$value[$i]]; }
			return $v;
		}
	}

	function generate_flag_value($field, $field_name, $value = "") { 
		$rvalue = "";
		if($value != ""){
			if(isset($field['flag_value'][$value])) $rvalue = $field['flag_value'][$value];
		}

		return $rvalue; 
	}

	function generate_flag_form($field, $field_name, $value = "")
	{
		$forms = '';
		foreach($field['flag_value'] as $k => $v){
			$checked = ($k == $value) ? "checked" : "";
			$forms .= '<div class="radio">';
			$forms .= '<label><input type="radio" name="'.$field_name.'" value="'.$k.'" '.$checked.'>'.$v.'</label>';
			$forms .= '</div>';
		}

		$forms .= '';
		return $forms; 
	}

	function get_parent_data($field, $parent_table, $parent_field, $fields_to_show, $value = "")
	{
		$CI =& get_instance();
		$field_to_show = "";
		if(is_array($fields_to_show)){ 
			$field_to_show = 'CONCAT_WS(" ", '.$fields_to_show[0];
			for ($i=1; $i < count($fields_to_show); $i++) { $field_to_show .= ", ".$fields_to_show[$i]; }
			$field_to_show .= ') as concat_field';
		}else{ $field_to_show = $fields_to_show; }

		$sql = "SELECT ".$parent_field.", ".$field_to_show." FROM ".$parent_table." WHERE flag = 1";
		if($value != "") $sql .= " AND ".$parent_field." = ".$value;
		return $CI->adminmod->get_data($sql);
	}

	function generate_link($url, $data)
	{
		$str_link = '';
		if(is_array($url))
		{
			foreach ($url as $key => $value) 
			{
				$key_replacement_pos = strpos($value, "/:");
				$key_replacement_pos_2 = strpos($value, ":", $key_replacement_pos);
				$key_replacement_pos += 2;
				$key_replacement = substr($value, $key_replacement_pos, $key_replacement_pos_2 - $key_replacement_pos);
				$value = str_replace(':'.$key_replacement.':', $data->$key_replacement, $value);
				if($key == 'icon-edit') $key = '<i class="glyphicon glyphicon-edit"></i>';
				elseif($key == 'icon-delete') $key = '<i class="glyphicon glyphicon-remove-circle glyphicon-danger"></i>';
				$str_link .= '<a href="'.$value.'">'.$key.'</a> ';
			}
		}
		else
		{
			$key_replacement_pos = strpos($value, ":");
			$key_replacement_pos_2 = strpos($value, ":", $key_replacement_pos);
			$key_replacement = substr($value, $key_replacement_pos, $key_replacement_pos_2 - $key_replacement_pos);
			$value = str_replace($key_replacement, $data->$key_replacement, $value);
			$str_link .= '<a href="'.$url.'"></a>';
		}

		return $str_link;
	}

	function check_uploaded_files($table, $field, $id = "")
	{
		$CI =& get_instance();

		if(isset($_FILES))
		{
			$data = array();
			foreach ($_FILES as $kFiles => $vFiles) 
			{ 
				if(is_array($vFiles))
				{
					$this->do_upload($table, $kFiles, $field[$kFiles], $vFiles, $id);				
				}
				else
				{
					if(is_uploaded_file($_FILES[$kFiles]['tmp_name']))
					{ 
						$data[$kFiles] = $vFiles['name'];
						$this->do_upload($table, $kFiles, $field[$kFiles], $_FILES[$kFiles], $id);
					}
				}
			}
			return $data;
		}
	}

	function check_uploaded_foto($table, $field, $id = "", $content)
	{
		$CI =& get_instance();

		if(isset($_FILES))
		{
			$data = array();
			foreach ($_FILES as $kFiles => $vFiles) 
			{ 
				if(is_array($vFiles))
				{
					$this->do_upload_foto($table, $kFiles, $field[$kFiles], $vFiles, $id, $content);				
				}
				else
				{
					if(is_uploaded_file($_FILES[$kFiles]['tmp_name']))
					{ 
						$data[$kFiles] = $vFiles['name'];
						$this->do_upload_foto($table, $kFiles, $field[$kFiles], $_FILES[$kFiles], $id, $content);
					}
				}
			}
			return $data;
		}
	}

	function do_upload_foto($table, $fieldname, $field, $files, $id = "", $content)
	{
		$CI =& get_instance();
		if(isset($field['dir_to_save'])) $uploaddir = $field['dir_to_save'] . '/' . $content["album"] . '/';
		else $uploaddir = FILE_DIR . '/';
		$error = array();
		
		if(is_array($files) && isset($files[$fieldname]))
		{
			$data[$fieldname] = '';
			for ($i=0; $i < count($files); $i++) { 
				if($files['error'][$i] == UPLOAD_ERR_OK)
				{
					$uploadfile = $uploaddir;
					$uploadfile .= ($id != "") ? $id . "_" : "";
					
					$uploadfile .= basename($files['name'][$i]);
					$uploadfile = $this->safe_str($uploadfile);

					if (move_uploaded_file($files['tmp_name'][$i], $uploadfile)) { 
						if($CI->uri->rsegment(2) != "save_json"){
							if($data[$fieldname] != '') $data[$fieldname] .= ',';
							$data[$fieldname] .= $id."_".$this->safe_str(basename($files['name'][$i]));
						}
					} 
					else { $error[$key] = 0; }
				}
			}
			$CI->adminmod->update($table, 'id', $id, $data);
		}
		else
		{
			if($files['error'][0] == 0)
			{
				$uploadfile = $uploaddir;
				$uploadfile .= ($id != "") ? $id . "_" : "";
				
				$uploadfile .= basename($files['name'][0]);
				$uploadfile = $this->safe_str($uploadfile);

				if (move_uploaded_file($files['tmp_name'][0], $uploadfile)) { 
					$data[$fieldname] = $id."_".$this->safe_str(basename($files['name'][0]));
					$CI->adminmod->update($table, 'id', $id, $data);
				} 
				else { $error[$key] = 0; }
			}
		}
		
		return $error;
	}

	function do_upload($files, $field, $uploaddir, $id)
	{
		if($files['error'] == UPLOAD_ERR_OK)
		{
			$uploadfile = $uploaddir;
			$uploadfile .= ($id != "") ? $id . "_" : "";
			$uploadfile .= basename($files['name']);
			if (move_uploaded_file($files['tmp_name'], $uploadfile)) { 
				return $id."_".$this->safe_str(basename($files['name']));
			} 
			else { return 0; }
		}
		return 0;
	}

	function safe_str($str)
	{
		$str = str_replace('“', '', $str);
        $str = str_replace('”', '', $str);
        $str = str_replace(',', '', $str);
        
        $str = str_replace('"', '', $str);
        $str = str_replace("'", "", $str);
        $str = str_replace('`', '', $str);
        $str = str_replace('~', '', $str);
        $str = str_replace('!', '', $str);
        $str = str_replace('@', '', $str);
        $str = str_replace('#', '', $str);
        $str = str_replace('$', '', $str);
        $str = str_replace('%', '', $str);
        $str = str_replace('^', '', $str);
        $str = str_replace('&', '', $str);
        $str = str_replace('*', '', $str);
        $str = str_replace('(', '', $str);
        $str = str_replace(')', '', $str);
        $str = str_replace('+', '', $str);
        $str = str_replace('=', '', $str);
        $str = str_replace('{', '', $str);
        $str = str_replace('}', '', $str);
        
        $str = str_replace('|', '', $str);
        $str = str_replace(']', '', $str);
        $str = str_replace('[', '', $str);
        $str = str_replace(':', '', $str);
        $str = str_replace(';', '', $str);
        $str = str_replace('<', '', $str);
        $str = str_replace('>', '', $str);
        
        $str = str_replace('?', '', $str);
        $str = str_replace(' ', '-', $str);

        return $str;
	}

	function get_filetipe_icon($file)
	{
		$filetipe = substr($file, -4);
		$iconfile = "fa-file";
		
		if(in_array($filetipe, array(".jpg",".png",".bmp",".gif"))) $iconfile = "fa-file-image-o";
		if(in_array($filetipe, array(".doc","docx",".odf"))) $iconfile = "fa-file-word-o";
		if(in_array($filetipe, array(".xls","xlsx"))) $iconfile = "fa-file-excel-o";
		if(in_array($filetipe, array(".ppt","pptx"))) $iconfile = "fa-file-powerpoint-o";
		if(in_array($filetipe, array(".zip",".rar","7zip",".tar"))) $iconfile = "fa-file-zip-o";
		if(in_array($filetipe, array(".txt"))) $iconfile = "fa-file-text-o";
		if(in_array($filetipe, array(".mp3",".aud",".ogg"))) $iconfile = "fa-file-audio-o";
		if(in_array($filetipe, array(".pdf"))) $iconfile = "fa-file-pdf-o";
		if(in_array($filetipe, array(".mp4","mpeg",".3gp",".mov"))) $iconfile = "fa-file-movie-o";
		return $iconfile;
	}

}