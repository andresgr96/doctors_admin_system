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

        function test_save() {

            //ARRANGE
            $doctor_name = "Andres";
            $doctor_specialty = "Cardiology";
            $test_doctor = new Doctor($doctor_name, $doctor_specialty);
            //ACT
            $test_doctor = $save();

            //ASSERT
            $result = Doctor::getAll();
            $this->assertEquals($test_doctor, $result[0]);

        }

    }

?>
