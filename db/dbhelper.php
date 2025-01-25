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
        $stmt = $this->conn->prepare("SELECT * FROM prodotti ORDER BY Giacenza");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsers(){
        $stmt = $this->conn->prepare("SELECT * FROM clienti");
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
        $stmt = $this->conn->prepare("SELECT *, prodotti.CodID as CodIDProdotto FROM prodotti WHERE CodId = ?");
        $stmt->bind_param('i', $product);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function getDiscountedProducts(){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN offerte ON(prodotti.CodID = offerte.CodIDProdotto) WHERE Inizio < ? AND Scadenza > ?");
        $date = gmdate('Y-m-d H:i:s');
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

        return $result->fetch_all(MYSQLI_ASSOC)[0];
    }

    public function getProductCategories($product){
        $stmt = $this->conn->prepare("SELECT appartenenzacategoria.Nome FROM prodotti INNER JOIN appartenenzacategoria USING(CodID) WHERE prodotti.CodId = ?");
        $stmt->bind_param('i', $product);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    public function checkProductInSale($product){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti INNER JOIN offerte ON(prodotti.CodID = offerte.CodIDProdotto) WHERE Inizio < ? AND Scadenza > ? AND prodotti.CodID = ?");
        $date = gmdate('Y-m-d H:i:s');
        $stmt->bind_param('ssi', $date, $date, $product);
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
        $query = "INSERT INTO clienti (Email, Nome, Cognome, Password, Registrazione) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssss', $email, $nome, $cognome, $password, gmdate('Y-m-d H:i:s'));
        $stmt->execute();
    }

    public function verifyUser($email){
        $query = "UPDATE clienti SET Verificato = True WHERE Email = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
    }

    public function getUserInbox($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM clienti INNER JOIN inboxclienti USING(Email) INNER JOIN avvisi USING(CodID) WHERE Email = ? ORDER BY Data DESC, Ora DESC");
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

    public function deleteProduct($id){
        $stmt = $this->conn->prepare("DELETE FROM prodotti WHERE CodID = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
    }

    public function getWishlistProducts($wishlistID){
        $stmt = $this->conn->prepare("SELECT *, prodotti.Nome as NomeProdotto FROM prodotti INNER JOIN aggiuntawishlist ON(prodotti.CodID = aggiuntawishlist.CodIDProdotto)
                                        INNER JOIN wishlists ON(aggiuntawishlist.CodIDWishlist = wishlists.CodID) WHERE wishlists.CodID = ?");
        $stmt->bind_param('i', $wishlistID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartProducts($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM prodotti
                                        LEFT JOIN (SELECT * FROM offerte WHERE Inizio < ? AND Scadenza > ?) AS offerteAttive ON(prodotti.CodID = offerteAttive.CodIDProdotto)
                                        INNER JOIN prodottiordinati ON(prodotti.CodID = prodottiordinati.CodIDProdotto)
                                        INNER JOIN ordini ON(prodottiordinati.CodIDOrdine = ordini.CodID) WHERE EmailCliente = ? AND Pagato = 0");
        $date = gmdate('Y-m-d H:i:s');
        $stmt->bind_param('sss', $date, $date, $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createNewOrder($userEmail){
        $query = "INSERT INTO ordini (EmailCliente) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $userEmail);
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

    public function deleteUserNotification($userEmail, $notificationID){
        $stmt = $this->conn->prepare("DELETE FROM inboxclienti WHERE Email = ? AND CodID = ?");
        $stmt->bind_param('si', $userEmail, $notificationID);
        $stmt->execute();
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

    public function insertIntoCart($userEmail, $productID, $quantity){
        $stmt = $this->conn->prepare("SELECT CodID FROM ordini INNER JOIN clienti ON(Email = EmailCliente) WHERE Email = ? AND Pagato = False");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartID = $result->fetch_all(MYSQLI_ASSOC)[0]["CodID"];

        $stmt = $this->conn->prepare("SELECT * FROM prodottiordinati WHERE CodIDProdotto = ? AND CodIDOrdine = ?");
        $stmt->bind_param('ii', $productID, $cartID);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        if(empty($result)){
            $query = "INSERT INTO prodottiordinati (CodIDProdotto, CodIDOrdine, Quantita) VALUES (?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('iii', $productID, $cartID, $quantity);
            $stmt->execute();
        }
        else{
            $newQuantity = $result[0]["Quantita"]+$quantity;
            $query = "UPDATE prodottiordinati SET Quantita = ? WHERE CodIDProdotto = ? AND CodIDOrdine = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('iii', $newQuantity, $productID, $cartID);
            $stmt->execute();
        }

        $query = "UPDATE prodotti SET Giacenza = Giacenza - ? WHERE CodID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $quantity, $productID);
        $stmt->execute();

        return;
    }

    public function removeFromCart($userEmail, $productID, $quantity){
        $stmt = $this->conn->prepare("SELECT CodID FROM ordini INNER JOIN clienti ON(Email = EmailCliente) WHERE Email = ? AND Pagato = False");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartID = $result->fetch_all(MYSQLI_ASSOC)[0]["CodID"];

        $stmt = $this->conn->prepare("DELETE FROM prodottiordinati WHERE CodIDProdotto = ? AND CodIDOrdine = ?");
        $stmt->bind_param('ii', $productID, $cartID);
        $stmt->execute();

        $query = "UPDATE prodotti SET Giacenza = Giacenza + ? WHERE CodID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $quantity, $productID);
        $stmt->execute();
    }

    public function cartCheckout($userEmail, $totalPrice){
        $stmt = $this->conn->prepare("SELECT CodID FROM ordini INNER JOIN clienti ON(Email = EmailCliente) WHERE Email = ? AND Pagato = False");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();
        $cartID = $result->fetch_all(MYSQLI_ASSOC)[0]["CodID"];

        $query = "UPDATE ordini SET Pagato = True, Importo = ?, Data = ?, Ora = ?, Stato = 'Ricevuto' WHERE CodID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('dssi', $totalPrice, gmdate('Y-m-d'), gmdate('H:i:s'), $cartID);
        $stmt->execute();

        $this->createNewOrder($userEmail);

        return;
    }

    public function getCustomerOrders($userEmail){
        $stmt = $this->conn->prepare("SELECT * FROM ordini WHERE EmailCliente = ? AND Pagato = True ORDER BY Data");
        $stmt->bind_param('s', $userEmail);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderProducts($orderID){
        $stmt = $this->conn->prepare("SELECT * FROM prodottiordinati INNER JOIN prodotti ON(prodottiordinati.CodIDProdotto = prodotti.CodID) WHERE CodIDOrdine = ?");
        $stmt->bind_param('i', $orderID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrders(){
        $stmt = $this->conn->prepare("SELECT * FROM ordini WHERE Pagato = True");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkSeller($userEmail, $password){
        $stmt = $this->conn->prepare("SELECT * FROM venditori WHERE Email = ? AND Password = ?");
        $stmt->bind_param('ss', $userEmail, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if(empty($result))
            return false; //no seller
        else
            return true; //seller found
    }

    public function addProduct($name, $price, $store, $categories, $color, $composition, $tools){
        if($color == "")
            $color = NULL;
        if($composition == "")
            $composition = NULL;
        if($tools == "")
            $tools = NULL;
        $query = "INSERT INTO prodotti (Nome, Immagine, Prezzo, Colore, Composizione, Strumenti, Giacenza) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $imageDummyName = "dummy.jpg";
        $stmt->bind_param('ssdsssi', $name, $imageDummyName, $price, $color, $composition, $tools, $store);
        $stmt->execute();

        $lastAddedProductId = $stmt->insert_id;
        foreach ($categories as $category) {
            $query = "INSERT INTO appartenenzacategoria (CodID, Nome) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('is', $lastAddedProductId, $category);
            $stmt->execute();
        }
    }

    public function sendBroadcastNotification($title, $content){
        $query = "INSERT INTO avvisi (Titolo, Contenuto) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $title, $content);
        $stmt->execute();

        $newNotificationId = $stmt->insert_id;
        foreach ($this->getUsers() as $user) {
            $query = "INSERT INTO inboxclienti (Email, CodID, Data, Ora) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('siss', $user["Email"], $newNotificationId, gmdate('Y-m-d'), gmdate('H:i:s'));
            $stmt->execute();
            mail($user['Email'], $title, $content, 'From: AllYouKnit S.p.A.');
        }
    }

    public function sendFormatNotification($userEmail, $formatID){
        //Welcome = 1, order confirmed = 2, order delivering = 3
        $query = "INSERT INTO inboxclienti (Email, CodID, Data, Ora) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('siss', $userEmail, $formatID, gmdate('Y-m-d'), gmdate('H:i:s'));
        $stmt->execute();

        $stmt = $this->conn->prepare("SELECT * FROM avvisi WHERE CodID = ?");
        $stmt->bind_param('i', $formatID);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);
        mail($user['Email'], $result[0]["Titolo"], $result[0]["Contenuto"], 'From: AllYouKnit S.p.A.');
    }

    public function nextOrderState($orderID, $orderState){
        switch ($orderState) {
            case 'Ricevuto':
                $nextState = "Lavorazione";
                break;
            case 'Lavorazione':
                $nextState = "Spedito";
                break;
            case 'Spedito':
                $nextState = "Consegna";
                break;
            case 'Consegna':
                $nextState = "Consegnato";
                break;
        }

        $query = "UPDATE ordini SET Stato = ? WHERE CodID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $nextState, $orderID);
        $stmt->execute();
    }

    public function editProduct($name, $price, $store, $categories, $color, $composition, $tools, $productID){
        if($color == "")
            $color = NULL;
        if($composition == "")
            $composition = NULL;
        if($tools == "")
            $tools = NULL;
        $query = "UPDATE prodotti SET Nome = ?, Prezzo = ?, Colore = ?, Composizione = ?, Strumenti = ?, Giacenza = ? WHERE CodID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sdsssii', $name, $price, $color, $composition, $tools, $store, $productID);
        $stmt->execute();

        $stmt = $this->conn->prepare("DELETE FROM appartenenzacategoria WHERE CodID = ?");
        $stmt->bind_param('i', $productID);
        $stmt->execute();

        foreach ($categories as $category) {
            $query = "INSERT INTO appartenenzacategoria (CodID, Nome) VALUES (?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('is', $productID, $category);
            $stmt->execute();
        }
    }

}
?>