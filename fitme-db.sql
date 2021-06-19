-- Create A new User Commands
-- CREATE USER fitme IDENTIFIED BY 1234;
-- GRANT CONNECT, RESOURCE, DBA TO fitme;
-- GRANT CREATE SESSION TO fitme;
-- GRANT UNLIMITED TABLESPACE TO fitme;

-- Create Table Commands

CREATE TABLE user_type(
    type_id NUMBER(9) PRIMARY KEY,
    name VARCHAR2(50)
);

CREATE TABLE users(
    user_id NUMBER(9) PRIMARY KEY,
    user_type NUMBER(9),
    CONSTRAINT fk_user_usertype FOREIGN KEY (user_type) REFERENCES user_type(type_id),
    first_name VARCHAR2(50),
    last_name VARCHAR2(50),
    email VARCHAR2(200),
    gender VARCHAR2(50),
    age NUMBER(9),
    height FLOAT(9),
    weight FLOAT(9),
    bmi FLOAT(9),
    register_date DATE
);

CREATE TABLE equipment(
    equipment_id NUMBER(9) PRIMARY KEY,
    name VARCHAR2(50)
);

CREATE TABLE nutrient(
    nutrient_id NUMBER(9) PRIMARY KEY,
    name VARCHAR2(50)
);

CREATE TABLE workout(
    workout_id NUMBER(9) PRIMARY KEY,
    name VARCHAR2(50)
);

CREATE TABLE exercise(
    exercise_id NUMBER(9) PRIMARY KEY,
    name VARCHAR2(50),
    muscle_group VARCHAR2(50)
);

CREATE TABLE user_workout(
    user_workout_id NUMBER(9) PRIMARY KEY,
    user_id NUMBER(9),
    workout_id NUMBER(9),
    CONSTRAINT fk_userworkout_user FOREIGN KEY (user_id) REFERENCES users(user_id),
    CONSTRAINT fk_userworkout_workout FOREIGN KEY (workout_id) REFERENCES workout(workout_id),
    creation_date DATE
);

CREATE TABLE exercise_equipment(
    exercise_id NUMBER(9),
    equipment_id NUMBER(9),
    CONSTRAINT fk_exerciseequipment_exercise FOREIGN KEY (exercise_id) REFERENCES exercise(exercise_id),
    CONSTRAINT fk_exerciseequipment_equipment FOREIGN KEY (equipment_id) REFERENCES equipment(equipment_id)
);

CREATE TABLE workout_exercise(
    workout_exercise_id NUMBER(9) PRIMARY KEY,
    workout_id NUMBER(9),
    exercise_id NUMBER(9),
    target_reps NUMBER(9),
    CONSTRAINT fk_workoutexercise_workout FOREIGN KEY (workout_id) REFERENCES workout(workout_id),
    CONSTRAINT fk_workoutexercise_exercise FOREIGN KEY (exercise_id) REFERENCES exercise(exercise_id)
);

CREATE TABLE nutrient_plan(
    id NUMBER(9) PRIMARY KEY,
    workout_id NUMBER(9),
    nutrient_id NUMBER(9), 
    amount FLOAT(9),
    CONSTRAINT fk_nutrientplan_workout FOREIGN KEY (workout_id) REFERENCES workout(workout_id),
    CONSTRAINT fk_nutrientplan_nutrient FOREIGN KEY (nutrient_id) REFERENCES nutrient(nutrient_id)
);

CREATE TABLE exercise_log(
    exercise_log_id NUMBER(9) PRIMARY KEY,
    user_id NUMBER(9),
    workout_id NUMBER(9),
    exercise_id NUMBER(9),
    exercise_date DATE,
    reps_completed NUMBER(9),
    weight_loss FLOAT(9),
    bmi_change FLOAT(9),
    muscle_gain FLOAT(9),
    CONSTRAINT fk_exeriselog_workout FOREIGN KEY (workout_id) REFERENCES workout(workout_id),
    CONSTRAINT fk_exeriselog_exercise FOREIGN KEY (exercise_id) REFERENCES exercise(exercise_id),
    CONSTRAINT fk_exeriselog_users FOREIGN KEY (user_id) REFERENCES users(user_id),
);

-- Create Sequences for AutoIncrement
CREATE SEQUENCE user_types_seq START WITH 1;
CREATE SEQUENCE users_seq START WITH 1;
CREATE SEQUENCE equipment_seq START WITH 1;
CREATE SEQUENCE nutrient_seq START WITH 1;
CREATE SEQUENCE workout_seq START WITH 1;
CREATE SEQUENCE exercise_seq START WITH 1;
CREATE SEQUENCE user_workout_seq START WITH 1;
CREATE SEQUENCE workout_exercise_seq START WITH 1;
CREATE SEQUENCE nutrient_plan_seq START WITH 1;
CREATE SEQUENCE exercise_log_seq START WITH 1;

-- Creating PL-SQL Triggers for AutoIncrement

