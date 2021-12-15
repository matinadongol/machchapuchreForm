<?php
require '../config/config.php';
require '../config/functions.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/model.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/firstSection.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/beneficialowner.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/correspondenceAddress.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/permanentAddress.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/certificateDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/occupationDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/nomineeDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/guardianDetails.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/otherDocuments.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/form.php';

$firstSection = new FirstSection();
$beneficialOwner = new BeneficialOwner();
$correspondenceAddress = new CorrespondenceAddress();
$permanentAddress = new PermanentAddress();
$certificateDetails = new CertificateDetails();
$occupationDetails = new OccupationDetails();
$nomineeDetails = new NomineeDetails();
$guardianDetails = new GuardianDetails();
$otherDocuments = new OtherDocuments();
$form = new Form();

if(isset($_POST) && !empty($_POST)){
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
    $beneficialOwnerData['middleName'] = sanitize($_POST['middleName']);
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
    $correspondenceAddressData['correspondence_blockno'] = (int)sanitize($_POST['correspondence_blockno']);
    $correspondenceAddressData['correspondence_phoneno'] = (int)sanitize($_POST['correspondence_phoneno']);
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
    $permanentAddressData['permanent_blockno'] = sanitize($_POST['permanent_blockno']);
    $permanentAddressData['permanent_phoneno'] = sanitize($_POST['permanent_phoneno']);
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
    $certificateDetailsData['panno'] = sanitize($_POST['panno']);

    //occupation details
    $occupationDetailsData = array();
    $occupationDetailsData['occupationType'] = sanitize($_POST['occupationType']);
    $occupationDetailsData['businessType'] = sanitize($_POST['businessType']);
    $occupationDetailsData['organizationName'] = sanitize($_POST['organizationName']);
    $occupationDetailsData['organizationAddress'] = sanitize($_POST['organizationAddress']);
    $occupationDetailsData['designation'] = sanitize($_POST['designation']);
    $occupationDetailsData['income'] = sanitize($_POST['income']);

    //nominee details
    $nomineeDetailsData = array();
    $nomineeDetailsData['nominee'] = sanitize($_POST['nominee']);

    //other documents
    $otherDocumentsData = array();
    if(isset($_FILES['applicantPhoto']) && !empty($_FILES['applicantPhoto']) && $_FILES['applicantPhoto']['error'] == 0){
        $otherDocumentsData['applicantPhoto'] = uploadSingleFile($_FILES['applicantPhoto'], 'applicantPhoto');

        // if($otherDocumentsData['applicantPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['applicantCitizenshipFrontPhoto']) && !empty($_FILES['applicantCitizenshipFrontPhoto']) && $_FILES['applicantCitizenshipFrontPhoto']['error'] == 0){
        $otherDocumentsData['applicantCitizenshipFrontPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipFrontPhoto'], 'applicantCitizenshipFrontPhoto');

        // if($otherDocumentsData['applicantCitizenshipFrontPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantCitizenshipFrontPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantCitizenshipFrontPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['applicantCitizenshipBackPhoto']) && !empty($_FILES['applicantCitizenshipBackPhoto']) && $_FILES['applicantCitizenshipBackPhoto']['error'] == 0){
        $otherDocumentsData['applicantCitizenshipBackPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipBackPhoto'], 'applicantCitizenshipBackPhoto');

        // if($otherDocumentsData['applicantCitizenshipBackPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantCitizenshipBackPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantCitizenshipBackPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['applicantThumbPhoto']) && !empty($_FILES['applicantThumbPhoto']) && $_FILES['applicantThumbPhoto']['error'] == 0){
        $otherDocumentsData['applicantThumbPhoto'] = uploadSingleFile($_FILES['applicantThumbPhoto'], 'applicantThumbPhoto');

        // if($otherDocumentsData['applicantThumbPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantThumbPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantThumbPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['applicantSignaturePhoto']) && !empty($_FILES['applicantSignaturePhoto']) && $_FILES['applicantSignaturePhoto']['error'] == 0){
        $otherDocumentsData['applicantSignaturePhoto'] = uploadSingleFile($_FILES['applicantSignaturePhoto'], 'applicantSignaturePhoto');

        // if($otherDocumentsData['applicantSignaturePhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'applicantSignaturePhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'applicantSignaturePhoto/'.$_POST['old_image']);
        // }
    }

    //guardian details
    $guardianDetailsData = array();
    $guardianDetailsData['guardianFirstName'] = sanitize($_POST['guardianFirstName']);
    $guardianDetailsData['guardianMiddleName'] = sanitize($_POST['guardianMiddleName']);
    $guardianDetailsData['guardianLastName'] = sanitize($_POST['guardianLastName']);
    $guardianDetailsData['guardianRelation'] = sanitize($_POST['guardianRelation']);
    $guardianDetailsData['guardianFatherName'] = sanitize($_POST['guardianFatherName']);
    $guardianDetailsData['guardianGrandFatherName'] = sanitize($_POST['guardianGrandFatherName']);
    $guardianDetailsData['guardianSpouseName'] = sanitize($_POST['guardianSpouseName']);
    $guardianDetailsData['guardianCitizenshipNo'] = sanitize($_POST['guardianCitizenshipNo']);
    $guardianDetailsData['guardianAddress'] = sanitize($_POST['guardianAddress']);
    $guardianDetailsData['guardian_province'] = sanitize($_POST['guardian_province']);
    $guardianDetailsData['guardian_zone'] = sanitize($_POST['guardian_zone']);
    $guardianDetailsData['guardian_district'] = sanitize($_POST['guardian_district']);
    $guardianDetailsData['guardian_vdc'] = sanitize($_POST['guardian_vdc']);
    $guardianDetailsData['guardian_blockNo'] = sanitize($_POST['guardian_blockNo']);
    $guardianDetailsData['guardian_ward'] = sanitize($_POST['guardian_ward']);
    $guardianDetailsData['guardian_phoneno'] = sanitize($_POST['guardian_phoneno']);
    $guardianDetailsData['guardian_mobileno'] = sanitize($_POST['guardian_mobileno']);
    $guardianDetailsData['guardian_panno'] = sanitize($_POST['guardian_panno']);
    $guardianDetailsData['guardian_email'] = sanitize($_POST['guardian_email']);
    $guardianDetailsData['guardian_citizenshiptIssueDistrict'] = sanitize($_POST['guardian_citizenshiptIssueDistrict']);
    $guardianDetailsData['guardian_citizenshipIssueDateBS'] = sanitize($_POST['guardian_citizenshipIssueDateBS']);
    $guardianDetailsData['guardian_citizenshipIssueDateAD'] = sanitize($_POST['guardian_citizenshipIssueDateAD']);
    $guardianDetailsData['guardian_DOBBS'] = sanitize($_POST['guardian_DOBBS']);
    $guardianDetailsData['guardian_DOBAD'] = sanitize($_POST['guardian_DOBAD']);
    if(isset($_FILES['guardianPhoto']) && !empty($_FILES['guardianPhoto']) && $_FILES['guardianPhoto']['error'] == 0){
        $guardianDetailsData['guardianPhoto'] = uploadSingleFile($_FILES['guardianPhoto'], 'guardianPhoto');

        // if($guardianDetailsData['guardianPhoto'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'guardianPhoto/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'guardianPhoto/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['guardianSignature']) && !empty($_FILES['guardianSignature']) && $_FILES['guardianSignature']['error'] == 0){
        $guardianDetailsData['guardianSignature'] = uploadSingleFile($_FILES['guardianSignature'], 'guardianSignature');

        // if($guardianDetailsData['guardianSignature'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'guardianSignature/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'guardianSignature/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['guardianCitizenshipFront']) && !empty($_FILES['guardianCitizenshipFront']) && $_FILES['guardianCitizenshipFront']['error'] == 0){
        $guardianDetailsData['guardianCitizenshipFront'] = uploadSingleFile($_FILES['guardianCitizenshipFront'], 'guardianCitizenshipFront');

        // if($guardianDetailsData['guardianCitizenshipFront'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'guardianCitizenshipFront/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'guardianCitizenshipFront/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['guardianCitizenshipBack']) && !empty($_FILES['guardianCitizenshipBack']) && $_FILES['guardianCitizenshipBack']['error'] == 0){
        $guardianDetailsData['guardianCitizenshipBack'] = uploadSingleFile($_FILES['guardianCitizenshipBack'], 'guardianCitizenshipBack');

        // if($guardianDetailsData['guardianCitizenshipBack'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'guardianCitizenshipBack/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'guardianCitizenshipBack/'.$_POST['old_image']);
        // }
    }
    if(isset($_FILES['guardianProof']) && !empty($_FILES['guardianProof']) && $_FILES['guardianProof']['error'] == 0){
        $guardianDetailsData['guardianProof'] = uploadSingleFile($_FILES['guardianProof'], 'guardianProof');

        // if($guardianDetailsData['guardianProof'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'guardianProof/'.$_POST['old_image'])){
        //     unlink(UPLOAD_DIR.'guardianProof/'.$_POST['old_image']);
        // }
    }

    //$id = isset($_POST['id']) ? (int)$_POST['id'] : NULL;
    $firstSection = $firstSection->addFirstSection($firstSectionData);
    $beneficialOwner = $beneficialOwner->addBeneficialOwner($beneficialOwnerData);
    $correspondenceAddress = $correspondenceAddress->addCorrespondenceAddress($correspondenceAddressData);
    $permanentAddress = $permanentAddress->addPermanentAddress($permanentAddressData);
    $certificateDetails = $certificateDetails->addCertificateDetails($certificateDetailsData);
    $occupationDetails = $occupationDetails->addOccupationDetails($occupationDetailsData);
    $nomineeDetails = $nomineeDetails->addNomineeDetails($nomineeDetailsData);
    $guardianDetails = $guardianDetails->addGuardianDetails($guardianDetailsData);  
    $otherDocuments = $otherDocuments->addOtherDocuments($otherDocumentsData);

    
    $form = $form->addForm();

    if($form){
        redirect('../', 'success', 'saved successfully.');
    } else {
        redirect('../', 'error', 'Sorry! There was a problem while saving');
    }
}

?>