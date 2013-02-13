<?php

class ByeService {

    public function fire($job, $data) {

        $name = $data['name'];

        $handle = fopen('/tmp/services.txt', 'a+');
        $date = date('Y-m-d H:i:s');
        fwrite($handle, "[$date] Bye $name! :(\n");

        $job->delete();
    }
}
