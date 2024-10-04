<?php
class face{
    function index(){
    }
    function list(){
        
        $face=model('labeled_face');
        $face_data=$face->get();

        $space=model('space');
        $space_data=$space->get();
        $sp_arr=array();
            foreach($space_data as $sp){
                $sp_arr[$sp['id']]=$sp['name'];
            }

        $data['space']=$sp_arr;
        $data['face']=$face_data;
        $data['content']=view('face/list_label',$data);
        $data['title']='ฐานข้อมูลใบหน้า';
        return view('_template/main',$data);
    }
    function add_face_form(){
        
        $space=model('space');
        $space_data=$space->get();
        $sp_arr=array();
            foreach($space_data as $sp){
                $sp_arr[$sp['id']]=$sp['name'];
            }
            
        $data['space']=$sp_arr;
        $data['content']=view('face/face_form',$data);
        $data['title']='เพิ่มข้อมูลใบหน้า';
        return view('_template/main',$data);
    }
    function edit_face($param){
        
        $space=model('space');
        $space_data=$space->get();
        $sp_arr=array();
            foreach($space_data as $sp){
                $sp_arr[$sp['id']]=$sp['name'];
            }
        $face=model('labeled_face');
        $where=array(
            'id'=>$param['id']
        );
        $face_data=$face->get($where);
        $data['face_data']=$face_data[0];
        $data['space']=$sp_arr;
        $data['content']=view('face/face_form',$data);
        $data['title']='แก้ไขข้อมูลใบหน้า';
        return view('_template/main',$data);
    }


    function save_face(){
        $data=array(
                    'space_id'=>$_POST['space_id'],
                    'personal_id'=>$_POST['personal_id'],
                    'name'=>$_POST['name'],
                    'surname'=>$_POST['surname'],
                );

        if($_FILES["face_image"]['size'] > 0){
            helper('labeled_image');
            $file_name=upload_labeled_image($_FILES["face_image"]);
            
        }
        //exit();
        $face=model('labeled_face');
        if(empty($_POST['face_id'])){
            $face->create($data);
        }else{
            $where=array(
                'id'=>$_POST['face_id'],
            );
            $face->update($data,$where);
        }
        
        return redirect(site_url('face/list'));
    }
    function delete_face($param){
            

        $face=model('labeled_face');
            $where=array(
                'id'=>$param['id'],
            );
            $face->delete($where);

        
        return redirect(site_url('face/list'));
    }
}