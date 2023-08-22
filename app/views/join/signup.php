<div class="join--content">
    <div class="join--wrap">
        <div class="logo--sec">
            <img src="<?= BASEURL ?>assets/img/SplitShire-Logo.png" alt="">
            <!-- <hr style="height: 2px;border-radius:1px; background-color:#292B2F;width:100%" class="mt-2 mb-2"> -->
        </div>

        <form class="input--sec" method="POST" action="<?= BASEURL ?>join/signup">

            <label for="un">Username</label>
            <input type="text" required id="un" name="username" autocomplete="off" class="input" placeholder="Username">
            <!-- ----- -->
            <label for="pass">Password</label>
            <input type="password" class="input" autocomplete="off" name="password" required placeholder="Password">
            <label for="pass">Repeat Password</label>
            <input type="password" class="input" autocomplete="off" name="repassword" required placeholder="Password">
            <button type="submit" name="signup" class="join--button">Sign Up</button>
            <div class="join--text">
                <p>Already have an account? <a href="<?= BASEURL ?>join/login">Login!</a></p>
            </div>
        </form>
    </div>
</div>