<div class="account--content">
    <div class="account--wrap">
        <?php
        foreach ($data['user'] as $row) :
        ?>
            <div class="logo--sec">
                <?php if (isset($row['file_avatar'])) : ?>
                    <img src="<?= BASEURL ?>assets/avatar/<?= $row['file_avatar'] ?>" alt="" style="border-radius: 50% !important; height: 100px!important">
                <?php else : ?>
                    <img src="<?= BASEURL ?>assets/avatar/profile.svg" alt="">
                <?php endif ?>
            </div>

            <h1><?= $row['username'] ?></h1>
            <button class="edit-profil account--button btn btn-warning " data-toggle="modal" data-target="#edit" data-edit="<?= $row['id'] ?>">Edit Account</button>

        <?php endforeach ?>
        <a class="btn btn-danger account--button" href="<?= BASEURL ?>/logout">Sign out</a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-l" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:2000">
    <div class="modal-dialog modal-dialog-centered modal-l" role="document">
        <div class="modal-content" style="background-color: #43464C;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form action="<?= BASEURL ?>account/update" method="POST" class="account--modal" enctype="multipart/form-data">
                    <?php foreach ($data['user'] as $row) : ?>
                        <div class="avatar--set logo--sec " id="">
                            <?php if (isset($row['file_avatar'])) : ?>
                                <img src="<?= BASEURL ?>assets/avatar/<?= $row['file_avatar'] ?>" alt="" style="border-radius: 50% !important; height: 100px!important">
                            <?php else : ?>
                                <img src="<?= BASEURL ?>assets/avatar/profile.svg" alt="" style="border-radius: 50% !important; ">
                            <?php endif ?>
                        </div>
                        <label for="avbrow" class="av--input">
                            Browse
                            <input type="file" name="avatar" id="avbrow">
                        </label>
                        <div class="input--sec">
                            <label for="un">Username</label>
                            <input type="text" class="input" value="<?= $row['username'] ?>" autocomplete="off" required name="username">
                        </div>
                    <?php endforeach ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-warning" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>