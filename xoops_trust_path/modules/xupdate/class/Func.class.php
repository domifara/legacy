<?php

if(!defined('XOOPS_ROOT_PATH'))
{
    exit;
}

if( ! class_exists( 'Xupdate_Func' ) ) {

class Xupdate_Func {

	/* xupdate module variables */
	public $Xupdate = null ;	// xupdate module object
	public $Ftp  ;	// FTP instance
	public $mod_config ;

	public function __construct($XupdateObj)
	{
		$this->Xupdate = $XupdateObj ;
		$this->Ftp =& $this->Xupdate->Ftp ;		// FTP instance
		$this->mod_config = $this->Xupdate->mod_config ;
		//$this->_makeTmpDir();
	}

	public function & getInstance($mydirname)
	{
		static $instance ;
		if( ! isset( $instance[$mydirname] ) ) {
			$instance[$mydirname] = new Xupdate_Func($mydirname) ;
		}
		return $instance[$mydirname] ;
	}

	/**
	 * _downloadFile
	 *
	 * @return	bool
	 **/
	public function _downloadFile( $target_key, $downloadUrl, $tempFilename, &$downloadedFilePath )
	{
		$downloadDirPath = $this->Xupdate->params['temp_path'];
		$realDirPath = realpath($downloadDirPath);

		if (empty($realDirPath) ) {
			$this->_set_error_log('downloadDirPath not found error in: '.$downloadDirPath);
			return false;
		}
		if (! chdir($realDirPath) ) {
			$this->_set_error_log('chdir error in: '.$downloadDirPath);
			return false;//chdir error
		}
		@mkdir($target_key);
		$exploredDirPath = realpath($downloadDirPath.'/'.$target_key);
		//directory traversal check
		if (strpos($exploredDirPath, $realDirPath) === false){
			$this->_set_error_log('directory traversal error in: '.$downloadDirPath.'/'.$target_key);
			return false;
		}
		if (!is_dir($exploredDirPath)){
			$this->_set_error_log('not is_dir error in: '.$downloadDirPath.'/'.$target_key);
			return false;//chdir error
		}

		$this->Ftp->appendMes('downladed in: '.$downloadDirPath.'<br />');
		$this->content.= 'downladed in: '.$downloadDirPath.'<br />';
		if (! chdir($exploredDirPath) ) {
			$this->_set_error_log('chdir error in: '.$downloadDirPath);
			return false;//chdir error
		}

		// TODO ファイルNotFound対策
		//$url = $this->_getDownloadUrl( $target_key, $downloadUrlFormat );
		if (empty($downloadUrl)){
			$this->_set_error_log('_getDownloadUrl false');
			return false;
		}

		$downloadedFilePath = $this->_getDownloadFilePath( $realDirPath, $tempFilename );

		try {
			try {
				if(!function_exists('curl_init') ){
					throw new Exception('curl_init function no found fail',1);
				}
			} catch (Exception $e) {
				$this->_set_error_log($e->getMessage());
				return false;
			}

			$ch = curl_init($downloadUrl);
			if($ch === false ){
				throw new Exception('curl_init fail',2);
			}
			$this->Ftp->appendMes('curl_init OK<br />');
		} catch (Exception $e) {
			$this->_set_error_log($e->getMessage());
			return false;
		}

		$fp = fopen($downloadedFilePath, "w");

		try {
			$setopt1 = curl_setopt($ch, CURLOPT_FILE, $fp);
			$setopt2 = curl_setopt($ch, CURLOPT_HEADER, 0);
			$setopt3 = curl_setopt($ch, CURLOPT_FAILONERROR, true);

			if(!$setopt1 || !$setopt2 || !$setopt3 ){
				throw new Exception('curl_setopt fail',3);
			}
		} catch (Exception $e) {
			$this->_set_error_log($e->getMessage());

			fclose($fp);
			return false;
		}

		//safe_mode  CURLOPT_FOLLOWLOCATION cannot be activated when in safe_mode
		if (ini_get('safe_mode') != "1"){
			try {
				//redirect suport
				$setopt4 = curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				$setopt5 = curl_setopt($ch, CURLOPT_MAXREDIRS, 1);

				if(!$setopt4 || !$setopt5 ){
					throw new Exception('curl_setopt CURLOPT_FOLLOWLOCATION fail skip',4);
				}
			} catch (Exception $e) {
				$this->_set_error_log($e->getMessage());
			}
		}

		//SSL NO VERIFY setting
		$URI_PARTS = parse_url($downloadUrl);
		if (strtolower($URI_PARTS["scheme"]) == 'https' ){
			try {
				$setopt6 = curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				$setopt7 = curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				if(!$setopt6 || !$setopt7 ){
					throw new Exception('curl_setopt SSL fail',5);
				}
			} catch (Exception $e) {
				$this->_set_error_log($e->getMessage());

				fclose($fp);
				return false;
			}
		}

		try {
			try {
				if(!function_exists('curl_exec') ){
					throw new Exception('curl_exec function not found fail',6);
				}
			} catch (Exception $e) {
				$this->_set_error_log($e->getMessage());
				return false;
			}

			$result = curl_exec($ch);
			if($result === false ){
				throw new Exception('curl_exec fail',7);
			}
			$this->Ftp->appendMes('curl exec OK<br />');
		} catch (Exception $e) {
			$this->_set_error_log($e->getMessage());

			fclose($fp);
			return false;
		}

		fclose($fp);

		return true;
	}

	/**
	 * _getDownloadUrl
	 *
	 * @param string $downloadUrlFormat
	 * @param string $target_key
	 *
	 * @return	string
	 **/
	public function _getDownloadUrl( $target_key, $downloadUrlFormat )
	{
		// TODO ファイルNotFound対策
		$url = sprintf( $downloadUrlFormat, $target_key );
		return $url;
	}

	/**
	 * _getDownloadFilePath
	 *
	 * @param string $downloadDirPath
	 * @param string $target_key
	 * @param string $extension
	 *
	 * @return	string
	 **/
	public function _getDownloadFilePath( $downloadDirPath, $tempFilename )
	{
		$downloadPath = $downloadDirPath .'/'. $tempFilename;
		return $downloadPath;
	}

	/**
	 * _set_error_log
	 *
	 * @param   string  $msg
	 *
	 * @return	void
	 **/
	public function _set_error_log($msg)
	{
		$this->Ftp->appendMes('<span style="color:red;">'.$msg.'</span><br />');
		$this->content.= '<span style="color:red;">'.$msg.'</span><br />';
	}

} // end class
} // end if

?>