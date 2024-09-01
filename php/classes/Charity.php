<?php
class Charity {
    private $id;
    private $name;
    private $representativeEmail;

    public function __construct($id, $name, $representativeEmail) {
        $this->id = $id;
        $this->name = $name;
        $this->setRepresentativeEmail($representativeEmail);
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getRepresentativeEmail() {
        return $this->representativeEmail;
    }

    public function setRepresentativeEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format");
        }
        $this->representativeEmail = $email;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'representative_email' => $this->representativeEmail
        ];
    }
}
?>