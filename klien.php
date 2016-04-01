<?php

$wsdl="http://localhost/latihan/ws0?wsdl";
$client2 = new SoapClient ( $wsdl, array('cache_wsdl' => WSDL_CACHE_NONE, 'trace'=>1) );


//var_dump($client2->__getFunctions());
//var_dump($client2->__getTypes());
//PERHATIKAN WSDL !!!

//eksekusi servis ke-1
$return = $client2->hello('ervina');
echo '<p>';
echo $return;
echo '</p>';

//eksekusi servis ke-2
$return2 = $client2->cekBarang('MG1122');
echo '<p>';
echo 'jumlah barang isinya adalah='.$return2;
echo '</p>';

//eksekusi servis ke-3
//document literal style
//2 input dikirim dalam 1 objek, return 1 output
//$nilai=array('prm1'=>10, 'prm2'=>29);
$nilai=['prm1'=>10, 'prm2'=>29];

$return3 = $client2->tambah($nilai);
echo '<p>';
echo 'hasil tambah='.$return3;
echo '</p>';

//eksekusi servis ke-4
//0 input dikirim, return 1 objek didalamnya ada 3 output
echo '<p>';
echo 'info nama='. $client2->info()->nama;
echo '</br>';
echo 'info nim='. $client2->info()->npm;
echo '</br>';
echo 'info agama='. $client2->info()->agama;
echo '</p>';

//eksekusi servis ke-5
$data=array('nama'=>'Iwan','npm'=>'45676','sks'=>9);
echo '<p>';
echo $client2->setMhs($data);
echo '</p>';

//echo '<br>'.'--------------------'.'<br>';
//var_dump($client2->__getLastResponse());
echo '<br>'.'--------------------'.'<br>';
echo "Response :<br>", htmlentities($client2->__getLastResponse()), "<br>";
?>