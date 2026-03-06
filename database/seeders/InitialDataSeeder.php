<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use App\Models\Project;
use App\Models\Photo;
use App\Models\ResourceItem;
use App\Models\TimelineItem;

use App\Models\GalleryCategory;
use App\Models\SiteSetting;
use Illuminate\Support\Str;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign key checks to allow truncation
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        BlogPost::truncate();
        Project::truncate();
        Photo::truncate();
        ResourceItem::truncate();
        TimelineItem::truncate();
        GalleryCategory::truncate();
        SiteSetting::truncate();

        // Enable foreign key checks back
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call(SiteSettingsSeeder::class);

        // Blog Posts
        $posts = [
            [
                'title' => 'Frontend Architecture: The Skeleton of Scalable Apps',
                'slug' => Str::slug('Frontend Architecture: The Skeleton of Scalable Apps'),
                'category' => 'IT',
                'published_at' => '2024-01-15 09:00:00',
                'excerpt' => 'Tại sao cấu trúc folder và cách quản lý state lại quyết định sự sống còn của một dự án lớn.',
                'content' => 'Frontend architecture is more than just folder structures; it\'s about creating a sustainable ecosystem for your code. In this post, we explore the principles of modularity, state management, and the importance of a well-defined design system.',
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1200',
                'status' => 'Published',
                'is_featured' => true,
                'reading_time' => 8,
            ],
            [
                'title' => 'Saigon Noir: Hành trình qua những mảng tối',
                'slug' => Str::slug('Saigon Noir: Hành trình qua những mảng tối'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-02-10 14:00:00',
                'excerpt' => 'Kỹ thuật phơi sáng lâu và cách bắt trọn linh hồn thành phố khi màn đêm buông xuống.',
                'content' => 'Chế độ phơi sáng lâu (long exposure) mở ra một góc nhìn mới về Sài Gòn. Những ánh đèn xe kéo dài, mặt nước phẳng lặng của sông Sài Gòn và bầu trời đêm huyền hoặc tạo nên một bức tranh Noir đầy cảm xúc.',
                'image_url' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?q=80&w=1200',
                'status' => 'Published',
                'is_featured' => true,
                'reading_time' => 6,
            ],
            [
                'title' => 'Kiến trúc Frontend hiện đại với Next.js 14',
                'slug' => Str::slug('Kiến trúc Frontend hiện đại với Next.js 14'),
                'category' => 'IT',
                'published_at' => '2024-03-01 10:00:00',
                'excerpt' => 'Khám phá Server Components, Streaming và cơ chế lập chỉ mục nâng cao...',
                'content' => 'Trong kỷ nguyên của React Server Components, việc xây dựng ứng dụng không chỉ dừng lại ở giao diện mượt mà. Chúng ta hãy cùng tìm hiểu về kiến trúc lấy hiệu suất làm trung tâm với Next.js.',
                'image_url' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 12,
            ],
            [
                'title' => 'Tối ưu hóa Performance cho ứng dụng React Large-scale',
                'slug' => Str::slug('Tối ưu hóa Performance cho ứng dụng React Large-scale'),
                'category' => 'IT',
                'published_at' => '2024-02-10 14:00:00',
                'excerpt' => 'Từ Memoization đến Virtualization: Những kỹ thuật sống còn cho ứng dụng lớn.',
                'content' => 'Khi ứng dụng phình to, mỗi millisecond render đều quý giá. Bài viết này tổng hợp những kinh nghiệm thực chiến để giữ cho UI luôn đạt 60fps.',
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 15,
            ],
            [
                'title' => 'Saigon Noir: Góc nhìn khác về thành phố đêm',
                'slug' => Str::slug('Saigon Noir: Góc nhìn khác về thành phố đêm'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-01-25 21:00:00',
                'excerpt' => 'Những lát cắt tĩnh lặng giữa nhịp sống hối hả của Sài Gòn...',
                'content' => 'Sài Gòn về đêm không chỉ có ánh đèn rực rỡ, mà còn có những góc tối đầy tự sự. Cùng tôi khám phá thành phố qua bộ ảnh Noir đầy ám ảnh.',
                'image_url' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 6,
            ],
            [
                'title' => 'Tại sao nên chọn Golang cho Microservices?',
                'slug' => Str::slug('Tại sao nên chọn Golang cho Microservices?'),
                'category' => 'IT',
                'published_at' => '2024-01-15 11:45:00',
                'excerpt' => 'Concurrency, Performance và sự đơn giản mã nguồn khiến Go trở thành bá chủ hệ thống phân tán.',
                'content' => 'Việc xây dựng hệ thống chịu tải cao chưa bao giờ dễ dàng như với Gorilla Mux và cơ chế Goroutines của Go. Cùng phân tích sâu về hệ sinh thái này.',
                'image_url' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 10,
            ],
            [
                'title' => 'The Art of Minimalist UI/UX Design',
                'slug' => Str::slug('The Art of Minimalist UI/UX Design'),
                'category' => 'IT',
                'published_at' => '2024-03-05 16:20:00',
                'excerpt' => 'Đơn giản không phải là thiếu sót, mà là sự tinh lọc sâu sắc.',
                'content' => 'Thiết kế tối giản đòi hỏi sự kỷ luật cao độ trong việc lựa chọn yếu tố nào cần giữ lại. Less is more không chỉ là định hướng thẩm mỹ, mà là triết lý UX.',
                'image_url' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 7,
            ],
            [
                'title' => 'Bắt trọn ánh sáng tự nhiên trong Portrait',
                'slug' => Str::slug('Bắt trọn ánh sáng tự nhiên trong Portrait'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-03-10 08:00:00',
                'excerpt' => 'Dùng ánh sáng cửa sổ và bóng râm để tạo nên những bức chân dung đầy hồn.',
                'content' => 'Không cần studio đắt tiền, chỉ với ánh sáng tự nhiên và một chút kiên nhẫn, bạn có thể tạo nên những bức ảnh chân dung chuyên nghiệp và đầy cảm xúc.',
                'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 9,
            ],
            [
                'title' => 'DevOps Culture: Beyond CI/CD Pipelines',
                'slug' => Str::slug('DevOps Culture: Beyond CI/CD Pipelines'),
                'category' => 'IT',
                'published_at' => '2024-03-15 13:00:00',
                'excerpt' => 'DevOps không chỉ là công cụ, đó là sự thay đổi tư duy trong vận hành phần mềm.',
                'content' => 'Việc tự động hóa là quan trọng, nhưng sự giao tiếp giữa Dev và Ops mới là chìa khóa của sự thành công. Khám phá cách xây dựng văn hóa tin cậy.',
                'image_url' => 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 11,
            ],
            [
                'title' => 'Minimalist Design System: Less is More',
                'slug' => Str::slug('Minimalist Design System: Less is More'),
                'category' => 'IT',
                'published_at' => '2024-03-20 14:00:00',
                'excerpt' => 'Xây dựng ngôn ngữ thiết kế tối giản nhưng vẫn đầy đủ tính năng.',
                'content' => 'Minimalism is not about lack of content; it\'s about the presence of only what is necessary. Learn how to build a unified design system that is both beautiful and functional.',
                'image_url' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 8,
            ],
            [
                'title' => 'Bố cục tối giản trong nhiếp ảnh kiến trúc',
                'slug' => Str::slug('Bố cục tối giản trong nhiếp ảnh kiến trúc'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-02-12 11:00:00',
                'excerpt' => 'Làm thế nào để "less is more" thực sự hiệu quả trong khung hình kiến trúc hiện đại...',
                'content' => 'Minimalist architecture photography focuses on repeating patterns, clean lines, and negative space. Discover techniques to capture the essence of modern structures.',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 7,
            ],
            [
                'title' => 'The Soul of the Machine: Ethics of AI',
                'slug' => Str::slug('The Soul of the Machine: Ethics of AI'),
                'category' => 'THOUGHTS',
                'published_at' => '2024-03-28 09:00:00',
                'excerpt' => 'Khi AI bắt đầu sáng tạo, giá trị của con người nằm ở đâu?',
                'content' => 'Artificial Intelligence is no longer just a tool; it\'s a creator. In this essay, we explore the boundary between human intuition and machine calculation in art and code.',
                'image_url' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 12,
            ],
            [
                'title' => 'Mastering Next.js Server Actions',
                'slug' => Str::slug('Mastering Next.js Server Actions'),
                'category' => 'IT',
                'published_at' => '2024-04-02 10:00:00',
                'excerpt' => 'Tạm biệt API routes? Cách sử dụng Server Actions hiệu quả trong Next.js 14+.',
                'content' => 'Server Actions are revolutionizing data mutations in Next.js. Learn how to handle form validation, error states, and optimistic updates with ease.',
                'image_url' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?q=80&w=1200', // Rotated id from a similar tech topic
                'status' => 'Published',
                'reading_time' => 14,
            ],
            [
                'title' => 'Minimalism in Code and Life',
                'slug' => Str::slug('Minimalism in Code and Life'),
                'category' => 'THOUGHTS',
                'published_at' => '2024-04-05 08:30:00',
                'excerpt' => 'Làm thế nào để đơn giản hóa quy trình làm việc và cuộc sống của một lập trình viên.',
                'content' => 'Refactoring your life is just as important as refactoring your code. We discuss how minimalist principles can lead to better focus, higher quality output, and less burnout.',
                'image_url' => 'https://images.unsplash.com/photo-1516383274235-5f42d6c6426d?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 8,
            ],
            [
                'title' => 'The Perfect Workspace for Creatives',
                'slug' => Str::slug('The Perfect Workspace for Creatives'),
                'category' => 'THOUGHTS',
                'published_at' => '2024-04-10 16:00:00',
                'excerpt' => 'Setup góc làm việc tối giản giúp tăng tối đa khả năng tập trung.',
                'content' => 'Your environment dictates your output. We walk through a setup designed for deep work, combining technical efficiency with artistic inspiration.',
                'image_url' => 'https://images.unsplash.com/photo-1493932484895-752d1471eab5?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 6,
            ],
            [
                'title' => 'Building a Global Brand as a Dev',
                'slug' => Str::slug('Building a Global Brand as a Dev'),
                'category' => 'IT',
                'published_at' => '2024-04-15 11:00:00',
                'excerpt' => 'Cách xây dựng portfolio và uy tín để làm việc với các client quốc tế.',
                'content' => 'The world is your marketplace. Learn how to leverage open source, high-quality technical writing, and a strong visual identity to attract global opportunities.',
                'image_url' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 15,
            ],
            [
                'title' => 'Photography as Meditation',
                'slug' => Str::slug('Photography as Meditation'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-04-20 07:00:00',
                'excerpt' => 'Tại sao việc cầm máy ảnh đi dạo lại là cách tốt nhất để reset tâm trí.',
                'content' => 'Photography forces you to be present. In this post, I share how the act of looking for "the shot" has become a meditative practice in my busy tech-driven life.',
                'image_url' => 'https://images.unsplash.com/photo-1472396961693-142e6e269027?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 5,
            ],
            [
                'title' => 'Architecture of Solitude',
                'slug' => Str::slug('Architecture of Solitude'),
                'category' => 'PHOTOGRAPHY',
                'published_at' => '2024-04-25 09:00:00',
                'excerpt' => 'Vẻ đẹp của sự trống trải trong không gian hiện đại.',
                'content' => 'Chúng ta thường sợ sự trống trải, nhưng trong kiến trúc và nhiếp ảnh, nó chính là khoảng thở để tâm hồn được tự do.',
                'image_url' => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?q=80&w=1200',
                'status' => 'Published',
                'reading_time' => 7,
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::updateOrCreate(
                ['slug' => $post['slug']],
                $post
            );
        }

        // Projects (20 Unique High-Quality Showcase Items)
        $projects = [
            [
                'title' => 'Lumina CMS',
                'slug' => Str::slug('Lumina CMS'),
                'description' => 'A headless CMS focused on high-performance content delivery and developer experience.',
                'image_url' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=1200',
                'tech_stack' => ['Next.js', 'Go', 'PostgreSQL', 'Redis'],
                'github_link' => 'https://github.com/minhnhatdev/lumina-cms',
                'link' => 'https://lumina.demo',
            ],
            [
                'title' => 'Focus Tracker App',
                'slug' => Str::slug('Focus Tracker App'),
                'description' => 'Mobile-first productivity application utilizing the Pomodoro technique with deep analytics.',
                'image_url' => 'https://images.unsplash.com/photo-1484480974693-6ca0a78fb36b?q=80&w=1200',
                'tech_stack' => ['React Native', 'Node.js', 'MongoDB', 'AWS'],
                'github_link' => 'https://github.com/minhnhatdev/focus-tracker',
                'link' => 'https://focus.app',
            ],
            [
                'title' => 'Urban Flow Analytics',
                'slug' => Str::slug('Urban Flow Analytics'),
                'description' => 'Real-time traffic and pedestrian flow visualization platform for smart city initiatives.',
                'image_url' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1200',
                'tech_stack' => ['D3.js', 'WebGL', 'Python', 'FastAPI'],
                'github_link' => 'https://github.com/minhnhatdev/urban-flow',
                'link' => 'https://urban-flow.io',
            ],
            [
                'title' => 'Shadow & Line Portfolio',
                'slug' => Str::slug('Shadow & Line Portfolio'),
                'description' => 'Custom WordPress theme for architecture photographers focusing on minimalist presentation.',
                'image_url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200',
                'tech_stack' => ['PHP', 'JS', 'Tailwind', 'GSAP'],
                'github_link' => 'https://github.com/minhnhatdev/shadow-line',
                'link' => 'https://shadow-line.me',
            ],
            [
                'title' => 'Cloud Dashboard Pro',
                'slug' => Str::slug('Cloud Dashboard Pro'),
                'description' => 'Unified management interface for multi-cloud infrastructure monitoring and alerting.',
                'image_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=1200',
                'tech_stack' => ['Vue.js', 'ApexCharts', 'Firebase', 'K8s'],
                'github_link' => 'https://github.com/minhnhatdev/cloud-dash',
                'link' => 'https://cloud-dash.pro',
            ],
            [
                'title' => 'Neural Sorter',
                'slug' => Str::slug('Neural Sorter'),
                'description' => 'AI-powered image classification system for automated photography archiving.',
                'image_url' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?q=80&w=1200',
                'tech_stack' => ['PyTorch', 'Numpy', 'Flask', 'Docker'],
                'github_link' => 'https://github.com/minhnhatdev/neural-sorter',
                'link' => 'https://neural-sorter.ai',
            ],
            [
                'title' => 'Aperture OS',
                'slug' => Str::slug('Aperture OS'),
                'description' => 'Open source operating system for specialized embedded cameras and IoT imaging devices.',
                'image_url' => 'https://images.unsplash.com/photo-1510127034890-ba27508e9f1c?q=80&w=1200',
                'tech_stack' => ['C++', 'Rust', 'Yocto', 'embedded'],
                'github_link' => 'https://github.com/minhnhatdev/aperture-os',
                'link' => 'https://aperture-os.org',
            ],
            [
                'title' => 'Vector Maps Engine',
                'slug' => Str::slug('Vector Maps Engine'),
                'description' => 'High-performance vector tile rendering engine for large-scale geographic data.',
                'image_url' => 'https://images.unsplash.com/photo-1526772662000-3f88f10405ff?q=80&w=1200',
                'tech_stack' => ['Rust', 'WebAssembly', 'GLSL'],
                'github_link' => 'https://github.com/minhnhatdev/vector-maps',
                'link' => 'https://vector-maps.dev',
            ],
            [
                'title' => 'Minimalist Blog Template',
                'slug' => Str::slug('Minimalist Blog Template'),
                'description' => 'A clean, typography-focused blog template for writers and developers.',
                'image_url' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?q=80&w=1200',
                'tech_stack' => ['HTML', 'CSS', 'JS', 'Jekyll'],
                'github_link' => 'https://github.com/minhnhatdev/minimalist-blog',
                'link' => 'https://minimalist-blog.demo',
            ],
            [
                'title' => 'Health Monitoring Bot',
                'slug' => Str::slug('Health Monitoring Bot'),
                'description' => 'Telegram bot for tracking daily health metrics and providing personalized advice.',
                'image_url' => 'https://images.unsplash.com/photo-1505751172876-fa1923c5c528?q=80&w=1200',
                'tech_stack' => ['Python', 'Telegram API', 'SQLite'],
                'github_link' => 'https://github.com/minhnhatdev/health-bot',
                'link' => 'https://t.me/health_monitor_bot',
            ],
            [
                'title' => 'Smart Home Hub',
                'slug' => Str::slug('Smart Home Hub'),
                'description' => 'Centralized control system for smart home devices with voice integration.',
                'image_url' => 'https://images.unsplash.com/photo-1558002038-1055907df827?q=80&w=1200',
                'tech_stack' => ['Node.js', 'MQTT', 'Zigbee', 'Alexa'],
                'github_link' => 'https://github.com/minhnhatdev/smart-home-hub',
                'link' => 'https://smart-home.local',
            ],
            [
                'title' => 'Inventory Management System',
                'slug' => Str::slug('Inventory Management System'),
                'description' => 'Comprehensive system for tracking inventory levels, orders, sales and deliveries.',
                'image_url' => 'https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=1200',
                'tech_stack' => ['Laravel', 'Vue.js', 'MariaDB'],
                'github_link' => 'https://github.com/minhnhatdev/inventory-system',
                'link' => 'https://inventory.biz',
            ],
            [
                'title' => 'Live Chat Support Platform',
                'slug' => Str::slug('Live Chat Support Platform'),
                'description' => 'Real-time customer support platform with multi-agent support and AI chatbot.',
                'image_url' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?q=80&w=1200',
                'tech_stack' => ['Socket.io', 'Redis', 'React', 'Node.js'],
                'github_link' => 'https://github.com/minhnhatdev/live-chat',
                'link' => 'https://live-chat.support',
            ],
            [
                'title' => 'Personal Finance Tracker',
                'slug' => Str::slug('Personal Finance Tracker'),
                'description' => 'A secure and intuitive web app for tracking income, expenses and investments.',
                'image_url' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?q=80&w=1200',
                'tech_stack' => ['SvelteKit', 'Prisma', 'PostgreSQL'],
                'github_link' => 'https://github.com/minhnhatdev/finance-tracker',
                'link' => 'https://finance-tracker.me',
            ],
            [
                'title' => 'Community Forum Hub',
                'slug' => Str::slug('Community Forum Hub'),
                'description' => 'Modern forum software designed for fast-growing online communities.',
                'image_url' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?q=80&w=1200',
                'tech_stack' => ['NodeBB', 'Redis', 'MongoDB'],
                'github_link' => 'https://github.com/minhnhatdev/community-forum',
                'link' => 'https://forum-hub.org',
            ],
            [
                'title' => 'E-learning Platform Academy',
                'slug' => Str::slug('E-learning Platform Academy'),
                'description' => 'Feature-rich platform for online courses, quizzes and certifications.',
                'image_url' => 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?q=80&w=1200',
                'tech_stack' => ['Django', 'React', 'AWS S3', 'Lambda'],
                'github_link' => 'https://github.com/minhnhatdev/elearning-academy',
                'link' => 'https://academy-online.edu',
            ],
            [
                'title' => 'Music Streaming Dashboard',
                'slug' => Str::slug('Music Streaming Dashboard'),
                'description' => 'Interactive dashboard for music analytics and artist management.',
                'image_url' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?q=80&w=1200',
                'tech_stack' => ['React', 'Chart.js', 'Spotify API'],
                'github_link' => 'https://github.com/minhnhatdev/music-dashboard',
                'link' => 'https://music-dash.fm',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => $project['slug']],
                $project
            );
        }

        // Create Categories
        $catStreet = GalleryCategory::updateOrCreate(['slug' => 'street'], ['name' => 'STREET']);
        $catPortrait = GalleryCategory::updateOrCreate(['slug' => 'portrait'], ['name' => 'PORTRAIT']);
        $catTravel = GalleryCategory::updateOrCreate(['slug' => 'travel'], ['name' => 'TRAVEL']);
        $catMinimal = GalleryCategory::updateOrCreate(['slug' => 'minimal'], ['name' => 'MINIMAL']);
        $catArch = GalleryCategory::updateOrCreate(['slug' => 'architecture'], ['name' => 'ARCHITECTURE']);

        // Photos (100 Unique items: 20 per category)
        $photos = [
            // STREET (11 remaining)
            ['title' => 'Saigon Morning Rhythm', 'url' => 'https://images.unsplash.com/photo-1542332213-31f87348057f?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 800 · 50mm · f/1.8 · 1/125s', 'is_featured' => true],
            ['title' => 'Neon Pulse of District 1', 'url' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 1600 · 35mm · f/1.4 · 1/60s', 'is_featured' => true],
            ['title' => 'Midnight Alleyways', 'url' => 'https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 3200 · 35mm · f/2.0 · 1/30s', 'is_featured' => false],
            ['title' => 'The Street\'s Soul', 'url' => 'https://images.unsplash.com/photo-1514565131-fce0801e5785?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 800 · 50mm · f/2.0 · 1/250s', 'is_featured' => false],
            ['title' => 'Bui Vien Night', 'url' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 2000 · 35mm · f/1.4 · 1/100s', 'is_featured' => false],
            ['title' => 'Street Vendor Bloom', 'url' => 'https://images.unsplash.com/photo-1512314889357-e157c22f938d?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 400 · 50mm · f/2.0 · 1/500s', 'is_featured' => false],
            ['title' => 'Rainy Day Reflection', 'url' => 'https://images.unsplash.com/photo-1515694346937-94d85e41e6f0?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 800 · 35mm · f/2.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Neon Alley', 'url' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 1600 · 50mm · f/1.4 · 1/60s', 'is_featured' => false],
            ['title' => 'Golden Hour Street', 'url' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 100 · 50mm · f/1.8 · 1/2000s', 'is_featured' => false],
            ['title' => 'Midnight Corner', 'url' => 'https://images.unsplash.com/photo-1478147427282-58a87a120781?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 3200 · 35mm · f/1.4 · 1/30s', 'is_featured' => false],
            ['title' => 'City Lights Bloom', 'url' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063?q=80&w=1200', 'gallery_category_id' => $catStreet->id, 'exif' => 'ISO 800 · 50mm · f/2.0 · 1/125s', 'is_featured' => false],

            // MINIMAL (14 remaining)
            ['title' => 'Diagonal Silence', 'url' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 50mm · f/11 · 1/125s', 'is_featured' => true],
            ['title' => 'Geometry of Light', 'url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 35mm · f/8 · 1/500s', 'is_featured' => true],
            ['title' => 'Negative Space Study', 'url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 24mm · f/16 · 1/30s', 'is_featured' => false],
            ['title' => 'Zen Lines', 'url' => 'https://images.unsplash.com/photo-1544256718-3bcf237f3974?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 200 · 85mm · f/4 · 1/1000s', 'is_featured' => false],
            ['title' => 'Symmetry and Silence', 'url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 16mm · f/8 · 1/500s', 'is_featured' => false],
            ['title' => 'Horizon Split', 'url' => 'https://images.unsplash.com/photo-1472396961693-142e6e269027?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 24mm · f/16 · 1/125s', 'is_featured' => false],
            ['title' => 'Static Flow', 'url' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 200 · 50mm · f/8 · 1/500s', 'is_featured' => false],
            ['title' => 'Parallel Worlds', 'url' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 35mm · f/11 · 1/250s', 'is_featured' => false],
            ['title' => 'The Staircase', 'url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 200 · 16mm · f/8 · 1/125s', 'is_featured' => false],
            ['title' => 'Linear Vision', 'url' => 'https://images.unsplash.com/photo-1544256718-3bcf237f3974?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 85mm · f/5.6 · 1/1000s', 'is_featured' => false],
            ['title' => 'Shadow Play', 'url' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 200 · 35mm · f/4 · 1/500s', 'is_featured' => false],
            ['title' => 'Monochrome Peak', 'url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 100 · 16mm · f/11 · 1/500s', 'is_featured' => false],
            ['title' => 'Geometric Echo', 'url' => 'https://images.unsplash.com/photo-1486718448742-163732cd1544?q=80&w=1200', 'gallery_category_id' => $catMinimal->id, 'exif' => 'ISO 200 · 35mm · f/5.6 · 1/1000s', 'is_featured' => false],

            // ARCHITECTURE (15 remaining)
            ['title' => 'Concrete Echoes', 'url' => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 200 · 24mm · f/8 · 1/500s', 'is_featured' => true],
            ['title' => 'The Architect\'s Eye', 'url' => 'https://images.unsplash.com/photo-1511818966892-d7d671e672a2?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 35mm · f/11 · 1/60s', 'is_featured' => true],
            ['title' => 'Legacy Foundations', 'url' => 'https://images.unsplash.com/photo-1481253127861-534498168948?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 800 · 35mm · f/4 · 1/125s', 'is_featured' => false],
            ['title' => 'Modern Monolith', 'url' => 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 24mm · f/8 · 1/250s', 'is_featured' => false],
            ['title' => 'Geometric Pulse', 'url' => 'https://images.unsplash.com/photo-1486718448742-163732cd1544?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 200 · 50mm · f/5.6 · 1/500s', 'is_featured' => false],
            ['title' => 'Skyward Structure', 'url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 20mm · f/11 · 1/60s', 'is_featured' => false],
            ['title' => 'Brutalist Echo', 'url' => 'https://images.unsplash.com/photo-1487958449943-2429e8be8625?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 400 · 24mm · f/11 · 1/60s', 'is_featured' => false],
            ['title' => 'The Void Architecture', 'url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 35mm · f/8 · 1/250s', 'is_featured' => false],
            ['title' => 'Symmetry of Steel', 'url' => 'https://images.unsplash.com/photo-1511818966892-d7d671e672a2?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 200 · 24mm · f/11 · 1/125s', 'is_featured' => false],
            ['title' => 'Facade Rhythm', 'url' => 'https://images.unsplash.com/photo-1502005229762-cf1b2da7c5d6?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 50mm · f/8 · 1/500s', 'is_featured' => false],
            ['title' => 'Reflections in Glass', 'url' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 400 · 16mm · f/4 · 1/1000s', 'is_featured' => false],
            ['title' => 'High Rise Silence', 'url' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 2000 · 24mm · f/5.6 · 1/250s', 'is_featured' => false],
            ['title' => 'Industrial Legacy', 'url' => 'https://images.unsplash.com/photo-1481253127861-534498168948?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 800 · 35mm · f/2.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Minimalist Cube', 'url' => 'https://images.unsplash.com/photo-1511818966892-d7d671e672a2?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 100 · 50mm · f/8 · 1/500s', 'is_featured' => false],
            ['title' => 'Urban Geometry', 'url' => 'https://images.unsplash.com/photo-1486718448742-163732cd1544?q=80&w=1200', 'gallery_category_id' => $catArch->id, 'exif' => 'ISO 200 · 35mm · f/11 · 1/60s', 'is_featured' => false],

            // TRAVEL (14 remaining)
            ['title' => 'Wandering Soul', 'url' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 100 · 35mm · f/8 · 1/500s', 'is_featured' => true],
            ['title' => 'Mountain Whispers', 'url' => 'https://images.unsplash.com/photo-1472396961693-142e6e269027?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 400 · 16mm · f/4.0 · 2s', 'is_featured' => true],
            ['title' => 'Peak Serenity', 'url' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 16mm · f/4 · 1/1000s', 'is_featured' => false],
            ['title' => 'Valley Gaze', 'url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 85mm · f/2 · 1/2000s', 'is_featured' => false],
            ['title' => 'Golden Hour Rhythm', 'url' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 35mm · f/5.6 · 1/500s', 'is_featured' => false],
            ['title' => 'Nature\'s Legacy', 'url' => 'https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 100 · 50mm · f/8 · 1/250s', 'is_featured' => false],
            ['title' => 'The Open Road', 'url' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 100 · 35mm · f/11 · 1/60s', 'is_featured' => false],
            ['title' => 'Alpine Life', 'url' => 'https://images.unsplash.com/photo-1472396961693-142e6e269027?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 400 · 24mm · f/5.6 · 1/500s', 'is_featured' => false],
            ['title' => 'Mist and Pine', 'url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 800 · 50mm · f/2.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Mountain Silence', 'url' => 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 100 · 16mm · f/11 · 1/500s', 'is_featured' => false],
            ['title' => 'River Flow', 'url' => 'https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 35mm · f/5.6 · 1/125s', 'is_featured' => false],
            ['title' => 'Dusk in the Valley', 'url' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 400 · 50mm · f/1.8 · 1/60s', 'is_featured' => false],
            ['title' => 'Nomad Heart', 'url' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 35mm · f/8 · 1/500s', 'is_featured' => false],
            ['title' => 'High Altitude', 'url' => 'https://images.unsplash.com/photo-1472396961693-142e6e269027?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 100 · 24mm · f/16 · 1/125s', 'is_featured' => false],
            ['title' => 'Nature Breath', 'url' => 'https://images.unsplash.com/photo-1441974231531-c6227db76b6e?q=80&w=1200', 'gallery_category_id' => $catTravel->id, 'exif' => 'ISO 200 · 85mm · f/2 · 1/500s', 'is_featured' => false],

            // PORTRAIT (20)
            ['title' => 'The Silent Observer', 'url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 50mm · f/1.8 · 1/250s', 'is_featured' => true],
            ['title' => 'Ethereal Shadows', 'url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 85mm · f/1.2 · 1/1000s', 'is_featured' => true],
            ['title' => 'Solitude in Motion', 'url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 800 · 50mm · f/1.4 · 1/100s', 'is_featured' => false],
            ['title' => 'Morning Musings', 'url' => 'https://images.unsplash.com/photo-1491349174775-aaafddd81942?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 35mm · f/2.0 · 1/500s', 'is_featured' => false],
            ['title' => 'The Artist\'s Soul', 'url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 200 · 85mm · f/1.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Quiet Contemplation', 'url' => 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 50mm · f/2.8 · 1/250s', 'is_featured' => false],
            ['title' => 'Urban Portrait', 'url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 35mm · f/2.8 · 1/200s', 'is_featured' => false],
            ['title' => 'Luminous Silhouette', 'url' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 50mm · f/1.4 · 1/800s', 'is_featured' => false],
            ['title' => 'The Thinker', 'url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 50mm · f/1.8 · 1/250s', 'is_featured' => false],
            ['title' => 'Gaze of Time', 'url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 85mm · f/1.2 · 1/1000s', 'is_featured' => false],
            ['title' => 'Street Soul Portrait', 'url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 800 · 50mm · f/1.4 · 1/100s', 'is_featured' => false],
            ['title' => 'Golden Hour Glow', 'url' => 'https://images.unsplash.com/photo-1491349174775-aaafddd81942?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 35mm · f/2.0 · 1/500s', 'is_featured' => false],
            ['title' => 'Wandering Eyes', 'url' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 200 · 85mm · f/1.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Reflection of Self', 'url' => 'https://images.unsplash.com/photo-1501196354995-cbb51c65aaea?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 50mm · f/2.8 · 1/250s', 'is_featured' => false],
            ['title' => 'City Dweller', 'url' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 35mm · f/2.8 · 1/200s', 'is_featured' => false],
            ['title' => 'Monochrome Gaze', 'url' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 50mm · f/1.4 · 1/800s', 'is_featured' => false],
            ['title' => 'The Old Master', 'url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 400 · 85mm · f/1.8 · 1/125s', 'is_featured' => false],
            ['title' => 'Youthful Spirit', 'url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 100 · 50mm · f/1.4 · 1/500s', 'is_featured' => false],
            ['title' => 'Urban Muse', 'url' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 800 · 35mm · f/2.0 · 1/100s', 'is_featured' => false],
            ['title' => 'Shadowed Soul', 'url' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?q=80&w=1200', 'gallery_category_id' => $catPortrait->id, 'exif' => 'ISO 1000 · 50mm · f/1.2 · 1/125s', 'is_featured' => false],
        ];

        foreach ($photos as $photo) {
            Photo::updateOrCreate(
                ['title' => $photo['title']], // Assuming title is unique enough for seed data
                $photo
            );
        }

        // Resources
        $resources = [
            ['title' => 'Urban Chrome Presets', 'description' => 'Bộ 5 preset Lightroom dành cho street photography buổi đêm.', 'type' => 'PRESET', 'url' => 'https://presets.minhnhat.me/urban-chrome', 'file_size' => '12MB', 'downloads' => 2450],
            ['title' => 'Next.js Boilerplate', 'description' => 'Starter kit tối ưu cho Blog & Portfolio sử dụng App Router.', 'type' => 'CODE', 'url' => 'https://github.com/minhnhatdev/nextjs-starter', 'file_size' => '2.5MB', 'downloads' => 1840],
            ['title' => 'Minimalist Design System', 'description' => 'File Figma bao gồm full components cho dự án portfolio.', 'type' => 'OTHER', 'url' => 'https://figma.com/file/minhnhat-design-system', 'file_size' => '45MB', 'downloads' => 3100],
            ['title' => 'React Hook Cheat Sheet', 'description' => 'Cẩm nang tra cứu nhanh các hooks phổ biến và cách tối ưu performance.', 'type' => 'PDF', 'url' => '#', 'file_size' => '1.2MB', 'downloads' => 4200],
            ['title' => 'VS Code Theme "Noir"', 'description' => 'Giao diện dark mode tối giản giúp giảm mỏi mắt cho lập trình đêm.', 'type' => 'OTHER', 'url' => 'https://marketplace.visualstudio.com/noir', 'file_size' => '150KB', 'downloads' => 15600],
            ['title' => 'Node.js Security Checklist', 'description' => 'Danh sách các lỗ hổng bảo mật và cách khắc phục trong Node.js.', 'type' => 'PDF', 'url' => '#', 'file_size' => '800KB', 'downloads' => 2100],
            ['title' => 'Mobile Photo Guide', 'description' => 'Hướng dẫn bắt trọn khoảnh khắc chỉ với chiếc điện thoại trên tay.', 'type' => 'PDF', 'url' => '#', 'file_size' => '8.5MB', 'downloads' => 950],
            ['title' => 'Deployment Scripts AWS', 'description' => 'Tự động hóa quy trình deploy ứng dụng lên AWS EC2/Lambda.', 'type' => 'CODE', 'url' => 'https://github.com/minhnhatdev/aws-scripts', 'file_size' => '45KB', 'downloads' => 320],
            ['title' => 'HSL Tailwind Library', 'description' => 'Utility-first library giúp quản lý màu sắc theo HSL trong Tailwind.', 'type' => 'CODE', 'url' => 'https://npm.im/hsl-tailwind', 'file_size' => '12KB', 'downloads' => 1100],
            ['title' => 'SQL Optimization Book', 'description' => 'Ebook chuyên sâu về tối ưu hóa truy vấn cho PostgreSQL.', 'type' => 'PDF', 'url' => '#', 'file_size' => '4.2MB', 'downloads' => 840],
            ['title' => 'Framer Noir Icons', 'description' => 'Bộ icons vector tối giản dành riêng cho Framer và Figma.', 'type' => 'OTHER', 'url' => '#', 'file_size' => '3.5MB', 'downloads' => 2800],
            ['title' => 'Go Performance Guide', 'description' => 'Bí quyết tối ưu bộ nhớ và CPU cho ứng dụng Golang microservices.', 'type' => 'PDF', 'url' => '#', 'file_size' => '2.1MB', 'downloads' => 1500],
            ['title' => 'Web Vitals Dash JSON', 'description' => 'Config mẫu cho Grafana để tracking Core Web Vitals realtime.', 'type' => 'CODE', 'url' => '#', 'file_size' => '8KB', 'downloads' => 450],
            ['title' => 'Dark Mode CSS Tmpl', 'description' => 'Các templates CSS sạch giúp tích hợp dark mode nhanh chóng.', 'type' => 'CODE', 'url' => '#', 'file_size' => '15KB', 'downloads' => 1900],
            ['title' => 'Street Photo Presets', 'description' => 'Presets dành riêng cho ảnh monochrome/đường phố.', 'type' => 'PRESET', 'url' => '#', 'file_size' => '15MB', 'downloads' => 1200],
            ['title' => 'TS API Boilerplate', 'description' => 'Khung dự án backend TypeScript chuẩn chỉnh với Jest và ESLint.', 'type' => 'CODE', 'url' => '#', 'file_size' => '1.8MB', 'downloads' => 2100],
            ['title' => 'Docker Compose Pack', 'description' => 'Tập hợp các file docker-compose cho mọi stack phổ biến.', 'type' => 'CODE', 'url' => '#', 'file_size' => '25KB', 'downloads' => 860],
            ['title' => 'Git Alias Efficiency', 'description' => 'Bộ aliases giúp tăng tốc độ gõ lệnh Git lên gấp 2 lần.', 'type' => 'OTHER', 'url' => '#', 'file_size' => '5KB', 'downloads' => 3400],
            ['title' => 'UI Layout Grids', 'description' => 'Hệ thống lưới chuẩn 12-column cho web và 4-column cho mobile.', 'type' => 'OTHER', 'url' => '#', 'file_size' => '500KB', 'downloads' => 1700],
            ['title' => 'Creative Flow Checklist', 'description' => 'Quy trình giúp duy trì trạng thái "Flow" khi làm việc sáng tạo.', 'type' => 'PDF', 'url' => '#', 'file_size' => '150KB', 'downloads' => 560]
        ];

        foreach ($resources as $resource) {
            ResourceItem::updateOrCreate(
                ['title' => $resource['title']],
                $resource
            );
        }

        // Timeline Items
        $timeline = [
            ['year' => '2018', 'title' => 'GENESIS', 'description' => 'Bắt đầu vị trí Junior UI Engineer tại TechFlow Startup.', 'type' => 'IT'],
            ['year' => '2020', 'title' => 'EVOLUTION', 'description' => 'Thăng tiến lên Senior Frontend Developer; Architect cho hệ thống E-commerce.', 'type' => 'IT'],
            ['year' => '2021', 'title' => 'EXHIBITION', 'description' => 'Tham gia triển lãm nhóm "Sài Gòn Phẳng" với series Monochrome.', 'type' => 'PHOTO'],
            ['year' => '2023', 'title' => 'LEADERSHIP', 'description' => 'Đảm nhiệm Tech Lead cho dự án SaaS quy mô toàn cầu.', 'type' => 'IT'],
            ['year' => '2024', 'title' => 'HORIZON', 'description' => 'Phát triển nền tảng cá nhân và đóng góp cho cộng đồng Open Source.', 'type' => 'IT'],
        ];

        foreach ($timeline as $item) {
            TimelineItem::updateOrCreate(
                ['title' => $item['title'], 'year' => $item['year']],
                $item
            );
        }
    }
}
