<?php if (isset($data['guest'])) : ?>

<?php elseif (isset($data['vip'])) : ?>
    <button class="save-server" data-toggle="modal" data-target="#upload_modal" disabled="disabled" style="background-color: #43464C;">Save to Server</button>

<?php endif ?>
<div id="tui-image-editor-container"></div>

<div class="modal fade bd-example-modal-l" id="upload_modal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-l modal-dialog-centered">
        <div class="modal-content" style="border-radius: 10px;">
            <div class="modal-header" style="background-color: #43464C; font-family: bold !important">
                <h5 class="modal-title" id="modal_title">Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="background-color: #43464C;">
                <form action="<?= BASEURL ?>upload/data" method="POST" class="input--sec">
                    <textarea name="base64" class="base64file" cols="30" rows="10" value=""></textarea>
                    <label for="fn">Nama file : </label>
                    <input type="text" required id="fn" name="filename" autocomplete="off" class="input" placeholder="nama file">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" value="" class="input"></textarea>
                    <button type="submit" class="btn btn-success" name="uploadfile">Upload</button>
                </form>
            </div>
            </section>
        </div>
    </div>
</div>
<!-- <script>
        const baseurl = "http://localhost/image_editor/";
    </script> -->
<script type="text/javascript" src="<?= BASEURL ?>assets/js/fabric.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/tui-code-snippet.min.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/tui-color-picker.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/FileSaver.min.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/tui-image-editor.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/theme/white-theme.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/theme/black-theme.js"></script>
<script>
    // Image editor
    var imageEditor = new tui.ImageEditor('#tui-image-editor-container', {
        includeUI: {
            loadImage: {
                path: 'img/sampleImage2.png',
                name: 'SampleImage'
            },
            theme: blackTheme, // or whiteTheme
            initMenu: 'filter',
            menuBarPosition: 'bottom'
        },
        cssMaxWidth: 700,
        cssMaxHeight: 500,
        usageStatistics: false
    });
    window.onresize = function() {
        imageEditor.ui.resizeEditor();
    }
</script>