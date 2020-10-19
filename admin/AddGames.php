<?php
if (!isset($_SESSION)) {
	session_start();
}
$title = "Add Games";
include 'Parts/Header.php';
//include 'parts/navbar.php';
?>

<div class="wrapper">
	<div class="container">
		<div class="row">
			<?php include 'Parts/Sidebar.php'; ?>
			<div class="span9">
				<div class="content">
					<div class="module">
						<div class="module-head">
							<h3 style="float: left;" >Add Games</h3>
							<h3><a href="ListGame.php" class="btn btn-large btn-info" style="float: right">List</a></h3>
						</div>
						<div class="module-body">
							<?php

							if (isset($_SESSION['fail']) || isset($_POST['btnCancle'])) { ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong><?php 
									echo($_SESSION['fail']);
									?></strong>
								</div>
								<?php  
							}

							elseif (isset($_SESSION['success'])) { ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>
										<?php 
										echo($_SESSION['success']);
										?>	
									</strong>
								</div>
								<?php	
							} 
							session_destroy();
							?>
							<br />

							<form class="form-horizontal row-fluid" action="Controller/con_AddGames.php" method="POST" enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Name</label>
									<div class="controls">
										<input type="text" id="basicinput" name="GameName" placeholder="Enter Game Name" class="span8">
									</div>
								</div>


								<div class="control-group">
									<label class="control-label" for="basicinput">Game Description</label>
									<div class="controls">
										<textarea class="span8" rows="5" name="GameDescription"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Image</label>
									<div class="controls">
										<input type="file" id="fileToUpload" name="GameImage" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Offical Website</label>
									<div class="controls">
										<input type="text" id="basicinput" name="GameOfficialWebsite" placeholder="Enter the Game Offical Website Link" class="span8">
									</div>
								</div>

								<div class="control-group">
									<div class="controls">
										<button type="submit" id="btn1Add" class="btn btn-success" value="Add" name="btnAdd">Add Data</button>
										<button type="submit" id="btn2Cancle" class="btn btn-danger" value="Cancle" name="btnCancle">Cancle</button>
									</div>
								</div>
							</form>
						</div>
					</div>



				</div><!--/.content-->
			</div><!--/.span9-->
		</div>
	</div><!--/.container-->
</div><!--/.wrapper-->

<?php 
include 'Parts/Footer.php';
?>