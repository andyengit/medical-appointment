<?php
class UserModel
{
    private $name;
    private $lastName;
    private $password;
    private $passwordL;
    private $email;
    private $ci;
    private $phone;
    private $birthDate;
    private $db;
    private $cityId;

    function __construct()
    {
        $this->db = Database::connect();
    }

    //SETTERS

    function setName(string $name)
    {
        $this->name = $this->testInput($name);
    }

    function setLastName(string $lastName)
    {
        $this->lastName = $this->testInput($lastName);
    }

    function setPassword(string $password)
    {
        $this->password = password_hash($this->testInput($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }
    function setPasswordL(string $password)
    {
        $this->passwordL = $password;
    }

    function setEmail(string $email)
    {
        $this->email = $this->testInput($email);
    }

    function setCi(string $ci)
    {
        $this->ci = $this->testInput($ci);
    }

    function setPhone(string $phone)
    {
        $this->phone = $this->testInput($phone);
    }

    function setCityId(string $cityId) {
        $this->cityId = $this->testInput($cityId);
    }

    function setBirthDate(string $birthDate)
    {
        $this->birthDate = $this->testInput($birthDate);
    }

    //FUNCTIONS

    public function search()
    {
        $reditect = "Location:" . base_url() . "user/login";
        if ($this->validateL()) {
            $query = "SELECT ci, password, role, name, lastname FROM users WHERE ci = ('{$this->ci}')";
            $result = $this->db->query($query);
            $rows = $result->fetch_assoc();
            var_dump($rows);
            if ($rows != NULL && sizeof($rows) != 0) {
                if ($this->ci == $rows['ci'] && password_verify($this->passwordL, $rows['password'])) {
                    if ($rows['role'] == 'doc') {
                        $queryThree = "SELECT id FROM doctors WHERE ci = '{$this->ci}' ";
                        $saveThree = $this->db->query($queryThree);
                        $arrId = $saveThree->fetch_array();
                        $_SESSION['globalId'] = $arrId[0];
                        $_SESSION['name'] = $rows['name'];
                        $_SESSION['lastname'] = $rows['lastname'];
                        $_SESSION['globalRol'] = $rows['role'];
                        $_SESSION['globalCI'] = $this->ci;
                        $_SESSION['logIn'] = true;
                        $reditect = "Location:" . base_url() . "doc/inicio";
                    }
                    if ($rows['role'] == 'patient') {
                        $queryThree = "SELECT id FROM patients WHERE ci = '{$this->ci}' ";
                        $saveThree = $this->db->query($queryThree);
                        $arrId = $saveThree->fetch_array();
                        $_SESSION['globalId'] = $arrId[0];
                        $_SESSION['name'] = $rows['name'];
                        $_SESSION['lastname'] = $rows['lastname'];
                        $_SESSION['globalRol'] = $rows['role'];
                        $_SESSION['globalCI'] = $this->ci;
                        $_SESSION['logIn'] = true;
                        $reditect = "Location:" . base_url() . "patient/inicio";
                    }
                } else $_SESSION['errors']['password'] = "Contraseña o Cedula Incorrecta.";
            } else $_SESSION['errors']['ci'] = "No se ha encontrado la cedula.";
        }
        echo $reditect;
        return $reditect;
    }

    public function save()
    {
        $redirect = "Location:" . base_url() . "user/register";
        if ($this->validateR() && $this->verify()) {

            $query = "INSERT INTO users VALUES ('{$this->ci}','{$this->cityId}','{$this->name}','{$this->lastName}', '{$this->password}','{$this->email}','{$this->phone}','{$this->birthDate}','patient');";
            $queryTwo = "INSERT INTO patients VALUES (NULL,'{$this->ci}','Lara','3001');";
            $save = $this->db->query($query);
            $saveTwo = $this->db->query($queryTwo);
            $queryThree = "SELECT id FROM patients WHERE ci = '{$this->ci}' ";
            $saveThree = $this->db->query($queryThree);
            $arrId = $saveThree->fetch_array();
            if ($save && $saveTwo && $saveThree) {
                $_SESSION['globalId'] = $arrId[0];
                $_SESSION['globalRol'] = 'patient';
                $_SESSION['globalCI'] = $this->ci;
                $_SESSION['logIn'] = true;
                $redirect = "Location:" . base_url() . "patient/inicio";
            } else {
                $_SESSION['errors']['RegisterFail'] = 'Registro Incorrecto';
            }
        }
        return $redirect;
    }

    public function verify(): bool
    {
        $query = "SELECT ci,email FROM users WHERE ci = ('{$this->ci}') OR email = ('{$this->email}');";
        $result = $this->db->query($query);
        $rows = $result->fetch_assoc();

        if ($rows != NULL && sizeof($rows) != 0) {
            if ($rows['email'] == $this->email) $_SESSION["errors"]["email"] = "Correo ya ha sido registrado";
            if ($rows['ci'] == $this->ci) $_SESSION["errors"]["email"] = "Usuario ya ha sido registrado";
            return false;
        } else return true;
    }

    private function validateL(): bool
    {
        $_SESSION["errors"] = [];

        #Validation for CI
        if (empty($this->ci))
            $_SESSION["errors"]["ci"] = "Debe ingresar su número de cedula.";

        if (!preg_match("/^[0-9]*$/", $this->ci) || strlen($this->ci) < 6 || strlen($this->ci) > 8)
            $_SESSION["errors"]["ci"] = "Debe ingresar un número de cedula válido.";

        #Validation for password
        if (empty($this->passwordL))
            $_SESSION["errors"]["password"] = "Debe ingresar una contraseña.";

        if (strlen($this->passwordL) < 6)
            $_SESSION["errors"]["password"] = "La contraseña debe contener al menos 6 caracteres.";

        #Setting session variables for the input values
        $_SESSION["ci"] = $this->ci;

        if (!empty($_SESSION['errors'])) {
            return false;
        } else return true;
    }

    private function validateR(): bool
    {
        $_SESSION["errors"] = [];

        #Validation for name and last name
        if (empty($this->name))
            $_SESSION["errors"]["name"] = "Debe ingresar su nombre.";

        if (empty($this->lastName))
            $_SESSION["errors"]["lastName"] = "Debe ingresar su apellido.";

        if (!preg_match("/^[a-zA-Z' ]*$/", $this->name))
            $_SESSION["errors"]["name"] = "Introduzca solamente letras y espacios.";

        if (!preg_match("/^[a-zA-Z' ]*$/", $this->lastName))
            $_SESSION["errors"]["lastName"] = "Introduzca solamente letras y espacios.";

        #Validation for CI
        if (empty($this->ci))
            $_SESSION["errors"]["ci"] = "Debe ingresar su número de cedula.";

        if (!preg_match("/^[0-9]*$/", $this->ci) || strlen($this->ci) < 6 || strlen($this->ci) > 8)
            $_SESSION["errors"]["ci"] = "Debe ingresar un número de cedula válido.";

        #Validation for email
        if (empty($this->email))
            $_SESSION["errors"]["email"] = "Debe ingresar su correo electrónico.";

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["errors"]["email"] = "La dirección de email es inválida.";
        }

        #Validation for password
        if (empty($this->password))
            $_SESSION["errors"]["password"] = "Debe ingresar una contraseña.";

        if (strlen($this->password) < 6)
            $_SESSION["errors"]["password"] = "La contraseña debe contener al menos 6 caracteres.";

        #Setting session variables for the input values
        $_SESSION["name"] = $this->name;
        $_SESSION["lastName"] = $this->lastName;
        $_SESSION["ci"] = $this->ci;
        $_SESSION["email"] = $this->email;

        if (!empty($_SESSION['errors'])) {
            return false;
        }
        return true;
    }

    private function testInput(string $data): string
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = $this->db->real_escape_string($data);

        return $data;
    }
}
