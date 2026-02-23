<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Photo;
use App\Models\ResourceItem;
use App\Models\TimelineItem;

use App\Models\Album;
use App\Models\SiteSetting;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(SiteSettingsSeeder::class);

        // Blog Posts
        $posts = [
            [
                'title' => 'Modern Web Architecture: Beyond the Basics',
                'slug' => Str::slug('Modern Web Architecture: Beyond the Basics'),
                'category' => 'IT',
                'published_at' => '2023-10-24 10:00:00',
                'excerpt' => 'Exploring how to build scalable React applications using micro-frontends and serverless.',
                'image_url' => '/assets/images/web/modern_web.jpg',
                'status' => 'Published',
            ],
            [
                'title' => 'The Art of Black and White Street Photography',
                'slug' => Str::slug('The Art of Black and White Street Photography'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2023-11-05 14:30:00',
                'excerpt' => 'Why stripping away color can reveal the true soul of a city and its people.',
                'image_url' => '/assets/images/web/bw_street.jpg',
                'status' => 'Published',
            ],
            [
                'title' => 'Deploying High-Performance Static Sites',
                'slug' => Str::slug('Deploying High-Performance Static Sites'),
                'category' => 'IT',
                'published_at' => '2023-12-12 09:00:00',
                'excerpt' => 'A deep dive into Edge functions, CDN strategies, and caching for developers.',
                'image_url' => '/assets/images/web/static_sites.jpg',
                'status' => 'Draft',
            ],
            [
                'title' => 'Lựa chọn Hosting cho Developer năm 2024',
                'slug' => Str::slug('Lựa chọn Hosting cho Developer năm 2024'),
                'category' => 'IT',
                'published_at' => '2024-01-20 15:00:00',
                'excerpt' => 'VPS, Serverless hay Shared Hosting? Đâu là lựa chọn tối ưu cho dự án của bạn...',
                'image_url' => '/assets/images/web/hosting.jpg',
                'status' => 'Published',
            ],
            [
                'title' => 'Bố cục tối giản trong nhiếp ảnh kiến trúc',
                'slug' => Str::slug('Bố cục tối giản trong nhiếp ảnh kiến trúc'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-02-12 11:00:00',
                'excerpt' => 'Làm thế nào để ' . "'less is more'" . ' thực sự hiệu quả trong khung hình kiến trúc hiện đại...',
                'image_url' => '/assets/images/web/architecture.jpg',
                'status' => 'Published',
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        // Projects
        $projects = [
            [
                'title' => 'Aperture Engine',
                'slug' => Str::slug('Aperture Engine'),
                'tech_stack' => ['React', 'Go', 'WebAssembly'],
                'description' => 'A powerful browser-based RAW image processor using WebAssembly for near-native performance.',
                'image_url' => '/assets/images/web/aperture_engine.jpg'
            ],
            [
                'title' => 'DevFlow CMS',
                'slug' => Str::slug('DevFlow CMS'),
                'tech_stack' => ['Next.js', 'PostgreSQL', 'Tailwind'],
                'description' => 'A specialized content management system optimized for technical documentation and portfolio showcase.',
                'image_url' => '/assets/images/web/static_sites.jpg'
            ],
            [
                'title' => 'Focus Tracker',
                'slug' => Str::slug('Focus Tracker'),
                'tech_stack' => ['TypeScript', 'Node.js', 'Redis'],
                'description' => 'A productivity tool designed for creative professionals to track deep work sessions and creative flow.',
                'image_url' => '/assets/images/web/modern_web.jpg'
            ]
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }

        // Albums
        $streetAlbum = Album::updateOrCreate(
            ['slug' => 'street-soul'],
            [
                'title' => 'Street Soul',
                'description' => 'Moments captured in the concrete jungle.',
                'cover_url' => '/assets/images/web/bw_street.jpg'
            ]
        );

        $travelAlbum = Album::updateOrCreate(
            ['slug' => 'wanderlust'],
            [
                'title' => 'Wanderlust',
                'description' => 'Exploring the beauty of our planet.',
                'cover_url' => '/assets/images/web/wanderlust.jpg'
            ]
        );

        // Photos
        $photos = [
            ['title' => 'Cyberpunk Tokyo', 'category' => 'STREET', 'exif' => 'ISO 800 · 24mm · f/4.0', 'url' => '/assets/images/web/bw_street.jpg', 'album_id' => $streetAlbum->id],
            ['title' => 'Urban Soul', 'category' => 'PORTRAIT', 'exif' => 'ISO 400 · 85mm · f/1.8', 'url' => '/assets/images/web/urban_soul.jpg'],
            ['title' => 'Alpine Serenity', 'category' => 'TRAVEL', 'exif' => 'ISO 100 · 35mm · f/8.0', 'url' => '/assets/images/web/wanderlust.jpg', 'album_id' => $travelAlbum->id],
            ['title' => 'Desert Echoes', 'category' => 'TRAVEL', 'exif' => 'ISO 200 · 50mm · f/11', 'url' => '/assets/images/web/desert_echoes.jpg', 'album_id' => $travelAlbum->id],
            ['title' => 'Monolith', 'category' => 'MINIMAL', 'exif' => 'ISO 100 · 35mm · f/1.8', 'url' => '/assets/images/web/monolith.jpg'],
            ['title' => 'Mist and Peaks', 'category' => 'TRAVEL', 'exif' => 'ISO 400 · 16mm · f/4.0', 'url' => '/assets/images/web/mist_peaks.jpg', 'album_id' => $travelAlbum->id],
            ['title' => 'Valley Gaze', 'category' => 'PORTRAIT', 'exif' => 'ISO 200 · 85mm · f/2.0', 'url' => '/assets/images/web/valley_gaze.jpg'],
            ['title' => 'Geometric Lines', 'category' => 'MINIMAL', 'exif' => 'ISO 100 · 24mm · f/5.6', 'url' => '/assets/images/web/geometric_lines.jpg'],
        ];

        foreach ($photos as $photo) {
            Photo::updateOrCreate(
                ['title' => $photo['title']], // Assuming title is unique enough for seed data
                $photo
            );
        }

        // Resources
        $resources = [
            ['title' => 'Lightroom Presets', 'description' => '5 Pack - Urban Night', 'type' => 'PRESET', 'url' => '#', 'file_size' => '24MB'],
            ['title' => 'Next.js Template', 'description' => 'Portfolio Minimalist', 'type' => 'CODE', 'url' => '#', 'file_size' => '1.2MB'],
            ['title' => 'Checklist SEO', 'description' => '2024 Edition', 'type' => 'PDF', 'url' => '#', 'file_size' => '500KB'],
            ['title' => 'Wallpaper Pack', 'description' => 'High Resolution', 'type' => 'OTHER', 'url' => '#', 'file_size' => '150MB'],
            ['title' => 'Dev Environment setup', 'description' => 'Config Files', 'type' => 'CODE', 'url' => '#', 'file_size' => '15KB'],
        ];

        foreach ($resources as $resource) {
            ResourceItem::updateOrCreate(
                ['title' => $resource['title']],
                $resource
            );
        }

        // Timeline Items
        $timeline = [
            ['year' => '2018', 'title' => 'ENGINEERING', 'description' => 'Landed first Junior Dev role @ TechFlow', 'type' => 'IT'],
            ['year' => '2018', 'title' => 'EXPRESSION', 'description' => 'Bought first Mirrorless camera & lens', 'type' => 'PHOTO'],
            ['year' => '2020', 'title' => 'EVOLUTION', 'description' => 'Senior Fullstack Developer & Cloud Architect', 'type' => 'IT'],
            ['year' => '2020', 'title' => 'RECOGNITION', 'description' => 'First Solo Exhibition: "Digital Silence"', 'type' => 'PHOTO'],
            ['year' => '2023', 'title' => 'LEADERSHIP', 'description' => 'Tech Lead at Global Scale startup', 'type' => 'IT'],
            ['year' => '2023', 'title' => 'LEGACY', 'description' => 'Published Photo Book "Code & Shadows"', 'type' => 'PHOTO'],
        ];

        foreach ($timeline as $item) {
            TimelineItem::updateOrCreate(
                ['title' => $item['title'], 'year' => $item['year']],
                $item
            );
        }
    }
}
