<?php

namespace App\Enums;

enum DocumentTypeEnum: string
{
    case Barangay_Clearance = 'Barangay Clearance';
    case Barangay_Certificate_of_Residency = 'Barangay Certificate of Residency';
    case Barangay_Indigency_Certificate = 'Barangay Indigency Certificate';
    case Barangay_Business_Clearance = 'Barangay Business Clearance';
    case Barangay_Blotter_Complaint_Report = 'Barangay Blotter/Complaint Report';
    case Barangay_Permit_to_Construct = 'Barangay Permit to Construct';
    case Barangay_Certificate_of_Good_Moral_Character = 'Barangay Certificate of Good Moral Character';
}
