<div class="row">
      <?php if (!empty($_SESSION['statusMsg'])) { ?>
          <div>
              <?php 
                  echo "<script>alert('" . $_SESSION['statusMsg'] . "');</script>";
                  unset($_SESSION['statusMsg']);
              ?>
          </div>
      <?php } ?>
</div>
