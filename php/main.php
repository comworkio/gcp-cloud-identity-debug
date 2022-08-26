<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient();

$bucket = $storage->bucket(getenv('GCS_BUCKET_NAME'));
$wait_time = getenv('WAIT_TIME');
$filename = getenv('BUCKET_FILENAME');

while(true) {
    $datetime = new DateTime();
    $line = sprintf("Written at %s", $datetime->format(DateTime::ATOM));
    file_put_contents($filename, $line);
    $bucket->upload(fopen($filename, 'r'));
    echo sprintf("%s\n", file_get_contents($filename));
    sleep($wait_time);
}

?>
