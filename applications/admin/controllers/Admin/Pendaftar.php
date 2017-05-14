<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendaftar
{
	var $name = 'Pendaftar';
	var $table = 'pendaftar';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false,'show_on_detail'=>false),
						'user_id' => array('type' => 'onetoone','text' => 'Username','fkey' => 'Users','show_on_table'=>false),
						'email' => array('type' => 'varchar','text' => 'Email','show_on_table'=>false),
						'nip' => array('type' => 'varchar','text' => 'NIP'),
						'realname' => array('type' => 'varchar','text' => 'Nama'),
						'no_ktp' => array('type' => 'varchar','text' => 'No. KTP','show_on_table'=>false),
						'jurusan_formasi' => array('type' => 'onetoone','text' => 'Formasi Jabatan','fkey' => 'FormasiJabatan'),
						'no_registrasi' => array('type' => 'varchar','text' => 'No. Registrasi'),
						'aktivasi' => array('type' => 'flag','text' => 'Sudah Aktivasi','flag_value' => array(0=>'Belum',1=>'Sudah'),'show_on_detail'=>false),
						'link_aktivasi' => array('type' => 'varchar','text' => 'URL Link Aktivasi','show_on_table'=>false,'show_on_detail'=>false),
						'updated' => array('type' => 'flag','text' => 'Sudah Di Update','flag_value' => array(0=>'Belum',1=>'Sudah'),'show_on_detail'=>false),
						'lolos' => array('type' => 'flag','text' => 'Lolos','flag_value' => array(0=>'Tidak',1=>'Ya')),
					);

	var $insertable = 0;

	function index()
	{
		$ci =& get_instance();
		$data = $ci->admin_model->get_data_by_sql('SELECT * FROM '.$this->table.' WHERE aktivasi = 1');
		return $ci->db_to_form->create_list_view($this->name, $this, $data, true);
	}

	function detail($id)
	{
		$ci =& get_instance();
		$v = '';

		$pendaftar = $ci->admin_model->get_data_by_sql('SELECT a.*, b.email, b.nip, b.no_ktp, b.lolos FROM biodata a RIGHT JOIN pendaftar b ON a.user_id = b.user_id WHERE b.id = '.$id.' AND b.aktivasi = 1');

		$v .= '<div class="box box-solid">';
		$v .= '<div class="box-header with-border">';
		$v .= '<div class="form-group">';
		$v .= '<label class="col-sm-2 control-label">Lolos</label>';
		$v .= '<div class="col-sm-2">';
		$v .= '<select class="form-control input-sm	" name="lolos" id="lolos" data-id="'.$id.'">';
		$v .= '<option>-- Option --</option>';
		$selected = ($pendaftar[0]->lolos == 1) ? "selected" : "";
		$v .= '<option value="1" '.$selected.'> Ya </option>';
		$selected = ($pendaftar[0]->lolos == 0) ? "selected" : "";
		$v .= '<option value="0" '.$selected.'> Tidak </option>';
		$v .= '</select>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';

		$v .= '<div class="box-body">';
		$v .= $this->layout('<br/>DATA PRIBADI', '');
		for($i=0;$i<count($pendaftar);$i++){
			$v .= $this->layout('Nama Lengkap', $pendaftar[$i]->gelar_depan.' '.$pendaftar[$i]->realname.', '.$pendaftar[$i]->gelar_belakang);
			$v .= $this->layout('TTL', $pendaftar[$i]->tempat_lahir.', '.$pendaftar[$i]->tanggal_lahir);
			$v .= $this->layout('NIP', $pendaftar[$i]->nip);
			$v .= $this->layout('No KTP', $pendaftar[$i]->no_ktp);
			$v .= $this->layout('Jenis Kelamin', $pendaftar[$i]->jenis_kelamin);
			// $v .= $this->layout('Telp. Rumah', $pendaftar[$i]->telp_rumah);
			// $v .= $this->layout('Handphone', $pendaftar[$i]->no_hp);
			// $v .= $this->layout('Alamat Rumah', $pendaftar[$i]->alamat_rumah);
			// $v .= $this->layout('Alamat Rumah Saat Ini', $pendaftar[$i]->alamat_saat_ini);
			
		}

		$v .= $this->layout('<br/>RIWAYAT PENDIDIKAN', '');
		include_once 'RiwayatPendidikan.php';
		$m = new RiwayatPendidikan;
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>RIWAYAT DIKLAT', '');
		include_once 'RiwayatDiklat.php';
		$m = new RiwayatDiklat;
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>RIWAYAT JABATAN', '');
		include_once 'RiwayatJabatan.php';
		$m = new RiwayatJabatan;
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>RIWAYAT KEPANGKATAN', '');
		include_once 'RiwayatKepangkatan.php';
		$m = new RiwayatKepangkatan;
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>RIWAYAT PRESTASI', '');
		include_once 'RiwayatPrestasi.php';
		$m = new RiwayatPrestasi;
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>KARYA TULIS', '');
		include_once 'KaryaTulis.php';
		$m = new KaryaTulis;		
		$v .= $this->generate_data($id, $m);

		$v .= $this->layout('<br/>DOKUMEN', '');
		include_once 'UploadDokumen.php';
		$m = new UploadDokumen;		
		$v .= $this->generate_data($id, $m);

		$v .= '</div>';

		$v .= '<div class="box-footer without-border">';
		$v .= '<div class="form-group">';
		$v .= '<label class="col-sm-2 control-label">Lolos</label>';
		$v .= '<div class="col-sm-2">';
		$v .= '<select class="form-control input-sm	" name="lolos" id="lolos" data-id="'.$id.'">';
		$v .= '<option>-- Option --</option>';
		$selected = ($pendaftar[0]->lolos == 1) ? "selected" : "";
		$v .= '<option value="1" '.$selected.'> Ya </option>';
		$selected = ($pendaftar[0]->lolos == 0) ? "selected" : "";
		$v .= '<option value="0" '.$selected.'> Tidak </option>';
		$v .= '</select>';
		$v .= '</div>';
		$v .= '</div>';
		$v .= '</div>';

		$v .= '</div>';

		return $v;
	}

	function generate_data($id, $m)
	{
		$ci =& get_instance();
		$vv = '';
		$d = $ci->admin_model->get_data_by_sql('SELECT a.* FROM '.$m->table.' a RIGHT JOIN pendaftar b ON a.user_id = b.user_id WHERE b.id = '.$id);
		if(count($d) > 0)
		{
			$t = floor(12 / count($d));
			$t = ($t < 6) ? 6 : $t;
			$vv .= '<div class="row">';
			for($i=0;$i<count($d);$i++){
				$vv .= '<div class="col-md-'.$t.'">';
				foreach ($m->field as $k => $v) {
					$show = true;
					if(isset($v['show_on_detail'])) $show = $v['show_on_detail'];
					if($show){
						$text = (isset($v['text'])) ? $v['text'] : ucwords($k);
						$value = $ci->db_to_form->generate_field_value($v,$k,$d[$i]->{$k});
						$vv .= ( fmod($i,12/$t) != 0 ) ? $this->layout('', $value) : $this->layout($text, $value);
					}
				}
				$vv .= '</div>';
			}
			$vv .= '</div>';
		}
		return $vv;
	}

	function layout($text, $value)
	{
		$class = ($text == '') ? 'dt-empty' : '';
		$v = '<dl class="dl-horizontal">';
		$v .= '<dt class="'.$class.'"><label>'.$text.'</label></dt>';
		$v .= '<dd class="'.$class.'">'.$value.'</dd>';
		$v .= '</dl>';
		$v .= '<hr style="margin:0px;">';

		return $v;
	}

	function get_field_id($field)
	{
		foreach ($field as $key => $value) {
			if($value['type'] == 'primary_key') return $key;
		}
		return 'id';
	}
}
