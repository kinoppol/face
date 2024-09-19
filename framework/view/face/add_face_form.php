<?php

helper('view/alert');

?>

<div class="row">
  <div class="col-md-6">
    <div class="card mb-4">
      <h5 class="card-header">ข้อมูลพื้นฐาน</h5>
      <div class="card-body">
        <?php
        if(!empty($_SESSION['response']['alert'])) {
            gen_alert($_SESSION['response']['alert']);
            $_SESSION['response'] = null;
        }
?>
        <form
          action="<?= site_url('management/edit_user') ?>"
          method="post" enctype="multipart/form-data">


          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="exampleuser"
                aria-describedby="floatingInputHelp" name="username"
                value="<?= $user['username'] ?>" required />
              <label for="floatingInput">รหัสประจำตัว</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="สมชาย"
                  aria-describedby="floatingInputHelp" name="name"
                  value="" />
                <label for="floatingInput">ชื่อ</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
              </div>
            </div>
            <div class="mb-3 col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="สบายดี"
                  aria-describedby="floatingInputHelp" name="surname"
                  value="" />
                <label for="floatingInput">สกุล</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
              </div>
            </div>
          </div>

          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="file" class="form-control" id="floatingInput" placeholder="somchai@gmail.com"
                aria-describedby="floatingInputHelp" name="email"
                value="" />
              <label for="floatingInput">เพิ่มรูป</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
            </div>
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
              <button class="btn btn-primary btn-lg" type="submit">สร้างผู้ใช้งาน</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>