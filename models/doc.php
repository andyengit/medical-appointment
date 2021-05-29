<?php
    require $PATH.'/models/user.php';
    class Doc extends User{
            public $esp;


        function __construct($name, $lastName, $password,$esp, $email, $ci, $phone, $date){
            $this->rol = 1;
            $this->esp = $esp;
            $this->name = $name;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->email = $email;
            $this->ci = $ci;
            $this->phone = $phone;
            $this->date = $date;

        }
    }


?>