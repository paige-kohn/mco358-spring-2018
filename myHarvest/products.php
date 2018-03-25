<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['qty']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products 
                WHERE ITEM_NO={$id}"; 
            $query_s=mysqli_query($db,$sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['ITEM_NO']]=array( 
                        "qty" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
  
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
        <tr> 
            <th>item</th> 
            <th> </th><th></th>
            <th>&nbsp;price</th>
            <th></th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products"; 
            $query=mysqli_query($db,$sql); 
              
            while ($row=mysqli_fetch_array($query)) { 
                $totalprice=0; 
                $subtotal=$_SESSION['cart'][$row['ITEM_NO']]['qty']*$row['price'];
                $totalprice+=$subtotal;
        ?> 
            <tr> 
                <td><?php echo $row['ITEM_NO'] ?></td> <td>
                <td><?php echo $row['ITEM_DESC'] ?></td> <td>
                <td><?php echo $row['ITEM_PRICE'] ?>$</td><td>
                <td><a href="order.php?page=products&action=add&id=<?php echo $row['ITEM_NO'] ?>">add to order</a></td> 
            </tr> 
        <?php 
                  
            } 
          
        ?> 
          
    </table>