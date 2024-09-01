<?php
require_once 'classes/Charity.php';
require_once 'classes/Donation.php';
require_once 'classes/CharityManager.php';
require_once 'classes/DonationManager.php';
require_once 'classes/CSVImporter.php';

$charityManager = new CharityManager();
$donationManager = new DonationManager();

echo "Welcome to the Charity Donation CLI!\n";
echo "Choose an option:\n";
echo "1. View Charities\n";
echo "2. Add Charity\n";
echo "3. Edit Charity\n";
echo "4. Delete Charity\n";
echo "5. Add Donation\n";
echo "6. Import Charities from CSV\n";
echo "7. View Donations\n";
echo "8. Exit\n";

$choice = trim(fgets(STDIN));

switch ($choice) {
    case 1:
        $charities = $charityManager->viewCharities();
        foreach ($charities as $charity) {
            echo "ID: {$charity['id']} | Name: {$charity['name']} | Email: {$charity['representative_email']}\n";
        }
        break;
    case 2:
        echo "Enter Charity Name: ";
        $name = trim(fgets(STDIN));
        echo "Enter Representative Email: ";
        $email = trim(fgets(STDIN));
        $charity = new Charity(uniqid(), $name, $email);
        $charityManager->addCharity($charity);
        echo "Charity added successfully!\n";
        break;
    case 3:
        echo "Enter Charity ID to edit: ";
        $id = trim(fgets(STDIN));
        echo "Enter New Name: ";
        $name = trim(fgets(STDIN));
        echo "Enter New Email: ";
        $email = trim(fgets(STDIN));
        $charityManager->editCharity($id, $name, $email);
        echo "Charity updated successfully!\n";
        break;
    case 4:
        echo "Enter Charity ID to delete: ";
        $id = trim(fgets(STDIN));
        $charityManager->deleteCharity($id);
        echo "Charity deleted successfully!\n";
        break;
    case 5:
        echo "Enter Donor Name: ";
        $donorName = trim(fgets(STDIN));
        echo "Enter Donation Amount: ";
        $amount = trim(fgets(STDIN));
        echo "Enter Charity ID: ";
        $charityId = trim(fgets(STDIN));
        $donation = new Donation(uniqid(), $donorName, $amount, $charityId, date('Y-m-d H:i:s'));
        $donationManager->addDonation($donation);
        echo "Donation added successfully!\n";
        break;
    case 6:
        echo "Enter CSV file path: ";
        $filePath = trim(fgets(STDIN));
        $charityManager->importFromCSV($filePath);
        echo "Charities imported successfully!\n";
        break;
    case 7:
        $donations = $donationManager->viewDonations();
        foreach ($donations as $donation) {
            echo "ID: {$donation['id']} | Donor: {$donation['donor_name']} | Amount: {$donation['amount']} | Charity ID: {$donation['charity_id']} | Date: {$donation['date_time']}\n";
        }
        break;
    case 8:
        echo "Exiting...\n";
        exit;
    default:
        echo "Invalid option. Please try again.\n";
}
?>
