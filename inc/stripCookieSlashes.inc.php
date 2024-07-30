<?php

//**************************************************************************************//
//	stripCookieSlashes()								//
//		Getting rid of Magic Quotes in Cookie Array Data.			//
//**************************************************************************************//
function stripCookieSlashes($arr) {
	if (!is_array($arr)) {
		return stripslashes($arr);
				}
	else {
		return array_map('stripCookieSlashes', $arr);
		}
	}
	if (get_magic_quotes_gpc()) {
		$_COOKIE = stripCookieSlashes ($_COOKIE);


}

//******************************************************//
//	 Ending function stripCookieSlashes()		//
//******************************************************//
?>