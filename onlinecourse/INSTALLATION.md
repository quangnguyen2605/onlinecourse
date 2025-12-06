# Hướng dẫn cài đặt Online Course Platform

## 1. Yêu cầu hệ thống
- PHP 8.0+
- MySQL 5.7+
- Apache với mod_rewrite (tùy chọn)

## 2. Cài đặt cơ sở dữ liệu
- Truy cập phpMyAdmin (http://localhost/phpmyadmin)
- Tạo database mới có tên: **onlinecourse**
- Chọn database vừa tạo, rồi vào tab "Import"
- Chọn file `database.sql` từ thư mục gốc
- Nhấn "Import"

## 3. Kiểm tra kết nối
- Kiểm tra Database.php nếu cần sửa thông tin kết nối:
  - host: localhost
  - dbName: onlinecourse
  - username: root
  - password: (để trống nếu root không có password)

## 4. Truy cập ứng dụng
- Đặt thư mục `onlinecourse` vào htdocs (XAMPP) hoặc www (WAMP)
- Truy cập: http://localhost/onlinecourse/

## 5. Tài khoản mặc định
- **Admin**: admin@example.com / admin123
- **Instructor**: instructor@example.com / instructor123
- **Student**: student@example.com / student123

## 6. Troubleshooting

### Lỗi 404
- Kiểm tra index.php có trong thư mục gốc không
- Kiểm tra URL có đúng không: http://localhost/onlinecourse/

### Lỗi Database Connection
- Kiểm tra MySQL đã chạy chưa
- Kiểm tra database `onlinecourse` đã được tạo chưa
- Kiểm tra thông tin kết nối trong config/Database.php

### Session không hoạt động
- Kiểm tra thư mục session có khả năng ghi không
- Kiểm tra php.ini session settings

## 7. Cấu trúc thư mục
```
onlinecourse/
├── index.php (router chính)
├── config/
│   └── Database.php
├── controllers/
│   ├── HomeController.php
│   ├── AuthController.php
│   ├── StudentController.php
│   ├── InstructorController.php
│   ├── AdminController.php
│   ├── CourseController.php
│   └── EnrollmentController.php
├── models/
│   ├── User.php
│   ├── Course.php
│   ├── Category.php
│   ├── Lesson.php
│   ├── Material.php
│   └── Enrollment.php
├── views/
│   └── [các template hiển thị]
└── assets/
    ├── css/
    └── js/
```
