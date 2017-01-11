<div style="align-content: center; margin-left:10%;margin-right: 10%;width: 80%;">
    <form class="form-horizontal" id="login" method="post" accept-charset='UTF-8'>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" name='username' id="username" placeholder="Username" maxlength="50">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="password" name='password' class="form-control" id="password" placeholder="Password" maxlength="50">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10" >
                <button type="submit" name="Submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-log-in"></span> Login</button>
            </div>
        </div>
    </form>
    <h3 class="pull-right">
        <a class="btn btn-primary" href="<?=APP_ROOT?>/user/registration" role="button">
            <span class="glyphicon glyphicon-registration-mark"></span> Registrate</a>
    </h3>

</div>
