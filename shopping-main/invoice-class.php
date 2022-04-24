<?php 

class Invoice
{
    public $conn;

    public function __construct()
    {
        try
        {   
            $this->conn = new PDO("mysql:host=localhost; dbname=shopping_db", "root", "");
        }
        catch(PDOException $exception)
        {
            $_SESSION['error'] = "Failed to connect! ERROR :  " . $exception->getMessage();
            header("location: index.php");
        }
    }

    public function show()
    {
        $query = "select * from invoice";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC
        return $data;
    }

    public function show_user_table($data)
    {
        $query = "select username from user where user_id = $data";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC
        return $data;
    }

    public function show_user_order($data)
    {
        $query = "select * from invoice where username = '$data'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC
        return $data;
    }

    public function store($data)
    {
        $transaction_id = $data['transaction_id'];
        $username = $data['username'];
        $phone = $data['phone'];
        $account = $data['account'];
        $address = $data['address'];
        $products = $data['products'];
        $totalcost = $data['total_cost'];
        
        //$products = $data['products'];
        try
        {
        $query = "insert into invoice(transaction_id, username, phone, account,
         address, products, total_cost) 
         values (:tid, :uname, :phone, 
         :account, :address, :products, :cost)";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            'tid' => $transaction_id,
            'uname' => $username,
            'phone' => $phone,
            'account' => $account,
            'address' => $address,
            'products' => $products,
            'cost' => $totalcost
        ]);

        $_SESSION['update'] = "Data stored successfully!";
        
        
        }
        catch(PDOException $exception)
        {   
            $_SESSION['error'] = "Data submission failed, ERROR:  " . $exception->getMessage();
            
        }
    }
}