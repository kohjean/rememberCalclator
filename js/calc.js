// 入力された値は一維持的に保持され、配列に追加されていく
var num = '';
var nums = [];
var ope = '';
var opes = [];

// var totalInp = '';
var disp = '0';

// 演算子の重複入力検査用
var count = 0;

// 数字が押されたらcountを初期化し、入力された値を入力表示欄に表示する
// 演算子ボタンのdisabled属性を'false'に変える
$( '.num' ).on( 'click', function () {
  count = 0;
  $('.ope').prop({'disabled': false});
  $( '#disp' ).text( '' );　
  num += $( this ).text();
  $( '#disp' ).text( num );
}); 

// 演算子が押された時、連続して押されていないか判定する
  // １回目の時 =================
  // 入力されている値をnums配列に追加する
  // 押された演算子をopes配列に追加する
  // totalInpに入力された値と演算子を追加し、画面に表示する
  $( '.ope' ).on( 'click', function () {
    if( count == 0 ) {
      nums.push( parseFloat(num, 10) );
      opes.push( $( this ).text() );
      // totalInp += num;
      // totalInp += $( this ).text();
      // $( '#sub-disp' ).text( totalInp )
      num = '';
      count++;
    } else {
      // 2回目以降の時
      // 演算子を上書きする
      // totalInp = totalInp.slice(0, -1);
      // totalInp += $( this ).text();
      // $( '#sub-disp' ).text( totalInp )
      opes.pop();
      opes.push( $( this ).text() );
    }
  });

$( '#equ' ).on( 'click', function () {
  // document.getElementById('equ').disabled = true;
  if( count != 0 ) {
    opes.pop();
  }  
  nums.push( parseFloat(num, 10) );
  // totalInp += num;  
  // $( '#sub-disp' ).text( totalInp )
  // while (opes.length != 0) {
  primaryOpeCheck();
  // }
  $( '#disp' ).text( nums[0] );
  num = nums[ 0 ];
  nums = [];
});
$( '#allClear' ).on( 'click', function() {
  clear();
});

// ACボタンが押されると画面と保持したデータを初期化する ----------
function clear() {
  num = '';
  // totalInp = '';
  ope = '';
  disp = '0';
  nums = [];
  opes = [];
  $( '#disp' ).text( '0' );
  $( '#sub-disp' ).text( '' );
}
// ---------------------------------------------------------


function primaryOpeCheck() {
  var n;
  var m;
  while( opes.indexOf( '×' ) > -1 && opes.indexOf( '÷' ) > -1 ) {
    n = Math.min( opes.indexOf( '×' ), opes.indexOf( '÷' ) );
    if( opes[ n ] == '×' ) {
      kake();
    }
    else {
      waru();
    }
  }
  while( opes.indexOf( '×' ) > -1 ) { 
    kake();
  }
  while( opes.indexOf( '÷' ) > -1 ) {
    waru();
  }
  while( opes.indexOf( '+' ) > -1 ) {
    tasu();
  }
  while( opes.indexOf( '-' ) > -1 ) {
    hiku();
  }

  // 計算式　演算子の位置を見て
  function waru() {
    n = opes.indexOf( '÷' )
    m = nums[n] / nums[ n+1 ];
    nums.splice( n, 2 );
    opes.splice( n, 1 );
    nums.splice( n, 0, m );
  }
  
  function kake() {
    n = opes.indexOf( '×' )
    m = nums[n] * nums[ n+1 ];
    nums.splice( n, 2 );
    opes.splice( n, 1 );
    nums.splice( n, 0, m );
  }
  
  function tasu() {
    n = opes.indexOf( '+' )
    m = nums[n] + nums[ n+1 ];
    nums.splice( n, 2 );
    opes.splice( n, 1 );
    nums.splice( n, 0, m );
  }
  
  function hiku() {
    n = opes.indexOf( '-' )
    m = nums[n] - nums[ n+1 ];
    nums.splice( n, 2 );
    opes.splice( n, 1 );
    nums.splice( n, 0, m );
  }
}