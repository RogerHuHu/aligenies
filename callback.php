<?php
        session_start();
	$_SESSION['userinfo'] = array(
		'user_name' => 'ink',
		'email' => 'hujunjie7174@126.com',
		'user_id' => 'grapefruit001'.$uid,
		'from' => 'China'
	);
	// 注意至少要带上一个链接。
        if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
                echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
        } else {
                echo "<p>发送成功</p>";
        }

	if ($_SESSION['userurl']!='null'){
		header("Location: ".$_SESSION['userurl']);
		$_SESSION['userurl']='null';
	}else
	{  
		header("Location: /information.php");
	}

?>