-- CREATE OR REPLACE TRIGGER user_types_trig
-- BEFORE INSERT ON user_type
-- FOR EACH ROW
-- BEGIN
--   SELECT user_types_seq.NEXTVAL
--   INTO   :new.type_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER users_trig
-- BEFORE INSERT ON users
-- FOR EACH ROW
-- BEGIN
--   SELECT users_seq.NEXTVAL
--   INTO   :new.user_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER equipment_trig
-- BEFORE INSERT ON equipment
-- FOR EACH ROW
-- BEGIN
--   SELECT equipment_seq.NEXTVAL
--   INTO   :new.equipment_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER nutrient_trig
-- BEFORE INSERT ON nutrient
-- FOR EACH ROW
-- BEGIN
--   SELECT nutrient_seq.NEXTVAL
--   INTO   :new.nutrient_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER workout_trig
-- BEFORE INSERT ON workout
-- FOR EACH ROW
-- BEGIN
--   SELECT workout_seq.NEXTVAL
--   INTO   :new.workout_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER exercise_trig
-- BEFORE INSERT ON exercise
-- FOR EACH ROW
-- BEGIN
--   SELECT exercise_seq.NEXTVAL
--   INTO   :new.exercise_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER user_workout_trig
-- BEFORE INSERT ON user_workout
-- FOR EACH ROW
-- BEGIN
--   SELECT user_workout_seq.NEXTVAL
--   INTO   :new.user_workout_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER workout_exercise_trig
-- BEFORE INSERT ON workout_exercise
-- FOR EACH ROW
-- BEGIN
--   SELECT workout_exercise_seq.NEXTVAL
--   INTO   :new.workout_exercise_id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER nutrient_plan_trig
-- BEFORE INSERT ON nutrient_plan
-- FOR EACH ROW
-- BEGIN
--   SELECT nutrient_plan_seq.NEXTVAL
--   INTO   :new.id
--   FROM   dual;
-- END;
-- /

-- CREATE OR REPLACE TRIGGER exercise_log_trig
-- BEFORE INSERT ON exercise_log
-- FOR EACH ROW
-- BEGIN
--   SELECT exercise_log_seq.NEXTVAL
--   INTO   :new.exercise_log_id
--   FROM   dual;
-- END;
-- /

-- Insert Default Data

INSERT INTO user_type (name) VALUES ('Member');
INSERT INTO user_type (name) VALUES ('Instructor');

INSERT INTO exercise (name, muscle_group) VALUES ('Squat', 'Abdominals');
INSERT INTO exercise (name, muscle_group) VALUES ('Leg Press', 'Gluteus');
INSERT INTO exercise (name, muscle_group) VALUES ('Lunge', 'Quadriceps');
INSERT INTO exercise (name, muscle_group) VALUES ('Deadlift', 'Lower Back');
INSERT INTO exercise (name, muscle_group) VALUES ('Leg Extension', 'Quadriceps');
INSERT INTO exercise (name, muscle_group) VALUES ('Push Ups', 'Triceps');
INSERT INTO exercise (name, muscle_group) VALUES ('Pull Ups', 'Lats');
INSERT INTO exercise (name, muscle_group) VALUES ('Crunch', 'Abdominals');

INSERT INTO equipment (name) VALUES ('Loaded Leg Press Machine');
INSERT INTO equipment (name) VALUES ('Barbell Bar');
INSERT INTO equipment (name) VALUES ('Squat Bench');
INSERT INTO equipment (name) VALUES ('Leg Extension and Curl Machine');
INSERT INTO equipment (name) VALUES ('Pull Up Bar');

INSERT INTO exercise_equipment (exercise_id, equipment_id) VALUES (2, 1);
INSERT INTO exercise_equipment (exercise_id, equipment_id) VALUES (4, 2);
INSERT INTO exercise_equipment (exercise_id, equipment_id) VALUES (4, 3);
INSERT INTO exercise_equipment (exercise_id, equipment_id) VALUES (5, 4);
INSERT INTO exercise_equipment (exercise_id, equipment_id) VALUES (7, 5);

INSERT INTO nutrient (name) VALUES ('Carbohydrates');
INSERT INTO nutrient (name) VALUES ('Protein');
INSERT INTO nutrient (name) VALUES ('Vitamin');
INSERT INTO nutrient (name) VALUES ('Minerals');
INSERT INTO nutrient (name) VALUES ('Fibre');
INSERT INTO nutrient (name) VALUES ('Fat');

INSERT INTO users (user_type, first_name, last_name, gender, email, age, height, weight, bmi, register_date) VALUES (2, 'Alex', 'Jones', 'male', 'alexjones@gmail.com', 24, 185, 70, 20.5, sysdate);
INSERT INTO users (user_type, first_name, last_name, gender, email, age, height, weight, bmi, register_date) VALUES (2, 'Monica', 'Geller', 'female', 'monicageller@gmail.com', 26, 170, 65, 22.5, sysdate);