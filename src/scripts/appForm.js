$("#appForm").submit((e) => {
    let isValid = true;

    // Validate Company
    const company = $("#company").val().trim();
    if (company == "") {
        $("#companyError").show(); // Show error
        isValid = false;
    } else {
        $("#companyError").hide(); // Hide error if valid
    }

    // Validate Position Title
    const title = $("#title").val().trim();
    if (title == "") {
        $("#titleError").show();
        isValid = false;
    } else {
        $("#titleError").hide();
    }

    // Validate Date
    const date = $("#date").val().trim();
    if (date == "") {
        $("#dateError").show();
        isValid = false;
    } else {
        $("#dateError").hide();
    }

    const status = $('input[name="appStatus"]:checked').val();
    if (!status) {
        $("#statusError").show();
        isValid = false;
    } else {
        $("#statusError").hide();
    }

    if (!isValid) {
        e.preventDefault();
    }
});