<?php 
session_start();
$msg = "";
// $_POST["pass"], ["u_name"]がポストされている 
if( !empty($_POST["u_name"]) && !empty($_POST["pass"])) {
	if( !empty($_POST["ticket"]) && $_POST["ticket"]==$_SESSION["ticket"]) {
		require_once("config.php");
		$sql = "SELECT * FROM users WHERE u_name=:u_name";
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(":u_name", $_POST["u_name"], PDO::PARAM_STR);
		$stmt->execute();
		// ユーザーネーム検索後、パスワード検証
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if(password_verify($_POST["pass"], $row["pass"])) {
			$_SESSION["login"] = true;
			$_SESSION["u_id"] = $row["u_id"];
			$_SESSION["u_name"] = $row["u_name"];
			header("Location: index.php");
			exit();
		}
	} $msg = "ログインに失敗しました"; 
}

// チケットの半券生成
$ran = rand(0, 1000);
$salt = "cwheieldl";
$ticket = md5($ran . $salt);
$_SESSION["ticket"] = $ticket;

require_once("functions.php");
get_header("Login");
?>
<div id="container">
	<form method="post" action="">
		<input type="hidden" name="ticket" value="<?php echo $ticket; ?>">
		<p><input type="text" name="u_name" id="u_name" required placeholder="ユーザー名を入力してください" autofocus></p>
		<p><input type="pass" name="pass" id="pass" pattern="[0-9a-zA-Z]{4,16}" required placeholder="パスワード"
				title="パスワードは4~16文字の英数字です"></p>
		<button id="submit" type="submit">ログイン</button>
	</form>
	<p><?php echo $msg; ?></p>
	<p><a href="form.php">新規登録</p>
</div>
<?php 
get_footer();
?>