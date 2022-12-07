<?php
// Files Write/Create
$fileOne = fopen("one.txt", "w");
fwrite($fileOne, "Hi I am Thet Htar Soe");

//Files Read/Open
$fileTwo = fopen("one.txt", "r");
echo fread($fileTwo, filesize("one.txt"));
