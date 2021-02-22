var helpers =
{
    buildDropdown: function (result, dropdown, emptyMessage) {
        // Remove current options
        dropdown.html('');
        // Add the empty option with the empty message
        dropdown.append('<option value="">' + emptyMessage + '</option>');
        // Check result isnt empty
        if (result != '') {
            // Loop through each of the results and append the option to the dropdown
            $.each(result, function (k, v) {
                dropdown.append('<option data-slug="' + v.slug + '" value="' + v.id + '">' + v.text + '</option>');
            });
        }
    }
}

var fullPathUrl = window.location.pathname, url = fullPathUrl.split('/');
var in_group = url[1];

$('#year-detail').on('change', function () {
    var year = $(this).val();

    window.location.replace('/' + in_group + '/' + year);
});

$('#province-detail').on('change', function () {
    var province_id = $(this).val();

    var year = $('#year-detail').find(':selected').data('slug');
    var province = $('#province-detail').find(':selected').data('slug');

    // console.log(in_group, year, province, regency);
    window.location.replace('/' + in_group + '/' + year + '/' + province);
    // $.get('/api/filter-regencies', { from_detail: true, province_id: province_id }, function(data){
    //     $('#regency-detail').prop('disabled', false);
    //     $('#regency-detail').removeClass('text-grey').addClass('text-grey-darker');
    //     helpers.buildDropdown(data, $('#regency-detail'), 'Semua Kabupaten/Kota');
    // });
});

$('#province-detail-ds').on('change', function () {
    var province_id = $(this).val();
    $.get('/api/filter-regencies', { from_detail: true, province_id: province_id }, function (data) {
        $('#regency-detail-ds').prop('disabled', false);
        $('#regency-detail-ds').removeClass('text-grey').addClass('text-grey-darker');
        helpers.buildDropdown(data, $('#regency-detail-ds'), 'Semua Kabupaten/Kota');
    });
});

$('#regency-detail').on('change', function () {
    var year = $('#year-detail').find(':selected').data('slug');
    var province = $('#province-detail').find(':selected').data('slug');
    var regency = $(this).find(':selected').data('slug');

    // console.log(in_group, year, province, regency);
    window.location.replace('/' + in_group + '/' + year + '/' + province + '/' + regency);
});

$('#save-pdf').on('click', function () {
    window.open('/download-pdf' + window.location.pathname, '_blank');
    // console.log(window.location.pathname);
    // document.getElementById("download-pdf").href = '/download-pdf' + window.location.pathname;
    // document.getElementById("download-pdf").click();
});