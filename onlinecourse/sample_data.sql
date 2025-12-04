-- Sample Data for OnlineCourse System

-- Insert Categories
INSERT INTO categories (name, description) VALUES
('Lập trình Web', 'Các khóa học về HTML, CSS, JavaScript, PHP, React, Vue.js'),
('Lập trình Mobile', 'Swift, Kotlin, React Native, Flutter'),
('Data Science', 'Python, Machine Learning, Data Analysis, SQL'),
('DevOps', 'Docker, Kubernetes, CI/CD, Cloud Computing'),
('UI/UX Design', 'Figma, Adobe XD, Design Principles'),
('Database', 'MySQL, MongoDB, PostgreSQL, Database Design');

-- Insert Users (Students, Instructors, Admin)
INSERT INTO users (username, email, password, fullname, role, status) VALUES
-- Admin
('admin', 'admin@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Admin System', 2, 'active'),

-- Instructors
('nguyenvana', 'nguyenvana@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Nguyễn Văn An', 1, 'active'),
('tranvanb', 'tranvanb@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Trần Văn Bình', 1, 'active'),
('levanc', 'levanc@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Lê Văn Cường', 1, 'active'),

-- Students
('hovand', 'hovand@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hồ Văn Dũng', 0, 'active'),
('phamthie', 'phamthie@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Phạm Thị E', 0, 'active'),
('lethif', 'lethif@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Lê Thị F', 0, 'active'),
('dangvang', 'dangvang@onlinecourse.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Đặng Văn G', 0, 'active');

-- Insert Courses
INSERT INTO courses (title, description, instructor_id, category_id, price, duration_weeks, level, status) VALUES
-- Web Development Courses
('HTML & CSS Fundamentals', 'Khóa học cơ bản về HTML và CSS cho người mới bắt đầu. Học cách xây dựng giao diện web từ đầu.', 1, 1, 299000, 4, 'Beginner', 'approved'),
('JavaScript Complete Guide', 'Học JavaScript từ cơ bản đến nâng cao. ES6+, DOM, AJAX, Promise, Async/Await.', 1, 1, 599000, 8, 'Intermediate', 'approved'),
('React.js Masterclass', 'Xây dựng ứng dụng web hiện đại với React.js. Hooks, Redux, Router, Testing.', 2, 1, 899000, 10, 'Intermediate', 'approved'),
('PHP & MySQL for Beginners', 'Lập trình backend với PHP và MySQL. Xây dựng website động hoàn chỉnh.', 1, 1, 499000, 6, 'Beginner', 'approved'),
('Vue.js 3 Complete Course', 'Học Vue.js 3 từ A-Z. Composition API, Vuex, Vue Router, Project deployment.', 2, 1, 799000, 8, 'Intermediate', 'pending'),

-- Mobile Development Courses  
('Swift iOS Development', 'Lập trình ứng dụng iOS với Swift. UIKit, SwiftUI, Core Data, Firebase.', 3, 2, 1299000, 12, 'Intermediate', 'approved'),
('Kotlin Android Development', 'Xây dựng ứng dụng Android với Kotlin. Activities, Fragments, Room, Retrofit.', 3, 2, 1199000, 12, 'Intermediate', 'approved'),
('React Native Mobile Apps', 'Phát triển cross-platform apps với React Native. Navigation, Redux, Native Modules.', 2, 2, 999000, 10, 'Intermediate', 'pending'),

-- Data Science Courses
('Python for Data Science', 'Python cơ bản cho Data Science. NumPy, Pandas, Matplotlib, Jupyter.', 1, 3, 699000, 8, 'Beginner', 'approved'),
('Machine Learning Fundamentals', 'Học Machine Learning với Python. Supervised, Unsupervised, Deep Learning basics.', 2, 3, 1499000, 12, 'Advanced', 'approved'),
('SQL Database Mastery', 'Thành thạo SQL. Query optimization, Database design, Normalization.', 3, 6, 399000, 4, 'Intermediate', 'approved'),

-- DevOps Courses
('Docker & Kubernetes', 'Containerization và Orchestration. Docker, Kubernetes, Helm, Service Mesh.', 3, 4, 1599000, 14, 'Advanced', 'pending'),
('CI/CD Pipeline with Jenkins', 'Xây dựng pipeline CI/CD. Jenkins, GitLab CI, Automated testing, Deployment.', 2, 4, 899000, 6, 'Intermediate', 'approved'),

-- Design Courses
('UI/UX Design Principles', 'Nguyên tắc thiết kế UI/UX. User research, Wireframing, Prototyping.', 1, 5, 499000, 6, 'Beginner', 'approved'),
('Figma for Designers', 'Sử dụng Figma chuyên nghiệp. Components, Auto Layout, Prototyping, Collaboration.', 3, 5, 399000, 4, 'Beginner', 'pending');

-- Insert Lessons for some courses
INSERT INTO lessons (course_id, title, content, video_url, `order`) VALUES
-- HTML & CSS Course
(1, 'Introduction to HTML', 'HTML là gì? Cấu trúc tài liệu HTML, các thẻ cơ bản, semantic HTML.', 'https://example.com/html-intro', 1),
(1, 'CSS Fundamentals', 'CSS selectors, properties, Box model, Display, Position.', 'https://example.com/css-basics', 2),
(1, 'Responsive Design', 'Media queries, Flexbox, Grid, Mobile-first design.', 'https://example.com/responsive', 3),
(1, 'Project: Portfolio Website', 'Xây dựng portfolio website responsive hoàn chỉnh.', 'https://example.com/portfolio-project', 4),

