var id = $("#ids").data('id');
$('document').ready(function () {
    setInterval(function () { getRealData() }, 5000);//request every x seconds
    function getRealData() {

        $.ajax({
            type: 'GET',
            url: '/api',
            data: { 'id': id },
            dataType: 'json',
            success: function (result) {
                console.log(result)
                result = JSON.parse(JSON.stringify(result).replace(/\:null/gi, "\:\"Loading...\""));
                $("#viewsuhu").html(result.suhu + `°C`);
                $("#viewintensitas").html(result.lux + ` Lux`);
                $("#viewkelembaban").html(result.kelembaban + ` %`);

                if (result.suhu >= result.suhuopt) {
                    $("#boxsuhu").removeClass('bg-info').addClass('bg-warning');
                }
                else {
                    $("#boxsuhu").removeClass('bg-warning').addClass('bg-info');
                }

                if (result.kelembaban <= result.kelembabanopt) {
                    $("#boxkelembaban").removeClass('bg-info').addClass('bg-warning');
                }
                else {
                    $("#boxkelembaban").removeClass('bg-warning').addClass('bg-info');
                }

                if (result.pompa == "0") {
                    $("#viewtandon").html(result.vt + ` %`);
                    $("#boxtandon").removeClass('bg-warning').addClass('bg-info');
                }
                else {
                    $("#boxtandon").removeClass('bg-info').addClass('bg-warning');
                    $("#viewtandon").html('Dalam Pengisian')
                }

                if (result.kipas == "0") {
                    $("#viewkipas").html('Mati');
                    $("#boxkipas").removeClass('bg-warning').addClass('bg-secondary');
                }
                else {
                    $("#boxkipas").removeClass('bg-secondary').addClass('bg-warning');
                    $("#viewkipas").html('Aktif')
                }

                if (result.lampu == "0") {
                    $("#viewlampu").html('Mati');
                    $("#boxlampu").removeClass('bg-warning').addClass('bg-secondary');
                }
                else {
                    $("#boxlampu").removeClass('bg-secondary').addClass('bg-warning');
                    $("#viewlampu").html('Aktif')
                }

                if (result.lux <= result.luxopt) {
                    $("#boxlux").removeClass('bg-info').addClass('bg-warning');
                }
                else {
                    $("#boxlux").removeClass('bg-warning').addClass('bg-info');
                }

                ;
            },
            error: function () {
                console.log(id);
            }
        });
    }
})
$('#kelembabanbox').on('click', function () {
    $.ajax({
        type: 'GET',
        url: '/apikelembaban',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            $('#modal').modal('show');
            $('#modaltitle').html('Detail Kelembaban');
            $('#modalview').html('Kelembaban');
            $('#modalvalue').html(result.kelembaban + ' Hum');
            $('#modaloptimal').html('Kelembaban Optimal');
            $('#modaloptimalvalues').html(result.kelembabanopt + ' Hum');
            $('#modalthead').html(` <tr>
            <th>WAKTU</th>
            <th>TANGGAL</th>
            <th>Hum</th>
            <th>STATUS</th>
          </tr>`);
            $('#modalbody').html(` <tr>
            <td>WAKTU</td>
            <td>TANGGAL</td>
            <td>Hum</td>
            <td>STATUS</td>
          </tr>`);
            console.log(result);
        },
        error: function () {
            console.log(id);
        }
    });
});