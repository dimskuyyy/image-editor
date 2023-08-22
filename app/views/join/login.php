<div class="join--content">
    <div class="join--wrap">
        <div class="logo--sec">
            <img src="<?= BASEURL ?>assets/img/SplitShire-Logo.png" alt="">
            <!-- <hr style="height: 2px;border-radius:1px; background-color:#292B2F;width:100%" class="mt-2 mb-2"> -->
        </div>

        <form class="input--sec" method="POST" action="<?= BASEURL ?>join/login">

            <label for="un">Username</label>
            <input type="text" required id="un" name="username" autocomplete="off" class="input" placeholder="Username">
            <!-- ----- -->
            <label for="pass">Password</label>
            <input type="password" class="input" autocomplete="off" name="password" required placeholder="Password">
            <label for="cb">
                <input type="checkbox" name="remember" id="cb" class="checkbox-rem">Remember
            </label>
            <button type="submit" name="login" class="join--button">Login</button>
            <div class="join--text">
                <p>Don't have any account? <a href="<?=BASEURL?>join/signup">Sign Up!</a></p>
            </div>
        </form>
    </div>
</div>