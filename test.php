<?php


class test
{   

   //新建验证
    public function get1(Request $request=null)
    {
       

        $data = [
            'data'=>$authID,
            'status' => (bool) $authID,
            'message' => $authID ?'1' : '0',
        ];

        header('Content-type: application/json');
        echo json_encode( $data );
    }
    //获取图像
    public function get2(&$authID,&$type)
  {
    if(isset($authID['pic']))
    {
        
        $pic = (get_magic_quotes_gpc()) ? stripslashes($authID['pic']) : $authID['pic'];
    
        //把下面这个路径变成你存在服务器上图片的路径
        $pic = '/your/path/to/real/image/location/'.$pic;
    
       //获取图片的大小
       $type = getimagesize($pic);
    
        //把获取的图片放入数据头中
        header('Content-type: '.$type['mime']);
    
        //输出图片
        readfile($pic);
    }
  }
}
