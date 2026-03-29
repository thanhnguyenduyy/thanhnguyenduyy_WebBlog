<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $data = array (
  0 => 
  array (
    'key' => 'site_name',
    'value' => 'thanhnguyenduyy',
    'type' => 'text',
    'group' => 'General',
  ),
  1 => 
  array (
    'key' => 'site_description',
    'value' => 'Câu chuyện của Nguyễn Duy Thanh - Developer và Photographer',
    'type' => 'textarea',
    'group' => 'General',
  ),
  2 => 
  array (
    'key' => 'contact_email',
    'value' => 'thanhnguyenduyy@gmail.com',
    'type' => 'text',
    'group' => 'General',
  ),
  3 => 
  array (
    'key' => 'social_github',
    'value' => 'https://github.com/thanhnguyenduyy',
    'type' => 'text',
    'group' => 'Social',
  ),
  4 => 
  array (
    'key' => 'display_name',
    'value' => 'Nguyễn Duy Thanh',
    'type' => 'text',
    'group' => 'Profile',
  ),
  5 => 
  array (
    'key' => 'primary_slogan',
    'value' => 'Xây dựng thế giới qua code. Lưu giữ khoảnh khắc qua ống kính.',
    'type' => 'text',
    'group' => 'Profile',
  ),
  6 => 
  array (
    'key' => 'short_bio',
    'value' => 'Tôi là một người sáng tạo đa lĩnh vực, hoạt động tại điểm giao thoa giữa công nghệ và nghệ thuật.',
    'type' => 'textarea',
    'group' => 'Profile',
  ),
  7 => 
  array (
    'key' => 'about_quote',
    'value' => '"I build digital platforms and capture fleeting moments. One requires precision, while the other demands patience."',
    'type' => 'textarea',
    'group' => 'Profile',
  ),
  8 => 
  array (
    'key' => 'technologist_bio',
    'value' => 'My journey in IT began with a curiosity about how things work \'under the hood.\' From my first \'Hello World\' to architecting high-traffic web platforms, I have always been captivated by the elegance of well-structured systems. I specialize in Fullstack development, Cloud infrastructure, and UI/UX design.',
    'type' => 'textarea',
    'group' => 'Profile',
  ),
  9 => 
  array (
    'key' => 'observer_bio',
    'value' => 'Photography is my way of slowing down. In a world of rushed releases, the lens forces me to wait patiently for the right light. My work focuses on Street Minimalism, seeking order and poetic balance within the urban chaos.',
    'type' => 'textarea',
    'group' => 'Profile',
  ),
  10 => 
  array (
    'key' => 'social_instagram',
    'value' => 'https://www.instagram.com/thanhnguyenduyy/',
    'type' => 'text',
    'group' => 'Social',
  ),
  11 => 
  array (
    'key' => 'social_facebook',
    'value' => 'https://www.facebook.com/thanhnguyenduyy',
    'type' => 'text',
    'group' => 'Social',
  ),
  12 => 
  array (
    'key' => 'footer_quote',
    'value' => '"Logic sẽ đưa bạn từ A đến B. Trí tưởng tượng sẽ đưa bạn đi khắp mọi nơi."',
    'type' => 'textarea',
    'group' => 'Footer',
  ),
  13 => 
  array (
    'key' => 'site_avatar',
    'value' => '/storage/uploads/settings/1772553517_site_avatar.jpg',
    'type' => 'file',
    'group' => 'Assets',
  ),
  14 => 
  array (
    'key' => 'tech_stack',
    'value' => 'TYPESCRIPT,REACT,NODE.JS,GO,AWS,DOCKER,FIGMA,NEXT.JS,POSTGRES',
    'type' => 'textarea',
    'group' => 'Profile',
  ),
);
        foreach ($data as $item) SiteSetting::create($item);
    }
}
