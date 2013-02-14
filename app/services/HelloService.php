<?php

class HelloService {

    public function fire($job, $data) {

        $name = $data['name'];

        $handle = fopen('/tmp/services.txt', 'a+');
        sleep(5);
        $date = date('Y-m-d H:i:s');
        fwrite($handle, "[$date] Hello $name! :)\n");

        $job->delete();
    }
}
