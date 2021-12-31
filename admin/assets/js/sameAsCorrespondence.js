
$(document).ready(function() {
    $("#sameAsCorrespondenceAddress").on("click", function() {
        if (this.checked) {
            $('#permanent_province').val($('#correspondence_province').val());
            $('#permanent_zone').val($('#correspondence_zone').val());
            $('#permanent_district').val($('#correspondence_district').val());
            $('#permanent_vdc').val($('#correspondence_vdc').val());
            $('#permanent_tole').val($('#correspondence_tole').val());
            $('#permanent_ward').val($('#correspondence_ward').val());
            $('#permanent_tole').val($('#correspondence_tole').val());
            $('#permanent_blockno').val($('#correspondence_blockno').val());
            $('#permanent_phoneno').val($('#correspondence_phoneno').val());
            $('#permanent_mobileno').val($('#correspondence_mobileno').val());
            $('#permanent_email').val($('#correspondence_email').val());
        } else {
            $('#permanent_province').val('');
            $('#permanent_zone').val('');
            $('#permanent_district').val('');
            $('#permanent_vdc').val('');
            $('#permanent_tole').val('');
            $('#permanent_ward').val('');
            $('#permanent_tole').val('');
            $('#permanent_blockno').val('');
            $('#permanent_phoneno').val('');
            $('#permanent_mobileno').val('');
            $('#permanent_email').val('');
        }
    });
});