<?php
    require "./lib/constantes.inc.php";
    //function which connect to the database
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
     * function which create a user in the database
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
            $sql = "INSERT INTO USER (`email`, `passwordHash`, `isAdmin`, `streetName`, `streetNumber`, `city`, `postalCode`) VALUES (:EMAIL, :PASSWORD_HASH, 0, :STREET_NAME, :STREET_NUMBER, :POSTAL_CODE, :CITY);";
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
     * function which check if a user exists in the database
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
     * function which if a user
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

    //function which returns the products of the database
    function getProducts()
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
?>