<?php

namespace App;


class EmailData
{
    public $path;
    public $email;
    public $name;
    public $message;

    /**
     * EmailData constructor.
     *
     * @param $path
     * @param $email
     * @param $name
     * @param $message
     */
    public function __construct($path, $email, $name, $message)
    {
        $this->path    = $path;
        $this->email   = $email;
        $this->name    = $name;
        $this->message = $message;}
}
