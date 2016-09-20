<?php

    class Patient {
        private $id;
        private $name;
        private $birthdate;
        private $doctor;

        function __construct($patient_id = null, $name_input, $birthdate_input, $doctor_name) {
            $this->id = $patient_id;
            $this->name = $name_input;
            $this->birthdate = $birthdate_input;
            $this->doctor = $doctor_name;
        }

        function getId() {
            return $this->id;
        }

        function setName($name_input) {
            $this->name = $name_input;
        }

        function getName() {
            return $this->name;
        }

        function setBirthdate($birthdate_input) {
            $this->birthdate = $birthdate_input;
            //format date method ($birthdate_input);
        }

        function getBirthdate() {
            return $this->birthdate;
        }

        function setDoctor($doctor_name) {
            $this->doctor = $doctor_name;
        }

        function getDoctor() {
            return $this->doctor;
        }

        function save() {

        }

        static function getAll() {
            $returned_patients = $GLOBALS['DB']->query("SELECT * FROM patients;");
            $patients = array();
            foreach($returned_patients as $patient) {
              $doctor = $patient['doctor'];
              $id = $patient['id'];
              $new_patient = new Patient($description, $id);
              array_push($tasks, $new_task);
            }
            return $tasks;
        }

    }



?>
