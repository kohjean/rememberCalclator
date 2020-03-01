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

// 「記録を見る」のラベル名が変わったら該当するラベルの値を取って表示する
$('#c_name').on('change', function() {
  getColumnName();
});

// getボタンがクリックされたらディスプレイに表示されている値が入る
$('#getvalue').on('click', function() {
  var val = $('#disp').text();
  $('#res').val(val);
});

// 記録ボタンを押すと選択したラベルに値を追加する
$('#res-btn').on( 'click', function() {
  reserve_value();
});