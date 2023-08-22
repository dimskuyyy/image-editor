<div class="nav--right">
    <div class="nav--content">
        <div class="nav--top">
            <?php if (isset($data['guest'])) : ?>
                <a href="<?= BASEURL ?>join/login" class="nav--link--right btn btn-primary">
                    <p>Login</p>
                </a>
                <a href="<?= BASEURL ?>join/signup" class="nav--link--right btn btn-warning">
                    <p>Signup</p>
                </a>
            <?php elseif (isset($data['vip'])) : ?>
                <h2 style="margin-bottom: 0px;">WELCOME</h2>
                <?php foreach ($data['vip'] as $row) {
                    echo '<p style="font-size:16px">' . $row['username'] . '</p>';
                } ?>
            <?php endif ?>
        </div>
        <hr style="background-color: #414347;height:2px; border-radius:1px;">
        <div class="nav--body right--division">
            <p>Information</p>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/filter" class="nav--link--body--right">
                    <div class="nav--image--right">
                        <img src="<?= BASEURL ?>assets/img/filter.png" alt="" width="25px"></div>
                    <div class="nav--text--right">
                        <p>Filter</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/masking" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/mask.png" width="30px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Masking</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/text" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/text.png" width="28px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Text</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/painting" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/painting.png" width="25px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Painting</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/transform" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/transform.png" width="30px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Transform</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/others" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/other.png" width="28px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Others</p>
                        <p>Explanation</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>page/tutorial" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/tutor.png" width="38px" alt=""></div>
                    <div class="nav--text--right">
                        <p>Tutorial</p>
                        <p>Article</p>
                    </div>
                </a>
            </div>
            <div class="nav--link--wrap--right">
                <a href="<?= BASEURL ?>about" class="nav--link--body--right">
                    <div class="nav--image--right"><img src="<?= BASEURL ?>assets/img/info.png" width="35px" alt=""></div>
                    <div class="nav--text--right">
                        <p>About us</p>
                        <p>Article</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>