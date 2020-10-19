<?php
if (!isset($_SESSION)) {
	session_start();
}
$title = "Add Game Category";
include 'Parts/Header.php';
//include 'parts/navbar.php';
include '../Classes/GameCategory.php';
?>

<div class="wrapper">
	<div class="container">
		<div class="row">
			<?php include 'Parts/Sidebar.php'; ?>

			<div class="span9">
				<div class="content">

					<div class="module">
						<div class="module-head">
							<h3 style="float: left;" >Add Game Caategory</h3>
							<h3><a href="ListGamecategory.php" class="btn btn-large btn-info" style="float: right">List</a></h3>
						</div>
						<div class="module-body">
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
							<form class="form-horizontal row-fluid"  method="POST" action="Controller/con_AddGameCategory.php">
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Category Name</label>
									<div class="controls">
										<input type="text" id="basicinput" name="GameCategoryName" placeholder="Enter Game Category Name" class="span8">
									</div>
								</div>


								<div class="control-group">
									<label class="control-label" for="basicinput">Game Category Description</label>
									<div class="controls">
										<textarea class="span8" rows="5" name="GameCategoryDescription"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Game Category Image</label>
									<div class="controls">
										<input type="file" id="fileToUpload" name="GameCategoryImage" class="span8">
									</div>
								</div>
								

								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn btn-success" value="Add" name="btnAdd" action="con_AddGameCategory.php">Add Data</button>
										<button type="submit" class="btn btn-danger" value="Cancle" name="btnCancle" action="AddGameCategory.php">Cancle</button>
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