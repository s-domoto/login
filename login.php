<?php
// �ڑ����
$servername = "localhost";
$dbname = "mysql";
$username = "root";
$password = "admin";

// �C���v�b�g�l
$id = (string)filter_input(INPUT_POST, 'id');
$pass = (string)filter_input(INPUT_POST, 'pass');

try {
  // DB�ڑ�
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  // SQL���s
  $stmt = $pdo->prepare("SELECT * FROM user_master WHERE id = :id AND password = :pass");
  $stmt->bindValue(':id', $id, PDO::PARAM_STR);
  $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
  $stmt->execute();
  // ���ʂ̎擾
  if($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
      echo $row['id'] . "����A�悤�����B";
  }else{
    echo "ID���p�X���[�h���Ԉ���Ă��܂��B";
  }
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
// DB�ؒf
$pdo = null;
?>