<?php

$path = 'upload/resume/14524-DiwashsResume.pdf';

if (file_exists($path)) 
{
	header("Content-Description:File Transfer");
	header("Content-Type: application/pdg");
	header("Content-Disposition: attachment; filename=\"".basename($path)."\";" );
	header("Expires: 0");
	header("Pragma: public"); 
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Length: ".filesize($path));
    flush();
    readfile($path);
}

?>