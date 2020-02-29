// ログイン状態ならユーザー名、でなければNoNameをディスプレイに表示
$.ajax({
  url: 'api/hello_name.php',
  type: 'get',
  dataType: 'text',
})
.done( function(data) {
  $('#disp').text( 'HELLO, ' + data );
})
.fail( function() {
  alert('NG');
});

// 「記録を見る」の項目が変わったら該当する項目の値を取って表示する
$('#c_name').on('change', function() {
  getColumnName();
});

// getvalボタンがクリックされたらディスプレイに表示されている値が入る
$('#getvalue').on('click', function() {
  var val = $('#disp').text();
  $('#res').val(val);
});

// 
$('#res-btn').on( 'click', function() {
  reserve_value();
});