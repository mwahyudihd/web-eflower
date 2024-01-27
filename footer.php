<div class="container" style="padding-top: 570px;">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy; 2023-2024 Eflower</p>

    <a class="navbar-brand text-leaf fw-bolder" href=".">E<span class="text-white">flower</span></a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="." class="nav-link px-2 text-muted">Home</a></li>
    <?php if($_SESSION['role'] == 'admin') { ?>
        <li class="nav-item"><a href="../profile.php" class="nav-link px-2 text-muted">Profile</a></li>
    <?php  } else { ?>
      <li class="nav-item"><a href="profile.php" class="nav-link px-2 text-muted">Profile</a></li>
    <?php } ?>
      <li class="nav-item"><a href="mailto:wawprjct@gmail.com?subject=Q&A" class="nav-link px-2 text-muted">Contact</a></li>
      <li class="nav-item"><a href="https://wa.me/62895351276161?text=I'm%20have...got%20any%20question...Bugs%20about...in%20eflower%20market..." class="nav-link px-2 text-muted">FAQs</a></li>
      <li class="nav-item"><a href="." class="nav-link px-2 text-muted">About</a></li>
    </ul>
  </footer>
</div>