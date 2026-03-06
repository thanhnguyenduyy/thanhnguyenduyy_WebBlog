<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class MessagesSeeder extends Seeder
{
    public function run()
    {
        $messages = [
            [
                'name' => 'Nguyễn Văn A',
                'email' => 'vana@example.com',
                'subject' => 'Hợp tác dự án Web Blog',
                'message' => 'Chào bạn, mình rất ấn tượng với portfolio của bạn. Mình muốn thảo luận về một dự án thiết kế website cho công ty mình. Mong sớm nhận được phản hồi từ bạn!',
                'is_read' => false,
                'created_at' => now()->subHours(2),
            ],
            [
                'name' => 'Lê Thị B',
                'email' => 'lethib@gmail.com',
                'subject' => 'Hỏi về dịch vụ chụp ảnh',
                'message' => 'Chào Nhật, mình thấy bộ ảnh Saigon Noir của bạn rất đẹp. Bạn có nhận chụp ảnh phóng sự cưới không ạ? Nếu có cho mình xin báo giá nhé.',
                'is_read' => true,
                'created_at' => now()->subDays(1),
            ],
            [
                'name' => 'Tech Solutions Inc.',
                'email' => 'hr@techsolutions.io',
                'subject' => 'Cơ hội nghề nghiệp - Senior Frontend Developer',
                'message' => 'Chúng tôi đang tìm kiếm một Senior Frontend Developer có kinh nghiệm về React và Next.js. Qua profile của bạn, chúng tôi thấy bạn rất phù hợp. Bạn có quan tâm đến một buổi trò chuyện ngắn không?',
                'is_read' => false,
                'created_at' => now()->subHours(5),
            ],
            [
                'name' => 'Hoàng Nam',
                'email' => 'hoangnam_dev@outlook.com',
                'subject' => 'Câu hỏi về cấu trúc Next.js 14',
                'message' => 'Chào anh, em có đọc bài viết về Frontend Architecture của anh. Anh cho em hỏi chút về cách quản lý state khi dùng Server Components được không ạ? Cảm ơn anh!',
                'is_read' => false,
                'created_at' => now()->subDays(2),
            ],
            [
                'name' => 'Phạm Minh C',
                'email' => 'minhc_photo@yahoo.com',
                'subject' => 'Mời tham gia triển lãm ảnh đường phố',
                'message' => 'Chào bạn Nhật, mình là C từ hội nhiếp ảnh tự do. Bên mình sắp tới có tổ chức một buổi triển lãm nhỏ về chủ đề Đô thị. Rất mong bạn có thể góp mặt với vài tác phẩm của mình.',
                'is_read' => true,
                'created_at' => now()->subWeeks(1),
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
}
