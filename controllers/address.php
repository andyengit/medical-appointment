<?php
class Address extends Controllers {
    public function __construct()
    {
        parent::__construct();
    }

    public function index() {
        $user = new AddressModel();
        echo json_encode($user->showAdresses());
    }
}