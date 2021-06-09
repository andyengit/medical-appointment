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

        //$name, $lastName, $password, $email, $ci, $phone, $date

        function __construct()
        {
            //$this->name = $name;
            //$this->lastName = $lastName;
            //$this->password = $password;
            //$this->email = $email;
            //$this->ci = $ci;
            //$this->phone = $phone;
            //$this->date = $date;
            //$this->rol = 0;
        }

        public function validate(array $data) : bool {
            if(!isset($data) || !$data)
                return false; 
    
            session_start();
            $_SESSION["errors"] = [];
            $nameErr = $lastNameErr = $ciErr = $emailErr = $passwordErr = "";
            $name = $lastName = $ci = $email = $password = "";
    
            #Validation for name and last name
            if(empty($data["name"])) 
                $_SESSION["errors"]["name"] = "Debe ingresar su nombre.";
            else
                $name = $this->testInput($data["name"]);
    
            if(empty($data["lastname"])) 
                $_SESSION["errors"]["lastname"] = "Debe ingresar su apellido.";
            else 
                $lastName = $this->testInput($data["lastname"]);
    
            if (!preg_match("/^[a-zA-Z' ]*$/", $name)) 
                $_SESSION["errors"]["name"] = "Introduzca solamente letras y espacios.";
            
            if (!preg_match("/^[a-zA-Z' ]*$/", $lastName))
                $_SESSION["errors"]["lastname"] = "Introduzca solamente letras y espacios.";
    
            #Validation for CI
            if(empty($data["CI"])) 
                $_SESSION["errors"]["CI"] = "Debe ingresar su número de cedula.";
            else
                $ci = $this->testInput($data["CI"]);
    
            if(!preg_match("/^[0-9]*$/", $ci) || strlen($ci) < 6 || strlen($ci) > 8) 
                $_SESSION["errors"]["CI"] = "Debe ingresar un número de cedula válido.";
                
            #Validation for email
            if(empty($data["email"])) 
                $_SESSION["errors"]["email"] = "Debe ingresar su correo electrónico.";
            else
                $email = $this->testInput($data["email"]);
    
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["errors"]["email"] = "El texto introducido no es una dirección valida de email.";
            } 
                
            #Validation for password
            if(empty($data["password"])) 
                $_SESSION["errors"]["password"] = "Debe ingresar una contraseña.";
            else
                $password = $this->testInput($data["password"]);
    
            if(strlen($password) < 6) 
                $_SESSION["errors"]["password"] = "La contraseña debe contener al menos 6 caracteres.";
    
            #Setting session variables for the input values
            $_SESSION["name"] = $name;
            $_SESSION["lastName"] = $lastName;
            $_SESSION["ci"] = $ci;
            $_SESSION["email"] = $email;
    
            $_SESSION["register"] = empty($_SESSION["errors"]);  
            
            return true;
        }
    
        private function testInput(string $data) : string {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
    
            return $data;
        }
    }

    $Ander = new User("Anderson", "Armeya","28493778","anderson.armeya@gmail.com","28493778","04125119913","2002-07-08");
