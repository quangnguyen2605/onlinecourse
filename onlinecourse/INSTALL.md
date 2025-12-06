# Hướng dẫn cài đặt Database OnlineCourse

## Bước 1: Tạo Database
1. Mở phpMyAdmin (http://localhost/phpmyadmin)
2. Click vào tab "Databases"
3. Nhập tên database: `onlinecourse`
4. Click "Create"

## Bước 2: Import Schema
1. Chọn database `onlinecourse` vừa tạo
2. Click vào tab "Import"
3. Chọn file `database_schema.sql` trong thư mục project
4. Click "Go" để import cấu trúc bảng

## Bước 3: Import Data (Optional)
1. Sau khi import schema thành công
2. Click vào tab "Import" lần nữa
3. Chọn file `sample_data.sql` để import dữ liệu mẫu
4. Click "Go"

## Bước 4: Kiểm tra kết nối
- Database connection đã được config trong `config/Database.php`
- Host: localhost
- Database: onlinecourse
- Username: root
- Password: (rỗng)

## Tài khoản mẫu sau khi import data:
- **Admin**: admin@onlinecourse.com / password
- **Giảng viên**: nguyenvana@onlinecourse.com / password
- **Học viên**: hovand@onlinecourse.com / password

## Các bảng chính:
- `users`: Thông tin người dùng
- `categories`: Danh mục khóa học
- `courses`: Khóa học
- `lessons`: Bài học
- `enrollments`: Đăng ký khóa học
- `lesson_progress`: Tiến độ học tập
- `reviews`: Đánh giá khóa học

## Lưu ý:
- Đảm bảo Apache và MySQL đang chạy
- XAMPP/WAMP/MAMP phải được start
- File `.htaccess` không cần thiết cho routing hiện tại
