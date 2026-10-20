var panelContent = document.getElementById('panel-content');

document.getElementById('post-part-btn').addEventListener('click', () => {
    panelContent.innerHTML = `
        <h3>آپلود پست</h3>

        <div>
            <form method="post" action="/panel/upload_post.php" id="upload-post-form" enctype="multipart/form-data">
                <div class="flex">
                    <input type="file" name="image" id="upload" style="display: none;" accept=".jpg,.png,.jpeg">

                    <label for="upload" class="upload">
                        آپلود پوستر
                    </label>

                    <input type="text" placeholder="* موضوع" id="upload-post-title" name="title" required>
                </div>

                <textarea placeholder="توضیحات (اختیاری)" id="upload-post-desc" name="desc"></textarea>

                <button type="submit" class="upload" style="margin: auto; width: 100%;">
                    آپلود
                </button>
            </form>
        </div>
    `;
});

document.getElementById('settings-part-btn').addEventListener('click', () => {
    panelContent.innerHTML = '<h3>hell</h3>';
});

document.getElementById('status-part-btn').addEventListener('click', () => {});