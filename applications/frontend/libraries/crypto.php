<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Crypto
{
	var $CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
	}

	function encrypted($pass)
	{
		$hashstr = $this->hashed_sha256($pass);
		return $this->CI->encrypt->encode($hashstr);
	}

	function decrypted($hashstr)
	{
		return $this->CI->encrypt->decode($hashstr);
	}

	function hashed_sha256($string)
	{
		return hash('sha256',$string);
	}

}