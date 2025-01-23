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









    public function getRandomPosts($n){
        $stmt = $this->conn->prepare("SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i',$n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idcategory){
        $stmt = $this->conn->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore WHERE autore=idautore ORDER BY dataarticolo DESC";
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->conn->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, nome FROM articolo, autore WHERE idarticolo=? AND autore=idautore";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByCategory($idcategory){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo, anteprimaarticolo, dataarticolo, nome FROM articolo, autore, articolo_ha_categoria WHERE categoria=? AND autore=idautore AND idarticolo=articolo";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByIdAndAuthor($id, $idauthor){
        $query = "SELECT idarticolo, anteprimaarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, (SELECT GROUP_CONCAT(categoria) FROM articolo_ha_categoria WHERE articolo=idarticolo GROUP BY articolo) as categorie FROM articolo WHERE idarticolo=? AND autore=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$id, $idauthor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostByAuthorId($id){
        $query = "SELECT idarticolo, titoloarticolo, imgarticolo FROM articolo WHERE autore=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticle($titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore){
        $query = "INSERT INTO articolo (titoloarticolo, testoarticolo, anteprimaarticolo, dataarticolo, imgarticolo, autore) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssi',$titoloarticolo, $testoarticolo, $anteprimaarticolo, $dataarticolo, $imgarticolo, $autore);
        $stmt->execute();
        
        return $stmt->insert_id;
    }

    public function updateArticleOfAuthor($idarticolo, $titoloarticolo, $testoarticolo, $anteprimaarticolo, $imgarticolo, $autore){
        $query = "UPDATE articolo SET titoloarticolo = ?, testoarticolo = ?, anteprimaarticolo = ?, imgarticolo = ? WHERE idarticolo = ? AND autore = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssii',$titoloarticolo, $testoarticolo, $anteprimaarticolo, $imgarticolo, $idarticolo, $autore);
        
        return $stmt->execute();
    }

    public function deleteArticleOfAuthor($idarticolo, $autore){
        $query = "DELETE FROM articolo WHERE idarticolo = ? AND autore = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$idarticolo, $autore);
        $stmt->execute();
        var_dump($stmt->error);
        return true;
    }

    public function insertCategoryOfArticle($articolo, $categoria){
        $query = "INSERT INTO articolo_ha_categoria (articolo, categoria) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoryOfArticle($articolo, $categoria){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ? AND categoria = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii',$articolo, $categoria);
        return $stmt->execute();
    }

    public function deleteCategoriesOfArticle($articolo){
        $query = "DELETE FROM articolo_ha_categoria WHERE articolo = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$articolo);
        return $stmt->execute();
    }

    public function getAuthors(){
        $query = "SELECT username, nome, GROUP_CONCAT(DISTINCT nomecategoria) as argomenti FROM categoria, articolo, autore, articolo_ha_categoria WHERE idarticolo=articolo AND categoria=idcategoria AND autore=idautore AND attivo=1 GROUP BY username, nome";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($username, $password){
        $query = "SELECT idautore, username, nome FROM autore WHERE attivo=1 AND username = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }    

}
?>