<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Drh
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
        $CI =& get_instance();

        // $user_id = $CI->session->userdata('user_id');
        $user_id = $CI->uri->rsegment(4,0);
        $registrasi = $CI->users_model->get_data_by_id('pendaftar',$user_id,'user_id');
        $biodata = $CI->users_model->get_data_by_id('biodata',$user_id,'user_id');
        $pendidikan = $CI->users_model->get_data_by_sql('SELECT tingkat_pendidikan, jurusan, universitas, ipk FROM riwayat_pendidikan WHERE user_id = '.$user_id.' ORDER BY tingkat_pendidikan DESC');
        $diklat = $CI->users_model->get_data_by_sql('SELECT * FROM riwayat_diklat WHERE user_id='.$user_id.' ORDER BY tahun DESC');
        $jabatan = $CI->users_model->get_data_by_id('riwayat_jabatan',$user_id,'user_id');
        $pangkat = $CI->users_model->get_data_by_sql('SELECT tmt, golongan FROM riwayat_pangkat WHERE user_id='.$user_id.' ORDER BY tmt DESC');
        $penugasan = $CI->users_model->get_data_by_sql('SELECT * FROM riwayat_penugasan WHERE user_id='.$user_id.' ORDER BY tahun_awal DESC');
        $prestasi = $CI->users_model->get_data_by_sql('SELECT * FROM riwayat_prestasi WHERE user_id='.$user_id.' ORDER BY tahun DESC');
        $karya_tulis = $CI->users_model->get_data_by_sql('SELECT * FROM karya_tulis WHERE user_id='.$user_id.' ORDER BY tahun DESC');
        $agama = $CI->users_model->get_data_by_id('agama',$biodata[0]->agama,'id');
        $formasi = $CI->users_model->get_data_by_id('formasi_jabatan',$registrasi[0]->jurusan_formasi,'id');

        $instansi = $CI->users_model->get_data_by_sql('SELECT instansi FROM riwayat_jabatan WHERE user_id = '.$user_id.' ORDER BY tmt DESC LIMIT 1');

        $foto = $CI->users_model->get_data_by_sql('SELECT document FROM dokumen_pendukung WHERE user_id='.$user_id.' AND jenis_document=4 LIMIT 1');

        $v = '<h3 style="text-align:center;">DAFTAR RIWAYAT HIDUP<br>
                PELAMAR SELEKSI JABATAN PIMPINAN TINGGI PRATAMA<br>
                KEMENTERIAN PPN/ BAPPENAS<br>
                2016</h3>';

        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="key">NO REGISTRASI</td><td class="value">'.$registrasi[0]->no_registrasi.'</td>';
        $v .= '<td rowspan="6" class="no-border"><img src="'.DOKUMEN_DIR.'/'.$foto[0]->document.'" width="200px"/></td></tr>';

        $v .= '<tr><td class="key">NAMA</td><td class="value">'.$biodata[0]->gelar_depan.' '.$biodata[0]->realname.', '.$biodata[0]->gelar_belakang.'</td></tr>';
        $v .= '<tr><td class="key">NIP</td><td class="value">'.$registrasi[0]->nip.'</td></tr>';
        $v .= '<tr><td class="key">JENIS KELAMIN</td><td class="value">'.$biodata[0]->jenis_kelamin.'</td></tr>';
        $v .= '<tr><td class="key">TEMPAT TANGGAL LAHIR</td><td class="value">'.$biodata[0]->tempat_lahir.', '.$this->format_tgl_lahir($biodata[0]->tanggal_lahir).'</td></tr>';
        $v .= '<tr><td class="key">USIA</td><td class="value">'.$this->usia($biodata[0]->tanggal_lahir).'</td></tr>';
        

        $v .= $this->generate_row('AGAMA', $agama[0]->agama);
        $v .= $this->generate_row('ALAMAT', $biodata[0]->alamat_rumah);
        $v .= $this->generate_row('PILIHAN', $formasi[0]->nama);
        $v .= $this->generate_row('INSTANSI', $instansi[0]->instansi);
        $v .= '</table>';

        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">RIWAYAT PENDIDIKAN</td></tr>';
        foreach($pendidikan as $p) {
            $tingkat_pendidikan = $CI->users_model->get_data_by_id('tingkat_pendidikan',$p->tingkat_pendidikan,'id');
            $v .= '<tr><td class="col-md-12 value">'.$tingkat_pendidikan[0]->nama.' - '.$p->universitas.', '.$p->jurusan.' - '.$p->ipk.'</td></tr>';
        }
        $v .= '</table>';

        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">RIWAYAT JABATAN</td></tr>';
        foreach($jabatan as $p) {
            $v .= '<tr><td>'.$p->periode_menjabat_awal.' - '.$p->periode_menjabat_akhir.', '.$p->jabatan.' ('.$p->instansi.')</td></tr>';
        }
        $v .= '</table>';


        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">RIWAYAT KEPANGKATAN</td></tr>';
        foreach($pangkat as $p) {
            $gol = $CI->users_model->get_data_by_id('tbl_pangkat',$p->golongan,'id');
            $v .= '<tr><td>'.$p->tmt.' - '.$gol[0]->ket_gol.', '.$gol[0]->gol.'</td></tr>';
        }
        $v .= '</table>';


        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">RIWAYAT DIKLAT</td></tr>';
        foreach($diklat as $p) {
            $v .= '<tr><td>'.$p->tahun.' - '.$p->nama_diklat.', '.$p->lembaga.'</td></tr>';
        }
        $v .= '</table>';

        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">RIWAYAT PENUGASAN LAIN</td></tr>';
        foreach($penugasan as $p) {
            $v .= '<tr><td>'.$p->tahun_awal.' - '.$p->tahun_akhir.', '.$p->nama_tim.' - '.$p->instansi.'</td></tr>';
        }
        $v .= '</table>';


        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">PRESTASI</td></tr>';
        foreach($prestasi as $p) {
            $v .= '<tr><td>'.$p->tahun.' - '.$p->prestasi.', '.$p->pemberi_penghargaan.' - '.$p->tingkat.'</td></tr>';
        }
        $v .= '</table>';


        $v .= '<br>';
        $v .= '<table border="1" cellpadding="8" class="pdf-container">';
        $v .= '<tr><td class="center table-title">KARYA TULIS / PUBLIKASI</td></tr>';
        foreach($karya_tulis as $p) {
            $v .= '<tr><td>'.$p->tahun.' - '.$p->judul.'</td></tr>';
        }
        $v .= '</table>';

        return $v;
    }

    function generate_row($text, $value)
    {
        $v = '<tr>';
        $v .= '<td class="key">'.$text.'</td>';
        $v .= '<td class="value" colspan="2">'.$value.'</td>';
        $v .= '</tr>';

        return $v;
    }

    function format_tgl_lahir($d) {
        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember"];
        $t = explode("-",$d);
        return $t[2]." ".$bulan[$t[1]-1]." ".$t[0];
    }

    function usia($d) {
        $now = date('Y-m-d');
        return $this->dateDifference($d, $now);
    }

    function dateDifference($date_1 , $date_2 , $differenceFormat = '%Y Tahun %m Bulan' )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create($date_2);
        
        $interval = date_diff($datetime1, $datetime2);
        
        return $interval->format($differenceFormat);
        
    }
}
