<?php
class CenterModel
{
    private $db;
    private $password;
    private $specialityName;
    private $passwordL;
    private $name;
    private $lastName;
    private $email;
    private $ci;
    private $phone;
    private $birthDate;
    private $cityId;
    private $specialityId;
    private $startTime;
    private $endTime;
    private $cost;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function setCost(string $cost){
        $this->cost = strClean($cost);
    }

    public function setSpecialityId(string $id)
    {
        $this->specialityId = strClean($id);
    }

    public function setPasswordL(string $password)
    {
        $this->passwordL = strClean($password);
    }

    public function setStartTime(string $time)
    {
        $this->startTime = strClean($time);
    }

    public function setEndTime(string $time)
    {
        $this->endTime = strClean($time);
    }

    function setNameDoc(string $name)
    {
        $this->name = ucfirst($this->testInput($name));
    }

    function setLastName(string $lastName)
    {
        $this->lastName = ucfirst($this->testInput($lastName));
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

    function setCityId($cityId)
    {
        $this->cityId = strClean($cityId);
    }

    function setBirthDate(string $birthDate)
    {
        $this->birthDate = $this->testInput($birthDate);
    }

    public function setPassword($password)
    {
        $this->password = password_hash($this->testInput($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setName($name)
    {
        $this->specialityName = ucfirst(strClean($name));
    }

    public function searchSpeciality()
    {
        $sql = "SELECT id,name FROM specialities";
        $query = $this->db->query($sql);
        $result = $query->fetch_all();
        if (sizeof($result) != 0 || $result != NULL) {
            $_SESSION['specialitiesList'] = $result;
        }
    }

    public function insertSpeciality()
    {
        $sql = "INSERT INTO specialities VALUES (NULL,'{$this->specialityName}')";
        $query = $this->db->query($sql);
        if ($query) $_SESSION['messComp'] = $this->specialityName . " Se ha Agregado correctamente.";
    }

    public function save()
    {
        if ($this->validateRegisterDoc()) {
            $query = "INSERT INTO users VALUES (
            '{$this->ci}',
            '{$this->cityId}',
            '{$this->name}',
            '{$this->lastName}',
            '{$this->password}',
            '{$this->email}',
            '{$this->phone}',
            '{$this->birthDate}',
            'doc');";
            $queryTwo = "INSERT INTO doctors VALUES (NULL,
            '{$this->ci}',
            '{$this->specialityId}',
            '{$this->startTime}',
            '{$this->endTime}',
            '{$this->cost}');";
            $save = $this->db->query($query);
            $saveTwo = $this->db->query($queryTwo);
            if ($save && $saveTwo) {
                $_SESSION['messComp'] = "Registro exitoso.";
            } else {
                $_SESSION['errors']['RegisterFail'] = 'Registro Incorrecto';
            }
        }
    }

    private function validateRegisterDoc(): bool
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

        if (strlen($this->passwordL) < 6)
            $_SESSION["errors"]["password"] = "La contraseña debe contener al menos 6 caracteres.";

        #Validation for Phone
        if (empty($this->phone))
            $_SESSION["errors"]["phone"] = "Debe ingresar un numero telefónico.";

        if (strlen($this->phone) != 11)
            $_SESSION["errors"]["phone"] = "Debe ingresar un numero telefónico valido.";

        #Validation for BirthDay
        if (empty($this->birthDate))
            $_SESSION["errors"]["birthDate"] = "Debe ingresar una fecha de nacimiento";

        if (strtotime($this->birthDate) > time())
            $_SESSION["errors"]["birthDate"] = "Debe ingresar una fecha valida.";

        #Validation for state and Cities

        if (empty($this->cityId))
            $_SESSION["errors"]["city"] = "Debe seleccionar una dirección";

        #Validation for Specialities

        if (empty($this->specialityId))
            $_SESSION['errors']['speciality'] = "Debe seleccionar una especialidad";

        #Validation For Times

        if (empty($this->startTime))
            $_SESSION['errors']['startTime'] = "Debe agregar su inicio de jornada.";

        if (empty($this->endTime))
            $_SESSION['errors']['endTime'] = "Debe agregar su fin de jornada.";

        if (!$this->validateDate($this->endTime, 'H:i'))
            $_SESSION['errors']['endTime'] = "Debe agregar un Horario Valido.";

        if (!$this->validateDate($this->startTime, 'H:i'))
            $_SESSION['errors']['startTime'] = "Debe agregar un Horario Valido.";
        
        #validation for Cost

        if(empty($this->cost))
            $_SESSION['errors']['Cost'] = "Debe agregar un monto.";

            
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
    function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
