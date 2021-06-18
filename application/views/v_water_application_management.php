<h1> <?= $title ?> </h1>
<!-- start table user -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">username</th>
            <th scope="col">password</th>
            <th scope="col">status</th>
        </tr>
    </thead>
    <tbody class="append_water_applications">
        <!-- append area -->
    </tbody>
</table>
<!-- end table user -->
<script>
    $(document).ready(function() {
        var settings = {
            "url": "http://localhost/www/intern_water_system/index.php/Water_applications/get_water_application",
            "method": "POST",
        };
        $.ajax(settings).done(function(response) {
            response.data.result.map(water_application => {
                console.log(water_application);
                $('.append_water_applications').append(`
                <tr>
                    <th scope="row">${ water_application.water_application_id  }</th>
                    <td>${ water_application.water_application_water_applicationname}</td>
                    <td>${ water_application.water_application_password}</td>
                    <td>${ water_application.water_application_status}</td>
                </tr>
                `);
            })
        });
    });
</script>