<?php
class __database__ {
  private $__info__;
  public $__conn__;
  
  // private $__host__ = "85.10.205.173:3306";
//   private $__user__ = "ghsjulian";
//   private $__password__ = "ghs_&#80;";
//   private $__db__ = "relaxtea";

  private $__host__ = "localhost";
  private $__user__ = "root";
  private $__password__ = "";
  private $__db__ = "my_data";
  
  public function __construct() {

    /*   $name = "ghsjulian";
    $pass = "ghs_&#80;";
    $db = "relaxtea";
    $host = "85.10.205.173:3306";
    $conn = mysqli_connect($host, $name, $pass, $db);
    if ($conn) {
      echo "Connected Successful";
    } else {
      echo mysqli_errno();
    }

*/
    // $file = file_get_contents(__DIR__."/../__json__/__ghs__.json");
    //$this->info = json_decode($file, true);
    $this->__conn__ = mysqli_connect($this->__host__, $this->__user__, $this->__password__,
      $this->__db__);
    if ($this->__conn__) {
      return true;
    } else {
      return false;
    }
  }
  public function __cheak__() {
    if ($this->__conn__) {
      echo "<center><br><br><br><br><h2 style='color:#009801'>MYSQL Connected Successfully !</h2></center>";
    } else {
      echo "<center><br><br><br><h2 style='color:#f00'>MYSQL Connected Failed !</h2></center>";
    }
  }
  public function __SELECT__($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      while ($data = mysqli_fetch_all($query, true)) {
        return $data;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }
  public function __INSERT__($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      if ($query) {
        // code...
        return true;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }


  public function __CreateTable__($data) {
    if ($data) {
      $query = mysqli_query($this->__conn__, $data);
      if ($query) {
        // code...
        return "Created!";
      }
    }
  }
  public function __isExist__($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      //  return mysqli_fetch_array($query);
      if (mysqli_num_rows($query) == 0) {
        // code...
        return true;
      } else {
        return false;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }
  public function __LOGIN__($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      if (mysqli_num_rows($query) == 1) {
        return true;
      } else {
        return 0;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }

  public function __SIGNUP__($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      if ($query) {
        return true;
      } else {
        return 0;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }
  public function __SESSION__() {
    return "Session Method";
  }

  public function SelectSingle($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      $data = mysqli_fetch_assoc($query);
      return $data;
    } else {
      echo "Please Insert SQL Query!";
    }
  }
  public function _Delete($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      if ($query) {
        return true;
      }
    }
  }
  public function SelectInfo($sql = null) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      $data = mysqli_fetch_assoc($query);
      return $data;
    } else {
      echo "Please Insert SQL Query!";
    }
  }

  public function _insert($sql) {
    if ($sql) {
      $query = mysqli_query($this->__conn__, $sql);
      if ($query) {
        return $query;
      }
    } else {
      echo "Please Insert SQL Query!";
    }
  }


}
?>