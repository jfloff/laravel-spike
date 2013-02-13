<?php

class HelloService {

    public function fire($job, $data) {

        $name = $data['name'];

        $handle = fopen('/tmp/services.txt', 'a+');
        $date = date('Y-m-d H:i:s');
        fwrite($handle, "[$date] Hello $name! :)\n");

        $job->delete();
    }
}
