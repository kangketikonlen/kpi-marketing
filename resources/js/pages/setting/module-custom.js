$('select[id="user_id"]').select2({
    theme: 'bootstrap4',
    placeholder: 'Pilih Pengguna',
    allowClear: true,
    ajax: {
        url: '/master/user/options',
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
