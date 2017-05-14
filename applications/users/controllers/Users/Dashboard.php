<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard
{
	var $name = 'Dashboard';
	
	function dashboard()
	{
		$CI =& get_instance();
		$user_id = $CI->session->userdata('user_id');
		$news_for_user = $CI->users_model->get_last_data('news_for_user');
		$biodata = $CI->users_model->get_data_by_id('biodata',$user_id,'user_id');
		$pendidikan = $CI->users_model->get_data_by_id('riwayat_pendidikan',$user_id,'user_id');
		$diklat = $CI->users_model->get_data_by_id('riwayat_diklat',$user_id,'user_id');
		$jabatan = $CI->users_model->get_data_by_id('riwayat_jabatan',$user_id,'user_id');
		$pangkat = $CI->users_model->get_data_by_id('riwayat_pangkat',$user_id,'user_id');
		$penugasan = $CI->users_model->get_data_by_id('riwayat_penugasan',$user_id,'user_id');
		$prestasi = $CI->users_model->get_data_by_id('riwayat_prestasi',$user_id,'user_id');
		$karya_tulis = $CI->users_model->get_data_by_id('karya_tulis',$user_id,'user_id');
		$dokumen = $CI->users_model->get_data_by_id('dokumen_pendukung',$user_id,'user_id');
		$jenisdokumen = $CI->users_model->get_all_data('jenis_document');
		$lampiran = $CI->users_model->get_all_data('lampiran');
		$lolos = $CI->users_model->get_data_by_sql('SELECT lolos FROM pendaftar WHERE user_id = '.$user_id);
		$pilihanformasi = $CI->users_model->get_data_by_id('pendaftar',$user_id,'user_id');

		list($d,$m,$y) = explode("-", DUE_DATE);
		$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$due_date = $d . ' ' . $bulan[$m-1] . ' ' . $y;

		// $posisi = $CI->users_model->get_data_by_id('formasi_jabatan',$CI->session->userdata('jurusan_formasi'),'id');
		// $pendaftar = $CI->users_model->get_data_by_sql('SELECT count(user_id) as pendaftar FROM pendaftar GROUP BY jurusan_formasi HAVING jurusan_formasi = ' . $CI->session->userdata('jurusan_formasi'));

		$view = '';		
		$view .= '<div class="row">';
		$view .= '<div class="col-lg-12">';
		$view .= '<div class="box box-solid">';
	
		$view .= '<div class="box-body">';
		
		if(count($news_for_user) > 0){
			$view .= '<div class="col-md-12">';
			$view .= '<h4>' . $news_for_user[0]->title . '</h4>';
			$view .= '<p>' . $news_for_user[0]->fullteks . '</p>';
			$view .= ($news_for_user[0]->newsfile != '') ? '<a href="'.REALPATH.NEWS_DIR.'/'.$news_for_user[0]->newsfile.'">' . $news_for_user[0]->newsfile . '</a>' : '';
			$view .= '</div>';
		}

		$view .= '<div class="col-md-12">';
		$view .= 'Batas waktu pengisian data peserta seleksi jabatan pimpinan tinggi BAPPENAS sampai dengan tanggal <strong>' . $due_date . '</strong>.';
		$view .= '</div>';

		$view .= '<div class="col-md-12">';
		// $view .= 'Jumlah pendaftar posisi '.$posisi[0]->nama.' adalah : ' . count($pendaftar) . '.';
		$view .= '</div>';

		$view .= '<div class="col-md-12">';
		$view .= '<hr>';
		$view .= '</div>';

		if($pilihanformasi[0]->jurusan_formasi == '0') {
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan pilih formasi jabatan <a href="'.REALPATH.'users/pilih-formasi-jabatan">disini.</a>';
			$view .= '</div>';
		}

		if(count($biodata) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data pribadi Anda <a href="'.REALPATH.'users/data-pribadi">disini.</a>';
			$view .= '</div>';
		}

		if(count($pendidikan) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat pendidikan Anda <a href="'.REALPATH.'users/riwayat-pendidikan">disini.</a>';
			$view .= '</div>';
		}

		if(count($diklat) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat diklat Anda <a href="'.REALPATH.'users/riwayat-diklat">disini.</a>';
			$view .= '</div>';
		}

		if(count($jabatan) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat jabatan Anda <a href="'.REALPATH.'users/riwayat-jabatan">disini.</a>';
			$view .= '</div>';
		}

		if(count($pangkat) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat kepangkatan Anda <a href="'.REALPATH.'users/riwayat-kepangkatan">disini.</a>';
			$view .= '</div>';
		}

		if(count($penugasan) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat penugasan Anda <a href="'.REALPATH.'users/riwayat-penugasan">disini.</a>';
			$view .= '</div>';
		}

		if(count($prestasi) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data riwayat prestasi Anda <a href="'.REALPATH.'users/riwayat-prestasi">disini.</a>';
			$view .= '</div>';
		}

		if(count($karya_tulis) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan isi data karya tulis Anda <a href="'.REALPATH.'users/karya-tulis">disini.</a>';
			$view .= '</div>';
		}

		if(count($dokumen) == 0){
			$view .= '<div class="col-md-12">';
			$view .= 'Silahkan upload dokumen pendukung Anda <a href="'.REALPATH.'users/upload-dokumen">disini.</a>';
			$view .= '</div>';
		}else{
			if(count($dokumen) < count($jenisdokumen)){
				$view .= '<div class="col-md-12">';
				$view .= 'Silahkan lengkapi dokumen pendukung Anda <a href="'.REALPATH.'users/upload-dokumen">disini.</a>';
				$view .= '</div>';
			}
		}

		if($pilihanformasi[0]->jurusan_formasi != '0' && count($biodata) > 0 && count($pendidikan) > 0 && count($jabatan) > 0 && count($pangkat) > 0 && count($dokumen) >= count($jenisdokumen)){
			// if($lolos[0]->lolos == 1){
				$view .= '<div class="col-md-12">';
				$view .= '<br/>Silahkan download <strong>Tanda Bukti Pendaftaran</strong> Anda <a href="'.REALPATH.'users/bukti-pendaftaran/pdf">disini.</a>';
				$view .= '</div>';

				$view .= '<div class="col-md-12">';
				$view .= 'Silahkan download <strong>Daftar Riwayat Hidup</strong> Anda <a href="'.REALPATH.'users/drh/pdf/'.$user_id.'">disini.</a>';
				$view .= '</div>';
			// }else{
			// 	$view .= '<div class="col-md-12">';
			// 	$view .= 'Terimakasih telah mengisi seluruh data Anda.';
			// 	$view .= '</div>';
			// }
		}

		$view .= '<div class="col-md-12">';
		$view .= '<hr>';
		$view .= '</div>';

		$view .= '<div class="col-md-12">';
		$view .= 'Terlampir dokumen persyaratan yang harus Anda print dan isi.';
		if(count($lampiran) > 0){
			$view .= '<ol>';
			for($i=0;$i<count($lampiran);$i++){
				$view .= '<li><a href="'.REALPATH.LAMPIRAN_DIR.'/'.$lampiran[$i]->lampiranfile.'">' . $lampiran[$i]->title . '</a></li>';
			}
			$view .= '</ol>';
		}
		$view .= '</div>';

		$view .= '</div>';

		$view .= '</div>'; // box
		$view .= '</div>'; // col-lg-12
		$view .= '</div>'; // row

		return $view;
	}
}
