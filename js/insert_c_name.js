$('#make_column').on('click', function() {
    console.log('kk');
    var c_name = $('#create-column-name').val();
    console.log(c_name);
    $.ajax({
        url: 'api/create_column.php',
        data: {'c_name': c_name},
        type: 'get',
        dataType: 'text',
    })
    .done(function( data ) {
        alert( data + "の項目を追加しました");
    })
    .fail(function() {
        alert( 'カラム名の追加に失敗しました' );
    });
});