<?php

    class Patient {
        private $id;
        private $name;
        private $birthdate;
        private $doc_id;

        function __construct($patient_id = null, $name_input, $birthdate_input, $doctor_id = null) {
            $this->id = $patient_id;
            $this->name = $name_input;
            $this->birthdate = $birthdate_input;
            $this->doc_id = $doctor_id;
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


        function getDoctorId() {
            return $this->doc_id;
        }


        static function getAll() {
            $returned_patients = $GLOBALS['DB']->query("SELECT * FROM patients;");
            $patients = array();
            foreach($returned_patients as $patient) {
                $id = $patient['patient_id'];
                $name = $patient['name'];
                $birthdate = $patient['birthdate'];
                $doctor_id = $patient['doc_id'];
                $new_patient = new Patient($id, $name, $birthdate, $doctor_id);
                array_push($patients, $new_patient);
            }
            return $patients;
        }

        function save() {
            $GLOBALS['DB']->exec("INSERT INTO patients (name, birthdate, doc_id) VALUES ('{$this->getName()}', '{$this->getBirthdate()}', {$this->getDoctorId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();

        }

        static function deleteAll()
        {
             $GLOBALS['DB']->exec("DELETE FROM patients;");
        }

    }




?>
