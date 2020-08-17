CREATE TABLE student_bio (
student_id INT(10) AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
gender   varchar(3)  NOT NULL,
DOB      DATE        NOT NULL,
country  varchar(30) NOT NULL,
region   varchar(30) NULL,       
reg_date DATETIME NOT NULL
);
CREATE TABLE student_account (
acc_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
username VARCHAR(20) NOT NULL,
password VARCHAR(10) NOT NULL,
email VARCHAR(50) NOT NULL,
acc_status varchar(10) NOT NULL,
CONSTRAINT fk_student1
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE student_academics(
school_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
university VARCHAR(50) NOT NULL,
college    VARCHAR(50) NULL,
school     VARCHAR(50) NULL,
department VARCHAR(50) NULL,
level      VARCHAR(10) NOT NULL,
FOS        VARCHAR(50) NOT NULL,
P_title    VARCHAR(50) NOT NULL,
duration   int(1)      NOT NULL,
YOS        INT(1)      NOT NULL,
CONSTRAINT fk_student2
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)       
);
CREATE TABLE study_field(
fi_id INT(10) AUTO_INCREMENT PRIMARY KEY,
fi_title VARCHAR(30) NOT NULL
);
CREATE TABLE study_subject(
sub_id INT(10) AUTO_INCREMENT PRIMARY KEY,
fi_id INT(10),
sub_title VARCHAR(40) NOT NULL,
CONSTRAINT fk_field
FOREIGN KEY (fi_id) 
REFERENCES study_field(fi_id)
);
CREATE TABLE stud_partner(
part_id INT(10) AUTO_INCREMENT PRIMARY KEY,
requester_id INT(10),
student_id INT(10),
status VARCHAR(10) NOT NULL,
requesttime DATETIME NOT NULL,
accepttime DATETIME NOT NULL,
CONSTRAINT fk_student8
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_student9
FOREIGN KEY (requester_id) 
REFERENCES student_bio(student_id)
);

CREATE TABLE stud_material(
mat_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
mat_loc VARCHAR(20) NOT NULL,
mat_title VARCHAR(40) NOT NULL,
uploadtime DATETIME NOT NULL,
CONSTRAINT fk_student3
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE stud_chat(
chat_id INT(10) AUTO_INCREMENT PRIMARY KEY,
sender_id INT(10),
receiver_id INT(10),
mat_id INT(10),
message VARCHAR(1000) NOT NULL,
sendtime DATETIME NOT NULL,
status VARCHAR(10) NOT NULL,
CONSTRAINT fk_chatmat
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id),
CONSTRAINT fk_studentchat1
FOREIGN KEY (sender_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_studentchat2
FOREIGN KEY (receiver_id) 
REFERENCES student_bio(student_id)
);

CREATE TABLE mat_shares(
share_id INT(10) AUTO_INCREMENT PRIMARY KEY,
mat_id INT(10),
source_id INT(10),
receiver_id INT(10),
sharedtime DATETIME NOT NULL,
CONSTRAINT fk_student4
FOREIGN KEY (source_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_student5
FOREIGN KEY (receiver_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_mat1
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id)
);
CREATE TABLE groups(
group_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
group_name VARCHAR(20) NOT NULL,
group_icon VARCHAR(15) NULL,
group_desc VARCHAR(200) NULL,
createdate DATETIME NOT NULL,
CONSTRAINT fk_student6
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE group_member(
gmember_id INT(10) AUTO_INCREMENT PRIMARY KEY,
group_id INT(10),
student_id INT(10),
membertime DATETIME NOT NULL,
CONSTRAINT fk_student7
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_group1
FOREIGN KEY (group_id) 
REFERENCES groups(group_id)
);
CREATE TABLE group_session(
session_id INT(10) AUTO_INCREMENT PRIMARY KEY,
session_title VARCHAR(30) NOT NULL,
group_id INT(10),
mat_id INT(10),
start_time DATETIME NOT NULL,
finish_time DATETIME NOT NULL,
rotate_method VARCHAR(10),
status VARCHAR(10) NOT NULL,
CONSTRAINT fk_group2
FOREIGN KEY (group_id) 
REFERENCES groups(group_id),
CONSTRAINT fk_mat2
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id)
);
CREATE TABLE group_shares(
share_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
mat_id INT(10),
group_id INT(10),
sharedate DATETIME NOT NULL,
CONSTRAINT fk_mat3
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id),
CONSTRAINT fk_group3
FOREIGN KEY (group_id) 
REFERENCES groups(group_id),
CONSTRAINT fk_studentshare1
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE group_chat(
gchat_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
mat_id INT(10),
group_id INT(10),
sentdate DATETIME NOT NULL,
CONSTRAINT fk_mat4
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id),
CONSTRAINT fk_group5
FOREIGN KEY (group_id) 
REFERENCES groups(group_id),
CONSTRAINT fk_student11
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE reports(
report_id INT(10) AUTO_INCREMENT PRIMARY KEY,
reporter_id INT(10),
reported_id INT(10),
share_id INT(10),
report_target VARCHAR(10),
reportdate DATETIME NOT NULL,
CONSTRAINT fk_student17
FOREIGN KEY (reporter_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_student18
FOREIGN KEY (reported_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE notification(
not_id INT(10) AUTO_INCREMENT PRIMARY KEY,
not_type VARCHAR(20) NOT NULL,
not_content VARCHAR(500) NOT NULL,
created_date DATETIME NOT NULL
);
CREATE TABLE stud_notif(
notif_id INT(10) AUTO_INCREMENT PRIMARY KEY,
not_id INT(10),
student_id INT(10),
status VARCHAR(10),
CONSTRAINT fk_notif
FOREIGN KEY (not_id) 
REFERENCES notification(not_id),
CONSTRAINT fk_student12
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE stud_session(
session_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
partner_id INT(10),
start_time DATETIME NOT NULL,
end_time   DATETIME NOT NULL,
status VARCHAR(10) NOT NULL,
CONSTRAINT fk_student13
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_student14
FOREIGN KEY (partner_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE thread(
th_id INT(10) AUTO_INCREMENT PRIMARY KEY,
student_id INT(10),
mat_id INT(10),
th_title VARCHAR(60) NOT NULL,
th_content VARCHAR(1000) NOT NULL,
create_date DATETIME NOT NULL,
CONSTRAINT fk_mat6
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id),
CONSTRAINT fk_student15
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id)
);
CREATE TABLE replies(
rep_id INT(10) AUTO_INCREMENT PRIMARY KEY,
th_id INT(10),
student_id INT(10),
mat_id INT(10),
rep_content VARCHAR(1000) NOT NULL,
rep_date DATETIME NOT NULL,
CONSTRAINT fk_mat7
FOREIGN KEY (mat_id) 
REFERENCES stud_material(mat_id),
CONSTRAINT fk_student16
FOREIGN KEY (student_id) 
REFERENCES student_bio(student_id),
CONSTRAINT fk_th
FOREIGN KEY (th_id) 
REFERENCES thread(th_id)
);








