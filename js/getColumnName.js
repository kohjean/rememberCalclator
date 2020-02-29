
function getColumnName() {
    var c_name = $('#c_name').val();
    $.ajax( {
        url: 'api/getData.php',
        data: {'c_name': c_name},
        Type: 'get',
        dataType: 'json',
    })
    .done( function(data) {
        //  dataをフォーマットする
        $('.table-data').remove();
        for( var i =0; i < data.length; i++ ) { 
            $('#data-table').append( "<tr class='table-data'><td>" + data[i].c_name + "</td><td>¥" + data[i].value + "</td><td>" +data[i].date + "</td></tr>" );
        } 
    })
    .fail( function() {
        alert('のん');
    })
}


