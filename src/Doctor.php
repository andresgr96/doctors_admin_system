<?php

    class Doctor {

        private $doc_id;
        private $name;
        private $specialty;

        function __construct($id = null, $name_input, $specialty_input) {
            $this->doc_id = $id;
            $this->name = $name_input;
            $this->specialty = $specialty_input;
        }

        function getId() {
            return $this->doc_id;
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
            return $this->specialty;
        }

        function getPatients() {
            return $this->patients;
        }

        static function getAll() {
            $returned_doctors = $GLOBALS['DB']->query("SELECT * FROM doctors;");
            $doctors = array();
            foreach($returned_doctors as $doctor) {
                $id = $doctor['doc_id'];
                $name = $doctor['name'];
                $specialty = $doctor['specialty'];
                $new_doctor = new Doctor($id, $name, $specialty);
                array_push($doctors, $new_doctor);
            }
            return $doctors;
        }

        function save() { // we do not need to set the ID because the datebase sets it
            $GLOBALS['DB']->exec("INSERT INTO doctors (name, specialty) VALUES ('{$this->getName()}', '{$this->getSpecialty()}' );");
            $this->doc_id = $GLOBALS['DB']->lastInsertId();
        }


    }

?>
