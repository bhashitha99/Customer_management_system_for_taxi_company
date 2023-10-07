
<div class="changePasswordForm">
        <form action="passenger.php" method="post">
            <div class=content>
                <h2>Find A Taxi</h2> 
                <div class="row">
                    <label class="inline-block">From</label>
                    <span id="currentPassword"
                    class="validation-message"></span> <input
                    type="text" name="from"
                    class="full-width">
                </div>
                <div class="row">
                    <label class="inline-block">To</label> <span
                    id="newPassword" class="validation-message"></span><input
                    type="text" name="to"
                    class="full-width">
                </div>
                <div class="row">
                    <input class="changebtn" type="submit" name="submit" value="Find">
                    <div class="inval">
                        <?php
                            if(isset($_POST['submit'])){
                                  
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </div>