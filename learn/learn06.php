<?php
	//通过Email显示用户的Gravatar头像
	$gravatar_link = 'http://www.gravatar.com/avatar/'.md5($comment_author_email).'?s=32';
	echo '<img src="'.$gravatar_link.'"/>';
?>