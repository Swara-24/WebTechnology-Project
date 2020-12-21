		<<div class="col-lg-8">
            <div class="panel panel-default" style="height:50px;">
				<span style="font-size:18px; margin-left:10px; position:relative; top:13px;"><strong><span  id="user_details"><span class="glyphicon glyphicon-user"></span><span class="badge"><?php echo mysqli_num_rows($cmem); ?></span></span> <?php echo $chatrow['chat_name']; ?></strong></span>
				<div class="showme hidden" style="position: absolute; left:-120px; top:20px;">
					<div class="well">
						<strong>Room Member/s:</strong>
						<div style="height: 10px;"></div>
					<?php
						$rm=mysqli_query($conn,"select * from chat_member left join `user` on user.userid=chat_member.userid where chatroomid='$id'");
						while($rmrow=mysqli_fetch_array($rm)){
							?>
							<span>
							<?php
								$creq=mysqli_query($conn,"select * from chatroom where chatroomid='$id'");
								$crerow=mysqli_fetch_array($creq);
								
								if ($crerow['userid']==$rmrow['userid']){
									?>
										<span class="glyphicon glyphicon-user"></span>
									<?php
								}
								
							?>
							<?php echo $rmrow['uname']; ?></span><br>
							<?php
						}
						
					?>
						
					</div>
				</div>
				<div class="pull-right" style="margin-right:10px; margin-top:7px;">
					<?php
						if ($chatrow['userid']==$_SESSION['id']){
							?>
							<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Lobby</a>
							<a href="#delete_room" data-toggle="modal" class="btn btn-danger">Delete Room</a>
							<a href="#add_member" data-toggle="modal" class="btn btn-primary">Add Member</a>
							<a href="#file_view" data-toggle="modal" class="btn btn-primary">Files</a>
							<?php
						}
						else{
							?>
							<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Lobby</a>
							<a href="#leave_room" data-toggle="modal" class="btn btn-warning">Leave Room</a>
							<a href="#file_view" data-toggle="modal" class="btn btn-primary">Files</a>
							<?php
						}
					?>
				</div>
			</div>
			<div>
				<div class="panel panel-default" style="height: 400px;">
					<div style="height:10px;"></div>
					<span style="margin-left:10px;">Welcome to Chatroom</span><br>
					<span style="font-size:10px; margin-left:10px;"></span>
					<div style="height:10px;"></div>
					<div id="chat_area" style="margin-left:10px; max-height:320px; overflow-y:scroll;">
					</div>
					
				</div>

				<div class="input-group" id="output">
					<input type="text" class="form-control" placeholder="Type message..." id="chat_msg">
					<span class="input-group-btn">
					<button class="btn btn-success" type="submit" id="send_msg" value="<?php echo $id; ?>">
					<span class="glyphicon glyphicon-comment"></span> Send
					</button>
					<a href="#file_upload" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-paperclip"></span> Attach</a>
					
					<button type="button" class="btn btn-danger" onclick="runSpeechRecognition()"><span class="glyphicon glyphicon-volume-up"></span> Speak</button> &nbsp; <span  id="action"></span>
					</span>
					<script>
						/* JS comes here */
						function runSpeechRecognition() {
							// get output div reference
							var output = document.getElementById("chat_msg");
							// get action element reference
							var action = document.getElementById("action");
							// new speech recognition object
							var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
							var recognition = new SpeechRecognition();
						
							// This runs when the speech recognition service starts
							recognition.onstart = function() {
								action.innerHTML = "<small>listening, please speak...</small>";
							};
							
							recognition.onspeechend = function() {
								action.innerHTML = "<small>stopped listening, hope you are done...</small>";
								recognition.stop();
							}
						  
							// This runs when the speech recognition service returns result
							recognition.onresult = function(event) {
								var transcript = event.results[0][0].transcript;
								var confidence = event.results[0][0].confidence;
								output.value = transcript ;
								//alert(transcript);
								output.classList.remove("hide");
							};
						  
							 // start recognition
							 recognition.start();
						}
					</script>
				</div>
				
				
				<div class="input-group">
				<!-- Upload File-->
				<div class="modal fade" id="file_upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<center><h4 class="modal-title" id="myModalLabel">Upload File...</h4></center>
							</div>
							<div class="modal-body">
							<div class="container-fluid">
								<form method="POST" enctype="multipart/form-data" action="send_file.php">
								<div class="form-group input-group">
									<span class="input-group-addon" style="width:150px;">File:</span>
									<input type="file" style="width:350px;" class="form-control" name="file_name">
								</div>
							</div> 
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
								<button type="submit" class="btn btn-success" id="upload_file_now"  value="<?php echo $id; ?>"><span class="glyphicon glyphicon-upload"></span> Upload</button>
								</form>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
			<!-- /.modal -->		
			</div>
			
			<!-- Upload File View-->
			<div class="modal right fade" id="file_view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<center><h4 class="modal-title" id="myModalLabel">Uploaded Files</h4></center>
						</div>
						<div class="modal-body">
						<div class="container-fluid">
						<table class="table table-striped">
							<thead>
							  <tr>
								<th>Date</th>
								<th>User</th>
								<th>File</th>
							  </tr>
							</thead>
						<tbody>
						<?php
						$query=mysqli_query($conn,"select * from `file` left join `user` on user.userid=file.userid order by file_date asc") or die(mysqli_error());
						while($row=mysqli_fetch_array($query)){
						?>
						  <tr>
							<td><?php echo date('M-d-Y h:i A',strtotime($row['file_date'])); ?></td>
							<td><?php echo $row['uname']; ?></td>
							<td><?php echo '<a href="'.$row['file'].'"><br>'.$row['file'].'</a>'; ?></td>
						  </tr>
						<?php
						}
						?>
						</tbody>
						</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
						
			</div>			
		</div>