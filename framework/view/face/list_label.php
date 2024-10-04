              <!-- Basic Bootstrap Table -->
              <div class="card">
                  <h5 class="card-header">ข้อมูลใบหน้า</h5>
                  <div class="card-body">
                      <a href="<?= site_url('face/add_face_form') ?>"
                          class="btn btn-success">+
                          เพิ่มข้อมูลใบหน้า
                      </a>
                  </div>
                  <div class="table-responsive text-nowrap">
                      <table class="table table-hover">
                          <thead>
                              <tr>
                                  <th>หน่วยงาน</th>
                                  <th>รหัสประจำตัว</th>
                                  <th>ชื่อ</th>
                                  <th>รูปใบหน้า</th>
                                  <th>จัดการ</th>
                              </tr>
                          </thead>
                          <tbody class="table-border-bottom-0">
                              <?php
                                foreach($face as $fd) {
                                    ?>
                              <tr>
                                  <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>
                                          <?php print empty($fd['space_id'])?'ไม่มี':$space[$fd['space_id']]; ?>
                                      </strong></td>
                                      <td><?php print $fd['personal_id']; ?>
                                  <td><?php print $fd['name'].' '.$fd['surname']; ?>
                                  </td>
                                  <td><?php print $fd['labeled_image']; ?>
                                  </td>
                                  <td>
                                      <div class="dropdown">
                                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                              data-bs-toggle="dropdown">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item"
                                                  href="<?php print site_url('face/edit_face/id/'.$fd['id']); ?>"><i
                                                      class="bx bx-edit-alt me-1"></i> Edit</a>
                                              <a class="dropdown-item"
                                                  href="javascript:deleteFace(<?php print $fd['id']; ?>)"><i
                                                      class="bx bx-trash me-1"></i> Delete</a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                              <?php
                                }
                      ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <!--/ Basic Bootstrap Table -->
              <script>
                function deleteFace(id) {
                    var ask = window.confirm("ยืนยันการลบข้อมูลรูป?");
                    if (ask) {
                        window.location.href = "<?php print site_url('face/delete_face/id/')?>"+id;

                    }
                }
              </script>