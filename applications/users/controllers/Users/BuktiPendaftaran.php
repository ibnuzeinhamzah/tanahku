<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BuktiPendaftaran
{
	var $name = 'Bukti Pendaftaran';
	var $table = 'biodata';
	var $field = array(
						'id' => array('type' => 'primary_key','show_on_table'=>false),
						'agama' => array('type' => 'varchar','text' => 'Agama'),
					);
	var $fkey = array(
					'value' => 'id',
					'text' => 'agama',
				);

	function pdf_form()
	{
		$ci =& get_instance();

		$id = $ci->session->userdata('user_id');

		include_once APPPATH.'controllers/Users/DataPribadi.php';
		$m = new DataPribadi;
		$d = $ci->users_model->get_data_by_sql('SELECT a.*, b.no_ktp, b.nip, b.no_registrasi, b.jurusan_formasi FROM '.$m->table.' a RIGHT JOIN pendaftar b ON a.user_id = b.user_id WHERE a.user_id = '.$id);
		$e = $ci->users_model->get_data_by_sql("SELECT nama FROM formasi_jabatan WHERE id IN ('" . str_replace('#', "','", $d[0]->jurusan_formasi) . "') ORDER BY FIELD(id, '" . str_replace('#', "','", $d[0]->jurusan_formasi) . "')");
		$v = '<br/>';
		
		$v .= '<div class="col-md-8">';
		$v .= '<div class="container">';

		$v .= '<div class="col-md-12">';
		$v .= '<h3>PANITIA SELEKSI JABATAN PIMPINAN TINGGI BAPPENAS</h3>';
		$v .= '</div>';

		$v .= '<div class="col-md-12">';
		
		$v .= '<table border="1" cellpadding="8" class="pdf-container">';
		
		$v .= $this->generate_row('NO REGISTRASI', $d[0]->no_registrasi);
		$v .= $this->generate_row('NAMA', $d[0]->gelar_depan.' '.$d[0]->realname.', '.$d[0]->gelar_belakang);
		$v .= $this->generate_row('NIP', $d[0]->nip);
		$v .= $this->generate_row('NO KTP', $d[0]->no_ktp);
		$v .= $this->generate_row('ALAMAT', $d[0]->alamat_rumah);

		$v .= $this->generate_row('JURUSAN FORMASI I', $e[0]->nama);
		$v .= (count($e) > 1) ? $this->generate_row('JURUSAN FORMASI II', $e[1]->nama) : '';
		$v .= (count($e) > 2) ? $this->generate_row('JURUSAN FORMASI III', $e[2]->nama) : '';
		$v .= (count($e) > 3) ? $this->generate_row('JURUSAN FORMASI IV', $e[3]->nama) : '';
		
		$v .= '</table>';

		$v .= '<br/>Apabila dianggap lulus seleksi administrasi, mohon membawa dokumen asli saat tes seleksi selanjutnya.';

		$v .= '</div>';

		$v .= '</div>';
		$v .= '</div>';

		return $v;
	}

	function generate_row($text, $value)
	{
		$v = '<tr>';
		$v .= '<td class="key"><strong>'.$text.'</strong></td>';
		$v .= '<td class="value">'.$value.'</td>';
		$v .= '</tr>';

		return $v;
	}
}
