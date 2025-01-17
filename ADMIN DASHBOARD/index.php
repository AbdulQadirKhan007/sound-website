<!-- Nav -->
<?php
session_start();
include 'header.php';
include 'conn.php';
$sql = "SELECT * FROM `artist`,`genre` WHERE artist.art_id = genre.art_id;";
$res = mysqli_query($conn,$sql);
$sqlArtCount = "SELECT COUNT(*) FROM `artist`";
$res1 = mysqli_query($conn,$sqlArtCount);
$ArtCount = mysqli_fetch_array($res1);

$sql1 = "SELECT * FROM `reviews`,`wishlist`,`user` WHERE reviews.u_id = wishlist.u_id = user.u_id;";
$res2 = mysqli_query($conn,$sql1);
$sqlUserCount = "SELECT COUNT(*) FROM `user`";
$res2 = mysqli_query($conn,$sqlUserCount);
$totUserCount = mysqli_fetch_array($res2);
                                               
 
       




if(!$_SESSION['n']){
  echo "<script>
  window.location.href= 'pages/samples/login.php'
  </script>";
}
else{
?>

<!-- Body Part -->

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo $_SESSION['n']; ?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                      class="text-primary">3 unread alerts!</span></h6>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-tale">
                <div class="card-body">
                  <p class="mb-4">Total Artist</p>
                  <p class="fs-30 mb-2"><?php echo $ArtCount[0] ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-dark-blue">
                <div class="card-body">
                  <p class="mb-4">Total User</p>
                  <p class="fs-30 mb-2"><?php echo $totUserCount[0] ?></p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-blue">
                <div class="card-body">
                  <p class="mb-4">Number of Meetings</p>
                  <p class="fs-30 mb-2">34040</p>
                  <p>2.00% (30 days)</p>
                </div>
              </div>
            </div>
            <div class="col-md-3 mb-4 stretch-card transparent">
              <div class="card card-light-danger">
                <div class="card-body">
                  <p class="mb-4">Number of Clients</p>
                  <p class="fs-30 mb-2">47033</p>
                  <p>0.22% (30 days)</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title mb-0">All Artist</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                      <thead>
                      <tr>
                        <th>Artist Image</th>
                        <th>Artist Name</th>
                        <th>Artist Genre</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php while($row = mysqli_fetch_array($res)){ ?>
                        <tr>
                          <td><img src="artistImg/<?php echo $row[2] ?>" alt="" width="50" height="50"></td>
                          <td><?php echo $row[1] ?></td>
                          <td><?php echo $row[4] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                  class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>


<!-- footer -->
<?php 
include 'script.php';
}
?>
  <!-- End custom js for this page-->
</body>

</html>