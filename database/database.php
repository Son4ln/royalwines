<?php
  class DataBase {
            // Khởi tạo thuộc tính cho lớp connect
    var $db=null;
            //Kết nối database
    public function __construct()
    {
      $dsn='mysql:host=localhost;dbname=royalwines';
      $user='root';
      $pass='123';
      $this->db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
      //khai báo các Exceptions sử lý ngoại lệ , lỗi PD0
      $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    // Lấy tất cả dữ liệu từ databaseb
    public function getList($select)
    {
      $results = $this->db->query($select);
      return $results;
    }

            //Tạo phương thức lấy 1 kết quả của bảng

    public function getInstance($select)
    {
      $results = $this->db->query($select);
      $result = $results->fetch();
      return $result;
    }

            //Tạo phương thức thực thi các câu lệnh Insert, Update, Delete:
    public function exec($query)
    {
      $result = $this->db->exec($query);
      return $result;
    }

  }
?>
