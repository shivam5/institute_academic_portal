INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c1','c1',1,2,3);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c2','c2',2,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c3','c3',2,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c4','c4',1,2,2);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c5','c5',2,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c6','c6',2,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c7','c7',3,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c8','c8',3,2,0);
INSERT INTO `courses`(`id`, `name`, `l`, `t`, `p`) VALUES ('c9','c9',2,2,1);




INSERT INTO `department`(`name`) VALUES ('CS');

INSERT INTO `faculty`(`id`, `name`, `phone`, `department_name`, `joining_date`, `leaving_date`) VALUES ('f1','f1','1001010011' ,'CS','2015-01-01',NULL);
INSERT INTO `faculty`(`id`, `name`, `phone`, `department_name`, `joining_date`, `leaving_date`) VALUES ('f2','f2','1001010011' ,'CS','2015-01-01',NULL);
INSERT INTO `faculty`(`id`, `name`, `phone`, `department_name`, `joining_date`, `leaving_date`) VALUES ('f3','f3','1001010011' ,'CS','2015-01-01',NULL);
INSERT INTO `faculty`(`id`, `name`, `phone`, `department_name`, `joining_date`, `leaving_date`) VALUES ('f4','f4','1001010011' ,'CS','2015-01-01',NULL);
INSERT INTO `faculty`(`id`, `name`, `phone`, `department_name`, `joining_date`, `leaving_date`) VALUES ('f5','f5','1001010011' ,'CS','2015-01-01',NULL);


INSERT INTO `batch`(`year`, `advisor_id`, `department_name`) VALUES (2015,'f1','CS');
INSERT INTO `batch`(`year`, `advisor_id`, `department_name`) VALUES (2016,'f2','CS');


INSERT INTO `semesters`(`year`, `semester`, `status`, `sem_id`) VALUES (2015,'fall',1,1);


INSERT INTO `students`(`entry_no`, `name`, `phone`, `dob`, `is_probated`, `batch_year`, `dept_name`) VALUES ('s1','s1','101','1997-01-01',0,2015,'CS');
INSERT INTO `students`(`entry_no`, `name`, `phone`, `dob`, `is_probated`, `batch_year`, `dept_name`) VALUES ('s2','s2','101','1997-01-01',0,2015,'CS');
INSERT INTO `students`(`entry_no`, `name`, `phone`, `dob`, `is_probated`, `batch_year`, `dept_name`) VALUES ('s3','s3','101','1997-01-01',0,2015,'CS');
INSERT INTO `students`(`entry_no`, `name`, `phone`, `dob`, `is_probated`, `batch_year`, `dept_name`) VALUES ('s4','s4','101','1997-01-01',1,2015,'CS');


set @b='';
call cal_creditlim('s1',@b);
select @b;



INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c1',2015,'fall',4,0,'f1','A1','L1');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c2',2015,'fall',4,0,'f2','A2','L2');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c3',2015,'fall',4,0,'f3','A3','L3');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c4',2015,'fall',4,0,'f4','A4','L4');




INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c1',2015,'fall',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c2',2015,'fall',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c3',2015,'fall',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c4',2015,'fall',2015,'CS');




INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c1',2015,'fall');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c2',2015,'fall');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c3',2015,'fall');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c4',2015,'fall');

INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s2','c2',2015,'fall');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s2','c3',2015,'fall');

INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s3','c2',2015,'fall');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s3','c4',2015,'fall');



INSERT INTO `semesters`(`year`, `semester`, `status`, `sem_id`) VALUES (2016,'spring',1,2);



INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c5',2016,'spring',4,0,'f1','A1','L1');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c6',2016,'spring',4,0,'f2','A2','L2');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c7',2016,'spring',4,0,'f3','A3','L3');
INSERT INTO `offered_courses`(`course_id`, `year`, `semester`, `student_limit`, `cgpa_required`, `course_instructor_id`, `time_slot_id`, `lecture_hall`) VALUES ('c8',2016,'spring',4,0,'f4','A4','L4');

INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c5',2016,'spring',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c6',2016,'spring',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c7',2016,'spring',2015,'CS');
INSERT INTO `batches_allowed`(`course_offered_id`, `year_course`, `semester_course`, `batch_year`, `batch_dept`) VALUES ('c8',2016,'spring',2015,'CS');

create table transcript_s1(
  course_id varchar(10),
  course_year integer,
  course_sem varchar(10),
  grade integer,
  credits decimal(4,2)
);

create table transcript_s2(
  course_id varchar(10),
  course_year integer,
  course_sem varchar(10),
  grade integer,
  credits decimal(4,2)
);
create table transcript_s3(
  course_id varchar(10),
  course_year integer,
  course_sem varchar(10),
  grade integer,
  credits decimal(4,2)
);
create table transcript_s4(
  course_id varchar(10),
  course_year integer,
  course_sem varchar(10),
  grade integer,
  credits decimal(4,2)
);



INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c1',2015,'fall',9,4.5);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c2',2015,'fall',6,4);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c3',2015,'fall',8,4);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c4',2015,'fall',7,4);


INSERT INTO `transcript_s2`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c2',2015,'fall',3,4);
INSERT INTO `transcript_s2`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c3',2015,'fall',7,4);


INSERT INTO `transcript_s3`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c2',2015,'fall',8,4);
INSERT INTO `transcript_s3`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c4',2015,'fall',7,4);


INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c5',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c6',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c7',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s1','c8',2016,'spring');


INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s2','c5',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s2','c6',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s2','c7',2016,'spring');

INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s3','c5',2016,'spring');
INSERT INTO `course_registrations`(`student_entry_no`, `course_offered_id`, `year_course`, `semester_course`) VALUES ('s3','c7',2016,'spring');



INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c5',2016,'spring',8,4);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c6',2016,'spring',7,4);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c7',2016,'spring',7,5);
INSERT INTO `transcript_s1`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c8',2016,'spring',8,5);


INSERT INTO `transcript_s2`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c5',2016,'spring',9,4);
INSERT INTO `transcript_s2`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c6',2016,'spring',6,4);
INSERT INTO `transcript_s2`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c7',2016,'spring',7,5);


INSERT INTO `transcript_s3`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c5',2016,'spring',8,4);
INSERT INTO `transcript_s3`(`course_id`, `course_year`, `course_sem`, `grade`, `credits`) VALUES ('c7',2016,'spring',8,5);


INSERT INTO `semesters`(`year`, `semester`, `status`, `sem_id`) VALUES (2016,'fall',1,3);
