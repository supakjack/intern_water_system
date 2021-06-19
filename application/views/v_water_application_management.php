<!-- start table user -->
<table id="table_water_application_management" class="table display" style="width:100%">
    <thead>
        <tr>
            <th>ผู้ลงทะเบียน</th>
            <th>วันที่ลงทะเบียน</th>
            <th>สถานะ</th>
            <th>เครื่องมือ</th>
        </tr>
    </thead>
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
                    type: 'POST'
                },
                "columnDefs": [{
                        "targets": 0,
                        "data": "name",
                        "render": function(data, type, row, meta) {
                            return '<span value="' + data + '">' + data + '</span>'
                        }
                    },
                    {
                        "targets": 1,
                        "data": "create_date",
                        "render": function(data, type, row, meta) {
                            return '<span value="' + data + '">' + data + '</span>'
                        }
                    },
                    {
                        "targets": 2,
                        "data": "status",
                        "render": function(data, type, row, meta) {
                            return '<span value="' + data + '">' + data + '</span>'
                        }
                    },
                    {
                        "targets": 3,
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return `
                                <button type="button" class="btn btn-primary">ดูรายละเอียด</button>
                                <button type="button" class="btn btn-primary"><i class="bi bi-pencil"></i>แก้ไข</button>
                                <button type="button" class="btn btn-primary"><i class="bi bi-trash"></i>ลบ</button>
                            `
                            // '<span value="' + data + '">' + data + '</span>'
                        }
                    }
                ]
            });
        });
    });
</script>