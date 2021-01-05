<?php

namespace Test\Unit\Mail;

use App\Mail\SendMail;
use Tests\TestCase;

class SendMailTest extends TestCase
{
    public function testEmail()
    {
        $sendMail = new SendMail([
            'name' => 'name',
            'title' => 'title',
            'description' => 'description',
            'path' => 'path/path'
        ]);
        $result = $sendMail->build();

        $this->assertEquals($result->details['name'], 'name');
        $this->assertEquals($result->details['title'], 'title');
        $this->assertEquals($result->details['description'], 'description');
        $this->assertEquals($result->details['path'], 'path/path');
    }
}
