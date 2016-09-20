<?php

    class Doctor {

        private $name;
        private $specialty;

        function __construct($name_input, $specialty_input) {
            $this->name = $name_input;
            $this->specialty = $specialty_input;
        }

        function setName($name_input) {
            $this->name = $name_input;
        }

        function getName() {
            return $this->name;
        }

        function setSpecialty($specialty_input) {
            $this->specialty = $specialty_input;
        }

        function getSpecialty() {
            return $this->speciality;
        }

        function getPatients() {
            return $this->patients;
        }

        static function getAll() {
            $returned_doctors = $GLOBALS['DB']->query("SELECT * FROM doctors;");
            $doctors = array();
            foreach($returned_doctor as $doctor) {
              $name = $doctor['name'];
              $specialty = $doctor['specialty'];
              $new_doctor = new Doctor($name, $specialty);
              array_push($doctors, $new_doctor);
            }
            return $doctors;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO doctors (name, specialty) VALUES ('{$this->getName()}', '{$this->getSpecialty()}' );");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }


    }

?>
