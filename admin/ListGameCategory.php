<?php
if (!isset($_SESSION)) {
   session_start();
} 
$title = "Admin";
include 'Parts/Header.php';
?>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <?php include 'Parts/SideBar.php'; ?>
            <div class="span9">
                <div class="content">

                    <div class="module">

                        <div class="module-body">
                            <h3 style="float: left;">List Game Category</h3>
                            <a style="float: right;" class="btn btn-large btn-info" href="AddGameCategory.php">Add</a>
                            <table class="table table-responsive" >
                                <tr>
                                    <th>
                                        Game Category Name
                                    </th>
                                    <th>
                                        Game Category Description
                                    </th>
                                    <th>
                                        Game Category Image
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                <?php 
                                include '../Classes/GameCategory.php';
                                $objGameCategory = new GameCategory();
                                $resultGameCategory = $objGameCategory->getAllGameCategory();
                                foreach ($resultGameCategory as $rowGameCategory) {
                                    ?>
                                    <tr>
                                        <td> <?php echo($rowGameCategory['GameCategoryName']); ?></td>
                                        <td> <?php echo($rowGameCategory['GameCategoryDescription']); ?></td>
                                        <td><img src="images/<?php echo($rowGameCategory['GameCategoryImage']); ?>" alt="images" height="50" width="100" onerror="this.onerror=null;this.src='images/no-image.png';" ></td>
                                        <td><a href="EditGameCategory.php?GameCategoryID=<?php echo($rowGameCategory['GameCategoryID']) ?>" class="btn btn-small btn-inverse">Edit</a></td>
                                <td><a href="Controller/con_DeleteGameCategory.php?GameCategoryID=<?php echo($rowGameCategory['GameCategoryID']); ?> " class="btn btn-small btn-danger" onclick="return areyousure()">Delete</a></td>
                                    </tr>
                                    <?php 
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <!--/.module-->
                    
                </div>
                <!--/.content-->
            </div>
            <!--/.span9-->
        </div>
    </div>
    <!--/.container-->
</div>
<!--/.wrapper-->
<?php
include 'Parts/Footer.php';
?>