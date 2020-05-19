<br>
<div class="row">
    <div class="col-4">
    </div>
    <div class="col-4">
    <form action="./index.php?content=login-script" method="post">
    <label for="InputEmail">Email address</label>
    <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" 
    value="<?php if (isset($_GET['email'])) {echo $_GET['email']; }?>"
     name="email">
    <label for="Inputpassword">Wachtwoord</label>
    <input type="password" class="form-control" id="inputpassword1" aria-describedby="passwordHelp" placeholder="Enter password" name="password">
    <small class="form-text text-muted">We'll never share your info with anyone else.</small>
    <button type="submit" class="btn btn-primary btn-lg btn-block">OK</button>
    </form>
    </div>
    <div class="col-4">
    </div>
</div>