<main class="main">
<p class="red"><?=isset($_COOKIE['error'])?$_COOKIE['error']:''?></p>
       <form class="form-login" action="?page=login" method="POST" >
            <div class="fr-item">
                <label for="login">Enter your username</label>
                <input name="login" id="login" type="text" placeholder="login">
            </div>
            
            <div class="fr-item">
                <label for="password">Enter your password</label>
                <input name="password" id="password" type="password" placeholder="password">
            </div>
            
            <div class="fr-item">
                <input type="submit" name="signin" value="login">
            </div>
       </form>
</main>