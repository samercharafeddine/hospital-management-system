<?php
class Patient extends User
{
  private $patient_id;
  private $tableName;
  public function __construct($db)
  {
    parent::__construct($db);
    $this->tableName = 'patients';
  }
  public function createPatient()
  {
    $query = $this->connection->prepare("INSERT INTO $this->tableName (user_id) VALUES (?)");
    $query->bind_param('s', $this->user_id);
    $query->execute();
    $this->fetchPatientId();
  }
  public function fetchPatientId()
  {
    $getIdQuery = $this->connection->prepare("SELECT patient_id FROM $this->tableName d,users u WHERE d.user_id=?");
    $getIdQuery->bind_param('s', $this->user_id);
    $getIdQuery->execute();
    $getIdQuery->bind_result($this->patient_id);
    $getIdQuery->fetch();
  }
  public function getPatientRow()
  {
    $getPatientQuery = $this->connection->prepare("SELECT * FROM $this->tableName where user_id=?");
    $getPatientQuery->bind_param('s', $this->user_id);
    $getPatientQuery->execute();
    $result = $getPatientQuery->get_result();
    $json = $result->fetch_assoc();
    return $json;
  }
  public function checkExistingPatient()
  {
    $checkQuery = $this->connection->prepare("SELECT * FROM $this->tableName where patient_id=?");
    $checkQuery->bind_param('s', $this->patient_id);
    $checkQuery->execute();
    $result = $checkQuery->get_result();
    if ($result)
      return $result->fetch_assoc();
    return false;
  }
  public function setUserId($id)
  {
    $this->user_id = $id;
  }
  public function setPatientId($id)
  {
    $this->patient_id = $id;
  }
  public function getPatientId()
  {
    return $this->patient_id;
  }
}