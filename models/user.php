<?php
    class User {
        public $name;
        public $lastName;
        public $password;
        public $email;
        public $ci;
        public $phone;
        public $date;
        public $rol;

        function __construct($name, $lastName, $password, $email, $ci, $phone, $date)
        {
            $this->name = $name;
            $this->lastName = $lastName;
            $this->password = $password;
            $this->email = $email;
            $this->ci = $ci;
            $this->phone = $phone;
            $this->date = $date;
            $this->rol = 0;
        }
    }

    $Ander = new User("Anderson", "Armeya","28493778","anderson.armeya@gmail.com","28493778","04125119913","2002-07-08");

?>