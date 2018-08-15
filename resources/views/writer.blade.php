@inject('request', 'Illuminate\Http\Request')

@extends('layouts.app')

<?php
$file = fopen('textfile.txt', 'a', 1);
$text="\n Your text to write \n ".date('d')."-".date('m')."-".date('Y')."\n\n";
fwrite($file, $text); 
fclose($file);
?>


{!!

$file = "test.conf";
if (!file_exists("test.conf")) touch("test.conf");
$fh = fopen("test.conf", "r");
$fcontent = fread($fh, filesize("test.conf"));

$towrite = "$newcontent $fcontent";

$fh22 = fopen('test.conf', 'w+');
fwrite($fh2, $towrite);
fclose($fh);
fclose($fh2);

!!}

@section('content')






@stop

