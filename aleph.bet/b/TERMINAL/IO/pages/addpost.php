
<h1>POST A NEW LOG MESSAGE</h1>
<p>Your message will be dated and logged into the system. You may view your messages, but only the sys-admin can remove them. </p>
<form method="POST" action="">
  <input style="width: 50vh; height: 30px; font-family: 'VT323'; background-color: black; border: 1px solid var(--my-fav-color); color: var(--my-fav-color);" name="title" placeholder="Title" required><br>
  <textarea style="width: 50vh; height: 20vh; font-family: 'VT323'; background-color: black; border: 1px solid var(--my-fav-color); color: var(--my-fav-color);" name="body" placeholder="Body" required></textarea><br>
  <input type='hidden' name='mod' value='<?php echo "$mod";?>'/> 
  <input type='hidden' name='dom' value='<?php echo "$dom";?>'/> 
  <button type="submit"style="width: 20vh; height: 30px; font-family: 'VT323'; background-color: black; border: 1px solid var(--my-fav-color); color: var(--my-fav-color);">Submit</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  echo '<span class="blog_postSavedMsg">Post saved.</span>'; } ?>