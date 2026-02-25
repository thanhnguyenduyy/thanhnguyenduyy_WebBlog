<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            // General
            [
                'key' => 'site_name',
                'value' => 'thanhnguyenduyy',
                'type' => 'text',
                'group' => 'General'
            ],
            [
                'key' => 'site_description',
                'value' => 'Câu chuyện của Nguyễn Duy Thanh - Developer và Photographer',
                'type' => 'textarea',
                'group' => 'General'
            ],
            [
                'key' => 'contact_email',
                'value' => 'thanhnguyenduyy@gmail.com',
                'type' => 'text',
                'group' => 'General'
            ],

            // Profile
            [
                'key' => 'display_name',
                'value' => 'Nguyễn Duy Thanh',
                'type' => 'text',
                'group' => 'Profile'
            ],
            [
                'key' => 'primary_slogan',
                'value' => 'Xây dựng thế giới qua code. Lưu giữ khoảnh khắc qua ống kính.',
                'type' => 'text',
                'group' => 'Profile'
            ],
            [
                'key' => 'short_bio',
                'value' => 'Tôi là một người sáng tạo đa lĩnh vực, hoạt động tại điểm giao thoa giữa công nghệ và nghệ thuật.',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'about_quote',
                'value' => '"Tôi xây dựng nền tảng kỹ thuật số và lưu giữ những khoảnh khắc vụt qua. Một công việc đòi hỏi sự chính xác, công việc kia đòi hỏi sự kiên nhẫn."',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'technologist_bio',
                'value' => "Hành trình IT của tôi bắt đầu từ sự tò mò về cách mọi thứ vận hành bên dưới lớp vỏ. Từ dòng code 'Hello World' đầu tiên cho đến việc xây dựng các nền tảng web lưu lượng cao, tôi luôn bị cuốn hút bởi vẻ đẹp của các hệ thống có cấu trúc tốt. Tôi chuyên sâu về phát triển Fullstack, Cơ sở hạ tầng đám mây và thiết kế UI/UX.",
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'observer_bio',
                'value' => "Nhiếp ảnh là cách tôi sống chậm lại. Trong một thế giới của những phát hành vội vã, ống kính buộc tôi phải kiên nhẫn đợi chờ ánh sáng. Các tác phẩm của tôi tập trung vào phong cách Street Minimalism (Đường phố Tối giản), tìm kiếm trật tự và sự cân đối đầy chất thơ trong sự hỗn loạn của đô thị.",
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'tech_stack',
                'value' => 'TYPESCRIPT,REACT,NODE.JS,GO,AWS,DOCKER,FIGMA,NEXT.JS,POSTGRES',
                'type' => 'textarea',
                'group' => 'Profile'
            ],

            // Social
            [
                'key' => 'social_github',
                'value' => 'https://github.com/thanhnguyenduyy',
                'type' => 'text',
                'group' => 'Social'
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://www.instagram.com/thanhnguyenduyy/',
                'type' => 'text',
                'group' => 'Social'
            ],
            [
                'key' => 'social_facebook',
                'value' => 'https://www.facebook.com/thanhnguyenduyy',
                'type' => 'text',
                'group' => 'Social'
            ],

            // Assets
            [
                'key' => 'site_logo',
                'value' => '/client/assets/images/logo.png',
                'type' => 'file',
                'group' => 'Assets'
            ],
            [
                'key' => 'site_favicon',
                'value' => '/favicon.ico',
                'type' => 'file',
                'group' => 'Assets'
            ],
            [
                'key' => 'site_avatar',
                'value' => '/assets/images/web/site_avatar.jpg',
                'type' => 'file',
                'group' => 'Assets'
            ],

            // Footer
            [
                'key' => 'footer_quote',
                'value' => '"Logic sẽ đưa bạn từ A đến B. Trí tưởng tượng sẽ đưa bạn đi khắp mọi nơi."',
                'type' => 'textarea',
                'group' => 'Footer'
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
