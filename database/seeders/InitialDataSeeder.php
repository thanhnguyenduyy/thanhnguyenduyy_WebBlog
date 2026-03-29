<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\GalleryCategory;
use App\Models\Photo;
use App\Models\ResourceItem;
use App\Models\TimelineItem;
use App\Models\SiteSetting;

class InitialDataSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        BlogPost::truncate();
        Project::truncate();
        GalleryCategory::truncate();
        Photo::truncate();
        ResourceItem::truncate();
        TimelineItem::truncate();
        SiteSetting::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(SiteSettingsSeeder::class);

        $cats = array (
  0 => 
  array (
    'name' => 'Huế',
    'slug' => 'hue',
    'description' => 'aaaaaaaaa',
  ),
  1 => 
  array (
    'name' => 'Đà Nẵng',
    'slug' => 'da-nang',
    'description' => NULL,
  ),
);
        foreach ($cats as $c) GalleryCategory::create($c);

        $blog_posts = array (
  0 => 
  array (
    'title' => 'Modern Web Architecture: Beyond the Basics',
    'slug' => 'modern-web-architecture-beyond-the-basics',
    'excerpt' => 'Exploring how to build scalable React applications using micro-frontends and serverless.',
    'content' => NULL,
    'category' => 'IT',
    'published_at' => '2023-10-24T10:00:00.000000Z',
    'image_url' => '/assets/images/web/modern_web.jpg',
    'status' => 'Published',
    'views_count' => 0,
    'is_featured' => false,
    'reading_time' => NULL,
  ),
  1 => 
  array (
    'title' => 'The Art of Black and White Street Photography',
    'slug' => 'the-art-of-black-and-white-street-photography',
    'excerpt' => 'Why stripping away color can reveal the true soul of a city and its people.',
    'content' => NULL,
    'category' => 'PHOTOGRAPHY',
    'published_at' => '2023-11-05T14:30:00.000000Z',
    'image_url' => '/assets/images/web/bw_street.jpg',
    'status' => 'Published',
    'views_count' => 0,
    'is_featured' => false,
    'reading_time' => NULL,
  ),
  2 => 
  array (
    'title' => 'Deploying High-Performance Static Sites',
    'slug' => 'deploying-high-performance-static-sites',
    'excerpt' => 'A deep dive into Edge functions, CDN strategies, and caching for developers.',
    'content' => NULL,
    'category' => 'IT',
    'published_at' => '2023-12-12T09:00:00.000000Z',
    'image_url' => '/assets/images/web/static_sites.jpg',
    'status' => 'Draft',
    'views_count' => 0,
    'is_featured' => false,
    'reading_time' => NULL,
  ),
  3 => 
  array (
    'title' => 'Lựa chọn Hosting cho Developer năm 2024',
    'slug' => 'lua-chon-hosting-cho-developer-nam-2024',
    'excerpt' => 'VPS, Serverless hay Shared Hosting? Đâu là lựa chọn tối ưu cho dự án của bạn...',
    'content' => NULL,
    'category' => 'IT',
    'published_at' => '2024-01-20T15:00:00.000000Z',
    'image_url' => '/assets/images/web/hosting.jpg',
    'status' => 'Published',
    'views_count' => 0,
    'is_featured' => false,
    'reading_time' => NULL,
  ),
  4 => 
  array (
    'title' => 'Bố cục tối giản trong nhiếp ảnh kiến trúc',
    'slug' => 'bo-cuc-toi-gian-trong-nhiep-anh-kien-truc',
    'excerpt' => 'Làm thế nào để \'less is more\' thực sự hiệu quả trong khung hình kiến trúc hiện đại...',
    'content' => NULL,
    'category' => 'PHOTOGRAPHY',
    'published_at' => '2024-02-12T11:00:00.000000Z',
    'image_url' => '/assets/images/web/architecture.jpg',
    'status' => 'Published',
    'views_count' => 0,
    'is_featured' => false,
    'reading_time' => NULL,
  ),
);
        foreach ($blog_posts as $item) BlogPost::create($item);

        $projects = array (
  0 => 
  array (
    'title' => 'Aperture Engine',
    'slug' => 'aperture-engine',
    'description' => 'A powerful browser-based RAW image processor using WebAssembly for near-native performance.',
    'tech_stack' => 
    array (
      0 => 'React',
      1 => 'Go',
      2 => 'WebAssembly',
    ),
    'link' => NULL,
    'github_link' => NULL,
    'image_url' => '/assets/images/web/aperture_engine.jpg',
    'status' => 'Completed',
    'is_featured' => true,
  ),
  1 => 
  array (
    'title' => 'DevFlow CMS',
    'slug' => 'devflow-cms',
    'description' => 'A specialized content management system optimized for technical documentation and portfolio showcase.',
    'tech_stack' => 
    array (
      0 => 'Next.js',
      1 => 'PostgreSQL',
      2 => 'Tailwind',
    ),
    'link' => NULL,
    'github_link' => NULL,
    'image_url' => '/assets/images/web/static_sites.jpg',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  2 => 
  array (
    'title' => 'Focus Tracker',
    'slug' => 'focus-tracker',
    'description' => 'A productivity tool designed for creative professionals to track deep work sessions and creative flow.',
    'tech_stack' => 
    array (
      0 => 'TypeScript',
      1 => 'Node.js',
      2 => 'Redis',
    ),
    'link' => NULL,
    'github_link' => NULL,
    'image_url' => '/assets/images/web/modern_web.jpg',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  3 => 
  array (
    'title' => 'aaaaaaaaaa',
    'slug' => 'aaaaaaaaaa',
    'description' => 'aaaaaaaaaa',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => NULL,
    'image_url' => '/storage/projects/ZgOP8rLPejbyz0RBWAvO3KbGtKmF6SnrvdIIHkRF.jpg',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  4 => 
  array (
    'title' => 'affvf f',
    'slug' => 'affvf-f',
    'description' => 'a',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => 'http://127.0.0.1:8000/admin/projects/create',
    'image_url' => '/storage/projects/y53O8oFHQ4IiUtIU3Pbs0U3qjWJWwlnwNjyNnOGB.jpg',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  5 => 
  array (
    'title' => 'âcf f',
    'slug' => 'cf-f',
    'description' => 'http://127.0.0.1:8000/admin/projects/create',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => NULL,
    'image_url' => '/storage/projects/Sz9XgCs3msGnxH9xOPif41zW7zqTe60bo12m90Ef.png',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  6 => 
  array (
    'title' => 'aa',
    'slug' => 'aa',
    'description' => 'â',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => NULL,
    'image_url' => NULL,
    'status' => 'Completed',
    'is_featured' => false,
  ),
  7 => 
  array (
    'title' => 'd',
    'slug' => 'd',
    'description' => 'd',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => NULL,
    'image_url' => '/storage/projects/5HLNN412HYoWX8V6vtMiKn64Xl3TXeVLwb2WhhZs.jpg',
    'status' => 'Completed',
    'is_featured' => false,
  ),
  8 => 
  array (
    'title' => 'ad',
    'slug' => 'ad',
    'description' => 'd',
    'tech_stack' => 
    array (
    ),
    'link' => 'http://127.0.0.1:8000/admin/projects/create',
    'github_link' => NULL,
    'image_url' => '/storage/projects/XcguQ8fT8DUZudHv2EcUgwSv3PFRS9SHWWQLKWao.png',
    'status' => 'Completed',
    'is_featured' => false,
  ),
);
        foreach ($projects as $item) Project::create($item);

        $photos = array (
  0 => 
  array (
    'title' => 'Cyberpunk Tokyo',
    'url' => '/assets/images/web/bw_street.jpg',
    'exif' => 'ISO 800 · 24mm · f/4.0',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  1 => 
  array (
    'title' => 'Urban Soul',
    'url' => '/assets/images/web/urban_soul.jpg',
    'exif' => 'ISO 400 · 85mm · f/1.8',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  2 => 
  array (
    'title' => 'Alpine Serenity',
    'url' => '/assets/images/web/wanderlust.jpg',
    'exif' => 'ISO 100 · 35mm · f/8.0',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  3 => 
  array (
    'title' => 'Desert Echoes',
    'url' => '/assets/images/web/desert_echoes.jpg',
    'exif' => 'ISO 200 · 50mm · f/11',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  4 => 
  array (
    'title' => 'Monolith',
    'url' => '/assets/images/web/monolith.jpg',
    'exif' => 'ISO 100 · 35mm · f/1.8',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  5 => 
  array (
    'title' => 'Mist and Peaks',
    'url' => '/assets/images/web/mist_peaks.jpg',
    'exif' => 'ISO 400 · 16mm · f/4.0',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  6 => 
  array (
    'title' => 'Valley Gaze',
    'url' => '/assets/images/web/valley_gaze.jpg',
    'exif' => 'ISO 200 · 85mm · f/2.0',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  7 => 
  array (
    'title' => '487812858_3923816177936414_1648304135311836678_n',
    'url' => '/storage/gallery/60NrOcZIozt9zp9QzBbdwS07n1Ba3uaUqMTGtlTI.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  8 => 
  array (
    'title' => '500123876_3982032278781470_780510094276674097_n',
    'url' => '/storage/gallery/H8deukuZDBDhUox6qBnMmCMAdEOFLNAETHP3Ged1.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  9 => 
  array (
    'title' => '501299821_3982032528781445_8013467992646369551_n',
    'url' => '/storage/gallery/e0v608HRCZpuSj1UZ4mJZvUAV0hL2CovQEuS71Da.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  10 => 
  array (
    'title' => 'Image_202601162001',
    'url' => '/storage/gallery/fGScscGE862aUlcmGZIPkx3KfBwzRYv5Q3v5XX7a.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  11 => 
  array (
    'title' => 'download',
    'url' => '/storage/gallery/en9S8MLR4EOkqLapVNR0unMkWk1aXocJO9oOhAw2.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  12 => 
  array (
    'title' => '326E2046-A0A9-4BD4-9301-E4B6EBC31D18-27300-0000039B46DF416A',
    'url' => '/storage/gallery/0guM2g5uqcDbpZeQRu2NVG4cpKWkjPNuhJPcuSiT.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  13 => 
  array (
    'title' => 'PixVerse_Image_Effect_prompt_Cinematic anime-s',
    'url' => '/storage/gallery/a2xGWKYMCdYc2D5yfraTmnEDlheuzdkjGLmrbCS8.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  14 => 
  array (
    'title' => 'c53f0e5ee3bccdfd9105494de2c054a9',
    'url' => '/storage/gallery/Ozki1PEPemMTrQipA9d9n3GNg6U91OMwei46b87x.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  15 => 
  array (
    'title' => 'e38c6e7e90f36968c74b5b8badb9ac1b',
    'url' => '/storage/gallery/MjqtwvP5YvRIMJSZRCTa8QtNopiwJwKnA5cZlm1V.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  16 => 
  array (
    'title' => 'f1dc0391f4bf6771ea7c1d8660460ce1',
    'url' => '/storage/gallery/YTKej6Wbp6NdXarQ7XO1ACFHaKmtGJSKgp3SaY8X.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  17 => 
  array (
    'title' => '497d4c68e1338fdc5bbdcf15064ac48a',
    'url' => '/storage/gallery/guWR4Ku3i2RFh29IwjlMktikR4qlP19e3QQ8bbTZ.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  18 => 
  array (
    'title' => 'b65bc3ed9b050c369145a0ed8d563866',
    'url' => '/storage/gallery/rRUqFDxkJdIkNag7TAzaJe0QCFVCrO1FHr23taFj.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  19 => 
  array (
    'title' => '6bd828068a62aab41e75ebf829e2fc5d',
    'url' => '/storage/gallery/tTOrafOpeObLMMSgclRX2tURTrcey79iR9n7XVWV.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  20 => 
  array (
    'title' => '2026-01-07_22-47-17',
    'url' => '/storage/gallery/JSzZuUBNdvuUiJQndoTGkLeSrq0ewVMHVY0iv66n.png',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => NULL,
  ),
  21 => 
  array (
    'title' => 'c53f0e5ee3bccdfd9105494de2c054a9',
    'url' => '/storage/gallery/7s74oJqF7UDbiYxIxpCrXvfB13EMbkoMumLwJeL9.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => 2,
  ),
  22 => 
  array (
    'title' => 'e38c6e7e90f36968c74b5b8badb9ac1b',
    'url' => '/storage/gallery/AXx4WkudI2sTdaVsX4C5Y0hdNfVTrBMjos0PN0YF.jpg',
    'exif' => 'Auto-extracted',
    'is_featured' => false,
    'gallery_category_id' => 2,
  ),
);
        foreach ($photos as $item) Photo::create($item);

        $resource_items = array (
  0 => 
  array (
    'title' => 'Lightroom Presets',
    'description' => '5 Pack - Urban Night',
    'type' => 'PRESET',
    'downloads' => 0,
    'file_size' => '24MB',
    'url' => '#',
  ),
  1 => 
  array (
    'title' => 'Next.js Template',
    'description' => 'Portfolio Minimalist',
    'type' => 'CODE',
    'downloads' => 0,
    'file_size' => '1.2MB',
    'url' => '#',
  ),
  2 => 
  array (
    'title' => 'Checklist SEO',
    'description' => '2024 Edition',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '500KB',
    'url' => '#',
  ),
  3 => 
  array (
    'title' => 'Wallpaper Pack',
    'description' => 'High Resolution',
    'type' => 'OTHER',
    'downloads' => 0,
    'file_size' => '150MB',
    'url' => '#',
  ),
  4 => 
  array (
    'title' => 'a',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  5 => 
  array (
    'title' => 'e',
    'description' => 'e',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  6 => 
  array (
    'title' => 'ee',
    'description' => 'e',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  7 => 
  array (
    'title' => 'â',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  8 => 
  array (
    'title' => 'f',
    'description' => 'f',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  9 => 
  array (
    'title' => 'ggg',
    'description' => 'note',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  10 => 
  array (
    'title' => 'a',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => NULL,
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  11 => 
  array (
    'title' => 'a',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => NULL,
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  12 => 
  array (
    'title' => 'a',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => 'a',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  13 => 
  array (
    'title' => 'a',
    'description' => 'a',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => 'a',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  14 => 
  array (
    'title' => 'f',
    'description' => 'f',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => 'f',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  15 => 
  array (
    'title' => 'f',
    'description' => 'f',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => 'f',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  16 => 
  array (
    'title' => 'g',
    'description' => 'g',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => '300mb',
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  17 => 
  array (
    'title' => 'u',
    'description' => 'u',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => NULL,
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  18 => 
  array (
    'title' => 'u',
    'description' => 'u',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => NULL,
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
  19 => 
  array (
    'title' => 'u',
    'description' => 'u',
    'type' => 'PDF',
    'downloads' => 0,
    'file_size' => NULL,
    'url' => 'https://github.com/thanhnguyenduyy/thanhnguyenduyy_WebBlog',
  ),
);
        foreach ($resource_items as $item) ResourceItem::create($item);

        $timeline_items = array (
  0 => 
  array (
    'year' => '2018',
    'title' => 'ENGINEERING',
    'description' => 'Landed first Junior Dev role @ TechFlow',
    'type' => 'IT',
  ),
  1 => 
  array (
    'year' => '2018',
    'title' => 'EXPRESSION',
    'description' => 'Bought first Mirrorless camera & lens',
    'type' => 'PHOTO',
  ),
  2 => 
  array (
    'year' => '2020',
    'title' => 'EVOLUTION',
    'description' => 'Senior Fullstack Developer & Cloud Architect',
    'type' => 'IT',
  ),
  3 => 
  array (
    'year' => '2020',
    'title' => 'RECOGNITION',
    'description' => 'First Solo Exhibition: "Digital Silence"',
    'type' => 'PHOTO',
  ),
  4 => 
  array (
    'year' => '2023',
    'title' => 'LEADERSHIP',
    'description' => 'Tech Lead at Global Scale startup',
    'type' => 'IT',
  ),
  5 => 
  array (
    'year' => '2023',
    'title' => 'LEGACY',
    'description' => 'Published Photo Book "Code & Shadows"',
    'type' => 'PHOTO',
  ),
);
        foreach ($timeline_items as $item) TimelineItem::create($item);

    }
}
