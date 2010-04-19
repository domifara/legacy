<?php
/**
 * @file
 * @package legacy
 * @version $Id$
**/

if(!defined('XOOPS_ROOT_PATH'))
{
	exit();
}

/**
 * Interface of progress delegate
**/
abstract class Legacy_AbstractProgressDelegate
{
	/**
	 * addItem	Legacy_Progress.AddItem
	 *
	 * @param string $title
	 * @param string $dirname
	 * @param string $dataname
	 * @param int	 $data_id
	 * @param string $url
	 *
	 * @return	void
	 */ 
	abstract public function addItem(/*** string ***/ $title, /*** string ***/ $dirname, /*** string ***/ $dataname, /*** int ***/ $data_id, /*** string ***/ $url);

	/**
	 * deleteItem	Legacy_Progress.DeleteItem
	 *
	 * @param string $dirname
	 * @param string $dataname
	 * @param int	 $data_id
	 *
	 * @return	void
	 */ 
	abstract public function deleteItem(/*** string ***/ $dirname, /*** string ***/ $dataname, /*** int ***/ $data_id);

	/**
	 * getHistory	Legacy_Progress.GetHistory
	 *
	 * @param mix[] &$historyArr
	 *	$hisotryArr['step']
	 *	$hisotryArr['uid']
	 *	$hisotryArr['result']
	 *	$hisotryArr['comment']
	 *	$hisotryArr['posttime']
	 * @param string $dirname
	 * @param string $dataname
	 * @param int	 $data_id
	 *
	 * @return	void
	 */ 
	abstract public function getHistory(/*** mix[] ***/ &$historyArr, /*** string ***/ $dirname, /*** string ***/ $dataname, /*** int ***/ $data_id);


}

?>
