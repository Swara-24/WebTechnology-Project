<?php
	
	#include('session.php');
	$query1=mysqli_query($conn,"select * from `user` where userid='".$_SESSION['id']."'") or die(mysqli_error());
	$srows=mysqli_fetch_array($query1);
	?>
		
  <nav class="navbar navbar-default">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href=""><strong>PeerBits Chats</strong></a><a href=""><img src="../img/logo.jpg" width="85px" height="50px"></a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Lobby</a></li>
		</ul>
		
		<ul class="nav navbar-nav navbar-right">
			<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span> <?php echo $user; ?></a></li>
			<li><img src="../<?php if(empty($srows['photo'])){echo "upload/profile.jpg";}else{echo $srows['photo'];} ?>" style="height:50px; width:80px; position:relative;  left:10px;"></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
						<li><a href="#photo" data-toggle="modal"><span class="glyphicon glyphicon-picture"></span> Update Photo</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    </ul>
			</li>
		</ul> 
	</div>
	
</nav>