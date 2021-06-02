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

    //Esta validación en este momento no funciona porque debo cambiarle ciertas cosas ahora
    //que ya no es solo un archivo al que se llama con post sino un método dentro de una clase
    public static function validate() {
        session_start();
        $_SESSION['errors'] = false;
        $nameErr = $lastNameErr = $ciErr = $emailErr = $passwordErr = "";
        $name = $lastName = $ci = $email = $password = "";

        if($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location: ..");

        #Validation for name and last name
        if(empty($_POST["name"])) {
            $nameErr = "Debe ingresar su nombre.";
            $_SESSION['errors'] = true;
        }else
            $name = testInput($_POST["name"]);

        if(empty($_POST["lastname"])) {
            $lastNameErr = "Debe ingresar su apellido.";
            $_SESSION['errors'] = true;
        }else 
            $lastName = testInput($_POST["lastname"]);

        if (!preg_match("/^[a-zA-Z' ]*$/", $name)) {
            $nameErr = "Introduzca solamente letras y espacios.";
            $_SESSION['errors'] = true;
        }
        if (!preg_match("/^[a-zA-Z' ]*$/", $lastName)){
            $lastNameErr = "Introduzca solamente letras y espacios.";
            $_SESSION['errors'] = true;
        }

        #Validation for CI
        if(empty($_POST["CI"])) {
            $ciErr = "Debe ingresar su número de cedula.";
            $_SESSION['errors'] = true;
        }else
            $ci = testInput($_POST["CI"]);

        if(!preg_match("/^[0-9]*$/", $ci) || strlen($ci) < 6 || strlen($ci) > 8) {
            $ciErr = "Debe ingresar un número de cedula válido.";
            $_SESSION['errors'] = true;
        }
            
        #Validation for email
        if(empty($_POST["email"])) {
            $emailErr = "Debe ingresar su correo electrónico.";
            $_SESSION['errors'] = true;
        }else
            $email = testInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "El texto introducido no es una dirección valida de email.";
            $_SESSION['errors'] = true;
        } 
            
        #Validation for password
        if(empty($_POST["password"])) {
            $passwordErr = "Debe ingresar una contraseña.";
            $_SESSION['errors'] = true;
        }
        else
            $password = testInput($_POST["password"]);

        if(strlen($password) < 6) {
            $passwordErr = "La contraseña debe contener al menos 6 caracteres.";
            $_SESSION['errors'] = true;
        }
            
        #Setting session variables for errors
        $_SESSION["nameErr"] = $nameErr;
        $_SESSION["lastNameErr"] = $lastNameErr;
        $_SESSION["ciErr"] = $ciErr;
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["passwordErr"] = $passwordErr;

        #Setting session variables for the input values
        $_SESSION["name"] = $name;
        $_SESSION["lastName"] = $lastName;
        $_SESSION["ci"] = $ci;
        $_SESSION["email"] = $email;

        $_SESSION["register"] = !$_SESSION['errors'];

        header("Location: ../index?go=registro");

        function testInput(string $data) : string {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);

            return $data;
        }
    }

    $Ander = new User("Anderson", "Armeya","28493778","anderson.armeya@gmail.com","28493778","04125119913","2002-07-08");

?>