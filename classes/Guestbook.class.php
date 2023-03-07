<?php class Guestbook {
    private $name;
    private $message;
    private $datetime;

    // constructor
    public function __construct($name, $message) {
        $this->name = $name;
        $this->message = $message;
        $this->datetime = date("Y-m-d H:i:s");
    }

    // getters
    public function getName() {
        return $this->name;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getDatetime() {
        return $this->datetime;
    }

    // methods
    public function add($filename) {
    // read existing posts from file
        if (file_exists($filename)) {
            $posts = unserialize(file_get_contents($filename));
        } else {
            $posts = array();
        }
        // append new post to array
        $posts[] = $this;
        // write updated array to file
        file_put_contents($filename, serialize($posts));
    }

    public function delete($index, $filename) {
        // read existing posts from file
        if (file_exists($filename)) {
            $posts = unserialize(file_get_contents($filename));
            // remove post at given index from array
            unset($posts[$index]);
            // write updated array to file
            file_put_contents($filename, serialize($posts));
        }
    }

    public function read($filename) {
        // read existing posts from file
        if (file_exists($filename)) {
            return unserialize(file_get_contents($filename));
        } else {
            return array();
        }
    }
}