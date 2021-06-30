<?php
class AddressModel 
{
    private $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    public function showAdresses() 
    {
        $addreses = [];

        $query = "SELECT states.name, cities.name, cities.id FROM states INNER JOIN cities ON states.id = cities.state_id;";
        $result = $this->db->query($query);
        $rows = $result->fetch_assoc();
        while($row = $result->fetch_row())
        {
            array_push($addreses, $row);
        }

        return $addreses;
    }
}