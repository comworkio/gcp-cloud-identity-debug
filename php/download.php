<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$storage = new StorageClient();

$bucket = $storage->bucket(getenv('GCS_BUCKET_NAME'));
$filename = getenv('GCS_FILE_TO_DOWNLOAD');

for($i =0; $i<200; $i++) {
  echo "Download number $i\n";
  $datetime = new DateTime();
  $line = sprintf("Written at %s", $datetime->format(DateTime::ATOM));
  $object = $bucket->object($filename);
  $object->downloadToFile('20.json');
}
?>
