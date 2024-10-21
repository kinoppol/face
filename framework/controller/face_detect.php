
<?php
class face_detect{
    function from_image(){

        $data['content']=view('face_detect/form');
        $data['title']='ค้นหาใบหน้าจากภาพถ่าย';
        return view('_template/main',$data);
    }
    
    function script(){        $face=model('labeled_face');
        $face_data=$face->get();
        $pic_path='writable/labeled_images/';
        $labels=array();
        $num_pictures=array();
        $pictures_url=array();
        foreach($face_data as $fd){
            $labels[]=$fd['personal_id'];
            $num_picture=0;
            $pics=array();
            if(!empty($fd['labeled_image_1'])){ $num_picture++; $pics[]=$pic_path.$fd['labeled_image_1']; }
            if(!empty($fd['labeled_image_2'])){ $num_picture++; $pics[]=$pic_path.$fd['labeled_image_2']; }
            if(!empty($fd['labeled_image_3'])){ $num_picture++; $pics[]=$pic_path.$fd['labeled_image_3']; }
            if(!empty($fd['labeled_image_4'])){ $num_picture++; $pics[]=$pic_path.$fd['labeled_image_4']; }
            if(!empty($fd['labeled_image_5'])){ $num_picture++; $pics[]=$pic_path.$fd['labeled_image_5']; }
            $pictures_url[]=$pics;
            $num_pictures[]=$num_picture;
        }

        $js_labels=json_encode($labels,JSON_UNESCAPED_UNICODE);
        $data['num_pictures']= json_encode($num_pictures,JSON_UNESCAPED_UNICODE);
        $data['pictures_url']= json_encode($pictures_url,JSON_UNESCAPED_UNICODE);
        $data['lables']= $js_labels;
        return view('face_detect/script',$data);
    }
}