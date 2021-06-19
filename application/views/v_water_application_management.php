<!-- start table user -->
<table id="table_water_application_management" class="table display" style="width:100%">
    <thead>
        <tr>
            <th>ผู้ลงทะเบียน</th>
            <th>วันที่ลงทะเบียน</th>
            <th>สถานะ</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ผู้ลงทะเบียน</th>
            <th>วันที่ลงทะเบียน</th>
            <th>สถานะ</th>
        </tr>
    </tfoot>
</table>
<!-- end table user -->
<script>
    $(document).ready(function() {
        var settings = {
            "url": "http://localhost/www/intern_water_system/index.php/Water_applications/get_water_application",
            "method": "POST",
        };
        $.ajax(settings).done(function(response) {
            console.log(response);
        });
        $(document).ready(function() {
            $('#table_water_application_management').DataTable({
                pageLength: 10,
                serverSide: true,
                processing: true,
                "ajax": {
                    url: "http://localhost/www/intern_water_system/index.php/Water_applications/find_with_page",
                    type : 'POST'
                },
                "columns": [{
                        "data": "name"
                    },
                    {
                        "data": "create_date"
                    },
                    {
                        "data": "status"
                    }
                ]
            });
        });
    });
</script>