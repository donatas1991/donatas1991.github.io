<?php
class CharityManager {
    private $charities = [];
    private $dataFile = 'data/charities.json';

    public function __construct() {
        if (file_exists($this->dataFile)) {
            $this->charities = json_decode(file_get_contents($this->dataFile), true);
        }
    }

    public function addCharity(Charity $charity) {
        $this->charities[] = $charity->toArray();
        $this->save();
    }

    public function editCharity($id, $name, $email) {
        foreach ($this->charities as &$charity) {
            if ($charity['id'] == $id) {
                $charity['name'] = $name;
                $charity['representative_email'] = $email;
                $this->save();
                return;
            }
        }
        throw new Exception("Charity not found");
    }

    public function deleteCharity($id) {
        $this->charities = array_filter($this->charities, function ($charity) use ($id) {
            return $charity['id'] !== $id;
        });
        $this->save();
    }

    public function viewCharities() {
        return $this->charities;
    }

    private function save() {
        file_put_contents($this->dataFile, json_encode($this->charities, JSON_PRETTY_PRINT));
    }

    public function importFromCSV($filePath) {
        $importer = new CSVImporter();
        $charitiesData = $importer->import($filePath);

        foreach ($charitiesData as $charityData) {
            $charity = new Charity(
                uniqid(),
                $charityData['name'],
                $charityData['representative_email']
            );
            $this->addCharity($charity);
        }
    }
}
?>
