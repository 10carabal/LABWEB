  <?php
  $conn = oci_connect('usu_lab', '5n4v3rs4d1d_*20', '172.16.96.32/iceberg');
  if (!$conn) {
    $message =  'Lo sentimos, en estos momentos no se encuentran estables nuestros servidores/base de datos, podria ayudar a solucionar el problema si se contacta con el administrador';
    echo "<script>";
    echo "alert('$message');";
    echo "</script>";
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }
  ?>