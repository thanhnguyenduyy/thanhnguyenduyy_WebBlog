<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'name' => 'Bob Smith',
    'email' => 'bob.smith@techcorp.io',
    'subject' => 'Potential Partnership',
    'message' => 'Hello,

I represent TechCorp and we are looking for partners for our upcoming web blog expansion. Would you be interested in a brief chat?

Bob',
    'is_read' => true,
  ),
  1 => 
  array (
    'name' => 'Charlie Davis',
    'email' => 'charlie.d@gmail.com',
    'subject' => 'Feedback on your blog',
    'message' => 'Great job on the latest post! The dark mode implementation is really smooth. Keep it up!',
    'is_read' => true,
  ),
  2 => 
  array (
    'name' => 'Diana Prince',
    'email' => 'diana@themyscira.com',
    'subject' => 'Speaker Invitation',
    'message' => 'We would love to have you speak at our upcoming developer conference about \'Modern Web Architecture\'. Let us know if you\'re interested.',
    'is_read' => true,
  ),
  3 => 
  array (
    'name' => 'Nguyễn Duy Thanh1',
    'email' => 'phongdaotao@gmail.com',
    'subject' => NULL,
    'message' => 'ffffffffffffffffffffff',
    'is_read' => true,
  ),
  4 => 
  array (
    'name' => 'System Tester',
    'email' => 'test@example.com',
    'subject' => 'New Test Message 16:54:03',
    'message' => 'This is an automatically generated message to test the inbox functionality.',
    'is_read' => true,
  ),
  5 => 
  array (
    'name' => 'Duy Thanh',
    'email' => 'nguoifmanggios@gmail.com',
    'subject' => NULL,
    'message' => 'aaaaaaaaaaaaaaa',
    'is_read' => true,
  ),
  6 => 
  array (
    'name' => 'Nguyễn Duy Thanh',
    'email' => 'phongdaotao@gmail.com',
    'subject' => NULL,
    'message' => 'aqwqeaaaaaaaaaaaaaaa',
    'is_read' => true,
  ),
  7 => 
  array (
    'name' => 'aaaa',
    'email' => 'phongdaotao@gmail.com',
    'subject' => NULL,
    'message' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
    'is_read' => true,
  ),
  8 => 
  array (
    'name' => 'Nguyễn Duy Thanh1',
    'email' => 'phongdaotao@gmail.com',
    'subject' => NULL,
    'message' => 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa',
    'is_read' => true,
  ),
  9 => 
  array (
    'name' => 'Duy Thanh',
    'email' => 'thanhnguyenduyy@gmail.com',
    'subject' => NULL,
    'message' => 'aaaaaaaaaaaddddddddddddddddddđ',
    'is_read' => true,
  ),
  10 => 
  array (
    'name' => 'Duy Thanh',
    'email' => 'thanhnguyenduyy@gmail.com',
    'subject' => NULL,
    'message' => 'eeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeee',
    'is_read' => true,
  ),
  11 => 
  array (
    'name' => 'aaaaaaaaa',
    'email' => 'phongdaotao@gmail.com',
    'subject' => NULL,
    'message' => 'aaaaaaaaaffffffffffffff',
    'is_read' => false,
  ),
);
        foreach ($data as $item) Message::create($item);
    }
}
