<?php
if (!isset($_SESSION)) {
	session_start();
}
$title = "Add GameCategoryWiseGame";
include 'Parts/Header.php';
//include 'parts/navbar.php';
include '../Classes/GameCategory.php';
include '../Classes/GameCategoryWiseGame.php';
?>
<div class="wrapper">
	<div class="container">
		<div class="row">
			<?php include 'Parts/Sidebar.php'; ?>
			<div class="span9">
				<div class="content">

					<div class="module">
						<div class="module-head">
							<h3 style="float: left;">Add Things</h3>
							<h3><a href="ListGameCategoryWiseGame.php" class="btn btn-large btn-info" style="float: right">List</a></h3>
						</div>
						<div class="module-body">
							<!-- <?php echo $result; ?> -->
							
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

							<form class="form-horizontal row-fluid" action="Controller/con_AddGameCategoryWiseGame.php" method="POST">
								<!-- <div class="control-group">
									<label class="control-label" for="basicinput">Game Category Wise Game</label>
									<div class="controls">
										<input type="text" id="basicinput" name="GameCategoryWiseGame" placeholder="Enter GameCategory Wise Game" class="span8">
									</div>
								</div> -->
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
									<label class="control-label" for="basicinput">Game Category</label>
									<div class="controls">
										<select tabindex="1" data-placeholder="Select here.." class="span8" name="GameCategoryID">
											<option value="">Select here..</option>
											<?php
											//include '../Classes/GameCategory.php';
											$objGameCategory = new GameCategory();
											$resultGameCategory = $objGameCategory->getAllGameCategory();
											foreach ($resultGameCategory as $rowGameCategory) {



											?>
											<option value="<?php echo($rowGameCategory['GameCategoryID']); ?>"><?php echo($rowGameCategory['GameCategoryName']); ?></option>
											<?php 
										} 
										?>
									</select>
								</div>	
							</div>

							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-success" value="Add" name="btnAdd">Add Data</button>
									<button type="submit" class="btn btn-danger" value="Cancle" name="btnCancle">Cancel</button>
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