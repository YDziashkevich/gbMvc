
<form class="form-horizontal" method="post">
    <fieldset>
        <!-- Form Name -->
        <legend>Enter message</legend>

        <div class="row">
            <div class="span12">
                <!-- Text input-->
                <div class="center">
                    <div class="control-group">
                        <label class="control-label" for="name">enter your name</label>
                        <div class="controls">
                            <input id="name" name="name" type="text" placeholder="Enter name" class="input-xlarge">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <!-- Text input-->
                <div class="center">
                    <div class="control-group">
                        <label class="control-label" for="email">enter your email</label>
                        <div class="controls">
                            <input id="email" name="email" type="text" placeholder="Enter email" class="input-xlarge">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12">
                <!-- Textarea -->
                <div class="center">
                    <div class="control-group">
                        <label class="control-label" for="message">enter your message</label>
                        <div class="controls">
                            <textarea id="message" name="message"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span4">
                <div id="capt">
                    <div class="control-group">
                        <label class="control-label" for="captcha"></label>
                        <div class="controls">
                            <div class="input-prepend">
                                <span class="add-on"><img src="index.php?url=captcha/show/"></span>
                                <input id="captcha" name="captcha" class="input-large" placeholder="answer" type="text">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="span5">
                <div id="ok">
                    <div class="control-group">
                        <label class="control-label" for="ok"></label>
                        <div class="controls">
                            <input type="submit" name="ok" class="btn btn-primary" >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="row">
        <div class="span12">
            <div id="errors">

                <?php
                if(isset($errors)){
                    foreach($errors as $value){
                        echo $value . "<br />";
                    }
                }
                ?>

            </div>
        </div>
    </div>
</form>

