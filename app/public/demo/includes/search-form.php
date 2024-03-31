<form class="d-flex" action="search-results.php" method="get">
  <input name="s" value="<?php if (isset($_GET['s'])) {
                            echo $_GET['s'];
                          }
  ?>" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
</form>