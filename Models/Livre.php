<?php 

require_once "../DB/DataBase.php";

class Livre{
    private $db;
    public function __construct(){
        $this->db = new DataBase();
    }

    public function getLivres(){
        $query = "SELECT * FROM Livres";
        $result = $this->db->conn->query($query);
        return $result;
    }

    public function getLivre($id){
        $query = "SELECT * FROM Livres WHERE id = $id";
        $result = $this->db->conn->query($query);
        $livre = $result->fetch_assoc();
        return $livre;
    }

    public function addLivre($titre, $auteur, $categorie, $date_ajout, $disponible){
        $query = "INSERT INTO Livres (titre, auteur, categorie, date_ajout, disponible) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("ssssi", $titre, $auteur, $categorie, $date_ajout, $disponible);
        $result = $stmt->execute();
        return $result;
    }

    public function updateLivre($id, $titre, $auteur, $categorie, $date_ajout, $disponible){
        $query = "UPDATE Livres SET titre = ?, auteur = ?, categorie = ?, date_ajout = ?, disponible = ? WHERE id = $id";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param("ssssi", $titre, $auteur, $categorie, $date_ajout, $disponible);
        $result = $stmt->execute();
        return $result;
        
    }

    public function deleteLivre($id){
        $query = "DELETE FROM Livres WHERE id = $id";
        $result = mysqli_query($this->db->conn, $query);
        return $result;
    }
}