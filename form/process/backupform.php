<?php
require '../config/config.php';
require '../config/functions.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/model.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/form.php';

$form = new Form();

if(isset($_POST) && !empty($_POST)){
    //debugger($_POST);
    debugger($_FILES, true);

    $data = array();
    // $data['accountType'] = sanitize($_POST['accountType']);
    // $data['minor'] = sanitize($_POST['minor']);
    // $data['meroShareService'] = sanitize($_POST['meroShareService']);
    // $data['maritalStatus'] = sanitize($_POST['maritalStatus']);
    // $data['title'] = sanitize($_POST['title']);
    $data['firstName'] = sanitize($_POST['firstName']);
    $data['middleName'] = sanitize($_POST['middleName']);
    $data['lastName'] = sanitize($_POST['lastName']);
    // $data['fathersName'] = sanitize($_POST['fathersName']);
    // $data['grandFathersName'] = sanitize($_POST['grandFathersName']);
    // $data['mothersName'] = sanitize($_POST['mothersName']);
    // $data['correspondence_province'] = sanitize($_POST['correspondence_province']);
    // $data['correspondence_zone'] = sanitize($_POST['correspondence_zone']);
    // $data['correspondence_district'] = sanitize($_POST['correspondence_district']);
    // $data['correspondence_vdc'] = sanitize($_POST['correspondence_vdc']);
    // $data['correspondence_tole'] = sanitize($_POST['correspondence_tole']);
    // $data['correspondence_ward'] = sanitize($_POST['correspondence_ward']);
    // $data['correspondence_blockno'] = sanitize($_POST['correspondence_blockno']);
    // $data['correspondence_phoneno'] = sanitize($_POST['correspondence_phoneno']);
    // $data['correspondence_mobileno'] = sanitize($_POST['correspondence_mobileno']);
    // $data['correspondence_email'] = sanitize($_POST['correspondence_email']);
    // $data['permanent_province'] = sanitize($_POST['permanent_province']);
    // $data['permanent_zone'] = sanitize($_POST['permanent_zone']);
    // $data['permanent_district'] = sanitize($_POST['permanent_district']);
    // $data['permanent_vdc'] = sanitize($_POST['permanent_vdc']);
    // $data['permanent_tole'] = sanitize($_POST['permanent_tole']);
    // $data['permanent_ward'] = sanitize($_POST['permanent_ward']);
    // $data['permanent_blockno'] = sanitize($_POST['permanent_blockno']);
    // $data['permanent_phoneno'] = sanitize($_POST['permanent_phoneno']);
    // $data['permanent_mobileno'] = sanitize($_POST['permanent_mobileno']);
    // $data['permanent_email'] = sanitize($_POST['permanent_email']);
    // $data['citizenshipNo'] = sanitize($_POST['citizenshipNo']);
    // $data['citizenshipIssueDistrict'] = sanitize($_POST['citizenshipIssueDistrict']);
    // $data['CitizenshipIssueDateBS'] = sanitize($_POST['CitizenshipIssueDateBS']);
    // $data['CitizenshipIssueDateAD'] = sanitize($_POST['CitizenshipIssueDateAD']);
    // $data['DOBBS'] = sanitize($_POST['DOBBS']);
    // $data['DOBAD'] = sanitize($_POST['DOBAD']);
    // $data['gender'] = sanitize($_POST['gender']);
    // $data['panno'] = sanitize($_POST['panno']);
    // $data['bankAccountType'] = sanitize($_POST['bankAccountType']);
    // $data['bankAccountno'] = sanitize($_POST['bankAccountno']);
    // $data['bank'] = sanitize($_POST['bank']);
    // $data['branch'] = sanitize($_POST['branch']);
    // $data['occupationType'] = sanitize($_POST['occupationType']);
    // $data['businessType'] = sanitize($_POST['businessType']);
    // $data['organizationName'] = sanitize($_POST['organizationName']);
    // $data['organizationAddress'] = sanitize($_POST['organizationAddress']);
    // $data['designation'] = sanitize($_POST['designation']);
    // $data['income'] = sanitize($_POST['income']);
    // $data['nomineeDetail'] = sanitize($_POST['nomineeDetail']);
    
    // // $data['status'] = (int)sanitize($_POST['status']); //data from form is always string so int must be defined
    
    // // $data['added_by'] = $_SESSION['admin_id'];

    // // $pro_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : NULL;

    // if(isset($_FILES['applicantPhoto']) && !empty($_FILES['applicantPhoto']) && $_FILES['applicantPhoto']['error'] == 0){
    //     $data['applicantPhoto'] = uploadSingleFile($_FILES['applicantPhoto'], 'applicantPhoto');

    //     // if($data['image'] != NULL && isset($_POST['old_image']) && !empty($_POST['old_image']) && file_exists(UPLOAD_DIR.'product/'.$_POST['old_image'])){
    //     //     unlink(UPLOAD_DIR.'product/'.$_POST['old_image']);
    //     // }
    // }

    // if(isset($_FILES['applicantCitizenshipFrontPhoto']) && !empty($_FILES['applicantCitizenshipFrontPhoto']) && $_FILES['applicantCitizenshipFrontPhoto']['error'] == 0){
    //     $data['applicantCitizenshipFrontPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipFrontPhoto'], 'applicantCitizenshipFrontPhoto');
    // }

    // if(isset($_FILES['applicantCitizenshipBackPhoto']) && !empty($_FILES['applicantCitizenshipBackPhoto']) && $_FILES['applicantCitizenshipBackPhoto']['error'] == 0){
    //     $data['applicantCitizenshipBackPhoto'] = uploadSingleFile($_FILES['applicantCitizenshipBackPhoto'], 'applicantCitizenshipBackPhoto');
    // }

    // if(isset($_FILES['applicantThumbPhoto']) && !empty($_FILES['applicantThumbPhoto']) && $_FILES['applicantThumbPhoto']['error'] == 0){
    //     $data['applicantThumbPhoto'] = uploadSingleFile($_FILES['applicantThumbPhoto'], 'applicantThumbPhoto');
    // }

    // if(isset($_FILES['applicantSignaturePhoto']) && !empty($_FILES['applicantSignaturePhoto']) && $_FILES['applicantSignaturePhoto']['error'] == 0){
    //     $data['applicantSignaturePhoto'] = uploadSingleFile($_FILES['applicantSignaturePhoto'], 'applicantSignaturePhoto');
    // }

    // //guardian
    // $data['guardianFirstName'] = sanitize($_POST['guardianFirstName']);
    // $data['guardianMiddleName'] = sanitize($_POST['guardianMiddleName']);
    // $data['guardianLastName'] = sanitize($_POST['guardianLastName']);
    // $data['guardianRelation'] = sanitize($_POST['guardianRelation']);
    // $data['guardianFathersName'] = sanitize($_POST['guardianFathersName']);
    // $data['guardiangrandFathersName'] = sanitize($_POST['guardiangrandFathersName']);
    // $data['guardianSpouseName'] = sanitize($_POST['guardianSpouseName']);
    // $data['guardianCitizenshipNo'] = sanitize($_POST['guardianCitizenshipNo']);
    // $data['guardian_province'] = sanitize($_POST['guardian_province']);
    // $data['guardian_zone'] = sanitize($_POST['guardian_zone']);
    // $data['guardian_district'] = sanitize($_POST['guardian_district']);
    // $data['guardian_vdc'] = sanitize($_POST['guardian_vdc']);
    // $data['guardian_blockNo'] = sanitize($_POST['guardian_blockNo']);
    // $data['guardian_ward'] = sanitize($_POST['guardian_ward']);
    
    // $data['guardian_phoneno'] = sanitize($_POST['guardian_phoneno']);
    // $data['guardian_panno'] = sanitize($_POST['guardian_panno']);
    // $data['guardian_email'] = sanitize($_POST['guardian_email']);
    // $data['guardian_citizenshiptIssueDistrict'] = sanitize($_POST['guardian_citizenshiptIssueDistrict']);
    // $data['guardian_citizenshipIssueDateBS'] = sanitize($_POST['guardian_citizenshipIssueDateBS']);
    // $data['guardian_citizenshipIssueDateAD'] = sanitize($_POST['guardian_citizenshipIssueDateAD']);
    // $data['guardian_DOBBS'] = sanitize($_POST['guardian_DOBBS']);
    // $data['guardian_DOBAD'] = sanitize($_POST['guardian_DOBAD']);

    // if(isset($_FILES['applicantThumbPhoto']) && !empty($_FILES['applicantThumbPhoto']) && $_FILES['applicantThumbPhoto']['error'] == 0){
    //     $data['applicantThumbPhoto'] = uploadSingleFile($_FILES['applicantThumbPhoto'], 'applicantThumbPhoto');
    // }

    // if(isset($_FILES['guardianSignature']) && !empty($_FILES['guardianSignature']) && $_FILES['guardianSignature']['error'] == 0){
    //     $data['guardianSignature'] = uploadSingleFile($_FILES['guardianSignature'], 'guardianSignature');
    // }

    // if(isset($_FILES['guardianCitizenshipBack']) && !empty($_FILES['guardianCitizenshipBack']) && $_FILES['guardianCitizenshipBack']['error'] == 0){
    //     $data['guardianCitizenshipBack'] = uploadSingleFile($_FILES['guardianCitizenshipBack'], 'guardianCitizenshipBack');
    // }

    // if(isset($_FILES['guardianProof']) && !empty($_FILES['guardianProof']) && $_FILES['guardianProof']['error'] == 0){
    //     $data['guardianProof'] = uploadSingleFile($_FILES['guardianProof'], 'guardianProof');
    // }

    // if($pro_id != NULL){
    //     $act = "Updat";
    //     $product_id = $product->updateProduct($data, $pro_id); //for update
    // } else {
    //     $act = "Add";
    //     $product_id = $product->addProduct($data); // for create
    // }

    // if($product_id){
    //     redirect('../product', 'success', 'Product '.$act.'ed successfully.');
    // } else {
    //     redirect('../product', 'error', 'Sorry! There was a problem while '.$act.'ing product.');
    // }
}
?>