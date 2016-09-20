<?php

    class Doctor {

        private $name;
        private $specialty;
        private $patients;

        function __construct($name_input, $specialty_input) {
            $this->name = $name_input;
            $this->specialty = $specialty_input;
            $this->patients = [];
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

        }


    }

?>
