$(".show_minor").hide();
$(".show_notminor").show();
$(".show_notminor1").show();

function isAMinor() {
    $(".show_minor").show();
    $(".show_notminor").hide();
    $(".show_notminor1").hide();

    document.getElementById('minorSection').style.display = 'block';
    document.getElementById("guardianFirstName").classList.add("validations");
    document.getElementById("guardianLastName").classList.add("validations");
    document.getElementById("guardianRelation").classList.add("validations");
    document.getElementById("guardianFatherName").classList.add("validations");
    document.getElementById("guardianGrandFatherName").classList.add("validations");
    document.getElementById("guardianCitizenshipNo").classList.add("validations");
    document.getElementById("guardianAddress").classList.add("validations");
    document.getElementById("guardian_province").classList.add("validations");
    document.getElementById("guardian_zone").classList.add("validations");
    document.getElementById("guardian_district").classList.add("validations");
    document.getElementById("guardian_vdc").classList.add("validations");
    document.getElementById("guardian_ward").classList.add("validations");
    document.getElementById("guardian_mobileno").classList.add("validations");
    document.getElementById("guardian_email").classList.add("validations");
    document.getElementById("guardian_citizenshiptIssueDistrict").classList.add("validations");
    document.getElementById("guardian_citizenshipIssueDateBS").classList.add("validations");
    document.getElementById("guardian_citizenshipIssueDateAD").classList.add("validations");
    document.getElementById("guardian_DOBBS").classList.add("validations");
    document.getElementById("guardian_DOBAD").classList.add("validations");
    document.getElementById("guardianPhoto").classList.add("validations");
    document.getElementById("guardianSignature").classList.add("validations");
    document.getElementById("guardianCitizenshipFront").classList.add("validations");
    document.getElementById("guardianCitizenshipBack").classList.add("validations");
    document.getElementById("guardianProof").classList.add("validations");
}

function notAMinor() {
    document.getElementById('minorSection').style.display = 'none';
    document.getElementById("guardianFirstName").classList.remove("validations");
    document.getElementById("guardianLastName").classList.remove("validations");
    document.getElementById("guardianRelation").classList.remove("validations");
    document.getElementById("guardianFatherName").classList.remove("validations");
    document.getElementById("guardianGrandFatherName").classList.remove("validations");
    document.getElementById("guardianCitizenshipNo").classList.remove("validations");
    document.getElementById("guardianAddress").classList.remove("validations");
    document.getElementById("guardian_province").classList.remove("validations");
    document.getElementById("guardian_zone").classList.remove("validations");
    document.getElementById("guardian_district").classList.remove("validations");
    document.getElementById("guardian_vdc").classList.remove("validations");
    document.getElementById("guardian_ward").classList.remove("validations");
    document.getElementById("guardian_mobileno").classList.remove("validations");
    document.getElementById("guardian_email").classList.remove("validations");
    document.getElementById("guardian_citizenshiptIssueDistrict").classList.remove("validations");
    document.getElementById("guardian_citizenshipIssueDateBS").classList.remove("validations");
    document.getElementById("guardian_citizenshipIssueDateAD").classList.remove("validations");
    document.getElementById("guardian_DOBBS").classList.remove("validations");
    document.getElementById("guardian_DOBAD").classList.remove("validations");
    document.getElementById("guardianPhoto").classList.remove("validations");
    document.getElementById("guardianSignature").classList.remove("validations");
    document.getElementById("guardianCitizenshipFront").classList.remove("validations");
    document.getElementById("guardianCitizenshipBack").classList.remove("validations");
    document.getElementById("guardianProof").classList.remove("validations");

    document.getElementById("applicantCitizenshipBackPhoto").classList.remove("validations");
}

function isANominee() {
    document.getElementById('nomimeeDetail').style.display = 'block';
    document.getElementById("nomimeeName").classList.add("validations");
    document.getElementById("nomineeFathersName").classList.add("validations");
    document.getElementById("nomineeRelationship").classList.add("validations");
    document.getElementById("referenceDocument").classList.add("validations");
    document.getElementById("nomineeDoc").classList.add("validations");
    document.getElementById("placeOfIssue").classList.add("validations");
    document.getElementById("nomineeIssueYear").classList.add("validations");
    document.getElementById("nomineeAge").classList.add("validations");
    document.getElementById("nominee_zone").classList.add("validations");
    document.getElementById("nominee_district").classList.add("validations");
    document.getElementById("nominee_mobileno").classList.add("validations");
    document.getElementById("nominee_email").classList.add("validations");
    document.getElementById("nominee_correspondenceAddress").classList.add("validations");
    document.getElementById("nomineePhoto").classList.add("validations");
    document.getElementById("nomineeDocumentFront").classList.add("validations");
    document.getElementById("nomineeDocumentBack").classList.add("validations");
}

function notANominee() {
    document.getElementById('nomimeeDetail').style.display = 'none';
    document.getElementById("nomimeeName").classList.remove("validations");
    document.getElementById("nomineeFathersName").classList.remove("validations");
    document.getElementById("nomineeRelationship").classList.remove("validations");
    document.getElementById("referenceDocument").classList.remove("validations");
    document.getElementById("nomineeDoc").classList.remove("validations");
    document.getElementById("placeOfIssue").classList.remove("validations");
    document.getElementById("nomineeIssueYear").classList.remove("validations");
    document.getElementById("nomineeAge").classList.remove("validations");
    document.getElementById("nominee_zone").classList.remove("validations");
    document.getElementById("nominee_district").classList.remove("validations");
    document.getElementById("nominee_mobileno").classList.remove("validations");
    document.getElementById("nominee_email").classList.remove("validations");
    document.getElementById("nominee_correspondenceAddress").classList.remove("validations");
    document.getElementById("nomineePhoto").classList.remove("validations");
    document.getElementById("nomineeSignature").classList.remove("validations");
    document.getElementById("nomineeDocumentFront").classList.remove("validations");
    document.getElementById("nomineeDocumentBack").classList.remove("validations");
}