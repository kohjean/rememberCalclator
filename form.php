<?php 
// アカウント登録画面 ------------------------
// 同一ページ内で処理を行う。
session_start();
require_once("functions.php");
$msg = "";
$ticket = "";
require_once("config.php"); 

// ====================データベースの内容に合わせて値を変更してください=============================
// u_nameとpassが入力されているかどうかの判定
    //正しい半券を持っていればパスワードの検証に入る
if(!empty($_POST["u_name"]) && !empty($_POST["pass"]) ) {
    if(!empty($_POST["ticket"]) && $_POST["ticket"] == $_SESSION["ticket"]) {
        $sql = "INSERT INTO users(u_name,pass) VALUES(:u_name,:pass)";
        $stmt = $pdo->prepare($sql);
        $pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
        $stmt->bindValue(":u_name", $_POST["u_name"], PDO::PARAM_STR);
        $stmt->bindValue(":pass", $pass, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: login.php");
    } $msg = "ログインできませんでした";
} 
// ===========================================================================================
get_header("SignIn form");
?>
<?php 
$ran = rand(0, 1000);
$salt = "cwhwiwldl";
$ticket = md5($ran . $salt);
$_SESSION["ticket"] = $ticket;
?>
<h1>登録フォーム</h1>
<form action="" method="post">
	<label for="u_name">ユーザー名</label>
	<p>
		<input type="text" name="u_name" id="u_name" required autofocus>
    </p>
	<!-- 入力されたパスワードが256文字以下になるようにする -->
	<label for="pass">パスワード</label>
	<p>
		<input type="text" name="pass" id="pass" pattern="[0-9a-zA-Z]{4,16}" title="4~16文字のアルファベットと数字で入力してください" required>
	</p>
	<input type="hidden" name="ticket" value="<?php echo $ticket; ?>">
    <p id="msg"><?php echo $msg; ?></p>
    <button id="submit" type="submit">登録</button>
</form>

<?php
get_footer();
?>