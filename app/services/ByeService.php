<?php

class ByeService {

    public function fire($job, $data) {

        $name = $data['name'];

        echo "Bye $name! :(";

        $job->delete();
    }
}
