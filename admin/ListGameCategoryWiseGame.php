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
                            <h3 style="float: left;">List Game Category Wise Game</h3>
                            <a style="float: right;" class="btn btn-large btn-info" href="AddGameCategoryWiseGame.php">Add</a>
                            <table class="table table-responsive" >
                                <tr>
                                    <th>
                                        Game Name
                                    </th>
                                    <th>
                                        Game Category
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                <?php 
                                include '../Classes/GameCategoryWiseGame.php';
                                $objGameCategoryWiseGame = new GameCategoryWiseGame();
                                $resultGameCategoryWiseGame = $objGameCategoryWiseGame->getAllGameCategoryWiseGame1();
                                foreach ($resultGameCategoryWiseGame as $rowGameCategoryWiseGame) {
                                    ?>
                                    <tr>
                                        <td> 
                                            <?php echo($rowGameCategoryWiseGame['GameName']); ?> 
                                        </td>
                                        <?php
                                    }
                                    ?>
                                    <?php 
                                    $objGameCategoryWiseGameCategory = new GameCategoryWiseGame();
                                    $resultGameCategoryWiseGameCategory = $objGameCategoryWiseGameCategory->getAllGameCategoryWiseGameCategory();
                                    foreach ($resultGameCategoryWiseGameCategory as $rowGameCategoryWiseGameCategory) {
                                        ?>
                                        <td> 
                                            <?php echo($rowGameCategoryWiseGameCategory['GameCategoryName']);?>
                                        </td>
                                        <?php 
                                    }
                                    ?>
                                    <td><a href="EditGameCategoryWiseGame.php?GameCategoryWiseGameID=<?php echo($rowGameCategoryWiseGame['GameCategoryWiseGameID']) ?>" class="btn btn-small btn-inverse">Edit</a></td>
                                    <td><a href="Controller/con_DeleteGameCategoryWiseGame.php?GameCategoryWiseGameID=<?php echo($rowGameCategoryWiseGame['GameCategoryWiseGameID']); ?> " class="btn btn-small btn-danger" onclick="return areyousure()">Delete</a></td>
                                </tr>


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