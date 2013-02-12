<?php

class HelloService {

    public function fire($job, $data) {

        $name = $data['name'];

        echo "Hello $name! :)";

        $job->delete();
    }
}
