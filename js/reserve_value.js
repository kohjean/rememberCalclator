function reserve_value() {
    var value = $('#res').val();
    var c_id = $('#rv').val();
    console.log(value);
    console.log(c_id);
    $.ajax({
        url: 'api/preserve_value.php',
        data: {'value': value, 'c_id': c_id},
        type: 'get',
        dataType: 'text',
    })
    .done( function(data) {
        alert(data);
    })
    .fail( function() {
        alert( "r_vjsfail" );
    });
}