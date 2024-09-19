<?php
class face{
    function index(){
    }
    function list(){
        
        $labeled_image=model('labeled_image');
        $labeled_data=$labeled_image->get();

        $data['content']=view('face/list_label');
        $data['title']='ฐานข้อมูลใบหน้า';
        return view('_template/main',$data);
    }
    function add_face_form(){
        
        $space=model('space');
        $space_data=$space->get();

        $data['content']=view('face/add_face_form');
        $data['title']='เพิ่มข้อมูลใบหน้า';
        return view('_template/main',$data);
    }
}