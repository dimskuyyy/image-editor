<div class="gallery--content">
    <p>This is the images that you edited</p>

    <div class="my-grid">
        <div class="grid-sizer"></div>
        <div class="gutter-sizer"></div>
        <?php
        foreach ($data['image'] as $row) :
        ?>
            <div class="grid-item" data-toggle="tooltip" data-placement="top" title="<?= $row['file_name'] ?> - <?= $row['keterangan'] ?>">

                <div class="delete-wrap">
                    <button class="delete-square" title="Delete" data-toggle="modal" data-target="#deletemodal" data-id="<?= $row['file_id'] ?>" data-name="<?= $row['file_name'] ?>">
                        <img src="<?= BASEURL ?>assets/img/delete.png" alt="">
                    </button>
                </div>
                <!-- <a href="" data-toggle="modal" data-target="#gallery_modal" id="preview_link" data-id="<?= $row['file_id'] ?>"></a> -->
                <img src="<?= BASEURL ?>assets/upload/<?= $row['file_name'] ?>" alt="">

            </div>
        <?php endforeach ?>
    </div>
</div>

<!-- preview -->
<!-- <div class="modal fade bd-example-modal-l" id="gallery_modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="background-color: #43464C; font-family: bold !important">
                <h5 class="modal-title judul" id="modal_title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #43464C; border-bottom-left-radius:5px;border-bottom-right-radius:5px">
                <div class="modal-img" style=""></div>
            </div>
            <p class="prev-ket"></p>
            </section>
        </div>
    </div>
</div> -->

<!-- delete -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="background-color: #43464C; font-family: bold !important">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                <a href="" class="btn btn-danger hapus">Delete</a>
            </div>
        </div>
    </div>
</div>