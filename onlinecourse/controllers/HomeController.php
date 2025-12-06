<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Category.php';

class HomeController
{
    public function index()
    {
        $courseModel = new Course();
        $categoryModel = new Category();

        // Get published courses
        $allCourses = $courseModel->getAll();
        $courses = array_filter($allCourses, function($c) {
            return isset($c['status']) && isset($c['approved']) && 
                   $c['status'] == 'published' && $c['approved'] == 1;
        });
        $courses = array_values($courses);
        $featured = array_slice($courses, 0, 6);

        $categories = $categoryModel->getAll();

        $pageTitle = 'Online Course - Trang chủ';
        require __DIR__ . '/../views/home/index.php';
    }
}
