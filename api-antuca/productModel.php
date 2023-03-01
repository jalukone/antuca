<?php

class productModel{
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli('localhost','root','','antuca');
        mysqli_set_charset($this->conexion, 'utf8');
    }

    public function getProducts($id=null){
        $where = ($id == null) ? "" : " WHERE id = '$id'";
        $products = [];
        $sql = "SELECT * FROM product ".$where;
        $result = mysqli_query($this->conexion, $sql);
        while($row = mysqli_fetch_assoc($result)){
            array_push($products, $row);
        }
        return $products;
    }

    public function saveProducts($name,$price,$category,$description,$image){
        $sql = "INSERT INTO product (name, price, category, description, image) VALUES ('$name', '$price', '$category', '$description', '$image')";
        mysqli_query($this->conexion, $sql);
        $result =['succes','Producto guardado correctamente'];
        return $result;
    }

    public function updateProducts($id,$name,$price,$category,$description,$image){
        $sql = "UPDATE product SET name = '$name', price = '$price', category = '$category', description = '$description', image = '$image' WHERE id = '$id'";
        mysqli_query($this->conexion, $sql);
        $result =['succes','Producto actualizado correctamente'];
        return $result;
    }
    
    public function deleteProducts($id){
        $valid = $this->getProducts($id);
        $result = ['error','El producto no existe con ID '.$id];
        if(count($valid) == 0){
            $sql = "DELETE FROM product WHERE id = '$id'";
            mysqli_query($this->conexion, $sql);
            $result =['succes','Producto eliminado correctamente'];
        }
        
        return $result;
    }
}