<?php

$menu['จัดการใบหน้า']=array(
    'face'=>array(
        'label'=>'ฐานข้อมูลใบหน้า',
        'bullet'=>'tf-icons bx bx-data',
        'url'=>site_url('face_admin/list'),
    ),
);

print gen_menu($menu);