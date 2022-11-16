<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;
use GuzzleHttp\Promise\Each;

function downloadFileGenerator(int $limit): \Generator
{
    $storage = new StorageClient();

    $bucket = $storage->bucket(getenv('GCS_BUCKET_NAME'));
    $filename = getenv('GCS_FILE_TO_DOWNLOAD');

    for ($i = 0; $i < $limit; $i++) {
        echo "Download number $i\n";
        
        yield $bucket->object($filename)->downloadAsStreamAsync()->then(function () use ($i) {
            echo sprintf("Downloaded $i at %s", (new \DateTime())->format('Y-m-d\TH:i:s.uP'));
        });
    }
}

Each::ofLimitAll(downloadFileGenerator(1000), 500)->wait();

?>