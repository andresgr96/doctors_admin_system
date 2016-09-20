<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Doctor.php";

    $server = 'mysql:host=localhost:8889;dbname=doctor_office';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class DoctorTest extends PHPUnit_Framework_TestCase {

        protected function tearDown()
        {
            Doctor::deleteAll();
        }

        function test_save() {

            //ARRANGE
            $doctor_id = null;
            $doctor_name = "Andres";
            $doctor_specialty = "Cardiology";
            $test_doctor = new Doctor($doctor_id, $doctor_name, $doctor_specialty);
            $test_doctor->save();
            //ACT
            $result = Doctor::getAll();

            //ASSERT
            $this->assertEquals($test_doctor, $result[0]);

        }

    }

?>
