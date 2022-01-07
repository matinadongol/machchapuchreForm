<?php
include "admin\inc\header.php";
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/model.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/bank.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/bankAccountType.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/branch.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/businessType.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/district.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/gender.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/income.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/occupationType.php';;
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/province.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/referenceDocument.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/title.php';
require $_SERVER['DOCUMENT_ROOT'].'/machchapuchreForm/class/zone.php';


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
$referenceDocument = new ReferenceDocument();
$zone = new Zone();
?>
<div class="heading text-center">
    <h2 class="mainheading">Account Opening Form for Individual Benificial Owner</h2>
</div>
<div class="container">
    <form id="regForm" action="process\form.php" method="post" enctype="multipart/form-data">
        <div class="tab">
            <div class="subheading">
                <h4>Account Type</h4>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="font-22"><b>Type of Account / खाताको प्रकार <span class="red">*</span></b></p>
                    <input type="radio" id="Individual" name="accountType" value="Individual" class="radiobuttons"
                        checked="checked"
                        <?php if (isset($accountType) && $accountType=="Individual") $_POST['accountType'];?> />
                    <label for="html" class="font-20">Individual / व्यक्तिगत</label><br>
                    <input type="radio" id="NonResidentNepalese" name="accountType" value="NonResidentNepalese"
                        class="radiobuttons"
                        <?php if (isset($accountType) && $accountType=="NonResidentNepalese") $_POST['accountType'];?> />
                    <label for="html" class="font-20">Non Resident Nepalese / गैर आवासिय नेपाली</label>
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Minor / नाबालक <span class="red">*</span></b></p>
                    <input type="radio" id="isMinor" name="minor" value="minor" onclick="isAMinor()"
                        class="radiobuttons" <?php if (isset($minor) && $minor=="minor") $_POST['minor'];?> />
                    <label for="html" class="font-20">Yes / हो</label><br>
                    <input type="radio" id="notMinor" name="minor" value="notMinor" checked="checked"
                        class="radiobuttons" onclick="notAMinor()"
                        <?php if (isset($minor) && $minor=="notMinor") $_POST['minor'];?> />
                    <label for="html" class="font-20">No / होईन</label>
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Mero Share Service / मेरोशेयर सेवा <span class="red">*</span></b></p>
                    <input type="radio" id="hasMeroShareService" name="meroShareService" value="Yes" checked="checked"
                        class="radiobuttons"
                        <?php if (isset($meroShareService) && $meroShareService=="Yes") $_POST['meroShareService'];?> />
                    <label for="html" class="font-20">Yes / हो</label><br>
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Maritial Status / वैवाहिक अवस्था <span class="red">*</span></b></p>
                    <input type="radio" id="Married" name="maritalStatus" value="Married" class="radiobuttons"
                        <?php if (isset($maritalStatus) && $maritalStatus=="Married") $_POST['maritalStatus'];?> />
                    <label for="html" class="font-20">Married / विवाहित</label><br>
                    <input type="radio" id="Unmarried" name="maritalStatus" value="Unmarried" class="radiobuttons"
                        checked="checked"
                        <?php if (isset($maritalStatus) && $maritalStatus=="Unmarried") $_POST['maritalStatus'];?> />
                    <label for="html" class="font-20">Unmarried / अविवाहित</label>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Detail of Benificial Owner</h4>
            </div>
            <div class="scrollsection">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <p class="font-22"><b>Title / शिर्षक <span class="red">*</span></b></p>
                        <select name="title" id="title" class="validations">
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
                    <div class="col-lg-6">
                        <p class="font-22"><b>First Name / आवेदकको पहिलो नाम <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="firstName" id="firstName">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Middle Name / आवेदकको बीचको नाम</b></p>
                        <input type="text" class="inputTextField" name="middleName" id="middleName">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Last Name / आवेदकको थर <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="lastName" id="lastName">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>Father's Name / बुवाको नाम <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="fathersName" id="fathersName">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>Grandfather's Name / हजुरबुबाको नाम <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="grandFathersName"
                            id="grandFathersName">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>Mother's Name / आमाको नाम <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations font-20" name="mothersName"
                            id="mothersName">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Correspondence Address </h4>
                <h4> पत्राचार गर्ने ठेगाना</h4>
            </div>
            <div class="scrollsection">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <p class="font-22"><b>Province <span class="red">*</span></b></p>
                        <div class="province-select-box">
                            <div class="province-options-container">
                                <?php
                            $all_province = $province->getAllProvince();
                            //debugger($all_province);
                        ?>
                                <?php
                             if($all_province){
                                foreach($all_province as $key=>$province_info){
                        ?>
                                <div class="province-options">
                                    <input type="radio" class="province-radio"
                                        value="<?php echo $province_info->province;?>">
                                    <label for="correspondence_province"><?php echo $province_info->province; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="province-selected validations" name="correspondence_province"
                                placeholder="Select Province" id="correspondence_province" readonly>
                            <div class="province-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Zone / अञ्चल <span class="red">*</span></b></p>
                        <div class="zone-select-box">
                            <div class="zone-options-container">
                                <?php
                            $all_Zone = $zone->getAllZone();
                            //debugger($all_Zone);
                        ?>
                                <?php
                             if($all_Zone){
                                foreach($all_Zone as $key=>$Zone_info){
                        ?>
                                <div class="zone-options">
                                    <input type="radio" class="zone-radio" value="<?php echo $Zone_info->zone;?>">
                                    <label for="zone"><?php echo $Zone_info->zone; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="zone-selected validations" name="correspondence_zone"
                                placeholder="Select Zone" id="correspondence_zone" readonly>
                            <div class="zone-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>District / जिल्ला <span class="red">*</span></b></p>
                        <div class="district-select-box">
                            <div class="district-options-container">
                                <?php
                            $all_district = $district->getAllDistrict();
                            //debugger($all_district);
                        ?>
                                <?php
                             if($all_district){
                                foreach($all_district as $key=>$district_info){
                        ?>
                                <div class="district-options">
                                    <input type="radio" class="district-radio"
                                        value="<?php echo $district_info->district;?>">
                                    <label for="correspondence_district"><?php echo $district_info->district; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="district-selected validations" name="correspondence_district"
                                placeholder="Select District" id="correspondence_district" readonly>
                            <div class="district-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>VDC-Municipality / गाविस -नगरपालिका <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="correspondence_vdc"
                            id="correspondence_vdc">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Tole / टोल <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="correspondence_tole"
                            id="correspondence_tole">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Ward No / वार्ड नं. <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="correspondence_ward"
                            id="correspondence_ward">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Block No / ब्लक नं</b></p>
                        <input type="text" class="inputTextField" name="correspondence_blockno"
                            id="correspondence_blockno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Phone No / फोन नम्बर</b></p>
                        <input type="text" class="inputTextField" name="correspondence_phoneno"
                            id="correspondence_phoneno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Mobile No / मोबाइल नम्बर (10 digits) <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="correspondence_mobileno"
                            id="correspondence_mobileno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Email / ईमेल <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="correspondence_email"
                            id="correspondence_email">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Permanent Address (Write Address Same As Citizenship) </h4>
                <h4> स्थाई ठेगाना (ठेगाना नागरिकता अनुसार
                    लेख्नुहोस )
                </h4>
            </div>
            <div class="my-4">
                <input type="checkbox" class="radiobuttons" id="sameAsCorrespondenceAddress" />
                <label for="html" class="font-20">&nbsp; Same as Correspondence Address / पत्राचार ठेगाना
                    जस्तै</label><br>
            </div>
            <div class="scrollsection">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <p class="font-22"><b>Province <span class="red">*</span></b></p>
                        <div class="permanentProvince-select-box">
                            <div class="permanentProvince-options-container">
                                <?php
                            $all_province = $province->getAllProvince();
                            //debugger($all_province);
                        ?>
                                <?php
                             if($all_province){
                                foreach($all_province as $key=>$province_info){
                        ?>
                                <div class="permanentProvince-options">
                                    <input type="radio" class="permanentProvince-radio"
                                        value="<?php echo $province_info->province;?>">
                                    <label for="permanent_province"><?php echo $province_info->province; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="permanentProvince-selected validations" name="permanent_province"
                                placeholder="Select Province" id="permanent_province" readonly>
                            <div class="permanentProvince-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Zone / अञ्चल <span class="red">*</span></b></p>
                        <div class="permanentZone-select-box">
                            <div class="permanentZone-options-container">
                                <?php
                            $all_Zone = $zone->getAllZone();
                            //debugger($all_Zone);
                        ?>
                                <?php
                             if($all_Zone){
                                foreach($all_Zone as $key=>$Zone_info){
                        ?>
                                <div class="permanentZone-options">
                                    <input type="radio" class="permanentZone-radio"
                                        value="<?php echo $Zone_info->zone;?>">
                                    <label for="zone"><?php echo $Zone_info->zone; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="permanentZone-selected validations" name="permanent_zone"
                                placeholder="Select Permanent Zone" id="permanent_zone" readonly>
                            <div class="permanentZone-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>District / जिल्ला <span class="red">*</span></b></p>
                        <div class="permanentDistrict-select-box">
                            <div class="permanentDistrict-options-container">
                                <?php
                            $all_permanentDistrict = $district->getAllDistrict();
                            //debugger($all_permanentDistrict);
                        ?>
                                <?php
                             if($all_permanentDistrict){
                                foreach($all_permanentDistrict as $key=>$permanentDistrict_info){
                        ?>
                                <div class="permanentDistrict-options">
                                    <input type="radio" class="permanentDistrict-radio"
                                        value="<?php echo $permanentDistrict_info->district;?>">
                                    <label for="zone"><?php echo $permanentDistrict_info->district; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="permanentDistrict-selected validations" name="permanent_district"
                                placeholder="Select District" id="permanent_district" readonly>
                            <div class="permanentDistrict-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>VDC-Municipality / गाविस -नगरपालिका <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="permanent_vdc" id="permanent_vdc">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Tole / टोल <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="permanent_tole" id="permanent_tole">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Ward No / वार्ड नं. <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="permanent_ward" id="permanent_ward">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Block No / ब्लक नं</b></p>
                        <input type="text" class="inputTextField" name="permanent_blockno" id="permanent_blockno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Phone No / फोन नम्बर</b></p>
                        <input type="text" class="inputTextField" name="permanent_phoneno" id="permanent_phoneno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Mobile No / मोबाइल नम्बर (10 digits) <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="permanent_mobileno"
                            id="permanent_mobileno">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Email / ईमेल <span class="red">*</span></b></p>
                        <input type="email" class="inputTextField validations" name="permanent_email"
                            id="permanent_email">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Identification Certificate Details</h4>
            </div>
            <div class="scrollsection">
                <div class="row mb-4">
                    <div class="col-lg-6">
                        <p class="font-22"><b>Citizenship No. <br> नागरिकता नम्बर <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="citizenshipNo" id="citizenshipNo">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Citizenship Issue District <br> नागरिकता जारी जिल्ला <span
                                    class="red">*</span></b></p>
                        <div class="citizenshipIssueDistrict-select-box">
                            <div class="citizenshipIssueDistrict-options-container">
                                <?php
                        $all_district = $district->getAllDistrict();
                        //debugger($all_district);
                    ?>
                                <?php
                             if($all_district){
                                foreach($all_district as $key=>$district_info){
                        ?>
                                <div class="citizenshipIssueDistrict-options">
                                    <input type="radio" class="citizenshipIssueDistrict-radio"
                                        value="<?php echo $district_info->district;?>">
                                    <label for="zone"><?php echo $district_info->district; ?></label>
                                </div>
                                <?php    
                                }
                            }
                            ?>
                            </div>
                            <input type="text" class="citizenshipIssueDistrict-selected validations"
                                name="citizenshipIssueDistrict" placeholder="Select District"
                                id="citizenshipIssueDistrict" readonly>
                            <div class="citizenshipIssueDistrict-search-box">
                                <input type="text" placeholder="search...">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Citizenship Issue Date (BS) <br> नागरिकता जारी मिति ( वि . सं ) <span
                                    class="red">*</span></b>
                        </p>
                        <input type="text" class="inputTextField validations" name="CitizenshipIssueDateBS"
                            id="CitizenshipIssueDateBS">
                    </div>
                    <div class="col-lg-6">
                        <p class="font-22"><b>Citizenship Issue Date (AD) <br> नागरिकता जारी मिति ( इस्वी सम्बतमा )
                                <span class="red">*</span></b>
                        </p>
                        <input type="date" class="inputTextField validations" name="CitizenshipIssueDateAD"
                            id="CitizenshipIssueDateAD">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>DOB (BS) <br> जन्म मिति ( वि . सं ) <span class="red">*</span></b></p>
                        <input type="text" class="inputTextField validations" name="DOBBS" id="DOBBS">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>DOB (AD) <br> जन्म मिति ( इस्वी सम्बतमा ) <span class="red">*</span></b>
                        </p>
                        <input type="date" class="inputTextField validations" name="DOBAD" id="DOBAD">
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>Gender<br> लिङ्ग <span class="red">*</span></b></p>
                        <select name="gender" id="gender" class="validations">
                            <?php
                        $all_gender = $gender->getAllGender();
                        //debugger($all_gender);
                        ?>
                            <option value="" disabled selected>-- Select Any One --</option>
                            <?php
                        if($all_gender){
                            foreach($all_gender as $key=>$gender_info){
                        ?>
                            <option value="<?php echo $gender_info->id; ?>"><?php echo $gender_info->gender; ?></option>

                            <?php    
                            }
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <p class="font-22"><b>PAN No. <br> प्यान नम्बर</b></p>
                        <input type="text" class="inputTextField" name="panno" id="panno">
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Bank Account Details </h4>
                <h4> बैंक खाताको विवरण</h4>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="font-22"><b>Types Of Bank Account <br> बैंक खाताका प्रकारहरू <span
                                class="red">*</span></b>
                    </p>
                    <select name="bankAccountType" id="bankAccountType" class="validations">
                        <?php
                        $all_bankAccountType = $bankAccountType->getAllBankAccountType();
                        //debugger($all_bankAccountType);
                        ?>
                        <option value="" disabled selected>-- Select Any One --</option>
                        <?php
                        if($all_bankAccountType){
                            foreach($all_bankAccountType as $key=>$bankAccountType_info){
                        ?>
                        <option value="<?php echo $bankAccountType_info->id; ?>">
                            <?php echo $bankAccountType_info->bankAccountType; ?>
                        </option>

                        <?php    
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Bank Account Number <br> बैँक खाता नम्बर <span class="red">*</span></b>
                    </p>
                    <input type="text" class="inputTextField validations" name="bankAccountno" id="bankAccountno">
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Name Of Bank <br> बैंकको नाम <span class="red">*</span></b></p>
                    <div class="select-box">
                        <div class="options-container">
                            <?php
                            $all_bank = $bank->getAllBank();
                            //debugger($all_bank);
                        ?>
                            <?php
                            if($all_bank){
                                foreach($all_bank as $key=>$bank_info){
                        ?>
                            <div class="options">
                                <input type="radio" class="radio" value="<?php echo $bank_info->bank;?>">
                                <label for="bank"><?php echo $bank_info->bank; ?></label>
                            </div>
                            <?php    
                                }
                            }
                            ?>
                        </div>
                        <input type="text" class="selected validations" name="bank" placeholder="Select Bank" id="banks"
                            readonly>
                        <div class="search-box">
                            <input type="text" placeholder="search...">
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Name Of Branch <br> शाखा को नाम <span class="red">*</span></b></p>
                    <select disabled name="branch" id="branch" class="validations">
                    </select>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Details Of Occupation </h4>
                <h4> पेशागत विवरण</h4>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="font-22"><b>Occupation Type / व्यवसायको प्रकार <span class="red">*</span></b>
                    </p>
                    <select name="occupationType" id="occupationType" class="validations">
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
                <div class="col-lg-6">
                    <p class="font-22"><b>Type Of Business / व्यापारको प्रकार</b></p>
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
                <div class="col-lg-6">
                    <p class="font-22"><b>Organization Name / संस्थाको नाम</b></p>
                    <input type="text" class="inputTextField" name="organizationName" id="organizationName">
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Address / ठेगाना</b></p>
                    <input type="text" class="inputTextField" name="organizationAddress" id="organizationAddress">
                </div>
                <div class="col-lg-6 mt-3">
                    <p class="font-22"><b>Designation / पद</b></p>
                    <input type="text" class="inputTextField" name="designation" id="designation">
                </div>
                <div class="col-lg-6 mt-3">
                    <p class="font-22"><b>Financial Details / Annual Income</b></p>
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
                        <option value="<?php echo $income_info->id; ?>"><?php echo $income_info->income; ?>
                        </option>

                        <?php    
                    }
                }
                ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Nominee Detail </h4>
                <h4> ईच्छाईको विवरण</h4>
            </div>
            <div class="my-3">
                <input type="radio" id="nominee" name="nominee" class="radiobuttons" value="is_nominee"
                    onclick="isANominee()" <?php if (isset($nominee) && $nominee=="is_nominee") $_POST['nominee'];?> />
                <label for="html" class="font-22">Yes</label><br>
                <input type="radio" id="notnominee" name="nominee" class="radiobuttons" value="not_nominee"
                    checked="checked" onclick="notANominee()"
                    <?php if (isset($nominee) && $nominee=="not_nominee") $_POST['nominee'];?> />
                <label for="html" class="font-22">No / होईन</label>
            </div>
            <div id="nomimeeDetail">
                <div class="scrollsection">
                    <div class="row mb-4">
                        <div class="col-lg-6">
                            <p class="font-22"><b>Name English <br> नाम <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="nomimeeName" id="nomimeeName">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Father's Name <br> बुवाको नाम <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="nomineeFathersName"
                                id="nomineeFathersName">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Relationship <br> सम्बन्ध <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="nomineeRelationship"
                                id="nomineeRelationship">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Reference Document Type<br> कागजात प्रकार <span
                                        class="red">*</span></b>
                            </p>
                            <select name="referenceDocument" id="referenceDocument" class="">
                                <?php
                        $all_referenceDocument = $referenceDocument->getAllReferenceDocument();
                        //debugger($all_referenceDocument);
                        ?>
                                <option value="" disabled selected>-- Select Any One --</option>
                                <?php
                        if($all_referenceDocument){
                            foreach($all_referenceDocument as $key=>$referenceDocument_info){
                        ?>
                                <option value="<?php echo $referenceDocument_info->id; ?>">
                                    <?php echo $referenceDocument_info->referencedocument; ?>
                                </option>

                                <?php    
                            }
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Citizenship / Passport / Birth Certificate <br> (नागरिकता /
                                    पासपोर्ट /
                                    जन्म
                                    प्रमाणपत्र) <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="nomineeDoc" id="nomineeDoc">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Place of Issue <br> जारी को स्थान <span class="red">*</span></b>
                            </p>
                            <div class="placeOfIssue-select-box">
                                <div class="placeOfIssue-options-container">
                                    <?php
                            $all_district = $district->getAllDistrict();
                            //debugger($all_district);
                        ?>
                                    <?php
                             if($all_district){
                                foreach($all_district as $key=>$district_info){
                        ?>
                                    <div class="placeOfIssue-options">
                                        <input type="radio" class="placeOfIssue-radio"
                                            value="<?php echo $district_info->district;?>">
                                        <label
                                            for="correspondence_district"><?php echo $district_info->district; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="placeOfIssue-selected " name="placeOfIssue"
                                    placeholder="Select issued District" id="placeOfIssue" readonly>
                                <div class="placeOfIssue-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Issue Year <span class="red">*</span></b></p>
                            <input type="date" class="inputTextField " name="nomineeIssueYear" id="nomineeIssueYear">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Age <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="nomineeAge" id="nomineeAge">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Zone <br> अञ्चल <span class="red">*</span></b></p>
                            <div class="nomineeZone-select-box">
                                <div class="nomineeZone-options-container">
                                    <?php
                            $all_nomineeZone = $zone->getAllZone();
                            //debugger($all_nomineeZone);
                        ?>
                                    <?php
                            if($all_nomineeZone){
                                foreach($all_nomineeZone as $key=>$nomineeZone_info){
                        ?>
                                    <div class="nomineeZone-options">
                                        <input type="radio" class="nomineeZone-radio"
                                            value="<?php echo $nomineeZone_info->zone;?>">
                                        <label for="nomineeZone"><?php echo $nomineeZone_info->zone; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="nomineeZone-selected " name="nominee_zone"
                                    placeholder="Select Zone" id="nominee_zone" readonly>
                                <div class="nomineeZone-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>District <br> जिल्ला <span class="red">*</span></b></p>
                            <div class="nomineeDistrict-select-box">
                                <div class="nomineeDistrict-options-container">
                                    <?php
                            $all_nomineeDistrict = $district->getAllDistrict();
                            //debugger($all_nomineeDistrict);
                        ?>
                                    <?php
                             if($all_nomineeDistrict){
                                foreach($all_nomineeDistrict as $key=>$nomineeDistrict_info){
                        ?>
                                    <div class="nomineeDistrict-options">
                                        <input type="radio" class="nomineeDistrict-radio"
                                            value="<?php echo $nomineeDistrict_info->district;?>">
                                        <label
                                            for="nominee_district"><?php echo $nomineeDistrict_info->district; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="nomineeDistrict-selected " name="nominee_district"
                                    placeholder="Select District" id="nominee_district" readonly>
                                <div class="nomineeDistrict-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Phone No<br>फोन नम्बर</b></p>
                            <input type="text" class="inputTextField" name="nominee_phoneno" id="nominee_phoneno">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Mobile No<br>मोबाइल नम्बर (10 digits) <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="nominee_mobileno" id="nominee_mobileno">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Email<br>ईमेल <span class="red">*</span></b></p>
                            <input type="email" class="inputTextField " name="nominee_email" id="nominee_email">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Pan No<br>प्यान नम्बर</b></p>
                            <input type="text" class="inputTextField" name="nominee_panno" id="nominee_panno">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Correspondence Address <br> पत्राचार गर्ने ठेगाना <span
                                        class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="nominee_correspondenceAddress"
                                id="nominee_correspondenceAddress">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Nominee Photo<br>फोटो<span class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="nomineePhoto" id="nomineePhoto">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Nominee Signature<br>हस्ताक्षर<span class="red">*</span></b>
                            </p>
                            <input type="file" class="inputTextField " name="nomineeSignature" id="nomineeSignature">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Nominee Birth CertificateCitizenship (Front) <br>
                                    जन्म प्रमाणपत्र वा नागरिकता (अगाडि)<span class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="nomineeDocumentFront"
                                id="nomineeDocumentFront">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Nominee Birth CertificateCitizenship (Back) <br>
                                    जन्म प्रमाणपत्र वा नागरिकता (पछाडि)<span class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="nomineeDocumentBack"
                                id="nomineeDocumentBack">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
            <div class="subheading">
                <h4>Other Document </h4>
                <h4> अन्य कागजात</h4>
            </div>
            <div class="row mb-4">
                <div class="col-lg-6">
                    <p class="font-22"><b>Applicant Photo <br>
                            आवेदकको फोटो <span class="red">*</span></b></p>
                    <input type="file" class="inputTextField validations" name="applicantPhoto" id="applicantPhoto">
                </div>
                <div class="col-lg-6">
                    <p class="font-22 show_notminor"><b>Citizenship of Applicant (Front) <br> जन्मदर्ता प्रमाण (अगाडि)
                            <span class="red">*</span>
                        </b></p>
                    <p class="font-22 show_minor"><b>Birth Certificate of Applicant <br> जन्मदर्ता प्रमाण
                            <span class="red">*</span>
                        </b></p>
                    <input type="file" class="inputTextField validations" name="applicantCitizenshipFrontPhoto"
                        id="applicantCitizenshipFrontPhoto">
                </div>
                <div class="col-lg-6 show_notminor">
                    <p class="font-22"><b>Citizenship of Applicant (Back)<br>जन्मदर्ता प्रमाण (पछाडि)
                            <span class="red">*</span>
                        </b></p>
                    <input type="file" class="inputTextField validations" name="applicantCitizenshipBackPhoto"
                        id="applicantCitizenshipBackPhoto">
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Applicant Thumb Print <br>आवेदकको औंठा छाप<span class="red">*</span></b>
                    </p>
                    <input type="file" class="inputTextField validations" name="applicantThumbPhoto"
                        id="applicantThumbPhoto">
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Location Map of Applicant Residence<br>
                            घर रहेको स्थानको नक्सा <span class="red">*</span></b></p>
                    <input type="file" class="inputTextField validations" name="applicantLocationMapPhoto"
                        id="applicantLocationMapPhoto">
                </div>
                <div class="col-lg-6">
                    <p class="font-22"><b>Applicant Signature<br>
                            आवेदकको हस्ताक्षर <span class="red">*</span></b></p>
                    <input type="file" class="inputTextField validations" name="applicantSignaturePhoto"
                        id="applicantSignaturePhoto">
                </div>
            </div>
        </div>
        <div class="tab">
            <div id="minorSection">
                <div class="subheading">
                    <h4>Guardian Details </h4>
                    <h4> अभिभावक विवरण</h4>
                </div>
                <div class="scrollsection">
                    <div class="row">
                        <div class="col-lg-6">
                            <p class="font-22"><b>First Name <br> नाम <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="guardianFirstName" id="guardianFirstName">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Middle Name <br> अभिभावक नाम</b></p>
                            <input type="text" class="inputTextField" name="guardianMiddleName" id="guardianMiddleName">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Last Name <br> अभिभावक थर<span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardianLastName" id="guardianLastName">
                        </div>
                        <div class="col-lg-6">
                            <p class="font-22"><b>Relation With Applicant<br>आवेदक संग सम्बन्ध <span
                                        class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardianRelation" id="guardianRelation">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Father Name <br> बुबाको नाम<span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="guardianFatherName"
                                id="guardianFatherName">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Grandfather Name <br> हजुरबुबाको नाम<span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="guardianGrandFatherName"
                                id="guardianGrandFatherName">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Spouse Name <br>दम्पतिको नाम</b></p>
                            <input type="text" class="inputTextField" name="guardianSpouseName" id="guardianSpouseName">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Citizenship No.<br> नागरिकता नम्बर <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardianCitizenshipNo"
                                id="guardianCitizenshipNo">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Address <br> पत्राचार गर्ने ठेगाना <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardianAddress" id="guardianAddress">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Province <br>प्रदेश<span class="red">*</span></b></p>
                            <div class="guardianProvince-select-box">
                                <div class="guardianProvince-options-container">
                                    <?php
                            $all_province = $province->getAllProvince();
                            //debugger($all_province);
                        ?>
                                    <?php
                             if($all_province){
                                foreach($all_province as $key=>$province_info){
                        ?>
                                    <div class="guardianProvince-options">
                                        <input type="radio" class="guardianProvince-radio"
                                            value="<?php echo $province_info->province;?>">
                                        <label for="guardian_province"><?php echo $province_info->province; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="guardianProvince-selected " name="guardian_province"
                                    placeholder="Select Province" id="guardian_province" readonly>
                                <div class="guardianProvince-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Zone <br> अञ्चल <span class="red">*</span></b></p>
                            <div class="guardianZone-select-box">
                                <div class="guardianZone-options-container">
                                    <?php
                            $all_zone = $zone->getAllZone();
                            //debugger($all_zone);
                        ?>
                                    <?php
                            if($all_zone){
                                foreach($all_zone as $key=>$zone_info){
                        ?>
                                    <div class="guardianZone-options">
                                        <input type="radio" class="guardianZone-radio"
                                            value="<?php echo $zone_info->zone;?>">
                                        <label for="guardianZone"><?php echo $zone_info->zone; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="guardianZone-selected " name="guardian_zone"
                                    placeholder="Select Zone" id="guardian_zone" readonly>
                                <div class="guardianZone-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>District <br> जिल्ला <span class="red">*</span></b></p>
                            <div class="guardianDistrict-select-box">
                                <div class="guardianDistrict-options-container">
                                    <?php
                            $all_district = $district->getAllDistrict();
                            //debugger($all_district);
                        ?>
                                    <?php
                             if($all_district){
                                foreach($all_district as $key=>$district_info){
                        ?>
                                    <div class="guardianDistrict-options">
                                        <input type="radio" class="guardianDistrict-radio"
                                            value="<?php echo $district_info->district;?>">
                                        <label for="guardian_district"><?php echo $district_info->district; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="guardianDistrict-selected " name="guardian_district"
                                    placeholder="Select District" id="guardian_district" readonly>
                                <div class="guardianDistrict-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>VDC-Municipality<br> गाविस - नगरपालिका <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardian_vdc" id="guardian_vdc">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Block No <br> ब्लक नं</b></p>
                            <input type="text" class="inputTextField " name="guardian_blockNo" id="guardian_blockNo">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Ward <br> वार्ड नं. <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="guardian_ward" id="guardian_ward">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Phone No <br> फोन नम्बर</b>
                            </p>
                            <input type="text" class="inputTextField " name="guardian_phoneno" id="guardian_phoneno">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Mobile No <br> मोबाइल नम्बर <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardian_mobileno" id="guardian_mobileno">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>PAN No <br> प्यान नम्बर</b></p>
                            <input type="text" class="inputTextField" name="guardian_panno" id="guardian_panno">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Email <br> ईमेल <span class="red">*</span></b></p>
                            <input type="email" class="inputTextField " name="guardian_email" id="guardian_email">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Citizenship Issued District<br>नागरिकता जारी जिल्ला <span
                                        class="red">*</span></b></p>
                            <div class="guardianIssuedDistrict-select-box">
                                <div class="guardianIssuedDistrict-options-container">
                                    <?php
                            $all_district = $district->getAllDistrict();
                            //debugger($all_district);
                        ?>
                                    <?php
                             if($all_district){
                                foreach($all_district as $key=>$district_info){
                        ?>
                                    <div class="guardianIssuedDistrict-options">
                                        <input type="radio" class="guardianIssuedDistrict-radio"
                                            value="<?php echo $district_info->district;?>">
                                        <label for="guardian_district"><?php echo $district_info->district; ?></label>
                                    </div>
                                    <?php    
                                }
                            }
                            ?>
                                </div>
                                <input type="text" class="guardianIssuedDistrict-selected "
                                    name="guardian_citizenshiptIssueDistrict" placeholder="Select District"
                                    id="guardian_citizenshiptIssueDistrict" readonly>
                                <div class="guardianIssuedDistrict-search-box">
                                    <input type="text" placeholder="search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Citizenship Issue Date (BS) <br> नागरिकता जारी मिति ( वि
                                    . सं ) <span class="red">*</span></b>
                            </p>
                            <input type="text" class="inputTextField " name="guardian_citizenshipIssueDateBS"
                                id="guardian_citizenshipIssueDateBS">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Citizenship Issue Date (AD)<br> नागरिकता जारी मिति (
                                    इस्वी सम्बतमा ) <span class="red">*</span></b>
                            </p>
                            <input type="date" class="inputTextField " name="guardian_citizenshipIssueDateAD"
                                id="guardian_citizenshipIssueDateAD">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>DOB (BS) <br> जन्म मिति ( वि . सं ) <span class="red">*</span></b></p>
                            <input type="text" class="inputTextField " name="guardian_DOBBS" id="guardian_DOBBS">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>DOB (AD) <br> जन्म मिति ( इस्वी सम्बतमा ) <span
                                        class="red">*</span></b>
                            </p>
                            <input type="date" class="inputTextField " name="guardian_DOBAD" id="guardian_DOBAD">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Guardian Photo<br>
                                    आवेदकको फोटो <span class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="guardianPhoto" id="guardianPhoto">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Guardian Signature <br> हस्ताक्षर <span class="red">*</span></b>
                            </p>
                            <input type="file" class="inputTextField " name="guardianSignature" id="guardianSignature">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Guardian Citizenship (Front) <br> नागरिकता (अगाडि) <span
                                        class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="guardianCitizenshipFront"
                                id="guardianCitizenshipFront">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Guardian Citizenship (Back) <br> नागरिकता (पछाडि) <span
                                        class="red">*</span></b></p>
                            <input type="file" class="inputTextField " name="guardianCitizenshipBack"
                                id="guardianCitizenshipBack">
                        </div>
                        <div class="col-lg-6 mt-3">
                            <p class="font-22"><b>Proof of Relationship With Applicant <br> आवेदकसँगको
                                    सम्बन्धको प्रमाण <span class="red">*</span></b>
                            </p>
                            <input type="file" class="inputTextField " name="guardianProof" id="guardianProof">
                        </div>
                    </div>
                </div>
            </div>
            <div class="note">
                <h4> <span class="red">*</span>Please make sure/reverify that all the details are correct. Any
                    amendment/changes
                    in the details
                    shall
                    charge Rs 100 for each.</h4>
            </div>
        </div>
        <div style="overflow:auto; margin-top: 10px;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>
    </form>
</div>
<?php
include "admin/inc/footer.php";
?>