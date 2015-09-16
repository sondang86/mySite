<?php
//  enable CORS to allow Ajax access cross domains
    header("Access-Control-Allow-Origin: *");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "wordpress_foundation";  
//
//// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 
//
//$sql = "SELECT post_title FROM wpfoundation_posts WHERE post_title LIKE " . "'" . $_POST['term'] . "%'";
//$result = $conn->query($sql);
//$data = array();
//if ($result->num_rows > 0) {
//    // output data of each row
//    while($row = $result->fetch_assoc()) {
//        $data[] = $row['post_title'];
//    }
//} else {
//    echo "0 results";
//}
//$conn->close();
//
//echo json_encode($data);
//
////$test = array("hello", "hello2", "hello3");
////
////echo json_encode($test);

require_once '../wp-config.php';

$meta_key = $_POST['term'] . "%";
$pageposts = $wpdb->get_results($wpdb->prepare("SELECT * FROM $wpdb->posts WHERE post_status = 'publish' AND post_title LIKE %s", $meta_key));

$data = array();
foreach ($pageposts as $pagepost) {
    $data[] = $pagepost->post_title;
}

print_r(json_encode($data));

//print_r($pageposts);