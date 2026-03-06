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
                'value' => 'minhnhat_dev',
                'type' => 'text',
                'group' => 'General'
            ],
            [
                'key' => 'site_description',
                'value' => 'Nơi giao thoa giữa cấu trúc mã nguồn và nhịp điệu ánh sáng. Blog cá nhân của một Senior Developer đam mê nhiếp ảnh.',
                'type' => 'textarea',
                'group' => 'General'
            ],
            [
                'key' => 'contact_email',
                'value' => 'hello@minhnhat.me',
                'type' => 'text',
                'group' => 'General'
            ],

            // Profile
            [
                'key' => 'display_name',
                'value' => 'Trần Minh Nhật',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'primary_slogan',
                'value' => 'Pixels for Vision. Code for Logic. Moments for Soul.',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'short_bio',
                'value' => 'Kỹ sư phần mềm ban ngày, người quan sát đô thị ban đêm. Tôi xây dựng những trải nghiệm số mượt mà và lưu giữ những lát cắt tĩnh lặng của Sài Gòn qua ống kính 35mm.',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'about_quote',
                'value' => '"Simple is hard. Minimalism is a discipline of selection, not just omission."',
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'technologist_bio',
                'value' => "Trong thế giới công nghệ luôn biến đổi, tôi chọn theo đuổi sự bền vững trong kiến trúc phần mềm. Tập trung vào React Ecosystem và Distributed Systems, tôi luôn tìm kiếm sự cân bằng giữa hiệu suất tối đa và trải nghiệm người dùng tinh tế.",
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'observer_bio',
                'value' => "Nhiếp ảnh với tôi không phải là việc bấm máy, mà là việc học cách nhìn. Tôi bị thu hút bởi những đường nét kiến trúc mạnh mẽ và những khoảnh khắc cô độc trong nhịp sống hối hả, nơi ánh sáng kể câu chuyện mà từ ngữ không thể diễn tả.",
                'type' => 'textarea',
                'group' => 'Profile'
            ],
            [
                'key' => 'tech_stack',
                'value' => 'REACT,TS,NEXT.JS,GOLANG,KUBERNETES,AWS,CLOUDFLARE,FIGMA,NODE,SQL',
                'type' => 'textarea',
                'group' => 'Profile'
            ],

            // Social
            [
                'key' => 'social_github',
                'value' => 'https://github.com/minhnhatdev',
                'type' => 'text',
                'group' => 'Social'
            ],
            [
                'key' => 'social_instagram',
                'value' => 'https://www.instagram.com/nhatminh_photos/',
                'type' => 'text',
                'group' => 'Social'
            ],
            [
                'key' => 'social_facebook',
                'value' => 'https://www.facebook.com/minhnhat.tran',
                'type' => 'text',
                'group' => 'Social'
            ],

            // Assets
            [
                'key' => 'site_avatar',
                'value' => '/assets/images/web/site_avatar.jpg',
                'type' => 'file',
                'group' => 'Assets'
            ],

            // Footer
            [
                'key' => 'footer_quote',
                'value' => '"Logic will get you from A to B. Imagination will take you everywhere."',
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
