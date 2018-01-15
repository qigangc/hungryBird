<?php

class DatabaseAdaptor {
  // The instance variable used in every one of the functions in class DatbaseAdaptor
  private $DB;

  // Make a connection to an existing data based named 'first' that has table customer
   public function __construct() {
     $db = 'mysql:dbname=HungryBird; charset=utf8; host=127.0.0.1';
     $user = 'root';
     $password = '';

     try {
       $this->DB = new PDO ( $db, $user, $password );
       $this->DB->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
     } catch ( PDOException $e ) {
     echo ('Error establishing Connection');
       exit ();
     }
   }

/*************************************************************
*  codes below are used for user register, and get user info *
**************************************************************/

   // users are able to register an account
   public function userRegister($username, $password, $address, $signupTime,
                                $email,    $phone) {
     $hash = password_hash($password, PASSWORD_DEFAULT);
     $users = $this->getUser($username);
	 $timesOfBuy = 0;
     // if there's no existing account, put the info into the database
     if(count($users) == 0) {
     	$stmt = $this->DB->prepare ('INSERT INTO users(username,password,address,signupTime,timesOfBuy,email,phone)
     			VALUES (:username, :hash, :address, :signupTime, :timesOfBuy, :email, :phone)');

      // $stmt = $this->DB->prepare ("INSERT INTO users(username,password,address,signupTime,timesOfBuy,email,phone)
      //                              VALUES           (:username, :hash, :address, :signupTime, :timesOfBuy, :email, :phone)");
       $stmt->bindParam(':username', $username);
       $stmt->bindParam(':hash', $hash);
       $stmt->bindParam(':address', $address);
       $stmt->bindParam(':signupTime', $signupTime);
       $stmt->bindParam(':timesOfBuy', $timesOfBuy);
       $stmt->bindParam(':email', $email);
       $stmt->bindParam(':phone', $phone);

       $stmt->execute ();
       return 1;
     }
     // else there's error about account duplication
     return 0;
   }

   // this function will return all info about an user
   public function getUser($username) {
     $stmt = $this->DB->prepare ("select * from users where username=:username");
     $stmt->bindParam(':username', $username);
     $stmt->execute ();
     return $stmt->fetchAll ( PDO::FETCH_ASSOC );
   }

   public function userLoginCheck($username, $password) {
     $user = $this->getUser($username);
     $hash = 0;
     if (count($user) > 0){
        $succ =  password_verify($password, $user[0]['password']);
     //   if ($user[0]['password'] === $password){
     //     $succ = true;
     //   } else {
     //     $succ = false;
     //   }
     } else {
       return false;
     }
     return $succ;
   }


/*********************************************************************
* codes below are used for merchant register, and get merchant info  *
**********************************************************************/
  public function merchantRegister($username, $password, $name, $address, $country, $phone, $email) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $merchants = $this->getMerchant($username);
    if(count($merchants) == 0) {
      $stmt = $this->DB->prepare ("INSERT INTO merchant(username,password,merchantName,address,country,phone,email)
                                   VALUES           (:username, :hash, :name, :address, :country, :phone, :email)");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':hash', $hash);
      $stmt->bindParam(':address', $address);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':country', $country);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':phone', $phone);
      $stmt->execute ();
      return 1;
    }
    return 0;
  }

  public function merchantLoginCheck($username, $password) {
    $merchant = $this->getMerchant($username);
    $hash = 0;
    if (count($username) > 0){
       $succ =  password_verify($password, $merchant[0]['password']);
    } else {
      return false;
    }
    return $succ;
  }

  public function getMerchant($username){
    $stmt = $this->DB->prepare ("select * from merchant where username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  public function getMerchantList(){
    $stmt = $this->DB->prepare ("select * from merchant");
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

/*******************************************************************
* codes below are used for courier register, and get courier info  *
********************************************************************/
  public function courierRegister($username, $password, $name,$phone) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $courier = $this->getCourier($username);
    if(count($courier) == 0) {
      $stmt = $this->DB->prepare ("INSERT INTO carrier(username,password,carrierName,phone)
                                   VALUES           (:username, :hash, :name, :phone)");
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':hash', $hash);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':phone', $phone);
      $stmt->execute ();
      return 1;
    }
    return 0;
  }

  public function getCourier($username) {
    $stmt = $this->DB->prepare ("select * from carrier where username=:username");
    $stmt->bindParam(':username', $username);
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  public function courierLoginCheck($username, $password) {
    $carrier = $this->getCourier($username);
    $hash = 0;
    if (count($carrier) > 0){
       $succ =  password_verify($password, $carrier[0]['password']);
    } else {
      return false;
    }
    return $succ;
  }

/**********************************************************************
* codes below are used for editing food, controlled only by merchant  *
***********************************************************************/
  public function addFood($name, $merchant_id, $foodType, $price, $picture, $rate) {
    $food = getFood($name, $merchant_id);
    if(count($food) == 0) {
      $stmt = $this->DB->prepare ("INSERT INTO food(foodName,merchant_id,foodType,price,picture,rate)
                                   VALUES           (:name, :merchant_id, :foodType, :price, :picture, :rate)");
      $stmt->bindParam(':rate', $rate);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':merchant_id', $merchant_id);
      $stmt->bindParam(':foodType', $foodType);
      $stmt->bindParam(':price', $price);
      $stmt->bindParam(':picture', $picture);
      $stmt->execute ();
      return 1;
    }
    return 0;
  }

  public function getFood($name, $merchant_id) {
    $stmt = $this->DB->prepare ("select * from food where foodName=:name and merchant_id=:merchant_id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':merchant_id', $merchant_id);
    $stmt->execute ();
    return $stmt->fetchAll ( PDO::FETCH_ASSOC );
  }

  // join table merchant and food, get a list of food with its info including its merchant
  public function foodList($merchant) {
    $stmt = $this->DB->prepare ('SELECT merchant.merchantName, food.id, food.foodName, food.foodType,
                                        food.price, food.picture, food.rate FROM merchant
                                        JOIN food
                                        ON merchant.id = food.merchant_id
                                        WHERE merchant.merchantName = "uaMeal"' );
    $stmt->bindParam(':name', $merchant);
    $stmt->execute ();
    return $stmt->fetchAll (PDO::FETCH_ASSOC);
  }

  public function changePrice($food_id, $newPrice) {
    //  $stmt = $this->DB->prepare ();
  }


  public function deleteFood($name, $merchant_id) {
    $stmt = $this->DB->prepare ('DELETE FROM food WHERE foodName = :name
                                                  AND merchant_id = :merchant_id');
    $stmt->bindParam(':foodName', $name);
    $stmt->bindParam(':merchant_id', $merchant_id);
    $stmt->execute ();
  }

  /*****************************************************************
  * codes below are used for searching food , controlled by users  *
  ******************************************************************/
  public function searchFoodByType($foodType) {
    $stmt = $this->DB->prepare ('SELECT merchant.merchantName, food.foodName, food.foodType,
                                        food.price, food.picture, food.rate FROM merchant
                                        JOIN food
                                        ON merchant.id = food.merchant_id
                                        WHERE food.foodType = :foodType');
    $stmt->bindParam(':foodType', $foodType);
    $stmt->execute ();
    return $stmt->fetchAll (PDO::FETCH_ASSOC);
  }

  public function searchFoodByMerchant($merchant){
    return $this->foodList($merchant);
  }

  /*********************************************************************
  * codes below are other helpful functions, such as get merchant list *
  **********************************************************************/
  public function orderList($userID){
    $stmt = $this->DB->prepare ('SELECT * FROM orders WHERE user_id = :user_id AND paid = 0');
    $stmt->bindparam(':user_id', $userID);
    $stmt->execute ();
    return $stmt->fetchALL (PDO::FETCH_ASSOC);
  }


  public function createOrder($userID) {
    $list = $this->orderList($userID);
    if ($list == null){
      $stmt = $this->DB->prepare ('INSERT INTO orders(user_id, paid, deliver) VALUES(:user_id, 0, 0)');
      $stmt->bindParam(':user_id', $userID);
      $stmt->execute();
    }
    return $this->orderList($userID);
    //return $this->orderList($userID);
  }

  public function addFoodForUser($userID, $orderID, $foodID, $paid) {
    $stmt = $this->DB->prepare ('INSERT INTO foodOrder(user_id, order_id, food_id, paid)
                                VALUES               (:user_id, :order_id, :food_id, :paid)');
    $stmt->bindParam(':user_id', $userID);
    $stmt->bindParam(':order_id', $orderID[0]['id']);
    $stmt->bindParam(':food_id', $foodID);
    $stmt->bindParam(':paid', $paid);
    $stmt->execute ();

    $stmt = $this->DB->prepare ('SELECT food.foodName, food.price, foodOrder.food_id FROM foodOrder
                                 JOIN food ON food.id = foodOrder.food_id
                                 WHERE order_id = :orderID');
    $stmt->bindParam(':orderID', $orderID[0]['id']);
    $stmt->execute ();
    return $stmt->fetchALL (PDO::FETCH_ASSOC);
  }

  public function userPaid($userID, $orderID) {
    // update food order to make food paid
    $stmt = $this->DB->prepare ('UPDATE foodOrder SET paid=1 WHERE user_id=:uid AND order_id=:orderID');
    $stmt->bindParam(':uid', $userID);
    $stmt->bindParam('orderID', $orderID);
    $stmt->execute ();

    // update order to make food paid
    $stmt = $this->DB->prepare ('UPDATE orders SET paid=1 WHERE user_id=:user AND id=:id');
    $stmt->bindParam(':user', $userID);
    $stmt->bindParam(':id', $orderID);
    $stmt->execute ();

    return $this->orderList($userID);
  }

  public function paidOrderList(){
    $stmt = $this->DB->prepare ('SELECT * FROM orders WHERE paid=1 AND deliver=0');
    $stmt->execute ();
    return $stmt->fetchALL (PDO::FETCH_ASSOC);
  }

  public function deliverOrder($orderID){
    $stmt = $this->DB->prepare ('UPDATE orders SET deliver=1 WHERE id=:id');
    $stmt->bindParam(':id', $orderID);
    $stmt->execute ();
    return $this->paidOrderList();
  }

}

$theDBA = new DatabaseAdaptor();

?>
