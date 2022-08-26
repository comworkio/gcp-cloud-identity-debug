import Cloud from '@google-cloud/storage';
import { writeFile } from 'fs';
import { setTimeout } from 'timers/promises';

const { Storage } = Cloud
const gcs = new Storage()
const bucket = gcs.bucket(process.env.GCS_BUCKET_NAME)
var filename = process.env.BUCKET_FILENAME
var wait_time = process.env.WAIT_TIME

while(true) {
    var d = new Date()
    var line = "Written at " + d.toISOString()
    writeFile(filename, line, { encoding: "utf8", flag: "w" }, function (){})

    bucket.upload(filename)

    console.log(line)
    await setTimeout(wait_time * 1000);
}
