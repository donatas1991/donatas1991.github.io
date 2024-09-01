<?php
class Donation {
    private $id;
    private $donorName;
    private $amount;
    private $charityId;
    private $dateTime;

    public function __construct($id, $donorName, $amount, $charityId, $dateTime) {
        $this->id = $id;
        $this->donorName = $donorName;
        $this->setAmount($amount);
        $this->charityId = $charityId;
        $this->dateTime = $dateTime;
    }

    public function getId() {
        return $this->id;
    }

    public function getDonorName() {
        return $this->donorName;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCharityId() {
        return $this->charityId;
    }

    public function getDateTime() {
        return $this->dateTime;
    }

    public function setAmount($amount) {
        if ($amount <= 0) {
            throw new Exception("Amount should be greater than zero");
        }
        $this->amount = $amount;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'donor_name' => $this->donorName,
            'amount' => $this->amount,
            'charity_id' => $this->charityId,
            'date_time' => $this->dateTime
        ];
    }
}
?>
