<?php

 /**
 * File Class
 *
 * @package File \ Get Meta Tools 
 * @author      Pierre (pH7)
 * @email       pierrehs@hotmail
 */
namespace PH7\Seo\Meta;
 
class File {
	
	const FILE_LIST_SITES = 'list.txt';
	
	private $pathListSites;
	
	public function __construct() {
		$this->pathListSites = PH7_PATH_DATA . 'sites/' . self::FILE_LIST_SITES;
	}
	
	/**
	 * @desc Check if a site exists in the database
	 * @param string $sUrl
	 * @return boolean true if a site exists else false
	  */
	public function siteExists($sUrl) {
	   $oFile = new \SplFileObject($this->pathListSites, 'r');
       $oFile->setFlags(\SplFileObject::DROP_NEW_LINE);
       $bMatch = false;
       foreach($oFile as $sLine) {
	   
	     if( false !== stripos($sLine, $sUrl) ){
		    $bMatch = true;
		    break;
	     }
       }
       
       unset($oFile);
       return $bMatch;
	}
	
	/**
	 * @desc Save a site in the database
	 * @param string $sUrl
	  */
	public function saveSite($sUrl) {
		$oFile = new \SplFileObject($this->pathListSites, 'a');
		$oFile->fwrite($sUrl . "\n");
		unset($oFile);
	}
	
	
	/**
	 * @desc Remove a site in database
	 * @param string $sUrl
	  */
	public function removeSite($sUrl) {
		$sContents = file_get_contents($this->pathListSites);
		$sNewContents = str_replace($sUrl . "\n", null, $sContents);
		file_put_contents($this->pathListSites, $sNewContents);
	}
	
	/**
	 * @desc Get all sites
	 * @return array list sites
	  */
	public function getAllSites() {
		$sContents = file_get_contents($this->pathListSites);
		return explode("\n", $sContents);
	}
	
	/**
	 * @desc Get random sites
	 * @return array random list sites
	  */
	public function getRandSites($iNb) {
		$sLine = '';
		$i = 0;
		$oFile = new \SplFileObject($this->pathListSites, 'r');
		while($i<=$iNb && !$oFile->eof()) { 
           $sLine .= $oFile->fgets() . "\n"; 
           $i ++; 
        } 
        
        unset($oFile);
        return $sLine;
	}
	
	/**
	 * @desc Get last sites
	 * @param int $iNb Number of the lasted sites
	 * @return string The sites
	  */
	public function getLastSites($iNb) {
		$sLine = '';
		$i = mt_rand();
		$oFile = new \SplFileObject($this->pathListSites, 'r');
		while($i<=($i+$iNb) && !$oFile->eof()) { 
           $sLine .= $oFile->fgets() . "\n"; 
           $i ++; 
        } 
        
        unset($oFile);
        return $sLine;
	}
	
	public function __destruct() {
		unset($this->pathListSites);
	}
	
}
