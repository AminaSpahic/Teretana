<?php
$filexml='xmlovi/clanovi.xml';

    if (file_exists($filexml)) 
           {
       $xml = simplexml_load_file($filexml);
       $f = fopen('clanovii.csv', 'w');
       createCsv($xml, $f);
       fclose($f);
    }

    function createCsv($xml,$f)
    {

        foreach ($xml->children() as $item) 
        {

           $hasChild = (count($item->children()) > 0)?true:false;

        if( ! $hasChild)
        {
           $put_arr = array($item->getName(),$item); 
           fputcsv($f, $put_arr ,',','"');

        }
        else
        {
         createCsv($item, $f);
        }
     }
	   $contenttype = "application/force-download";
        header("Content-Type: " . $contenttype);
        header("Content-Disposition: attachment; filename=\"" . basename('clanovii.csv') . "\";");
        readfile('clanovii.csv');
        exit();

    }
	?>