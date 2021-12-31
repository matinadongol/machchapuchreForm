<?php
include "admin\inc\header.php";
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/model.php';
if ( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ){
    //debugger($_GET, true);
    $id = (int)$_GET['id'];
    $result = mysqli_query($conn,"SELECT id, firstsection from form where id = $id;") or die( mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    // echo $row["id"];
    // echo $row["firstsection"];
    $result2 = mysqli_query($conn,"SELECT firstsection.accountType, firstsection.minor, firstsection.meroShareService, firstsection.maritalStatus, form.id FROM firstsection RIGHT join form on firstsection.firstsection_id = $id;") or die( mysqli_error($conn));
    $row2 = mysqli_fetch_array($result2);
    //echo $row2["accountType"];
    $result3 = mysqli_query($conn,"SELECT beneficialowner.title, beneficialowner.firstName, beneficialowner.middleName, beneficialowner.lastName, beneficialowner.fathersName, beneficialowner.grandFathersName, beneficialowner.mothersName, form.id FROM beneficialowner RIGHT join form on beneficialowner.beneficialowner_id = $id;") or die( mysqli_error($conn));
    $row3 = mysqli_fetch_array($result3);

    $result4 = mysqli_query($conn,"SELECT correspondenceaddress.correspondence_province, correspondenceaddress.correspondence_zone, correspondenceaddress.correspondence_district, correspondenceaddress.correspondence_vdc, correspondenceaddress.correspondence_tole, correspondenceaddress.correspondence_ward, correspondenceaddress.correspondence_blockno, correspondenceaddress.correspondence_phoneno, correspondenceaddress.correspondence_mobileno, correspondenceaddress.correspondence_email, form.id from correspondenceaddress RIGHT JOIN form On correspondenceaddress.id = $id;") or die( mysqli_error($conn));
    $row4 = mysqli_fetch_array($result4);

    $result5 = mysqli_query($conn,"SELECT permanentaddress.permanent_province, permanentaddress.permanent_zone, permanentaddress.permanent_district, permanentaddress.permanent_vdc, permanentaddress.permanent_tole, permanentaddress.permanent_ward, permanentaddress.permanent_blockno, permanentaddress.permanent_phoneno, permanentaddress.permanent_mobileno, permanentaddress.permanent_email, form.id from permanentaddress RIGHT JOIN form On permanentaddress.id = $id;") or die( mysqli_error($conn));
    $row5 = mysqli_fetch_array($result5);

    $result6 = mysqli_query($conn,"SELECT certificatedetails.citizenshipNo, certificatedetails.citizenshipIssueDistrict, certificatedetails.CitizenshipIssueDateBS , certificatedetails.CitizenshipIssueDateAD, certificatedetails.DOBBS, certificatedetails.DOBAD, certificatedetails.gender, certificatedetails.panno, form.id from certificatedetails RIGHT JOIN form On certificatedetails.id = $id;") or die( mysqli_error($conn));
    $row6 = mysqli_fetch_array($result6);

    $result7 = mysqli_query($conn,"SELECT bankdetails.bankAccountType, bankdetails.bankAccountno, bankdetails.bank, bankdetails.branch, form.id from bankdetails RIGHT JOIN form On bankdetails.id = $id;") or die( mysqli_error($conn));
    $row7 = mysqli_fetch_array($result7);

    $result8 = mysqli_query($conn,"SELECT occupationdetails.occupationType, occupationdetails.businessType, occupationdetails.organizationName, occupationdetails.organizationAddress,occupationdetails.designation, occupationdetails.income, form.id from occupationdetails RIGHT JOIN form On occupationdetails.id = $id;") or die( mysqli_error($conn));
    $row8 = mysqli_fetch_array($result8);

    $result9 = mysqli_query($conn,"SELECT nomineedetails.nominee, nomineedetails.nomimeeName, nomineedetails.nomineeFathersName, nomineedetails.nomineeRelationship,nomineedetails.referenceDocument, nomineedetails.nomineeDoc, nomineedetails.placeOfIssue, nomineedetails.nomineeIssueYear, nomineedetails.nomineeAge, nomineedetails.nominee_zone, nomineedetails.nominee_district, nomineedetails.nominee_phoneno, nomineedetails.nominee_mobileno, nomineedetails.nominee_email, nomineedetails.nominee_panno, nomineedetails.nominee_correspondenceAddress, nomineedetails.nomineePhoto, form.id from nomineedetails RIGHT JOIN form On nomineedetails.id = $id;") or die( mysqli_error($conn));
    $row9 = mysqli_fetch_array($result9);

    $result10 = mysqli_query($conn,"SELECT guardiandetails.guardianFirstName, guardiandetails.guardianMiddleName, guardiandetails.guardianLastName, guardiandetails.guardianRelation,guardiandetails.guardianFatherName, guardiandetails.guardianGrandFatherName, guardiandetails.guardianSpouseName, guardiandetails.guardianCitizenshipNo, guardiandetails.guardianAddress, guardiandetails.guardian_province, guardiandetails.guardian_zone, guardiandetails.guardian_district, guardiandetails.guardian_vdc, guardiandetails.guardian_blockNo, guardiandetails.guardian_ward, guardiandetails.guardian_phoneno, guardiandetails.guardian_mobileno, guardiandetails.guardian_panno, guardiandetails.guardian_email, guardiandetails.guardian_citizenshiptIssueDistrict, guardiandetails.guardian_citizenshipIssueDateBS, guardiandetails.guardian_citizenshipIssueDateAD, guardiandetails.guardian_DOBBS, guardiandetails.guardian_DOBAD, form.id from guardiandetails RIGHT JOIN form On guardiandetails.id = $id;") or die( mysqli_error($conn));
    $row10 = mysqli_fetch_array($result10);
?>

<div class="container my-2">
    <h6>Account Detail</h6>

    <p>Type of Account: <?php echo $row2["accountType"]; ?></p>
    <p>Minor : <?php echo $row2["minor"]; ?></p>
    <p>Mero Share Service : <?php echo $row2["meroShareService"]; ?></p>
    <p>Maritial Status: <?php echo $row2["maritalStatus"]; ?></p>

    <h6>Beneficial Owner</h6>
    <p>Title: <?php echo $row3["title"]; ?></p>
    <p>First Name: <?php echo $row3["firstName"]; ?></p>
    <p>Middle Name: <?php echo $row3["middleName"]; ?></p>
    <p>Last Name: <?php echo $row3["lastName"]; ?></p>
    <p>Father's Name: <?php echo $row3["fathersName"]; ?></p>
    <p>Grandfather's Name: <?php echo $row3["grandFathersName"]; ?></p>
    <p>Mother's Name: <?php echo $row3["mothersName"]; ?></p>

    <h6>Correspondence Address</h6>
    <p>Province: <?php echo $row4["correspondence_province"]; ?></p>
    <p>Zone: <?php echo $row4["correspondence_zone"]; ?></p>
    <p>District: <?php echo $row4["correspondence_district"]; ?></p>
    <p>VDC: <?php echo $row4["correspondence_vdc"]; ?></p>
    <p>Tole: <?php echo $row4["correspondence_tole"]; ?></p>
    <p>Ward: <?php echo $row4["correspondence_ward"]; ?></p>
    <p>Block no: <?php echo $row4["correspondence_blockno"]; ?></p>
    <p>Phone no: <?php echo $row4["correspondence_phoneno"]; ?></p>
    <p>Mobile no: <?php echo $row4["correspondence_mobileno"]; ?></p>
    <p>Email: <?php echo $row4["correspondence_email"]; ?></p>

    <h6>Permanent Address</h6>
    <p>Province: <?php echo $row5["permanent_province"]; ?></p>
    <p>Zone: <?php echo $row5["permanent_zone"]; ?></p>
    <p>District: <?php echo $row5["permanent_district"]; ?></p>
    <p>VDC: <?php echo $row5["permanent_vdc"]; ?></p>
    <p>Tole: <?php echo $row5["permanent_tole"]; ?></p>
    <p>Ward: <?php echo $row5["permanent_ward"]; ?></p>
    <p>Block no: <?php echo $row5["permanent_blockno"]; ?></p>
    <p>Phone no: <?php echo $row5["permanent_phoneno"]; ?></p>
    <p>Mobile no: <?php echo $row5["permanent_mobileno"]; ?></p>
    <p>Email: <?php echo $row5["permanent_email"]; ?></p>

    <h6>Certificate Details</h6>
    <p>citizenshipNo: <?php echo $row6["citizenshipNo"]; ?></p>
    <p>citizenshipIssueDistrict: <?php echo $row6["citizenshipIssueDistrict"]; ?></p>
    <p>CitizenshipIssueDateBS: <?php echo $row6["CitizenshipIssueDateBS"]; ?></p>
    <p>CitizenshipIssueDateAD: <?php echo $row6["CitizenshipIssueDateAD"]; ?></p>
    <p>DOBBS: <?php echo $row6["DOBBS"]; ?></p>
    <p>DOBAD: <?php echo $row6["DOBAD"]; ?></p>
    <p>gender: <?php echo $row6["gender"]; ?></p>
    <p>panno: <?php echo $row6["panno"]; ?></p>

    <h6>Bank Details</h6>
    <p>bankAccountType: <?php echo $row7["bankAccountType"]; ?></p>
    <p>bankAccountno: <?php echo $row7["bankAccountno"]; ?></p>
    <p>bank: <?php echo $row7["bank"]; ?></p>
    <p>branch: <?php echo $row7["branch"]; ?></p>

    <h6>Occupation Details</h6>
    <p>occupationType: <?php echo $row8["occupationType"]; ?></p>
    <p>businessType: <?php echo $row8["businessType"]; ?></p>
    <p>organizationName: <?php echo $row8["organizationName"]; ?></p>
    <p>organizationAddress: <?php echo $row8["organizationAddress"]; ?></p>
    <p>designation: <?php echo $row8["designation"]; ?></p>
    <p>income: <?php echo $row8["income"]; ?></p>

    <h6>Nominee Details</h6>
    <p>nominee: <?php echo $row9["nominee"]; ?></p>
    <p>nomimeeName: <?php echo $row9["nomimeeName"]; ?></p>
    <p>nomineeFathersName: <?php echo $row9["nomineeFathersName"]; ?></p>
    <p>nomineeRelationship: <?php echo $row9["nomineeRelationship"]; ?></p>
    <p>referenceDocument: <?php echo $row9["referenceDocument"]; ?></p>
    <p>placeOfIssue: <?php echo $row9["placeOfIssue"]; ?></p>
    <p>nomineeIssueYear: <?php echo $row9["nomineeIssueYear"]; ?></p>
    <p>nominee_zone: <?php echo $row9["nominee_zone"]; ?></p>
    <p>nominee_district: <?php echo $row9["nominee_district"]; ?></p>
    <p>nominee_phoneno: <?php echo $row9["nominee_phoneno"]; ?></p>
    <p>nominee_mobileno: <?php echo $row9["nominee_mobileno"]; ?></p>
    <p>nominee_email: <?php echo $row9["nominee_email"]; ?></p>
    <p>nominee_correspondenceAddress: <?php echo $row9["nominee_correspondenceAddress"]; ?></p>
    <p>nomineePhoto: <?php echo $row9["nomineePhoto"]; ?></p>

    <h6>Guardian Details</h6>
    <p>guardianFirstName: <?php echo $row10["guardianFirstName"]; ?></p>
    <p>guardianMiddleName: <?php echo $row10["guardianMiddleName"]; ?></p>
    <p>guardianLastName: <?php echo $row10["guardianLastName"]; ?></p>
    <p>guardianRelation: <?php echo $row10["guardianRelation"]; ?></p>
    <p>guardianFatherName: <?php echo $row10["guardianFatherName"]; ?></p>
    <p>guardianGrandFatherName: <?php echo $row10["guardianGrandFatherName"]; ?></p>
    <p>guardianSpouseName: <?php echo $row10["guardianSpouseName"]; ?></p>
    <p>guardianCitizenshipNo: <?php echo $row10["guardianCitizenshipNo"]; ?></p>
    <p>guardianAddress: <?php echo $row10["guardianAddress"]; ?></p>
    <p>guardian_province: <?php echo $row10["guardian_province"]; ?></p>
    <p>guardian_zone: <?php echo $row10["guardian_zone"]; ?></p>
    <p>guardian_district: <?php echo $row10["guardian_district"]; ?></p>
    <p>guardian_vdc: <?php echo $row10["guardian_vdc"]; ?></p>
    <p>guardian_blockNo: <?php echo $row10["guardian_blockNo"]; ?></p>
    <p>guardian_ward: <?php echo $row10["guardian_ward"]; ?></p>
    <p>guardian_phoneno: <?php echo $row10["guardian_phoneno"]; ?></p>
    <p>guardian_mobileno: <?php echo $row10["guardian_mobileno"]; ?></p>
    <p>guardian_panno: <?php echo $row10["guardian_panno"]; ?></p>
    <p>guardian_email: <?php echo $row10["guardian_email"]; ?></p>
    <p>guardian_citizenshiptIssueDistrict: <?php echo $row10["guardian_citizenshiptIssueDistrict"]; ?></p>
    <p>guardian_citizenshipIssueDateBS: <?php echo $row10["guardian_citizenshipIssueDateBS"]; ?></p>
    <p>guardian_citizenshipIssueDateAD: <?php echo $row10["guardian_citizenshipIssueDateAD"]; ?></p>
    <p>guardian_DOBBS: <?php echo $row10["guardian_DOBBS"]; ?></p>
    <p>guardian_DOBAD: <?php echo $row10["guardian_DOBAD"]; ?></p>
</div>
<?php
}
?>
<?php
include "admin/inc/footer.php";
?>