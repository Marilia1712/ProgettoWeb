<?php
class DatabaseHelper{

    private $conn;

    public function __construct($servername, $username, $password, $connname, $port){
        $this->conn = new mysqli($servername, $username, $password, $connname, $port);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }        
    }

    public function getCategories(){
        $stmt = $this->conn->prepare("SELECT * FROM categorieprodotti");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProducts(){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProductsOfCategory($category){
        $stmt = $this->conn->prepare("SELECT *, prodotti.Nome as NomeProdotto FROM prodotti INNER JOIN appartenenzacategoria USING(CodID) WHERE appartenenzacategoria.Nome = ?");
        $stmt->bind_param('s', $category);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProduct($product){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti WHERE CodId = ?");
        $stmt->bind_param('i', $product);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getDiscountedProducts(){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN offerte ON(prodotti.CodID = offerte.CodIDProdotto) WHERE Inizio < ? AND Scadenza > ?");
        $date = gmdate('Y-m-d h:i:s \G\M\T');
        $stmt->bind_param('ss', $date, $date);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function getDiscountedProduct($product){
        $stmt = $this->conn->prepare("SELECT *, prodotti.CodID as CodIDProdotto FROM prodotti INNER JOIN offerte ON(prodotti.CodID = offerte.CodIDProdotto) WHERE prodotti.CodId = ?");
        $stmt->bind_param('i', $product);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function checkProductInSale($product){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN offerte ON(prodotti.CodID = offerte.CodIDProdotto) WHERE Scadenza > ? AND prodotti.CodID = ?");
        $date = gmdate('Y-m-d h:i:s \G\M\T');
        $stmt->bind_param('si', $date, $product);
        $stmt->execute();
        $result = $stmt->get_result();

        if(empty($result->fetch_all(MYSQLI_ASSOC)))
            return false; //prodotto non in offerta
        else
            return true; //prodotto in offerta
    }

    public function checkUserPresence($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM clienti WHERE Email = ?");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        if(empty($result->fetch_all(MYSQLI_ASSOC)))
            return false; //utente non registrato
        else
            return true; //utente registrato
    }

    public function checkUserCredentials($email, $password){
        $stmt = $this->conn->prepare("SELECT * FROM clienti WHERE Email = ? AND Password = ?");
        $stmt->bind_param('ss', $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if(empty($result))
            return NULL; //credenziali errate
        else
            return $result[0]; //credenziali corrette
    }

    public function signUserUp($email, $nome, $cognome, $password){
        $query = "INSERT INTO clienti (Email, Nome, Cognome, Password) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssss', $email, $nome, $cognome, $password);
        $stmt->execute();
    }

    public function getUserInbox($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM clienti INNER JOIN inboxclienti USING(Email) INNER JOIN avvisi USING(CodID) WHERE Email = ? ORDER BY Data, Ora");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserWishlists($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM clienti INNER JOIN wishlists USING(Email) WHERE Email = ? ORDER BY wishlists.Nome");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNewWishlist($nome, $descrizione, $email){
        $query = "INSERT INTO wishlists (Nome, Descrizione, Email) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sss', $nome, $descrizione, $email);
        $stmt->execute();
    }

    public function deleteWishlist($id){
        $stmt = $this->conn->prepare("DELETE FROM wishlists WHERE CodID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getWishlistProducts($wishlistID){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN aggiuntawishlist ON(prodotti.CodID = aggiuntawishlist.CodIDProdotto)
                                        INNER JOIN wishlists ON(aggiuntawishlist.CodIDWishlist = wishlists.CodID) WHERE wishlists.CodID = ?");
        $stmt->bind_param('i', $wishlistID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartProducts($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN prodottiordinati ON(prodotti.CodID = prodottiordinati.CodIDProdotto)
                                        INNER JOIN ordini ON(prodottiordinati.CodIDOrdine = ordini.CodID) WHERE EmailCliente = ?");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNewOrder($userEmail){
        $query = "INSERT INTO ordini (EmailCliente) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
    }

    public function readNotification($userEmail, $notificationID){
        $query = "UPDATE inboxclienti SET Letta = True WHERE Email = ? AND CodId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si',$userEmail, $notificationID);
        
        return $stmt->execute();
    }

    public function unreadNotification($userEmail, $notificationID){
        $query = "UPDATE inboxclienti SET Letta = False WHERE Email = ? AND CodId = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si',$userEmail, $notificationID);
        
        return $stmt->execute();
    }

    public function checkNewNotifications($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM inboxclienti WHERE Email = ? AND Letta = 0");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if(empty($result))
            return false; //no news
        else
            return true; //there's news
    }

    public function insertIntoWishlist($wishlistID, $productID){
        $query = "INSERT INTO aggiuntaWishlist (CodIDWishlist, CodIDProdotto) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $wishlistID, $productID);
        $stmt->execute();
    }

    








}
?>