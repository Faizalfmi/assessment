
$(document).ready(function() {
    $('#provinsi').on('change', function() {
        var provID = $(this).val();

        if (provID) {
            $.ajax({
                url: '/getKota/' + provID,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#kota').empty();
                    $('#kota').append('<option value="" selected disabled>Pilih Kota/Kabupaten</option>');
                    $.each(data, function(key, value) {
                        $('#kota').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#kota').empty();
            $('#kota').append('<option value="" selected disabled>Pilih Kota/Kabupaten</option>');
        }
    });
});

