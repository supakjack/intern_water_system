<!-- start form -->
<form id="water_application_form">
    <div class="mb-3">
        <label for="water_application_firstname" class="form-label">water_application_firstname</label>
        <input name="water_application_firstname" type="text" class="form-control" id="water_application_firstname">
    </div>
    <div class="mb-3">
        <label for="water_application_lastname" class="form-label">water_application_lastname</label>
        <input name="water_application_lastname" type="text" class="form-control" id="water_application_lastname">
    </div>
    <div class="mb-3">
        <label for="water_application_telephone" class="form-label">water_application_telephone</label>
        <input name="water_application_telephone" type="text" class="form-control" id="water_application_telephone">
    </div>
    <div class="mb-3">
        <label for="water_application_district" class="form-label">water_application_district</label>
        <select name="water_application_district" id="water_application_district" class="form-select" aria-label="Default select example">
            <option selected value="1">เขต 1 (กทม.)</option>
            <option value="2">เขต 2 (ชลบุรี)</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="water_application_address" class="form-label">water_application_address</label>
        <textarea name="water_application_address" class="form-control" id="water_application_address" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="water_application_350_ml" class="form-label">water_application_350_ml</label>
        <input name="water_application_350_ml" type="number" class="form-control" id="water_application_350_ml">
    </div>
    <div class="mb-3">
        <label for="water_application_750_ml" class="form-label">water_application_750_ml</label>
        <input name="water_application_750_ml" type="number" class="form-control" id="water_application_750_ml">
    </div>
    <div class="mb-3">
        <label for="water_application_1500_ml" class="form-label">water_application_1500_ml</label>
        <input name="water_application_1500_ml" type="number" class="form-control" id="water_application_1500_ml">
    </div>
    <div class="mb-3">
        <label for="water_application_5_l" class="form-label">water_application_5_l</label>
        <input name="water_application_5_l" type="number" class="form-control" id="water_application_5_l">
    </div>
    <div class="mb-3">
        <label for="water_application_20_l" class="form-label">water_application_20_l</label>
        <input name="water_application_20_l" type="number" class="form-control" id="water_application_20_l">
    </div>
    <button class="btn btn-primary" id="water_application_form_submit">บันทึก</button>
</form>
<!-- end form -->
<script>
    $(document).ready(function() {
        $('#water_application_form_submit').click(function(e) {
            e.preventDefault();
            console.log(objectifyForm($('#water_application_form').serializeArray()));

            var settings = {
                "url": "http://localhost/www/intern_water_system/index.php/Water_applications/add_water_application",
                "method": "POST",
                "timeout": 0,
                "headers": {
                    "Content-Type": "application/x-www-form-urlencoded",
                },
                "data": objectifyForm($('#water_application_form').serializeArray())
            };

            $.ajax(settings).done(function(response) {
                console.log(response);
                alert("บันทึดข้อมูลสำเร็จ")
            });
        });
    });
</script>