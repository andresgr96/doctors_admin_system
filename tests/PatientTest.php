<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Doctor.php";
    require_once "src/Patient.php";

    $server = 'mysql:host=localhost:8889;dbname=doctor_office';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class PatientsTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Patient::deleteAll();
        }


        function test_save_patient()
        {
                //ARRANGE

                // create a doctor
                $doctor_id = null;
                $doctor_name = "Andres";
                $doctor_specialty = "Cardiology";
                $test_doctor = new Doctor($doctor_id, $doctor_name, $doctor_specialty);
                $test_doctor->save();

                $patient_id = 1;
                $patient_name = "Samwise";
                $patient_birthday = "1000";
                $doctor_id = $test_doctor->getId();
                $test_patient = new Patient($patient_id, $patient_name, $patient_birthday, $doctor_id);
                $test_patient->save();

                //ACT
                $result = Patient::getAll();

                //ASSERT
                $this->assertEquals($test_patient, $result[0]);

        }

    }




?>
