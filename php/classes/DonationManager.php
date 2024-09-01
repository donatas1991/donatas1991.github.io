<?php
class DonationManager {
    private $donations = [];
    private $dataFile = 'data/donations.json';

    public function __construct() {
        if (file_exists($this->dataFile)) {
            $this->donations = json_decode(file_get_contents($this->dataFile), true);
        }
    }

    public function addDonation(Donation $donation) {
        $this->donations[] = $donation->toArray();
        $this->save();
    }

    public function viewDonations() {
        return $this->donations;
    }

    private function save() {
        file_put_contents($this->dataFile, json_encode($this->donations, JSON_PRETTY_PRINT));
    }
}
?>
