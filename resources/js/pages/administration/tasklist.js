$('select[id="employee_id"]').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Karywan',
    allowClear: true,
    ajax: {
        url: '/master/employee/options',
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        id: item.id,
                        text: item.description
                    }
                })
            };
        },
        cache: true
    }
});

$('select[id="indicator"]').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Indikator',
    allowClear: true
});
