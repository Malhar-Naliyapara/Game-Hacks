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
                            
                            <h3 style="float: left;">List Game</h3>
                            <a style="float: right;" class="btn btn-large btn-info" href="AddGames.php">Add</a>
                            <table class="table table-responsive" >
                            <tr>
                                <th>
                                    Game Name
                                </th>
                                <th>
                                    Game Description
                                </th>
                                <th>
                                    Game Image
                                </th>
                                <th>
                                    Game Offical Website
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            <?php 
                                include '../Classes/Game.php';
                                $objGame = new Game();
                                $resultGame = $objGame->getAllGame();
                                foreach ($resultGame as $rowGames) {
                            ?>
                            <tr>
                                <td> <?php echo($rowGames['GameName']); ?></td>
                                <td> <?php echo($rowGames['GameDescription']); ?></td>
                                <td><img class="img-responsive" src="images/<?php echo($rowGames['GameImage']); ?>" alt="images" onerror="this.onerror=null;this.src='images/no-image.png';" height="50" width="100"></td>
                                <td><a href="<?php echo $rowGames['GameOfficialWebsite']; ?>"><?php echo($rowGames['GameOfficialWebsite']); ?></a></td>
                                <td><a href="EditGames.php?GameID=<?php echo($rowGames['GameID']) ?>" class="btn btn-small btn-inverse">Edit</a></td>
                                <td><a href="Controller/con_DeleteGames.php?GameID=<?php echo($rowGames['GameID']); ?> " class="btn btn-small btn-danger" onclick="return areyousure()">Delete</a></td>
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