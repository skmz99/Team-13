<?php
    include_once 'header.php';
?>

    <head2>
        <title>Homepage</title>
        <link rel="stylesheet" href="style.css">
    </head2>
    <div class="page-content">
      <section style="text-align:center; color:white; padding-top:248px;">
          <h1>SEARCH CATALOG</h1>
      </section>
      <div class="search">
          <div class="search-container">
            <form action="/insertlink.php">
              <input type="text" placeholder="Search..." name="search" style=text-align:center;>
              <button type="submit">
                <img src="https://cdn0.iconfinder.com/data/icons/very-basic-2-android-l-lollipop-icon-pack/24/search-512.png" width=20 height=20>
              </button>
            </form>
          </div>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>