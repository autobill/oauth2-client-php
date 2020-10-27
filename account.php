<?php
require_once "header.php";

$apiCaller = new ApiCaller();
$accounts = $apiCaller->getAccountList();
?>
<div class="container">
    <div class="row">
        <div class="offset-sm-1 col-sm-10">
            <?php
            if(!isset($accounts)){
                ?>
                <p>There is an issue with API Connection. You might need to renew access token.</p>
                <?php
            } else if(count($accounts) ==0){
            ?>
                <p>No account available</p>
            <?php
            }
            else{
            ?>

                        <table class="table table-bordered table-hover">
                                    <thead class=""><tr><th>ID</th><th>Email</th><th>Name</th></tr></thead>

                    <tbody>
                    <?php
                        foreach($accounts as $account){
                    ?>
                            <tr><td><?php echo $account->id ;?></td><td><?php echo $account->display_name ;?></td><td><?php echo $account->email_address ;?></td></tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<?php
require_once "footer.php";
?>
