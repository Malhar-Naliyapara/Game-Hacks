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
                            <h3 style="float: left;">List Walkthrough</h3>
                            <a style="float: right;" class="btn btn-large btn-info" href="AddWalkthrough.php">Add</a>
                            <table class="table table-responsive" >
                                <tr>
                                    <th>
                                        Game Name
                                    </th>
                                    <th>
                                        WalkThrough
                                    </th>
                                    <th>
                                        WalkThrough Description
                                    </th>
                                    <th>
                                        WalkThrough Link
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>
                                        Delete
                                    </th>
                                </tr>
                                <?php 
                                include '../Classes/WalkThrough.php';
                                $objWalkThrough = new WalkThrough();
                                $resultWalkThrough = $objWalkThrough->getAllWalkThrough();
                                foreach ($resultWalkThrough as $rowWalkThrough) {
                                    ?>
                                    <tr>
                                        <td><?php echo($rowWalkThrough['GameName']); ?></td>
                                        <td> <?php echo($rowWalkThrough['Walkthroughtitle']); ?></td>
                                        <td> <?php echo($rowWalkThrough['WalkthroughDescription']); ?></td>
                                        <td><a href="<?php echo($rowWalkThrough['WalkthroughLink']); ?>"><?php echo($rowWalkThrough['WalkthroughLink']); ?></a></td>
                                        <td><a href="EditWalkThrough.php?WalkthroughID=<?php echo($rowWalkThrough['WalkthroughID']) ?>" class="btn btn-small btn-inverse">Edit</a></td>
                                        <td><a href="Controller/con_DeleteWalkThrough.php?WalkthroughID=<?php echo($rowWalkThrough['WalkthroughID']); ?> " class="btn btn-small btn-danger" onclick="return areyousure()">Delete</a></td>
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