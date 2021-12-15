<?php
include "admin\inc\header.php";
require $_SERVER['DOCUMENT_ROOT'].'/form/class/model.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/bank.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/bankAccountType.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/branch.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/businessType.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/district.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/gender.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/income.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/occupationType.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/province.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/title.php';
require $_SERVER['DOCUMENT_ROOT'].'/form/class/zone.php';

$bank = new Bank();
$bankAccountType = new BankAccountType();
$businessType = new BusinessType();
$branch = new Branch();
$district = new District();
$gender = new Gender();
$income = new Income();
$occupationType = new OccupationType();
$province = new Province();
$title = new Title();
$zone = new Zone();
?>
<div class="heading text-center">
    <h2 class="mainheading">Account Opening Form for Individual Benificial Owner</h2>
</div>
<div class="container">
    <form action="process\form.php" method="post" enctype="multipart/form-data">
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Type of Account / खाताको प्रकार <span class="red">*</span></b></p>
                <input type="radio" id="Individual" name="accountType" value="Individual"
                    <?php if (isset($accountType) && $accountType=="Individual") $_POST['accountType'];?> />
                <label for="html">Individual / व्यक्तिगत</label><br>
                <input type="radio" id="NonResidentNepalese" name="accountType" value="NonResidentNepalese"
                    <?php if (isset($accountType) && $accountType=="NonResidentNepalese") $_POST['NaccountType'];?> />
                <label for="html">Non Resident Nepalese / गैर आवासिय नेपाली</label>
            </div>
            <div class="col-lg-3">
                <p><b>Minor / नाबालक <span class="red">*</span></b></p>
                <input type="checkbox" id="isMinor" name="minor" value="minor" onchange="isAMinor()"
                    <?php if (isset($minor) && $minor=="minor") $_POST['minor'];?> />
                <label for="html">Yes / हो</label><br>
                <input type="checkbox" id="notMinor" name="minor" value="notMinor"
                    <?php if (isset($minor) && $minor=="notMinor") $_POST['minor'];?> />
                <label for="html">No / होईन</label>
            </div>
            <div class="col-lg-3">
                <p><b>Mero Share Service / मेरोशेयर सेवा <span class="red">*</span></b></p>
                <input type="radio" id="hasMeroShareService" name="meroShareService" value="Yes"
                    <?php if (isset($meroShareService) && $meroShareService=="Yes") $_POST['meroShareService'];?> />
                <label for="html">Yes / हो</label><br>
            </div>
            <div class="col-lg-3">
                <p><b>Maritial Status / वैवाहिक अवस्था <span class="red">*</span></b></p>
                <input type="radio" id="Married" name="maritalStatus" value="Married"
                    <?php if (isset($maritalStatus) && $maritalStatus=="Married") $_POST['maritalStatus'];?> />
                <label for="html">Married / विवाहित</label><br>
                <input type="radio" id="Unmarried" name="maritalStatus" value="Unmarried"
                    <?php if (isset($maritalStatus) && $maritalStatus=="Unmarried") $_POST['maritalStatus'];?> />
                <label for="html">Unmarried / अविवाहित</label>
            </div>
        </div>
        <div class="subheading">
            <h4>Detail of Benificial Owner</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Title / शिर्षक <span class="red">*</span></b></p>
                <select name="title" id="title">
                    <?php
                $all_title = $title->getAllTitle();
                //debugger($all_title);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_title){
                    foreach($all_title as $key=>$title_info){
                ?>
                    <option value="<?php echo $title_info->id; ?>"><?php echo $title_info->title; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>First Name / आवेदकको पहिलो नाम <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="firstName" id="firstName">
            </div>
            <div class="col-lg-3">
                <p><b>Middle Name / आवेदकको बीचको नाम</b></p>
                <input type="text" class="inputTextField" name="middleName" id="middleName">
            </div>
            <div class="col-lg-3">
                <p><b>Last Name / आवेदकको थर <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="lastName" id="lastName">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Father's Name / बुवाको नाम <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="fathersName" id="fathersName">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Grandfather's Name / हजुरबुबाको नाम <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="grandFathersName" id="grandFathersName">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Mother's Name / आमाको नाम <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="mothersName" id="mothersName">
            </div>
        </div>
        <div class="subheading">
            <h4>Correspondence Address / पत्राचार गर्ने ठेगाना</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Province <span class="red">*</span></b></p>
                <select name="correspondence_province" id="correspondence_province">
                    <?php
                $all_province = $province->getAllProvince();
                //debugger($all_province);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                    if($all_province){
                    foreach($all_province as $key=>$province_info){
                ?>
                    <option value="<?php echo $province_info->id; ?>"><?php echo $province_info->name; ?></option>
                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Zone / अञ्चल <span class="red">*</span></b></p>
                <select name="correspondence_zone" id="correspondence_zone">
                    <?php
                $all_zone = $zone->getAllZone();
                //debugger($all_zone);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_zone){
                    foreach($all_zone as $key=>$zone_info){
                ?>
                    <option value="<?php echo $zone_info->id; ?>"><?php echo $zone_info->zone; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>District / जिल्ला <span class="red">*</span></b></p>
                <select name="correspondence_district" id="correspondence_district">
                    <?php
                $all_district = $district->getAllDistrict();
                //debugger($all_district);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_district){
                    foreach($all_district as $key=>$district_info){
                ?>
                    <option value="<?php echo $district_info->id; ?>"><?php echo $district_info->district; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>VDC-Municipality / गाविस -नगरपालिका <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="correspondence_vdc" id="correspondence_vdc">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Tole / टोल <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="correspondence_tole" id="correspondence_tole">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Ward No / वार्ड नं. <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="correspondence_ward" id="correspondence_ward">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Block No / ब्लक नं</b></p>
                <input type="text" class="inputTextField" name="correspondence_blockno" id="correspondence_blockno">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Phone No / फोन नम्बर</b></p>
                <input type="text" class="inputTextField" name="correspondence_phoneno" id="correspondence_phoneno">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Mobile No / मोबाइल नम्बर (10 digits) <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="correspondence_mobileno" id="correspondence_mobileno">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Email / ईमेल <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="correspondence_email" id="correspondence_email">
            </div>
        </div>
        <div class="subheading">
            <h4>Permanent Address (Write Address Same As Citizenship) / स्थाई ठेगाना (ठेगाना नागरिकता अनुसार लेख्नुहोस )
            </h4>
        </div>
        <div class="mt-3">
            <input type="checkbox" id="sameAsCorrespondenceAddress" />
            <label for="html">&nbsp; Same as Correspondence Address / पत्राचार ठेगाना जस्तै</label><br>
        </div>
        <div class="subheading">
            <h4>Identification Certificate Details</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Citizenship No. / नागरिकता नम्बर <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="citizenshipNo" id="citizenshipNo">
            </div>
            <div class="col-lg-3">
                <p><b>Citizenship Issue District / नागरिकता जारी जिल्ला <span class="red">*</span></b></p>
                <select name="citizenshipIssueDistrict" id="citizenshipIssueDistrict">
                    <?php
                $all_district = $district->getAllDistrict();
                //debugger($all_district);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_district){
                    foreach($all_district as $key=>$district_info){
                ?>
                    <option value="<?php echo $district_info->id; ?>"><?php echo $district_info->district; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Citizenship Issue Date (BS) / नागरिकता जारी मिति ( वि . सं ) <span class="red">*</span></b></p>
                <input type="date" class="inputTextField" name="CitizenshipIssueDateBS" id="CitizenshipIssueDateBS">
            </div>
            <div class="col-lg-3">
                <p><b>Citizenship Issue Date (AD) / नागरिकता जारी मिति ( इस्वी सम्बतमा ) <span class="red">*</span></b>
                </p>
                <input type="date" class="inputTextField" name="CitizenshipIssueDateAD" id="CitizenshipIssueDateAD">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>DOB (BS) / जन्म मिति ( वि . सं ) <span class="red">*</span></b></p>
                <input type="date" class="inputTextField" name="DOBBS" id="DOBBS">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>DOB (AD) / जन्म मिति ( इस्वी सम्बतमा ) <span class="red">*</span></b></p>
                <input type="date" class="inputTextField" name="DOBAD" id="DOBAD">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Gender / लिङ्ग <span class="red">*</span></b></p>
                <select name="gender" id="gender">
                    <?php
                $all_gender = $gender->getAllGender();
                //debugger($all_gender);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_gender){
                    foreach($all_gender as $key=>$gender_info){
                ?>
                    <option value="<?php echo $gender_info->id; ?>"><?php echo $gender_info->name; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>PAN No. / प्यान नम्बर</b></p>
                <input type="text" class="inputTextField" name="panno" id="panno">
            </div>
        </div>
        <div class="subheading">
            <h4>Bank Account Details / बैंक खाताको विवरण</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Types Of Bank Account / बैंक खाताका प्रकारहरू <span class="red">*</span></b></p>
                <select name="bankAccountType" id="bankAccountType">
                    <?php
                $all_bankAccountType = $bankAccountType->getAllBankAccountType();
                //debugger($all_bankAccountType);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_bankAccountType){
                    foreach($all_bankAccountType as $key=>$bankAccountType_info){
                ?>
                    <option value="<?php echo $bankAccountType_info->id; ?>"><?php echo $bankAccountType_info->name; ?>
                    </option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Bank Account Number / बैँक खाता नम्बर <span class="red">*</span></b></p>
                <input type="text" class="inputTextField" name="bankAccountno" id="bankAccountno">
            </div>
            <div class="col-lg-3">
                <p><b>Name Of Bank / बैंकको नाम <span class="red">*</span></b></p>
                <select name="bank" id="bank">
                    <?php
                $all_bank = $bank->getAllBank();
                //debugger($all_bank);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_bank){
                    foreach($all_bank as $key=>$bank_info){
                ?>
                    <option value="<?php echo $bank_info->id; ?>"><?php echo $bank_info->bank; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Name Of Branch / शाखा को नाम <span class="red">*</span></b></p>
                <select name="branch" id="branch">
                    <?php
                $all_branch = $branch->getAllBranch();
                //debugger($all_branch);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_branch){
                    foreach($all_branch as $key=>$branch_info){
                ?>
                    <option value="<?php echo $branch_info->id; ?>"><?php echo $branch_info->branch; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
        </div>
        <div class="subheading">
            <h4>Details Of Occupation / पेशागत विवरण</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Occupation Type / व्यवसायको प्रकार <span class="red">*</span></b></p>
                <select name="occupationType" id="occupationType">
                    <?php
                $all_occupationType = $occupationType->getAllOccupationType();
                //debugger($all_occupationType);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_occupationType){
                    foreach($all_occupationType as $key=>$occupationType_info){
                ?>
                    <option value="<?php echo $occupationType_info->id; ?>">
                        <?php echo $occupationType_info->occupationType; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Type Of Business / व्यापारको प्रकार</b></p>
                <select name="businessType" id="businessType">
                    <?php
                $all_businessType = $businessType->getAllBusinessType();
                //debugger($all_businessType);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_businessType){
                    foreach($all_businessType as $key=>$businessType_info){
                ?>
                    <option value="<?php echo $businessType_info->id; ?>">
                        <?php echo $businessType_info->businessType; ?>
                    </option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
            <div class="col-lg-3">
                <p><b>Organization Name / संस्थाको नाम</b></p>
                <input type="text" class="inputTextField" name="organizationName" id="organizationName">
            </div>
            <div class="col-lg-3">
                <p><b>Address / ठेगाना</b></p>
                <input type="text" class="inputTextField" name="organizationAddress" id="organizationAddress">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Designation / पद</b></p>
                <input type="text" class="inputTextField" name="designation" id="designation">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Financial Details / Annual Income</b></p>
                <select name="income" id="income">
                    <?php
                $all_income = $income->getAllIncome();
                //debugger($all_income);
                ?>
                    <option value="" disabled selected>-- Select Any One --</option>
                    <?php
                if($all_income){
                    foreach($all_income as $key=>$income_info){
                ?>
                    <option value="<?php echo $income_info->id; ?>"><?php echo $income_info->income; ?></option>

                    <?php    
                    }
                }
                ?>
                </select>
            </div>
        </div>
        <div class="subheading">
            <h4>Nominee Detail / ईच्छाईको विवरण</h4>
        </div>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <input type="radio" id="Yes" name="fav_language" value="Yes" />
                <label for="html">Yes &nbsp; &nbsp;</label>
                <input type="radio" id="No" name="fav_language" value="No" />
                <label for="html">No</label>
            </div>
        </div>
        <div class="subheading">
            <h4>Other Document अन्य कागजात</h4>
        </div>
        <h5 class="mt-3">Applicant</h5>
        <div class="row sectionrow">
            <div class="col-lg-3">
                <p><b>Applicant Photo
                        आवेदकको फोटो <span class="red">*</span></b></p>
                <input type="file" class="inputTextField" name="applicantPhoto" id="applicantPhoto">
            </div>
            <div class="col-lg-3">
                <p><b>Citizenship of Applicant (Front)
                        नागरिकता (अगाडि) <span class="red">*</span>
                    </b></p>
                <input type="file" class="inputTextField" name="applicantCitizenshipFrontPhoto"
                    id="applicantCitizenshipFrontPhoto">
            </div>
            <div class="col-lg-3">
                <p><b>Citizenship of Applicant (Back)
                        नागरिकता (पछाडि) <span class="red">*</span></b></p>
                <input type="file" class="inputTextField" name="applicantCitizenshipBackPhoto"
                    id="applicantCitizenshipBackPhoto">
            </div>
            <div class="col-lg-3">
                <p><b>Applicant Thumb Print <span class="red">*</span></b></p>
                <input type="file" class="inputTextField" name="applicantThumbPhoto" id="applicantThumbPhoto">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Applicant Signature
                        आवेदक हस्ताक्षर <span class="red">*</span></b></p>
                <input type="file" class="inputTextField" name="applicantSignaturePhoto" id="applicantSignaturePhoto">
            </div>
            <div class="col-lg-3 mt-3">
                <p><b>Sample Image <span class="red">*</span></b></p>
                <div class="sampleimage">
                    <img src="holdingctz.jpg" alt="sample image">
                </div>
            </div>
        </div>
        <div id="minorSection">
            <div class="subheading">
                <h4>Guardian Details / अभिभावक विवरण</h4>
            </div>
            <div class="row sectionrow">
                <div class="col-lg-3">
                    <p><b>First Name / नाम <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianFirstName" id="guardianFirstName">
                </div>
                <div class="col-lg-3">
                    <p><b>Middle Name / अभिभावक नाम</b></p>
                    <input type="text" class="inputTextField" name="guardianMiddleName" id="guardianMiddleName">
                </div>
                <div class="col-lg-3">
                    <p><b>Last Name / अभिभावक थर<span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianLastName" id="guardianLastName">
                </div>
                <div class="col-lg-3">
                    <p><b>Relation With Applicant <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianRelation" id="guardianRelation">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Father Name <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianFatherName" id="guardianFatherName">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Grandfather Name <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianGrandFatherName"
                        id="guardianGrandFatherName">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Spouse Name </b></p>
                    <input type="text" class="inputTextField" name="guardianSpouseName" id="guardianSpouseName">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Citizenship No./ नागरिकता नम्बर <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianCitizenshipNo" id="guardianCitizenshipNo">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Address / पत्राचार गर्ने ठेगाना <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardianAddress" id="guardianAddress">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Province <span class="red">*</span></b></p>
                    <select name="guardian_province" id="guardian_province">
                        <?php
                $all_province = $province->getAllProvince();
                //debugger($all_province);
                ?>
                        <option value="" disabled selected>-- Select Any One --</option>
                        <?php
                    if($all_province){
                    foreach($all_province as $key=>$province_info){
                ?>
                        <option value="<?php echo $province_info->id; ?>"><?php echo $province_info->name; ?></option>
                        <?php    
                    }
                }
                ?>
                    </select>
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Zone / अञ्चल <span class="red">*</span></b></p>
                    <select name="guardian_zone" id="guardian_zone">
                        <?php
                $all_zone = $zone->getAllZone();
                //debugger($all_zone);
                ?>
                        <option value="" disabled selected>-- Select Any One --</option>
                        <?php
                if($all_zone){
                    foreach($all_zone as $key=>$zone_info){
                ?>
                        <option value="<?php echo $zone_info->id; ?>"><?php echo $zone_info->zone; ?></option>

                        <?php    
                    }
                }
                ?>
                    </select>
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>District / जिल्ला <span class="red">*</span></b></p>
                    <select name="guardian_district" id="guardian_district">
                        <?php
                $all_district = $district->getAllDistrict();
                //debugger($all_district);
                ?>
                        <option value="" disabled selected>-- Select Any One --</option>
                        <?php
                if($all_district){
                    foreach($all_district as $key=>$district_info){
                ?>
                        <option value="<?php echo $district_info->id; ?>"><?php echo $district_info->district; ?>
                        </option>

                        <?php    
                    }
                }
                ?>
                    </select>
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>VDC-Municipality/ गाविस - नगरपालिका <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardian_vdv" id="guardian_vdc">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Block No / ब्लक नं <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardian_blockNo" id="guardian_blockNo">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Ward / वार्ड नं. <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardian_ward" id="guardian_ward">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Phone No / फोन नम्बर <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardian_phoneno" id="guardian_phoneno">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Mobile No / मोबाइल नम्बर <span class="red">*</span></b></p>
                    <input type="text" class="inputTextField" name="guardian_mobileno" id="guardian_mobileno">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>PAN No / प्यान नम्बर</b></p>
                    <input type="text" class="inputTextField" name="guardian_panno" id="guardian_panno">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Email / ईमेल <span class="red">*</span></b></p>
                    <input type="email" class="inputTextField" name="guardian_email" id="guardian_email">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Citizenship Issued District/नागरिकता जारी जिल्ला <span class="red">*</span></b></p>
                    <select name="guardian_citizenshiptIssueDistrict" id="guardian_citizenshiptIssueDistrict">
                        <?php
                $all_district = $district->getAllDistrict();
                //debugger($all_district);
                ?>
                        <option value="" disabled selected>-- Select Any One --</option>
                        <?php
                if($all_district){
                    foreach($all_district as $key=>$district_info){
                ?>
                        <option value="<?php echo $district_info->id; ?>"><?php echo $district_info->district; ?>
                        </option>

                        <?php    
                    }
                }
                ?>
                    </select>
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Citizenship Issue Date (BS) / नागरिकता जारी मिति ( वि . सं ) <span class="red">*</span></b>
                    </p>
                    <input type="date" class="inputTextField" name="guardian_citizenshipIssueDateBS"
                        id="guardian_citizenshipIssueDateBS">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Citizenship Issue Date (AD) / नागरिकता जारी मिति ( इस्वी सम्बतमा ) <span
                                class="red">*</span></b>
                    </p>
                    <input type="date" class="inputTextField" name="guardian_citizenshipIssueDateAD"
                        id="guardian_citizenshipIssueDateAD">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>DOB (BS) / जन्म मिति ( वि . सं ) <span class="red">*</span></b></p>
                    <input type="date" class="inputTextField" name="guardian_DOBBS" id="guardian_DOBBS">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>DOB (AD) / जन्म मिति ( इस्वी सम्बतमा ) <span class="red">*</span></b></p>
                    <input type="date" class="inputTextField" name="guardian_DOBAD" id="guardian_DOBAD">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Guardian Photo
                            आवेदकको फोटो <span class="red">*</span></b></p>
                    <input type="file" class="inputTextField" name="guardianPhoto" id="guardianPhoto">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Guardian Signature / हस्ताक्षर <span class="red">*</span></b></p>
                    <input type="file" class="inputTextField" name="guardianSignature" id="guardianSignature">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Guardian Citizenship (Front) / नागरिकता (अगाडि) *<span class="red">*</span></b></p>
                    <input type="file" class="inputTextField" name="guardianCitizenshipFront"
                        id="guardianCitizenshipFront">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Guardian Citizenship (Back) / नागरिकता (पछाडि) *<span class="red">*</span></b></p>
                    <input type="file" class="inputTextField" name="guardianCitizenshipBack"
                        id="guardianCitizenshipBack">
                </div>
                <div class="col-lg-3 mt-3">
                    <p><b>Proof of Relationship With Applicant / आवेदकसँगको सम्बन्धको प्रमाण *<span
                                class="red">*</span></b>
                    </p>
                    <input type="file" class="inputTextField" name="guardianProof" id="guardianProof">
                </div>
            </div>
        </div>
        <div class="subheading">
            <h4>Please make sure/reverify that all the details are correct. Any amendment/changes in the details shall
                charge Rs 100 for each.</h4>
        </div>
        <div class="saveButton">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
    </form>
</div>
<?php
include "admin/inc/footer.php";
?>