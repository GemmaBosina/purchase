<?php
if (isset($_REQUEST['name'])) {
//path to upload
    $file = '/home/geo/purchase_files/' . $_REQUEST['name'];
} else {
    echo 'No File with that name';
}
 
if (file_exists($file)) {
    //open the file
    $w = fopen($file, 'rb');
    //The function will stop when it reaches the specified length.
    $wordheader = fread($w, 2);
    $p = fopen($file, 'rb');
    $pdfheader = fread($p, 3);
 
    //match the word header
    if ($wordheader === 'PK') {
        $go = 'true';
    }
    //match the pdf header
    if ($pdfheader === '%PD') {
        $go = 'true';
    }
//close the file
    //fclose($w);
    //fclose($p);
 
    if ($go = 'true') {
        ob_start(); //Output Buffering Start remembering everything that would normally be outputted, but don't quite do anything with it yet.
        if (isset($_REQUEST['name'])) {
            $file = '/home/geo/purchase_files/' . $_REQUEST['name'];
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Type: image/jpeg');
            header('Content-Disposition: attachment; filename=' . basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
        }
        //send the contents of the output buffer
        ob_flush();
    }
} else {
    echo 'No file';
}
 
?>
 

