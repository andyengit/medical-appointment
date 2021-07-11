<?php
class Center extends Controllers
{
    function __construct()
    {
        $this->role = 'center';
        parent::__construct();
    }

    public function inicio()
    {
        $this->views->getView($this, $this->role, "inicio");
    }

    public function registerSpeciality()
    {
        $center = new CenterModel();
        $center->searchSpeciality();
        $this->views->getView($this, $this->role, "registerSpeciality");
        $_SESSION['specialitiesList'] = NULL;
    }

    public function report()
    {
        $this->views->getView($this, $this->role, "reports");
    }

    public function viewReportsDoc()
    {
        $table = new CenterModel();
        $table->getReportDoc();
        require_once("libraries/core/Fpdf.php");

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetX(75);
        $pdf->cell(50,20, utf8_decode('Listado de Doctores'),0,0,'C');
        $pdf->Ln();
        $pdf->Cell(15, 5, "Id", 1, 0, 'C');
        $pdf->Cell(25, 5, "Cedula", 1, 0, 'C');
        $pdf->Cell(70, 5, "Nombre", 1, 0, 'C');
        $pdf->Cell(35, 5, "Especialidad", 1, 0, 'C');
        $pdf->Cell(40,5,"Telefono",1, 1, 'C');

        foreach ($_SESSION['result'] as $key) {
            $pdf->Cell(15, 5, $key[0], 1, 0, 'C');
            $pdf->Cell(25, 5, $key[1], 1, 0, 'C');
            $pdf->Cell(70, 5, $key[3]." ".$key[2], 1, 0, 'C');
            $pdf->Cell(35, 5, $key[4], 1, 0, 'C');
            $pdf->Cell(40,5,$key[5],1, 1, 'C');
        }
        $pdf->Output('I', "report" . time() . ".pdf", true);

        $_SESSION['result'] = NULL;
    }

    public function insertSpeciality()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST" || empty($_POST['name']))
            header("Location:" . base_url());


        $center = new CenterModel();
        $center->setName($_POST['name']);
        $center->insertSpeciality();

        header("Location: " . base_url() . "center/registerSpeciality");

        $_SESSION['messComp'] = NULL;
    }

    public function registerDoctor()
    {

        $center = new CenterModel();
        $center->searchSpeciality();
        $this->views->getView($this, $this->role, "registerDoc");
        $_SESSION['messComp'] = NULL;
        $_SESSION['errors'] = NULL;
    }

    public function insertDoctor()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST")
            header("Location:" . base_url());

        $center = new CenterModel();
        $center->setNameDoc($_POST["name"]);
        $center->setLastName($_POST["lastName"]);
        $center->setCi($_POST["ci"]);
        $center->setEmail($_POST["email"]);
        $center->setPassword($_POST["password"]);
        $center->setPasswordL($_POST['password']);
        $center->setBirthDate($_POST["birthDate"]);
        $center->setPhone($_POST["phone"]);
        $center->setCityId($_POST["city"]);
        $center->setSpecialityId($_POST['speciality']);
        $center->setStartTime($_POST['startTime']);
        $center->setEndTime($_POST['endTime']);
        $center->setCost($_POST['cost']);
        $center->save();

        header("Location: " . base_url() . "center/registerDoctor");
    }



    public function LogOut()
    {
        session_destroy();
        $_SESSION = NULL;
        header("Location: " . base_url());
    }
}
