<?php
require '../config/config.php';
require '../config/functions.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/model.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/firstSection.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/beneficialowner.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/correspondenceAddress.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/permanentAddress.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/certificateDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/occupationDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/bankDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/nomineeDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/guardianDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/otherDocuments.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/form.php';

$firstSection = new FirstSection();
$beneficialOwner = new BeneficialOwner();
$correspondenceAddress = new CorrespondenceAddress();
$permanentAddress = new PermanentAddress();
$certificateDetails = new CertificateDetails();
$bankDetails = new BankDetails();
$occupationDetails = new OccupationDetails();
$nomineeDetails = new NomineeDetails();
$guardianDetails = new GuardianDetails();
$otherDocuments = new OtherDocuments();
$form = new Form();
$getForm = new Form();

if(isset($_POST)){
    // debugger($_POST);
    // debugger($_FILES, true);

    //first section
    $firstSectionData = array();
    $firstSectionData['accountType'] = sanitize($_POST['accountType']);
    $firstSectionData['minor'] = sanitize($_POST['minor']);
    $firstSectionData['meroShareService'] = sanitize($_POST['meroShareService']);
    $firstSectionData['maritalStatus'] = sanitize($_POST['maritalStatus']);

    //beneficial owner
    $beneficialOwnerData = array();
    $beneficialOwnerData['title'] = sanitize($_POST['title']);
    $beneficialOwnerData['firstName'] = sanitize($_POST['firstName']);
    $beneficialOwnerData['middleName'] = !empty($_POST['middleName']) ? sanitize($_POST['middleName']) : null;
    $beneficialOwnerData['lastName'] = sanitize($_POST['lastName']);
    $beneficialOwnerData['fathersName'] = sanitize($_POST['fathersName']);
    $beneficialOwnerData['grandFathersName'] = sanitize($_POST['grandFathersName']);
    $beneficialOwnerData['mothersName'] = sanitize($_POST['mothersName']);


    //correspondence address
    $correspondenceAddressData = array();
    $correspondenceAddressData['correspondence_province'] = sanitize($_POST['correspondence_province']);
    $correspondenceAddressData['correspondence_zone'] = sanitize($_POST['correspondence_zone']);
    $correspondenceAddressData['correspondence_district'] = sanitize($_POST['correspondence_district']);
    $correspondenceAddressData['correspondence_vdc'] = sanitize($_POST['correspondence_vdc']);
    $correspondenceAddressData['correspondence_tole'] = sanitize($_POST['correspondence_tole']);
    $correspondenceAddressData['correspondence_ward'] = (int)sanitize($_POST['correspondence_ward']);
    $correspondenceAddressData['correspondence_blockno'] = !empty($_POST['correspondence_blockno']) ? (int)sanitize($_POST['correspondence_blockno']) : null;
    $correspondenceAddressData['correspondence_phoneno'] = !empty($_POST['correspondence_phoneno']) ? (int)sanitize($_POST['correspondence_phoneno']) : null;
    $correspondenceAddressData['correspondence_mobileno'] = (int)sanitize($_POST['correspondence_mobileno']);
    $correspondenceAddressData['correspondence_email'] = sanitize($_POST['correspondence_email']);

    //permanentAddress
    $permanentAddressData = array();
    $permanentAddressData['permanent_province'] = sanitize($_POST['permanent_province']);
    $permanentAddressData['permanent_zone'] = sanitize($_POST['permanent_zone']);
    $permanentAddressData['permanent_district'] = sanitize($_POST['permanent_district']);
    $permanentAddressData['permanent_vdc'] = sanitize($_POST['permanent_vdc']);
    $permanentAddressData['permanent_tole'] = sanitize($_POST['permanent_tole']);
    $permanentAddressData['permanent_ward'] = sanitize($_POST['permanent_ward']);
    $permanentAddressData['permanent_blockno'] =!empty($_POST['permanent_blockno']) ? (int)sanitize($_POST['permanent_blockno']) : null;
    $permanentAddressData['permanent_phoneno'] =!empty($_POST['permanent_phoneno']) ? (int)sanitize($_POST['permanent_phoneno']) : null;
    $permanentAddressData['permanent_mobileno'] = sanitize($_POST['permanent_mobileno']);
    $permanentAddressData['permanent_email'] = sanitize($_POST['permanent_email']);

    //certificate details
    $certificateDetailsData = array();
    $certificateDetailsData['citizenshipNo'] = sanitize($_POST['citizenshipNo']);
    $certificateDetailsData['citizenshipIssueDistrict'] = sanitize($_POST['citizenshipIssueDistrict']);
    $certificateDetailsData['CitizenshipIssueDateBS'] = sanitize($_POST['CitizenshipIssueDateBS']);
    $certificateDetailsData['CitizenshipIssueDateAD'] = sanitize($_POST['CitizenshipIssueDateAD']);
    $certificateDetailsData['DOBBS'] = sanitize($_POST['DOBBS']);
    $certificateDetailsData['DOBAD'] = sanitize($_POST['DOBAD']);
    $certificateDetailsData['gender'] = sanitize($_POST['gender']);
    $certificateDetailsData['panno'] = !empty($_POST['panno']) ? sanitize($_POST['panno']) : null;

    //bank details
    $bankDetailsData = array();
    $bankDetailsData['bankAccountType'] = sanitize($_POST['bankAccountType']);
    $bankDetailsData['bankAccountno'] = sanitize($_POST['bankAccountno']);
    $bankDetailsData['bank'] = sanitize($_POST['bank']);
    $bankDetailsData['branch'] = sanitize($_POST['branch']);

    //occupation details
    $occupationDetailsData = array();
    $occupationDetailsData['occupationType'] = sanitize($_POST['occupationType']);
    $occupationDetailsData['businessType'] = !empty($_POST['businessType']) ? sanitize($_POST['businessType']) : null;
    $occupationDetailsData['organizationName'] = !empty($_POST['organizationName']) ? sanitize($_POST['organizationName']) : null;
    $occupationDetailsData['organizationAddress'] = !empty($_POST['organizationAddress']) ? sanitize($_POST['organizationAddress']) : null;
    $occupationDetailsData['designation'] = !empty($_POST['designation']) ? sanitize($_POST['designation']) : null;
    $occupationDetailsData['income'] = !empty($_POST['income']) ? sanitize($_POST['income']) : null;

    //nominee details
    $nomineeDetailsData = array();
    $nomineeDetailsData['nominee'] = sanitize($_POST['nominee']);
    $nomineeDetailsData['nomimeeName'] = !empty($_POST['nomimeeName']) ? sanitize($_POST['nomimeeName']) : null;
    $nomineeDetailsData['nomineeFathersName'] = !empty($_POST['nomineeFathersName']) ? sanitize($_POST['nomineeFathersName']) : null;
    $nomineeDetailsData['nomineeRelationship'] = !empty($_POST['nomineeRelationship']) ? sanitize($_POST['nomineeRelationship']) : null;
    $nomineeDetailsData['referenceDocument'] = !empty($_POST['referenceDocument']) ? sanitize($_POST['referenceDocument']) : null;
    $nomineeDetailsData['nomineeDoc'] = !empty($_POST['nomineeDoc']) ? sanitize($_POST['nomineeDoc']) : null;
    $nomineeDetailsData['placeOfIssue'] = !empty($_POST['placeOfIssue']) ? sanitize($_POST['placeOfIssue']) : null;
    $nomineeDetailsData['nomineeIssueYear'] = !empty($_POST['nomineeIssueYear']) ? sanitize($_POST['nomineeIssueYear']) : null;
    $nomineeDetailsData['nomineeAge'] = !empty($_POST['nomineeAge']) ? sanitize($_POST['nomineeAge']) : null;
    $nomineeDetailsData['nominee_zone'] = !empty($_POST['nominee_zone']) ? sanitize($_POST['nominee_zone']) : null;
    $nomineeDetailsData['nominee_district'] = !empty($_POST['nominee_district']) ? sanitize($_POST['nominee_district']) : null;
    $nomineeDetailsData['nominee_phoneno'] = !empty($_POST['nominee_phoneno']) ? sanitize($_POST['nominee_phoneno']) : null;
    $nomineeDetailsData['nominee_mobileno'] = !empty($_POST['nominee_mobileno']) ? sanitize($_POST['nominee_mobileno']) : null;
    $nomineeDetailsData['nominee_email'] =!empty($_POST['nominee_email']) ? sanitize($_POST['nominee_email']) : null;
    $nomineeDetailsData['nominee_panno'] = !empty($_POST['nominee_panno']) ? sanitize($_POST['nominee_panno']) : null;
    $nomineeDetailsData['nominee_correspondenceAddress'] = !empty($_POST['nominee_correspondenceAddress']) ? sanitize($_POST['nominee_correspondenceAddress']) : null;

    if(!empty($_FILES['nomineePhoto'])){
        if(isset($_FILES['nomineePhoto']) && $_FILES['nomineePhoto']['error'] == 0){
            $nomineeDetailsData['nomineePhoto'] = uploadSingleFile($_FILES['nomineePhoto'], 'nomineePhoto');
        }
    } else {
        $nomineeDetailsData['nomineePhoto'] =null;
    }

    if(!empty($_FILES['nomineeSignature'])){
        if(isset($_FILES['nomineeSignature']) && $_FILES['nomineeSignature']['error'] == 0){
            $nomineeDetailsData['nomineeSignature'] = uploadSingleFile($_FILES['nomineeSignature'], 'nomineeSignature');
        }
    } else {
        $nomineeDetailsData['nomineeSignature'] =null;
    }

    if(!empty($_FILES['nomineeDocumentFront'])){
        if(isset($_FILES['nomineeDocumentFront']) && $_FILES['nomineeDocumentFront']['error'] == 0){
            $nomineeDetailsData['nomineeDocumentFront'] = uploadSingleFile($_FILES['nomineeDocumentFront'], 'nomineeDocumentFront');
        }
    } else {
        $nomineeDetailsData['guardianPhoto'] =null;
    }

    if(!empty($_FILES['nomineeDocumentBack'])){
        if(isset($_FILES['nomineeDocumentBack']) && $_FILES['nomineeDocumentBack']['error'] == 0){
            $nomineeDetailsData['nomineeDocumentBack'] = uploadSingleFile($_FILES['nomineeDocumentBack'], 'nomineeDocumentBack');
        }
    } else {
        $nomineeDetailsData['nomineeDocumentBack'] =null;
    }

    //other documents
    $otherDocumentsData = array();
    if(isset($_FILES['applicantPhoto'])  && $_FILES['applicantPhoto']['error'] == 0){
        $otherDocumentsData['applicantPhoto'] = uploadSingleFile($_FILES['applicantPhoto'], 'applicantPhoto');

        // if($otherDocumentsData['applicantPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['applicantCitizenshipFrontPhoto'])  && $_FILES['applicantCitizenshipFrontPhoto']['error'] == 0){
        $otherDocumentsData['applicantCitizenshipFrontPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipFrontPhoto'], 'applicantCitizenshipFrontPhoto');
    }
    if(isset($_FILES['applicantCitizenshipBackPhoto'])  && $_FILES['applicantCitizenshipBackPhoto']['error'] == 0){
        $otherDocumentsData['applicantCitizenshipBackPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipBackPhoto'], 'applicantCitizenshipBackPhoto');
    }
    if(isset($_FILES['applicantThumbPhoto']) && $_FILES['applicantThumbPhoto']['error'] == 0){
        $otherDocumentsData['applicantThumbPhoto'] = uploadSingleFile($_FILES['applicantThumbPhoto'], 'applicantThumbPhoto');
    }
    if(isset($_FILES['applicantLocationMapPhoto']) && $_FILES['applicantLocationMapPhoto']['error'] == 0){
        $otherDocumentsData['applicantLocationMapPhoto'] = uploadSingleFile($_FILES['applicantLocationMapPhoto'], 'applicantLocationMapPhoto');
    }
    if(isset($_FILES['applicantSignaturePhoto']) && $_FILES['applicantSignaturePhoto']['error'] == 0){
        $otherDocumentsData['applicantSignaturePhoto'] = uploadSingleFile($_FILES['applicantSignaturePhoto'], 'applicantSignaturePhoto');
    }
    

    //guardian details
    $guardianDetailsData = array();
    $guardianDetailsData['guardianFirstName'] = !empty($_POST['guardianFirstName']) ? sanitize($_POST['guardianFirstName']) : null;
    $guardianDetailsData['guardianMiddleName'] = !empty($_POST['guardianMiddleName']) ? sanitize($_POST['guardianMiddleName']) : null;
    $guardianDetailsData['guardianLastName'] = !empty($_POST['guardianLastName']) ? sanitize($_POST['guardianLastName']) : null;
    $guardianDetailsData['guardianRelation'] = !empty($_POST['guardianRelation']) ? sanitize($_POST['guardianRelation']) : null;
    $guardianDetailsData['guardianFatherName'] = !empty($_POST['guardianFatherName']) ? sanitize($_POST['guardianFatherName']) : null;
    $guardianDetailsData['guardianGrandFatherName'] = !empty($_POST['guardianGrandFatherName']) ? sanitize($_POST['guardianGrandFatherName']) : null;
    $guardianDetailsData['guardianSpouseName'] = !empty($_POST['guardianSpouseName']) ? sanitize($_POST['guardianSpouseName']) : null;
    $guardianDetailsData['guardianCitizenshipNo'] = !empty($_POST['guardianCitizenshipNo']) ? sanitize($_POST['guardianCitizenshipNo']) : null;
    $guardianDetailsData['guardianAddress'] = !empty($_POST['guardianAddress']) ? sanitize($_POST['guardianAddress']) : null;
    $guardianDetailsData['guardian_province'] = !empty($_POST['guardian_province']) ? sanitize($_POST['guardian_province']) : null;
    $guardianDetailsData['guardian_zone'] = !empty($_POST['guardian_zone']) ? sanitize($_POST['guardian_zone']) : null;
    $guardianDetailsData['guardian_district'] = !empty($_POST['guardian_district']) ? sanitize($_POST['guardian_district']) : null;
    $guardianDetailsData['guardian_vdc'] = !empty($_POST['guardian_vdc']) ? sanitize($_POST['guardian_vdc']) : null;
    $guardianDetailsData['guardian_blockNo'] = !empty($_POST['guardian_blockNo']) ? sanitize($_POST['guardian_blockNo']) : null;
    $guardianDetailsData['guardian_ward'] = !empty($_POST['guardian_ward']) ? sanitize($_POST['guardian_ward']) : null;
    $guardianDetailsData['guardian_phoneno'] = !empty($_POST['guardian_phoneno']) ? sanitize($_POST['guardian_phoneno']) : null;
    $guardianDetailsData['guardian_mobileno'] = !empty($_POST['guardian_mobileno']) ? sanitize($_POST['guardian_mobileno']) : null;
    $guardianDetailsData['guardian_panno'] = !empty($_POST['guardian_panno']) ? sanitize($_POST['guardian_panno']) : null;
    $guardianDetailsData['guardian_email'] = !empty($_POST['guardian_email']) ? sanitize($_POST['guardian_email']) : null;
    $guardianDetailsData['guardian_citizenshiptIssueDistrict'] = !empty($_POST['guardian_citizenshiptIssueDistrict']) ? sanitize($_POST['guardian_citizenshiptIssueDistrict']) : null;
    $guardianDetailsData['guardian_citizenshipIssueDateBS'] = !empty($_POST['guardian_citizenshipIssueDateBS']) ? sanitize($_POST['guardian_citizenshipIssueDateBS']) : null;
    $guardianDetailsData['guardian_citizenshipIssueDateAD'] = !empty($_POST['guardian_citizenshipIssueDateAD']) ? sanitize($_POST['guardian_citizenshipIssueDateAD']) : null;
    $guardianDetailsData['guardian_DOBBS'] = !empty($_POST['guardian_DOBBS']) ? sanitize($_POST['guardian_DOBBS']) : null;
    $guardianDetailsData['guardian_DOBAD'] = !empty($_POST['guardian_DOBAD']) ? sanitize($_POST['guardian_DOBAD']) : null;

    if(!empty($_FILES['guardianPhoto'])){
        if(isset($_FILES['guardianPhoto']) && $_FILES['guardianPhoto']['error'] == 0){
            $guardianDetailsData['guardianPhoto'] = uploadSingleFile($_FILES['guardianPhoto'], 'guardianPhoto');
        }
    } else {
        $guardianDetailsData['guardianPhoto'] =null;
    }
    if(!empty($_FILES['guardianSignature'])){
        if(isset($_FILES['guardianSignature'])&& $_FILES['guardianSignature']['error'] == 0){
            $guardianDetailsData['guardianSignature'] = uploadSingleFile($_FILES['guardianSignature'], 'guardianSignature');
        }
    } else {
        $guardianDetailsData['guardianSignature'] =null;
    }
    if(!empty($_FILES['guardianCitizenshipFront'])){
        if(isset($_FILES['guardianCitizenshipFront']) && $_FILES['guardianCitizenshipFront']['error'] == 0){
            $guardianDetailsData['guardianCitizenshipFront'] = uploadSingleFile($_FILES['guardianCitizenshipFront'], 'guardianCitizenshipFront');
        }
    } else {
        $guardianDetailsData['guardianCitizenshipFront'] = null;
    }
    
    if(!empty($_FILES['guardianCitizenshipBack'])){
        if(isset($_FILES['guardianCitizenshipBack']) && $_FILES['guardianCitizenshipBack']['error'] == 0){
            $guardianDetailsData['guardianCitizenshipBack'] = uploadSingleFile($_FILES['guardianCitizenshipBack'], 'guardianCitizenshipBack');
        }
    } else {
        $guardianDetailsData['guardianCitizenshipBack'] = null;
    }
    
    if(!empty($_FILES['guardianProof'])){
        if(isset($_FILES['guardianProof']) && $_FILES['guardianProof']['error'] == 0){
            $guardianDetailsData['guardianProof'] = uploadSingleFile($_FILES['guardianProof'], 'guardianProof');
        }
    } else {
        $guardianDetailsData['guardianProof'] = null;
    }
    

    //$id = isset($_POST['id']) ? (int)$_POST['id'] : NULL;
    $firstSection = $firstSection->addFirstSection($firstSectionData);
    $beneficialOwner = $beneficialOwner->addBeneficialOwner($beneficialOwnerData);
    $correspondenceAddress = $correspondenceAddress->addCorrespondenceAddress($correspondenceAddressData);
    $permanentAddress = $permanentAddress->addPermanentAddress($permanentAddressData);
    $certificateDetails = $certificateDetails->addCertificateDetails($certificateDetailsData);
    $bankDetails = $bankDetails->addBankDetails($bankDetailsData);
    $occupationDetails = $occupationDetails->addOccupationDetails($occupationDetailsData);
    $nomineeDetails = $nomineeDetails->addNomineeDetails($nomineeDetailsData);
    $guardianDetails = $guardianDetails->addGuardianDetails($guardianDetailsData);  
    $otherDocuments = $otherDocuments->addOtherDocuments($otherDocumentsData);

    
    $form = $form->addForm();

    if($form){
        redirect('../thankyou.php');
    } else {
        redirect('../thankyou.php');
    }
} 

?>