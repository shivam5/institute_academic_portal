<?php
$servername = "localhost";
$username = "root";
$password = "13188";
$dbname = "academic_portal";

// Creating a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sql commands to create table
$sql_query = "CREATE TABLE courses (
id varchar(10) not null,
name varchar(50) not null,
l integer not null,
t integer not null,
p integer not null,
PRIMARY KEY (id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "Courses table created successfully\n");
}
else {
    echo nl2br( "Error creating courses table: " . mysqli_error($conn). "\n");
}



$sql_query = "CREATE TABLE prerequisite (
original_couse_id varchar(10),
prerequisite_course_id varchar(10),
PRIMARY KEY (original_couse_id, prerequisite_course_id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "prerequisite table created successfully\n");
}
else {
    echo nl2br( "Error creating prerequisite table: " . mysqli_error($conn). "\n");
}




$sql_query = "CREATE TABLE department (
name varchar(20),
PRIMARY KEY (name)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "department table created successfully\n");
}
else {
    echo nl2br( "Error creating department table: " . mysqli_error($conn). "\n");
}


$sql_query = "CREATE TABLE faculty (
id varchar(10) not null,
name varchar(50) not null,
phone varchar(15),
department_name varchar(20),
joining_date date not null,
leaving_date date ,
FOREIGN KEY (department_name) REFERENCES department(name),
PRIMARY KEY (id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "department table created successfully\n");
}
else {
    echo nl2br( "Error creating department table: " . mysqli_error($conn). "\n");
}





$sql_query = "CREATE TABLE offered_courses (
course_id varchar(10) not null,
year integer not null,
semester varchar(10) not null,
student_limit integer,
cgpa_required real,
course_instructor_id varchar(10),
time_slot_id char(10) not null,
lecture_hall char(10) not null,
PRIMARY KEY (course_id, year, semester),
FOREIGN KEY (course_id) REFERENCES courses(id),
FOREIGN KEY (course_instructor_id) REFERENCES faculty(id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "Offered_courses table created successfully\n");
}
else {
    echo nl2br( "Error creating offered_courses table: " . mysqli_error($conn). "\n");
}


$sql_query = "CREATE TABLE hod (
dept_name varchar(20) not null,
faculty_id varchar(10) not null,
joining_date date not null,
leaving_date date ,
FOREIGN KEY (dept_name)  REFERENCES department(name),
FOREIGN KEY (faculty_id)  REFERENCES faculty(id),
PRIMARY KEY (dept_name)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "hod table created successfully\n");
}
else {
    echo nl2br( "Error creating hod table: " . mysqli_error($conn). "\n");
}

$sql_query = "CREATE TABLE staff_deans_office (
id varchar(10),
name varchar(50) not null,
joining_date date not null,
leaving_date date ,
PRIMARY KEY (id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "staff_deans_office table created successfully\n");
}
else {
    echo nl2br( "Error creating staff_deans_office table: " . mysqli_error($conn). "\n");
}


$sql_query = "CREATE TABLE batch (
year integer,
advisor_id varchar(10) not null,
department_name varchar(20),
FOREIGN KEY (advisor_id)  REFERENCES faculty(id),
FOREIGN KEY (department_name)  REFERENCES department(name),
PRIMARY KEY (year, department_name)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "batch table created successfully\n");
}
else {
    echo nl2br( "Error creating batch table: " . mysqli_error($conn). "\n");
}


$sql_query = "CREATE TABLE batches_allowed (
course_offered_id varchar(10) not null,
year_course integer not null,
semester_course varchar(10) not null,
batch_year integer not null,
batch_dept varchar(20) not null,
FOREIGN KEY (course_offered_id, year_course, semester_course)  REFERENCES offered_courses(course_id, year, semester),
FOREIGN KEY (batch_dept, batch_year)  REFERENCES batch(department_name, year),
PRIMARY KEY (course_offered_id, year_course, semester_course, batch_year, batch_dept)
)";


if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "batches_allowed table created successfully\n");
}
else {
    echo nl2br( "Error creating batches_allowed table: " . mysqli_error($conn). "\n");
}



$sql_query = "CREATE TABLE students (
entry_no varchar(10),
name varchar(50) not null,
phone varchar(15),
dob date not null,
is_probated tinyint,
batch_year integer not null,
dept_name varchar(20) not null,
FOREIGN KEY (batch_year, dept_name) REFERENCES batch(year, department_name),
PRIMARY KEY (entry_no)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "students table created successfully\n");
}
else {
    echo nl2br( "Error creating students table: " . mysqli_error($conn). "\n");
}


$sql_query = "CREATE TABLE course_registrations (
student_entry_no varchar(10),
course_offered_id varchar(10) not null,
year_course integer not null,
semester_course varchar(10) not null,
FOREIGN KEY (course_offered_id, year_course, semester_course)  REFERENCES offered_courses(course_id, year, semester),
PRIMARY KEY (student_entry_no, course_offered_id, year_course, semester_course)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "course_registrations table created successfully\n");
}
else {
    echo nl2br( "Error creating course_registrations table: " . mysqli_error($conn). "\n");
}




$sql_query = "CREATE TABLE dean_academics (
  id varchar(10) not null,
  joining_date date not null,
  leaving_date date ,
  FOREIGN KEY (id)  REFERENCES faculty(id),
  PRIMARY KEY (id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "dean_academics table created successfully\n");
}
else {
    echo nl2br( "Error creating dean_academics table: " . mysqli_error($conn). "\n");
}







$sql_query = "CREATE TABLE ticket (
  ticket_id varchar(10) not null,
  student_id varchar(10),
  instructor_id varchar(10) not null,
  advisor_id varchar(10) not null,
  hod_id varchar(10) not null,
  dean_id varchar(10) not null,
  status tinyint,
  current_holder varchar(10),
  course_offered_id varchar(10) not null,
  year_course integer not null,
  semester_course varchar(10) not null,
  FOREIGN KEY (course_offered_id, year_course, semester_course)  REFERENCES offered_courses(course_id, year, semester),
  FOREIGN KEY (student_id)  REFERENCES students(entry_no),
  FOREIGN KEY (advisor_id)  REFERENCES faculty(id),
  FOREIGN KEY (instructor_id)  REFERENCES faculty(id),
  FOREIGN KEY (hod_id)  REFERENCES faculty(id),
  FOREIGN KEY (dean_id)  REFERENCES dean_academics(id),
  PRIMARY KEY (ticket_id)
)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "ticket table created successfully\n");
}
else {
    echo nl2br( "Error creating ticket table: " . mysqli_error($conn). "\n");
}



$sql_query = "CREATE TABLE semesters (
  year integer not null,
  semester varchar(10) not null,
  status tinyint,
  sem_id integer not null AUTO_INCREMENT,
  PRIMARY KEY (sem_id)

)";

if (mysqli_query($conn, $sql_query)) {
    echo nl2br( "semesters table created successfully\n");
}
else {
    echo nl2br( "Error creating semesters table: " . mysqli_error($conn). "\n");
}





mysqli_close($conn);
?>
