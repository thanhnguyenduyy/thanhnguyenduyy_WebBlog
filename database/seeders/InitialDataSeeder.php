<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Photo;
use App\Models\ResourceItem;
use App\Models\TimelineItem;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Blog Posts
        $posts = [
            [
                'title' => 'Modern Web Architecture: Beyond the Basics',
                'category' => 'IT',
                'date' => 'OCT 24, 2023',
                'excerpt' => 'Exploring how to build scalable React applications using micro-frontends and serverless.',
                'image_url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=1000',
                'status' => 'Published',
            ],
            [
                'title' => 'The Art of Black and White Street Photography',
                'category' => 'PHOTOGRAPHY',
                'date' => 'NOV 05, 2023',
                'excerpt' => 'Why stripping away color can reveal the true soul of a city and its people.',
                'image_url' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&q=80&w=1000',
                'status' => 'Published',
            ],
            [
                'title' => 'Deploying High-Performance Static Sites',
                'category' => 'IT',
                'date' => 'DEC 12, 2023',
                'excerpt' => 'A deep dive into Edge functions, CDN strategies, and caching for developers.',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000',
                'status' => 'Draft',
            ],
            [
                'title' => 'Lựa chọn Hosting cho Developer năm 2024',
                'category' => 'IT',
                'date' => 'JAN 20, 2024',
                'excerpt' => 'VPS, Serverless hay Shared Hosting? Đâu là lựa chọn tối ưu cho dự án của bạn...',
                'image_url' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&q=80&w=1000',
                'status' => 'Published',
            ],
            [
                'title' => 'Bố cục tối giản trong nhiếp ảnh kiến trúc',
                'category' => 'PHOTOGRAPHY',
                'date' => 'FEB 12, 2024',
                'excerpt' => 'Làm thế nào để ' . "'less is more'" . ' thực sự hiệu quả trong khung hình kiến trúc hiện đại...',
                'image_url' => 'https://images.unsplash.com/photo-1493246507139-91e8bef99c1e?auto=format&fit=crop&q=80&w=1000',
                'status' => 'Published',
            ]
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }

        // Projects
        $projects = [
            [
                'title' => 'Aperture Engine',
                'tech_stack' => ['React', 'Go', 'WebAssembly'],
                'description' => 'A powerful browser-based RAW image processor using WebAssembly for near-native performance.',
                'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=1000'
            ],
            [
                'title' => 'DevFlow CMS',
                'tech_stack' => ['Next.js', 'PostgreSQL', 'Tailwind'],
                'description' => 'A specialized content management system optimized for technical documentation and portfolio showcase.',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000'
            ],
            [
                'title' => 'Focus Tracker',
                'tech_stack' => ['TypeScript', 'Node.js', 'Redis'],
                'description' => 'A productivity tool designed for creative professionals to track deep work sessions and creative flow.',
                'image_url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=1000'
            ]
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        // Photos
        $photos = [
            ['title' => 'Cyberpunk Tokyo', 'category' => 'STREET', 'exif' => 'ISO 800 · 24mm · f/4.0', 'url' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Urban Soul', 'category' => 'PORTRAIT', 'exif' => 'ISO 400 · 85mm · f/1.8', 'url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Alpine Serenity', 'category' => 'TRAVEL', 'exif' => 'ISO 100 · 35mm · f/8.0', 'url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Desert Echoes', 'category' => 'TRAVEL', 'exif' => 'ISO 200 · 50mm · f/11', 'url' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Monolith', 'category' => 'MINIMAL', 'exif' => 'ISO 100 · 35mm · f/1.8', 'url' => 'https://images.unsplash.com/photo-1533035353720-f1c6a75cd8ab?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Mist and Peaks', 'category' => 'TRAVEL', 'exif' => 'ISO 400 · 16mm · f/4.0', 'url' => 'https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Valley Gaze', 'category' => 'PORTRAIT', 'exif' => 'ISO 200 · 85mm · f/2.0', 'url' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1000'],
            ['title' => 'Geometric Lines', 'category' => 'MINIMAL', 'exif' => 'ISO 100 · 24mm · f/5.6', 'url' => 'https://images.unsplash.com/photo-1449156001437-3a16213eb44b?auto=format&fit=crop&q=80&w=1000'],
        ];

        foreach ($photos as $photo) {
            Photo::create($photo);
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
            ResourceItem::create($resource);
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
            TimelineItem::create($item);
        }
    }
}
