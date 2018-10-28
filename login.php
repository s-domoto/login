<?php
// 接続情報
$servername = "localhost";
$dbname = "mysql";
$username = "root";
$password = "admin";

// インプット値
$id = (string)filter_input(INPUT_POST, 'id');
$pass = (string)filter_input(INPUT_POST, 'pass');

try {
  // DB接続
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  // SQL発行
  $stmt = $pdo->prepare("SELECT * FROM user_master WHERE id = :id AND password = :pass");
  $stmt->bindValue(':id', $id, PDO::PARAM_STR);
  $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
  $stmt->execute();
  // 結果の取得
  if($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
      echo $row['id'] . "さん、ようこそ。";
  }else{
    echo "IDかパスワードが間違っています。";
  }
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
// DB切断
$pdo = null;
?>