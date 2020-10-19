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
                            <h3 style="float: left;">List Hacks</h3>
                            <a style="float: right;" class="btn btn-large btn-info" href="AddHacks.php">Add</a>
                            <table class="table table-responsive" >
                            <tr>
                                <th>
                                    Game Name
                                </th>
                                <th>
                                    Hacks
                                </th>
                                <th>
                                    Game Hacks Description
                                </th>
                                <th>
                                    Game Hacks Image
                                </th>
                                <th>
                                    Edit
                                </th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            <?php 
                                include '../Classes/Hacks.php';
                                $objHacks = new Hacks();
                                $resultHacks = $objHacks->getAllHacks();
                                foreach ($resultHacks as $rowHacks) {
                            ?>
                            <tr>
                                <td><?php echo($rowHacks['GameName']); ?></td>
                                <td> <?php echo($rowHacks['HackTitle']); ?></td>
                                <td> <?php echo($rowHacks['HackDescription']); ?></td>
                                <td><img src="images/<?php echo($rowHacks['HackImage']); ?>" height="50" width="100" onerror="this.onerror=null;this.src='images/no-image.png';"></td>
                                <td><a href="EditHacks.php?HackID=<?php echo($rowHacks['HackID']) ?>" class="btn btn-small btn-inverse">Edit</a></td>
                                <td><a href="Controller/con_DeleteHacks.php?HackID=<?php echo($rowHacks['HackID']); ?> " class="btn btn-small btn-danger" onclick="return areyousure()">Delete</a></td>
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