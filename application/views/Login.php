<style>
    body {
        background-image: url(<?php echo IMAGE_URL . 'loginbg.jpg' ;?>);
        background-repeat: no-repeat;
        background-size: cover;
    }


    .login-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        min-height: 80vh;
        padding-right: 200px;
    }

    .login-form {
        max-width: 400px;
        padding: 40px;
        background-color: rgba(45, 38, 38, 0.5);
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-title {
        text-align: center;
        font-size: 40px;
        color: white;
    }


    .form-group {
        margin-bottom: 20px;
    }

    .form-group:last-child {
        margin-bottom: 0;
    }

    .form-control {
        width: 100%;
        height: 40px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        outline: none;
    }

    .form-control:focus {
        border-color: #66afe9;
    }

    .login-button {
        width: 100%;
        height: 40px;
        background-color: #337ab7;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .login-button:hover {
        background-color: #286090;
    }

    .login-subtitle {
        text-align: center;
        font-size: 10px;
        color: white;
        margin-bottom: 20px;
    }

    .login-form fieldset legend {
        color: white;
    }
</style>

<div class="login-container">
    <div class="login-form">
        <div class="login-title">Login</div>
        <form action="<?php echo site_url('Login/Authenticate') ;?>" method="post">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key" aria-hidden="true"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="login-button" value="Login">
            </div>
        </form>
    </div>
</div>