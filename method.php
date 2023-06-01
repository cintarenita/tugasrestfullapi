<?php
require_once "koneksi.php";
class Food
{
    public function get_foods()
{
    global $koneksi;
    $query = "SELECT * FROM foods";
    $data = array();
    $result = $koneksi->query($query);
    
    while ($row = mysqli_fetch_object($result)) {
        $data[] = $row; }
        $response = array(
            'status' => 1,
            'message' => 'Sukses liat list food store aku nih.',
            'data' => $data
        );

        header('Content-Type: application/json');
        echo json_encode($response);
    
    }
    
    public function get_food($id = 0){
        global $koneksi;
        $query = "SELECT * FROM foods";
        if ($id != 0) {
            $query .= " WHERE id=" . $id . " LIMIT 1"; }
            $data = array();
            $result = $koneksi->query($query);
            while ($row = mysqli_fetch_object($result)) {
                $data[] = $row; }
                $response = array(
                    'status' => 1,
                    'message' => 'ukses liat list food store aku nih.',
                    'data' => $data
                );

                header('Content-Type: application/json');
                echo json_encode($response);
            }
            

    public function insert_food(){
        global $koneksi;
        $arrcheckpost = array('name' => '', 'price' => '', 'qty' => '');
        $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "INSERT INTO foods SET
            name = '$_POST[name]',
            price = '$_POST[price]',
            qty = '$_POST[qty]'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Food Added Successfully.'
                );
            
            } 
            else {
                $response = array(
                    'status' => 0,
                    'message' => 'Food Addition Failed.'
                );}
            } 
                else
                {
                    $response = array(
                        'status' => 0,
                        'message' => 'Parameter Do Not Match'
);
}
header('Content-Type: application/json');
echo json_encode($response);
}

function update_food($id) {
    global $koneksi;
    $arrcheckpost = array('name' => '', 'price' => '', 'qty' => '');
    $hitung = count(array_intersect_key($_POST, $arrcheckpost));
        if ($hitung == count($arrcheckpost)) {
            $result = mysqli_query($koneksi, "UPDATE books SET
            name = '$_POST[name]',
            price = '$_POST[price]',
            qty = '$_POST[qty]'
            WHERE id='$id'");
            if ($result) {
                $response = array(
                    'status' => 1,
                    'message' => 'Food Updated Successfully.'
                );
            } else {

                $response = array(
                    'status' => 0,
                    'message' => 'Food Updation Failed.'
                );
            }} else {
                $response = array(
                    'status' => 0,
                    'message' => 'Parameter Do Not Match'
                );
}
header('Content-Type: application/json');
echo json_encode($response);
}

function delete_food($id){
    global $koneksi;
    $query = "DELETE FROM foods WHERE id=" . $id;
    if (mysqli_query($koneksi, $query)) {
        $response = array(
            'status' => 1,
            'message' => 'Food Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'message' => 'Food Deletion Failed.'
        );
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
}
}

