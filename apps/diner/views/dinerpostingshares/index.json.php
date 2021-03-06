<?php

$count = count($dinerpostingsharesSet);
$more = false;
$resultsArray = array();

/*
$length = count($stationplaylistsSet);
$startpage = $pageNumber;
$limit = $pageLimit;

$startNum = (($startpage-1)*$limit)+1;

if ($limit == 0) {
	$limit = $length;
} else {
	$limit = $startpage * $limit;
	if($limit > $length) {
		$limit = $length;
	} else {
		$more = true;
	}
}

*/
foreach ($dinerpostingsharesSet as $val) {
	
	$result = $val;
	if($val->postings()) {
		$result->title = $val->postings()->name;
		$result->slug = $val->postings()->slug;
	}
	if($val->posting_logs()) {
		$result->log = array();
		foreach($val->posting_logs()->orderBy('date_logged DESC') as $v) {
			array_push($result->log, $v);
		}
	}
	
	array_push($resultsArray, $result);
}

$returnArray = array('count'=>$count,'more'=>$more,'results'=>$resultsArray);
echo json_encode($returnArray);

?>