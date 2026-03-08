# 🚀 Personal Blog & Portfolio System (Laravel)

Một hệ thống Website Cá nhân tích hợp Blog, Portfolio và Photography chuyên nghiệp, được xây dựng trên nền tảng Laravel 12.

## ✨ Mô tả chi tiết

Hệ thống được chia làm hai phần chính: Giao diện dành cho người xem (Client) và Bảng điều khiển dành cho chủ sở hữu (Admin).

### 🌐 Giao diện Người dùng (Client Site)
Nơi độc giả tương tác và theo dõi nội dung của bạn với thiết kế tối giản, chuyên nghiệp:
- **Trang chủ**: Giới thiệu tổng quan, slogan và bio cá nhân.
- **Journal (Blog)**: Danh sách bài viết được trình bày đẹp mắt, hỗ trợ đọc nội dung chi tiết.
- **Photography (Gallery)**: Kho ảnh nghệ thuật được phân loại theo chuyên mục, hỗ trợ xem ảnh chất lượng cao.
- **IT Projects (Portfolio)**: Nơi trưng bày các dự án, kỹ năng và sản phẩm công nghệ.
- **Experience (Timeline)**: Dòng thời gian hiển thị quá trình trưởng thành và làm việc.
- **Resources & Contact**: Tải về các tài liệu hữu ích và gửi tin nhắn liên hệ trực tiếp.

### 🔐 Hệ thống Quản trị (Admin Dashboard)
Công cụ quản lý nội dung mạnh mẽ và bảo mật dành riêng cho chủ nhân website:
- **Dashboard**: Thống kê nhanh và cái nhìn tổng quan về tình trạng dữ liệu.
- **Quản lý Journal**: Soạn thảo bài viết (Markdown), tùy chỉnh trạng thái (Draft/Published).
- **Quản lý Photography**: Upload ảnh hàng loạt, tự động xử lý hình ảnh và quản lý danh mục ảnh.
- **Quản lý Projects**: Cập nhật thông tin dự án, Tech Stack và liên kết demo.
- **Quản lý Experience**: Thêm/sửa các mốc sự kiện trên dòng thời gian.
- **Quản lý Inbox**: Đọc và xử lý các lời nhắn từ độc giả gửi về qua form liên hệ.
- **Cấu hình Settings**: Thay đổi toàn bộ thông tin hiển thị trên website (Bio, Slogan, Social links...) và quản lý tài khoản cá nhân.

### 🛠️ Tính năng kỹ thuật & Bảo mật
- **Tối ưu hình ảnh**: Tự động nén, resize và chuyển đổi **WebP** giúp website tải cực nhanh.
- **Dọn dẹp tự động**: Tự động xóa file rác trên server khi bài viết hoặc ảnh bị xóa.
- **Đa chế độ**: Hỗ trợ toàn diện **Dark/Light Mode** cho mọi giao diện.
- **Bảo mật cao**: Xác thực Admin, mã hóa Bcrypt, chống CSRF và Middleware bảo vệ chặt chẽ.
- **Khôi phục mật khẩu**: Quy trình đặt lại mật khẩu an toàn qua Email.
- **Hiệu năng**: Code chuẩn Laravel 12, tối ưu hóa Database và Tốc độ load.

---

## 🛠️ Hướng dẫn cài đặt

### 📋 Yêu cầu hệ thống
- PHP &ge; 8.2
- Composer
- Node.js & npm
- MySQL (XAMPP / Laragon)
- **Extension GD** (Cần bật trong `php.ini` để xử lý ảnh)

### 🚀 Các bước cài đặt

1. **Cài đặt thư viện: (Backend & Frontend)**
   ```bash
   composer install
   npm install
   ```

2. **Cấu hình môi trường:**
   - Copy file `.env.example` thành `.env`
   - Tạo Application Key:
   ```bash
   php artisan key:generate
   ```

3. **Cấu hình Database:**
   - Tạo một database mới trong MySQL.
   - Cập nhật thông tin `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` trong file `.env`.

4. **Khởi tạo dữ liệu:**
   ```bash
   php artisan migrate --seed
   ```

5. **Tạo link lưu trữ hình ảnh:**
   ```bash
   php artisan storage:link
   ```

6. **Build assets:**
   ```bash
   npm run build
   ```

7. **Chạy server:**
   ```bash
   php artisan serve
   ```

---

## 🔑 Tài khoản Admin mặc định
- **Email**: `admin@minhnhat.dev`
- **Password**: `password123`