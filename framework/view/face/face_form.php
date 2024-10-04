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
        //print_r($face_data);
?>
        <form
          action="<?= site_url('face/save_face') ?>"
          method="post" enctype="multipart/form-data">

<?php


if(!empty($face_data['id'])){
  print '<input type="hidden" name="face_id" value="'.$face_data['id'].'" />';
}

?>
          <div class="mb-3 col-12">
            <div class="form-floating">
              <input type="text" class="form-control" id="floatingInput" placeholder="XXX"
                aria-describedby="floatingInputHelp" name="personal_id"
                value="<?php print !empty($face_data['personal_id'])?$face_data['personal_id']:''; ?>" required />
              <label for="floatingInput">รหัสประจำตัว *</label>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="สมชาย"
                  aria-describedby="floatingInputHelp" name="name"
                  value="<?php print !empty($face_data['name'])?$face_data['name']:''; ?>" required/>
                <label for="floatingInput">ชื่อ *</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
              </div>
            </div>
           
            <div class="mb-3 col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="สบายดี"
                  aria-describedby="floatingInputHelp" name="surname"
                  value="<?php print !empty($face_data['surname'])?$face_data['surname']:''; ?>" />
                <label for="floatingInput">สกุล</label>
                <div id="floatingInputHelp" class="form-text">

                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="mb-3 col-md-12">
              <div class="form-floating">
              <label for="defaultSelect" class="form-label">หน่วยงาน</label>
                        <select id="defaultSelect" class="form-select" name="space_id">
                          <option>โปรดเลือกหน่วยงาน</option>
                          <?php
                            //$data=array('a'=>'1');
                            $df=false;
                            print_r($face_data);
                            if(!empty($face_data['space_id']))$df=$face_data['space_id'];
                            print gen_option($space,$df);
                          ?>
                        </select>

              </div>
            </div>

          <div class="mb-3 col-12">
            <div class="form-floating">
                <div class="mb-3">
                        <label for="formFile" class="form-label">ภาพใบหน้า</label>
                        <input class="form-control" type="file" id="formFile" name="face_image"/>
                      </div>
              <div id="floatingInputHelp" class="form-text">

              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
            </div>
            <div class="d-grid gap-2 col-lg-6 col-md-12 mx-auto mt-3">
              <button class="btn btn-primary btn-lg" type="submit">เพิ่มข้อมูลใบหน้า</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>