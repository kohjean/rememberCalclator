<?php 
session_start();
require_once("config.php");
if( !empty($_SESSION["login"]) ) {
  $sql = "SELECT c_name,c_id FROM columnNames,users WHERE columnNames.u_id=users.u_id AND users.u_id=" . $_SESSION["u_id"];
  $res = $pdo->query($sql);
} 
require_once("functions.php");

get_header("リメンバー・カリキュレーター");
?>
<div id="container">
  <div id="field">
    <div id="disp" draggable="true"></div> 
    <button id="preserve-btn">preserve</button>
    <div id="grid">
        <button id="allClear" class="clear">AC</button>
        <button id="divi" class="ope" disabled="true">÷</button>
        <button id="se" class="num">7</button>
        <button id="ei" class="num">8</button>
        <button id="ni" class="num">9</button>
        <button id="mult" class="ope" disabled="true">×</button>
        <button id="fo" class="num">4</button>
        <button id="fi" class="num">5</button>
        <button id="si" class="num">6</button>
        <button id="min" class="ope" disabled="true">-</button>
        <button id="on" class="num">1</button>
        <button id="tw" class="num">2</button>
        <button id="th" class="num">3</button>
        <button id="plu" class="ope" disabled="true">+</button>
        <button id="ze" class="num">0</button>
        <button id="dot" class="num">.</button>
        <button id="equ">=</button>
    </div>
  </div>
  <div id="watch-records">
    <label for="c_name">記録を見る</label>
    <div id="record-area">
      <select id="c_name" name="c_name">
        <option id="label">選択</option>
        <?php if( $_SESSION["login"]): 
                while( $row = $res->fetch(PDO::FETCH_ASSOC) ): ?>
        <option value="<?php echo $row["c_name"]; ?>"><?php echo $row["c_name"]; ?></option>
          <?php endwhile; 
              endif; ?>
      </select>
      <div id="nyaa">
        <table id="data-table">
          <tr>
            <th>ラベル</th>
            <th>数値</th>
            <th>記録日</th>
          </tr>
        </table>  
      </div>
    </div>
  </div>
  <div id="preserve">
    <p>記録する</p>
    <div>
      <input id="res" type="number" placeholder="数値を入れてください">
      <button id="getvalue">get</button>
   </div>
    <select id="rv">
        <option id="label">記録する場所</option>
        <?php if( $_SESSION["login"]): 
                $res = $pdo->query($sql);
                while( $row = $res->fetch(PDO::FETCH_ASSOC) ): ?>
        <option value="<?php echo $row["c_id"]; ?>"><?php echo $row["c_name"]; ?></option>
          <?php endwhile; 
              endif; ?>
      </select>
      <div><button id="res-btn">記録</button></div>
  </div>
  <div id="make-label">
    <p>ラベルを作る</p>
    <input id="create-column-name"type="text" placeholder="科目を入力してください">
    <button id="make_column" type="submit">make</button>
  </div>
</div>
<?php 
get_footer("");
?>