-- JavaScript Course
(2, 'JavaScript Basics', 'Variables, Data types, Operators, Control structures.', 'https://example.com/js-basics', 1),
(2, 'Functions and Scope', 'Function declarations, expressions, Arrow functions, Closures.', 'https://example.com/js-functions', 2),
(2, 'DOM Manipulation', 'DOM API, Event handling, Event delegation, Performance.', 'https://example.com/js-dom', 3),
(2, 'Async JavaScript', 'Callbacks, Promises, Async/Await, Error handling.', 'https://example.com/js-async', 4),

-- React Course
(3, 'React Fundamentals', 'Components, Props, State, Lifecycle methods.', 'https://example.com/react-basics', 1),
(3, 'React Hooks', 'useState, useEffect, useContext, Custom hooks.', 'https://example.com/react-hooks', 2),
(3, 'State Management with Redux', 'Redux store, Actions, Reducers, Middleware.', 'https://example.com/react-redux', 3),
(3, 'React Router', 'Routing, Navigation guards, Route parameters.', 'https://example.com/react-router', 4),

-- Python Data Science Course
(9, 'Python Basics', 'Python syntax, Data types, Control flow, Functions.', 'https://example.com/python-basics', 1),
(9, 'NumPy Fundamentals', 'Arrays, Array operations, Broadcasting, Indexing.', 'https://example.com/numpy-basics', 2),
(9, 'Pandas for Data Analysis', 'DataFrame, Series, Data cleaning, Data manipulation.', 'https://example.com/pandas-basics', 3),
(9, 'Data Visualization', 'Matplotlib, Seaborn, Plot types, Customization.', 'https://example.com/data-viz', 4);

-- Insert Sample Materials
INSERT INTO materials (lesson_id, filename, file_path, file_type) VALUES
-- HTML & CSS Materials
(1, 'HTML Cheat Sheet.pdf', 'assets/materials/html-cheat-sheet.pdf', 'pdf'),
(1, 'HTML Exercises.zip', 'assets/materials/html-exercises.zip', 'zip'),
(2, 'CSS Reference Guide.pdf', 'assets/materials/css-reference.pdf', 'pdf'),
(3, 'Responsive Design Examples.zip', 'assets/materials/responsive-examples.zip', 'zip'),

-- JavaScript Materials  
(5, 'JavaScript Notes.pdf', 'assets/materials/js-notes.pdf', 'pdf'),
(6, 'Function Exercises.js', 'assets/materials/function-exercises.js', 'javascript'),
(7, 'DOM Projects.zip', 'assets/materials/dom-projects.zip', 'zip'),

-- React Materials
(9, 'React Components Guide.pdf', 'assets/materials/react-components.pdf', 'pdf'),
(10, 'Hooks Cheat Sheet.pdf', 'assets/materials/hooks-cheat-sheet.pdf', 'pdf'),
(11, 'Redux Examples.zip', 'assets/materials/redux-examples.zip', 'zip'),

-- Python Materials
(13, 'Python Quick Reference.pdf', 'assets/materials/python-quick-ref.pdf', 'pdf'),
(14, 'NumPy Tutorial.ipynb', 'assets/materials/numpy-tutorial.ipynb', 'jupyter'),
(15, 'Pandas Exercises.zip', 'assets/materials/pandas-exercises.zip', 'zip');

-- Insert Sample Enrollments
INSERT INTO enrollments (course_id, student_id, enrolled_date, status, progress) VALUES
-- Student 4 (Hồ Văn Dũng) enrollments
(1, 4, '2024-01-15', 'active', 75),
(2, 4, '2024-01-20', 'active', 45),
(9, 4, '2024-02-01', 'active', 30),

-- Student 5 (Phạm Thị E) enrollments  
(1, 5, '2024-01-10', 'active', 100),
(3, 5, '2024-01-25', 'active', 60),
(13, 5, '2024-02-05', 'active', 20),

-- Student 6 (Lê Thị F) enrollments
(2, 6, '2024-01-12', 'active', 80),
(4, 6, '2024-01-18', 'active', 55),
(9, 6, '2024-02-03', 'active', 40),

-- Student 7 (Đặng Văn G) enrollments
(3, 7, '2024-01-22', 'active', 25),
(5, 7, '2024-01-28', 'active', 15),
(10, 7, '2024-02-08', 'active', 10);

-- Insert Lesson Progress (for enrolled students)
INSERT INTO lesson_progress (lesson_id, student_id, completed_at) VALUES
-- Student 4 progress
(1, 4, '2024-01-16'),
(2, 4, '2024-01-17'),
(3, 4, '2024-01-18'),
(5, 4, '2024-01-21'),
(6, 4, '2024-01-22'),

-- Student 5 progress  
(1, 5, '2024-01-11'),
(2, 5, '2024-01-12'),
(3, 5, '2024-01-13'),
(4, 5, '2024-01-14'),
(9, 5, '2024-02-02'),
(10, 5, '2024-02-03'),

-- Student 6 progress
(1, 6, '2024-01-13'),
(2, 6, '2024-01-14'),
(3, 6, '2024-01-15'),
(5, 6, '2024-01-13'),
(6, 6, '2024-01-14'),
(7, 6, '2024-01-15'),

-- Student 7 progress
(9, 7, '2024-02-04'),
(10, 7, '2024-02-05');
