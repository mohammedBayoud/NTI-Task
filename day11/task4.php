<?php
class Course {
    private $title;
    private $instructor;
    private $course_code;

    public function __construct($title, $instructor, $course_code) {
        $this->title = $title;
        $this->instructor = $instructor;
        $this->course_code = $course_code;
    }

    public function describe() {
        echo "The course is :  " . $this->title . "<br>";
        echo "The instructor is : " . $this->instructor . "<br>";
        echo "Course Code : " . $this->course_code . "<br>";
    }

    public function getTitle() {
        return $this->title;
    }

    public function getInstructor() {
        return $this->instructor;
    }

    public function getCourseCode() {
        return $this->course_code;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setInstructor($instructor) {
        $this->instructor = $instructor;
    }

    public function setCourseCode($course_code) {
        $this->course_code = $course_code;
    }
}

$course = new Course("Introduction to PHP", "Mohammed", "CS");
$course->describe();

$course->setTitle("Advanced PHP Programming");
$course->setInstructor("Mogdy");
$course->describe();
?>