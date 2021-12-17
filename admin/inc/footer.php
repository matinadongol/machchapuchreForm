<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
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
</script>
<script type="text/javascript">
function isAMinor() {
    if ($('#isMinor').is(":checked")) {
        $("#minorSection").show();
        console.log("is a minor");
    } else {
        $("#minorSection").hide();
        console.log("not a minor");
    }

}
</script>
<script type="text/javascript">
function dropdown() {
    if (document.getElementById('bank').value != '')
        document.getElementById('branch').disabled = false;
    else
        document.getElementById('branch').disabled = true;
}
</script>
<script>
$(document).ready(function() {
    $('#bank').on('change', function() {
        var bank_id = this.value;
        
        $.ajax({
            url: "branch_by_bank.php",
            type: "POST",
            data: {
                bank_id: bank_id
            },
            cache: false,
            success: function(result) {
                $("#branch").html(result);
                //console.log(result);
            }
        });
    });
});
</script>
</body>

</html>