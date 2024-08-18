            <form action="" method="post" class="form" enctype="multipart/form-data">
                <h2>Create Post</h2>

                <fieldset>
                    <legend>Title</legend>
                    <input class="input" type="text" name="title" value="" autocomplete="off" spellcheck="false" required>
                </fieldset>

                <fieldset>
                    <legend>Short Description</legend>
                    <input class="input" type="text" name="description" value="" autocomplete="off" spellcheck="false">
                </fieldset>

                <fieldset>
                    <legend>Post Detail</legend>
                    <textarea class="input" name="content" required></textarea>
                </fieldset>

                <div class="btn-space">
                    <div>
                        <label for="file-input" class="btn">Choose post image</label>
                        <span class="file-name"></span>
                        <input id="file-input" type="file" name="image" onchange="updateFile(this)" required>
                    </div>

                    <button class="btn" type="submit" name="btn_post" value="submit_create_post">Create Post</button>
                </div>
            </form>