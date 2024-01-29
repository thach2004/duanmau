<?php 
    include "../model/danhmuc.php";
    include "../model/pdo.php";
    include "header.php";
    if(isset($_GET['act'])){
        $act=$_GET['act'];
        switch($act) {
            case 'adddm':
                //kiểm tra xem thêm mới có tồn tại hay k và nếu đúng
                if(isset($_POST['themmoi'])&&($_POST['themmoi'])){
                    $tenloai=$_POST['tenloai'];
                    add_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
                
                include "danhmuc/add.php";
                break;
                
            case 'listdm':
                // id desc : cái nào mới nhập đưa lên trên
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'xoadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                    delete_danhmuc($_GET['id']);
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;

            case 'suadm':
                if(isset($_GET['id'])&&($_GET['id']>0)){
                   $danhmuc = loadone_danhmuc($_GET['id']);
                }    
                include "danhmuc/update.php";
                break;
            
            case 'updatedm':
                if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                    $tenloai=$_POST['tenloai'];
                    $id=$_POST['id'];
                    update_danhmuc($id,$tenloai);
                    $thongbao = "Cập nhật thành công";
                }
                $listdanhmuc = loadall_danhmuc();
                include "danhmuc/list.php";
                break;
                
                default:
                include "home.php";
                break;

            
        }
    }else{
        include "home.php";
    }


    
    include "footer.php";
?>