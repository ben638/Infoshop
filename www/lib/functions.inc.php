<?php
    require "./lib/constantes.inc.php";
    /**
     * Function which return a pdo object
     * @return PDO
     */
    function dbConnect()
    {
        static $dbc = null;
        if ($dbc == null) {
            try {
                $dbc = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, DBUSER, DBPWD, array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_PERSISTENT => true
                ));
            }
            catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />';
                echo 'N° : ' . $e->getCode();
                die('Could not connect to MySQL');
            }
        }
        return $dbc;
    }

    /**
     * Function which create a user in the database
     * @param $email
     * @param $passwordHash
     * @param $streetName
     * @param $streetNumber
     * @param $postalCode
     * @param $city
     * @return bool
     */
    function createUser($email, $passwordHash, $streetName, $streetNumber, $postalCode, $city)
    {
        $answer = false;
        if (!checkUserExists($email))
        {
            static $ps = null;
            $sql = "INSERT INTO USER (`email`, `passwordHash`, `isAdmin`, `streetName`, `streetNumber`, `city`, `postalCode`) VALUES (:EMAIL, :PASSWORD_HASH, 0, :STREET_NAME, :STREET_NUMBER, :CITY, :POSTAL_CODE);";
            if ($ps == null) 
            {
                $ps = dbConnect()->prepare($sql);
            }
            try {
                $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
                $ps->bindParam(':PASSWORD_HASH', $passwordHash, PDO::PARAM_STR);
                $ps->bindParam(':STREET_NAME', $streetName, PDO::PARAM_STR);
                $ps->bindParam(':STREET_NUMBER', $streetNumber, PDO::PARAM_STR);
                $ps->bindParam(':POSTAL_CODE', $postalCode, PDO::PARAM_STR);
                $ps->bindParam(':CITY', $city, PDO::PARAM_STR);

                $answer = $ps->execute();
            } 
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $answer;
    }

    /**
     * Function which check if a user exists in the database
     * @param $email
     * @return bool
     */
    function checkUserExists($email)
    {
        static $ps = null;
        $sql = "SELECT * FROM USER WHERE email = :EMAIL;";
        if ($ps == null) 
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which if a user
     * @param $email
     * @return bool|array
     */
    function getUserInfo($email)
    {
        static $ps = null;
        $sql = 'SELECT * FROM USER WHERE email = :EMAIL;';

        if ($ps == null) 
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer[0];
    }

    /**
     * Function which return the products in the database
     * @return bool|array
     */
    function getAllProducts()
    {
        static $ps = null;
        $sql = 'SELECT * FROM PRODUCT JOIN PICTURE_PRODUCT ON PRODUCT.idProduct = PICTURE_PRODUCT.idProduct JOIN PICTURE ON PICTURE.idPicture = PICTURE_PRODUCT.idPicture WHERE isDefaultPicture = 1;';

        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which return the product whit the id given in parameter
     * @param $idProduct
     * @return bool|array
     */
    function getProduct($idProduct)
    {
        static $ps = null;
        $sql = 'SELECT * FROM PRODUCT WHERE idProduct = :ID_PRODUCT;';

        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer[0];
    }

    /**
     * Function which return the pictures of a product
     * @param $idProduct
     * @return bool|array
     * @throws PDOException
     * 
     */
    function getPictures($idProduct)
    {
        static $ps = null;
        $sql = 'SELECT * FROM PICTURE JOIN PICTURE_PRODUCT ON PICTURE_PRODUCT.idPicture = PICTURE.idPicture WHERE idProduct = :ID_PRODUCT ORDER BY isDefaultPicture DESC;';

        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;

    } 

    /**
     * Function which return the products which have a name or a description which is like the term given in parameter
     * @param $termToSearch
     * @return bool|array
     */
    function searchProducts($termToSearch)
    {
        static $ps = null;
        $sql = 'SELECT * FROM PRODUCT JOIN PICTURE_PRODUCT ON PRODUCT.idProduct = PICTURE_PRODUCT.idProduct JOIN PICTURE ON PICTURE.idPicture = PICTURE_PRODUCT.idPicture WHERE isDefaultPicture = 1 AND (productName LIKE :TERM_TO_SEARCH OR description LIKE :TERM_TO_SEARCH);';
        $termToSearch = "%" . $termToSearch . "%";
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':TERM_TO_SEARCH', $termToSearch, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which add a product in the $_SESSION['shoppingBasket']
     */
    function addProductToShoppingBasketSession($idProduct, $quantity)
    {
        session_start();
        if (isset($_SESSION['shoppingBasket'][$idProduct]))
        {
            $_SESSION['shoppingBasket'][$idProduct] += $quantity;
        }
        else {
            $_SESSION['shoppingBasket'][$idProduct] = $quantity;
        }
    }
    
    /**
     * Function which add a product to the shopping basket
     * @param $email
     * @param $idProduct
     * @param $quantity
     * @return bool
     * 
     */
    function addProductToShoppingBasket($email, $idProduct, $quantityToChange)
    {
        static $ps = null;
        $answer = false;
        if (orderExist($email))
        {
            updateRemainingNumber($quantityToChange, $idProduct, true);
            if (productOrderedExists($email, $idProduct))
            {
                $sql = "UPDATE PRODUCT_ORDERED SET quantity = (SELECT quantity FROM PRODUCT_ORDERED WHERE idProduct = :ID_PRODUCT AND idOrder = :ID_ORDER) + :QUANTITY WHERE idProduct = :ID_PRODUCT AND idOrder = :ID_ORDER;";
                if ($ps == null) 
                {
                    $ps = dbConnect()->prepare($sql);
                }
                try {
                    $idOrder = getIdOrder($email);
                    $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
                    $ps->bindParam(':ID_ORDER', $idOrder, PDO::PARAM_INT);
                    $ps->bindParam(':QUANTITY', $quantityToChange, PDO::PARAM_INT);
                    $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
                    $answer = $ps->execute();
                } 
                catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
            else {
                $sql = "INSERT INTO PRODUCT_ORDERED (`idProduct`, `idOrder`, `quantity`) VALUES (:ID_PRODUCT, (SELECT idOrder FROM ORDERED WHERE email = :EMAIL AND isPaid = 0), :QUANTITY);";
                if ($ps == null) 
                {
                    $ps = dbConnect()->prepare($sql);
                }
                try {
                    $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
                    $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
                    $ps->bindParam(':QUANTITY', $quantityToChange, PDO::PARAM_INT);
                    $answer = $ps->execute();
                } 
                catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
        }
        else {
            newOrder($email, 0);
            $answer = addProductToShoppingBasket($email, $idProduct, $quantityToChange);
        }
        return $answer;
    }

    /*function calculateQuantityOrder($quantityToChange, $idProduct, $hasReduce, $email)
    {
        $remainingNumber = getUserQuantityForProduct($idProduct, getIdOrder($email));
        if ($hasReduce)
        {
            $remainingNumber -= $quantityToChange;
        }
        else {
            $remainingNumber += $quantityToChange;
        }
        //updateQuantity($idProduct, $remainingNumber);
    }*/

    function getIdOrder($email)
    {
        static $ps = null;
        $sql = 'SELECT idOrder FROM ORDERED WHERE email = :EMAIL;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which return the products which are in the shopping basket
     * @return bool|array
     * 
     */
    function getUserQuantityForProduct($idProduct, $idOrder)
    {
        static $ps = null;
        $sql = 'SELECT quantity FROM PRODUCT_ORDERED WHERE idProduct = :ID_PRODUCT AND idOrder = :ID_ORDER;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
            $ps->bindParam(':ID_ORDER', $idOrder, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer[0]['remainingNumber'];
    }

    function updateRemainingNumber($quantity, $idProduct, $hasReduce)
    {
        $remainingNumber = getQuantity($idProduct);
        if ($hasReduce)
        {
            $remainingNumber -= $quantity;
        }
        else {
            $remainingNumber += $quantity;
        }
        updateQuantity($idProduct, $remainingNumber);
    }

    /**
     * Function which update the quantity of a product
     * @param $idProduct
     * @param $quantity
     * @return bool
     * 
     */
    function updateQuantity($idProduct, $quantity)
    {
        static $ps = null;
        $sql = "UPDATE PRODUCT SET remainingNumber = :QUANTITY WHERE idProduct = :ID_PRODUCT;";
        if ($ps == null) 
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':QUANTITY', $quantity, PDO::PARAM_INT);
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
            $answer = $ps->execute();
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which return the quantity of a product
     * @param $idProduct
     * @return int
     */
    function getQuantity($idProduct) 
    {
        static $ps = null;
        $sql = 'SELECT remainingNumber FROM PRODUCT WHERE idProduct = :ID_PRODUCT;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer[0]['remainingNumber'];
    }

    /**
     * Function which check if the user has already ordered a product
     * @param string $email
     * @param int $idProduct
     * @return bool|array
     * 
     */
    function productOrderedExists($email, $idProduct)
    {
        static $ps = null;
        $sql = 'SELECT * FROM PRODUCT_ORDERED JOIN ORDERED ON PRODUCT_ORDERED.idOrder = ORDERED.idOrder WHERE isPaid = 0 AND EMAIL = :EMAIL AND idProduct = :ID_PRODUCT;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            $ps->bindParam(':ID_PRODUCT', $idProduct, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which check if an order is already "active" for a user
     * @param string $email
     * @return bool|array
     * 
     */
    function orderExist($email)
    {
        static $ps = null;
        $sql = 'SELECT * FROM ORDERED WHERE isPaid = 0 AND email = :EMAIL;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    /**
     * Function which create an "active" order for the user in the database
     * @param $email
     * @param $totalPrice
     * @return bool
     * 
     */
    function newOrder($email, $totalPrice)
    {
        static $ps = null;
        $sql = "INSERT INTO ORDERED (`isPaid`, `isSent`, `totalPrice`, `email`) VALUES (0, 0, :TOTAL_PRICE, :EMAIL);";
        if ($ps == null) 
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            $ps->bindParam(':TOTAL_PRICE', $totalPrice, PDO::PARAM_STR);
            $answer = $ps->execute();
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    function getShoppingBasket($email)
    {
        static $ps = null;
        $sql = 'SELECT PRODUCT.idProduct, productName, description, priceInCHF, fileName, quantity FROM PRODUCT_ORDERED JOIN ORDERED ON PRODUCT_ORDERED.idOrder = ORDERED.idOrder JOIN PRODUCT ON PRODUCT.idProduct = PRODUCT_ORDERED.idProduct JOIN PICTURE_PRODUCT ON PICTURE_PRODUCT.idProduct = PRODUCT.idProduct JOIN PICTURE ON PICTURE_PRODUCT.idPicture = PICTURE.idPicture WHERE isPaid = 0 AND email = :EMAIL AND isDefaultPicture = 1;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    function updateTotalPrice($newPrice, $email)
    {
        $idOrder = orderExist($email)[0]['idOrder'];
        static $ps = null;
        $sql = "UPDATE ORDERED SET totalPrice = :NEW_PRICE WHERE idOrder = :ID_ORDER;";
        if ($ps == null) 
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':NEW_PRICE', $newPrice, PDO::PARAM_INT);
            $ps->bindParam(':ID_ORDER', $idOrder, PDO::PARAM_INT);
            $answer = $ps->execute();
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }

    function updateProfil($oldEmail, $newEmail, $passwordHash, $streetName, $streetNumber, $postalCode, $city)
    {
        $answer = false;
        if (!checkUserExists($newEmail) || $oldEmail == $newEmail)
        {
            static $ps = null;
            $sql = "UPDATE USER SET email = :NEW_EMAIL, passwordHash = :PASSWORD_HASH, isAdmin = 0, streetName = :STREET_NAME, streetNumber = :STREET_NUMBER, city = :CITY, postalCode = :POSTAL_CODE WHERE email = :OLD_EMAIL;";
            if ($ps == null) 
            {
                $ps = dbConnect()->prepare($sql);
            }
            try {
                $ps->bindParam(':NEW_EMAIL', $newEmail, PDO::PARAM_STR);
                $ps->bindParam(':PASSWORD_HASH', $passwordHash, PDO::PARAM_STR);
                $ps->bindParam(':STREET_NAME', $streetName, PDO::PARAM_STR);
                $ps->bindParam(':STREET_NUMBER', $streetNumber, PDO::PARAM_STR);
                $ps->bindParam(':POSTAL_CODE', $postalCode, PDO::PARAM_STR);
                $ps->bindParam(':CITY', $city, PDO::PARAM_STR);
                $ps->bindParam(':OLD_EMAIL', $oldEmail, PDO::PARAM_STR);

                $answer = $ps->execute();
            } 
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return $answer;
    }

    function getOrders($email)
    {
        static $ps = null;
        $sql = 'SELECT * FROM ORDERED WHERE email = :EMAIL;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':EMAIL', $email, PDO::PARAM_STR);
            if ($ps->execute())
            {
                $orders = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        foreach ($orders as $order)
        {
            $answer[$order['idOrder']]["orderInfo"] = getOrder($order['idOrder'])[0];
            $answer[$order['idOrder']]["detailOrder"] = getProductsOfAnOrder($order['idOrder']);
        }
        return $answer;
    }

    function getOrder($idOrder)
    {
        static $ps = null;
        $sql = 'SELECT * FROM ORDERED WHERE idOrder = :ID_ORDER;';
        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        $answer = false;
        try {
            $ps->bindParam(':ID_ORDER', $idOrder, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }
    
    function getProductsOfAnOrder($idOrder)
    {   
        $answer = false;
        static $ps = null;
        $sql = 'SELECT PRODUCT.idProduct, productName, description, priceInCHF, remainingNumber, fileName, quantity FROM PRODUCT JOIN PICTURE_PRODUCT ON PRODUCT.idProduct = PICTURE_PRODUCT.idProduct JOIN PICTURE ON PICTURE.idPicture = PICTURE_PRODUCT.idPicture JOIN PRODUCT_ORDERED ON PRODUCT_ORDERED.idProduct = PRODUCT.idProduct WHERE isDefaultPicture = 1 AND idOrder = :ID_ORDER;';

        if ($ps == null)
        {
            $ps = dbConnect()->prepare($sql);
        }
        
        try {
            $ps->bindParam(':ID_ORDER', $idOrder, PDO::PARAM_INT);
            if ($ps->execute())
            {
                $answer = $ps->fetchAll(PDO::FETCH_ASSOC);
            }
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $answer;
    }
?>