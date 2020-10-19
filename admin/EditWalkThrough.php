<?php
if (!isset($_SESSION)) {
	session_start();
}
include '../Classes/WalkThrough.php';
$objWalkThrough = new WalkThrough();
$resultWalkThrough = $objWalkThrough->getWalkThroughByID($_GET);
if ($resultWalkThrough === false) {
	header("Location: ListWalkThrough.php");
}
$title = "Admin";
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
							<h3 style="float: left;">Edit Walkthroughs</h3>
							<h3><a href="ListWalkThrough.php" class="btn btn-large btn-info" style="float: right">List</a></h3>
						</div>
						<div class="module-body">

							<!-- <div class="alert">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Warning!</strong> Something fishy here!
							</div>
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Oh snap!</strong> Whats wrong with you? 
							</div>
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">×</button>
								<strong>Well done!</strong> Now you are listening me :) 
							</div>

							<br /> -->

							<?php
							if (isset($_SESSION['fail'])) { ?>
								<div class="alert alert-error">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong><?php 
									echo($_SESSION['fail']);
									?></strong>
								</div>
							<?php  }

							elseif (isset($_SESSION['success'])) { ?>
								<div class="alert alert-success">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong><?php 
									echo($_SESSION['success']);
									?></strong>
								</div>
							<?php	} session_destroy();
							?>

							<form class="form-horizontal row-fluid" action="Controller/con_EditWalkThrough.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="WalkthroughID" value="<?php echo($resultWalkThrough['WalkthroughID']) ?>">
								<div class="control-group">
									<label class="control-label" for="basicinput">Walkthrough Title</label>
									<div class="controls">
										<input type="text" id="basicinput" name="Walkthroughtitle" placeholder="Enter Walkthrough Title" class="span8" value="<?php echo($resultWalkThrough['Walkthroughtitle']) ?>" >
									</div>
								</div>


								<div class="control-group">
									<label class="control-label" for="basicinput">Walkthrough Description</label>
									<div class="controls">
										<textarea class="span8" rows="5" name="WalkthroughDescription"><?php echo($resultWalkThrough['WalkthroughDescription']) ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Walkthrough Link</label>
									<div class="controls">
										<input type="text" id="basicinput" name="WalkthroughLink" class="span8" value="<?php echo($resultWalkThrough['WalkthroughLink']) ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Name</label>
									<div class="controls">
										<select tabindex="1" data-placeholder="Select here.." class="span8" name="GameID">
											<option value="">Select here..</option>
											<?php
											include '../Classes/Game.php';
											$objGameName = new Game();
											$resultGameName = $objGameName->getAllGame();
											foreach ($resultGameName as $rowGameName) {



												?>
												<option value="<?php echo($rowGameName['GameID']); ?>"><?php echo($rowGameName['GameName']); ?></option>
												<?php 
											} 
											?>	
										</select>
									</div>	
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Sequence</label>
									<div class="controls">
										<input type="text" id="basicinput" name="Sequence" placeholder="Enter Sequence" class="span8" value="<?php echo($resultWalkThrough['Sequence']) ?>">
									</div>
								</div>

								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn btn-success" value="Add" name="btnAdd">Edit Data</button>
										<button type="submit" class="btn btn-danger" value="Cancle" name="btnCancle">Cancle</button>
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