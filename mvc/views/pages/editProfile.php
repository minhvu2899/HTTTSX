<?php $user = $data['user'];
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Profile</h4>

        </div>
        <div class="card-body">
          <form method="post">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Email</label>
                  <input type="email" name="email" class="form-control" value=<?php echo $user[4] ?>>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Họ tên</label>
                  <input type="text" class="form-control" name="name" value=<?php echo $user[1] ?>>
                </div>
              </div>
            </div>
            <div class="row">


            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Địa chỉ</label>
                  <input type="text" class="form-control" name="address" value=<?php echo $user[2] ?>>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="bmd-label-floating">Số điện thoại</label>
                  <input type="text" class="form-control" name="sdt" value=<?php echo $user[3] ?>>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary pull-right" name="updateprofile">Update Profile</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="javascript:;">
            <img class="img" src="../assets/img/faces/marc.jpg" />
          </a>
        </div>
        <div class="card-body">
          <h6 class="card-category text-gray">CEO / Co-Founder</h6>
          <h4 class="card-title">Alec Thompson</h4>
          <p class="card-description">
            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
          </p>
          <a href="javascript:;" class="btn btn-primary btn-round">Follow</a>
        </div>
      </div>
    </div>
  </div>
</div>