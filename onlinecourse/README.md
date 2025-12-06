# Hệ thống Khóa học Trực tuyến Online Course

## Giới thiệu
Đây là một hệ thống quản lý khóa học trực tuyến được xây dựng bằng PHP, MySQL và Bootstrap. Hệ thống hỗ trợ 3 vai trò chính: Học viên, Giảng viên và Quản trị viên.

## Yêu cầu
- PHP 7.4 trở lên
- MySQL 5.7 trở lên
- Web server (Apache, Nginx, etc.)
- Bootstrap 5.3
- FontAwesome 6.4

## Cài đặt

### 1. Clone hoặc tải dự án
```bash
git clone <repository-url>
cd onlinecourse
```

### 2. Cấu hình cơ sở dữ liệu
- Tạo database mới: `CREATE DATABASE onlinecourse;`
- Import file `database.sql` vào database

### 3. Cấu hình kết nối database
Chỉnh sửa file `config/Database.php`:
```php
private $host = 'localhost';
private $dbName = 'onlinecourse';
private $username = 'root';
private $password = '';
```

### 4. Cấu hình thư mục uploads
```bash
mkdir uploads
mkdir uploads/materials
chmod -R 777 uploads
```

### 5. Truy cập ứng dụng
Mở trình duyệt và truy cập: `http://localhost/onlinecourse`

## Tài khoản mặc định
- **Admin**
  - Email: admin@onlinecourse.com
  - Password: admin123
  - Role: Quản trị viên

## Cấu trúc dự án

```
onlinecourse/
├── assets/               # CSS, JS, Images
│   ├── css/
│   ├── js/
│   └── images/
├── config/              # Database configuration
├── controllers/         # Logic controllers
├── models/              # Database models
├── views/               # HTML templates
│   ├── admin/
│   ├── auth/
│   ├── courses/
│   ├── home/
│   ├── instructor/
│   ├── layouts/
│   └── student/
├── uploads/             # User uploaded files
├── index.php           # Entry point
└── database.sql        # Database schema
```

## Tính năng chính

### Học viên (Role: 0)
- Xem danh sách khóa học
- Tìm kiếm và lọc khóa học theo danh mục
- Xem chi tiết khóa học
- Đăng ký khóa học
- Xem các khóa học đã đăng ký
- Theo dõi tiến độ học tập
- Xem bài học và tài liệu
- Cập nhật thông tin cá nhân

### Giảng viên (Role: 1)
- Đăng nhập/đăng xuất
- Tạo, chỉnh sửa, xóa khóa học
- Quản lý bài học (tạo, sửa, xóa)
- Tải lên tài liệu học tập
- Xem danh sách học viên đã đăng ký
- Theo dõi tiến độ của từng học viên
- Cập nhật thông tin cá nhân

### Quản trị viên (Role: 2)
- Quản lý người dùng (xem, kích hoạt, vô hiệu hóa, xóa)
- Quản lý danh mục khóa học (tạo, sửa, xóa)
- Xem thống kê sử dụng hệ thống
- Duyệt phê duyệt khóa học mới
- Quản lý trạng thái khóa học

## Các endpoint chính

### Xác thực
- `GET index.php?controller=Auth&action=login` - Trang đăng nhập
- `GET index.php?controller=Auth&action=register` - Trang đăng ký
- `GET index.php?controller=Auth&action=logout` - Đăng xuất
- `GET index.php?controller=Auth&action=profile` - Thông tin cá nhân

### Khóa học
- `GET index.php?controller=Course&action=index` - Danh sách khóa học
- `GET index.php?controller=Course&action=detail&id=1` - Chi tiết khóa học

### Học viên
- `GET index.php?controller=Student&action=dashboard` - Dashboard học viên
- `GET index.php?controller=Student&action=myCourses` - Khóa học của tôi
- `GET index.php?controller=Student&action=courseProgress&courseId=1` - Tiến độ khóa học
- `GET index.php?controller=Student&action=lessonView&lessonId=1` - Xem bài học

### Giảng viên
- `GET index.php?controller=Instructor&action=dashboard` - Dashboard giảng viên
- `GET index.php?controller=Instructor&action=myCourses` - Khóa học của tôi
- `GET index.php?controller=Instructor&action=createCourse` - Tạo khóa học
- `GET index.php?controller=Instructor&action=editCourse&courseId=1` - Chỉnh sửa khóa học
- `GET index.php?controller=Instructor&action=manageLessons&courseId=1` - Quản lý bài học

### Quản trị viên
- `GET index.php?controller=Admin&action=dashboard` - Dashboard quản trị
- `GET index.php?controller=Admin&action=users` - Quản lý người dùng
- `GET index.php?controller=Admin&action=categories` - Quản lý danh mục
- `GET index.php?controller=Admin&action=approveCourses` - Duyệt khóa học
- `GET index.php?controller=Admin&action=statistics` - Thống kê

## Công nghệ sử dụng
- **Backend**: PHP (MVC Architecture)
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Framework CSS**: Bootstrap 5.3
- **Icons**: FontAwesome 6.4

## Bảo mật
- Mật khẩu được mã hóa bằng `password_hash` và `password_verify`
- Session quản lý xác thực người dùng
- Prepared statements để ngăn SQL injection
- Input validation và sanitization

## Tính năng mở rộng trong tương lai
- Thanh toán trực tuyến
- Chứng chỉ hoàn thành khóa học
- Đánh giá và bình luận
- Thông báo qua email
- Video streaming
- Live class
- Forum thảo luận

## Liên hệ hỗ trợ
Email: support@onlinecourse.com
Phone: +84 123 456 789

## License
MIT License
