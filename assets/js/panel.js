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
    panelContent.innerHTML = `<h3>تنظیمات</h3>
        <div id='settings-section'>
            <form method="post" action="/panel/edit_account.php">
                <div style="display: flex; flex-direction: column;">
                    <span style='margin-right:-70px;'>تغییر نام کاربری:</span>
                    <input id="username" style="width: 250px; margin-top: 50px;" type="text"
                        placeholder="نام کاربری فعلی: ${userInfo.username}">
                </div>

                <div style="display: flex; flex-direction: column;">
                    <span style='margin-right:-70px;'>تغییر بیوگرافی:</span><br>
                    <textarea id="bio" style="width: 250px; height: 100px;"
                        placeholder="${userInfo.bio}"></textarea>
                </div>

                <hr style="width: 100%; flex-basis: 100%; box-sizing: border-box;">

                <div style="display: flex; flex-direction: row; gap: 40px;">
                    <img id='user-image' src='${userInfo.imageSrc}'>
                    <div>
                        <input type="file" name="image" id="upload" style="display: none;" accept=".jpg,.png,.jpeg">
                        <label for="upload" class="upload">
                            آپلود پروفایل
                        </label><br>
                        <div>
                            <button style='width: 200px;' class="upload">ثبت تغییرات</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    `;
});

document.getElementById('status-part-btn').addEventListener('click', () => {});