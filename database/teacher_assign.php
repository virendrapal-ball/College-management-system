INSERT INTO student_subject_teacher
(student_id, teacher_id, subject_name)

SELECT
    s.reg_id,
    t.reg_id,
    s.course

FROM reg s
JOIN reg t
    ON s.course = t.course

WHERE s.role = 'Student'
AND t.role = 'Teacher';