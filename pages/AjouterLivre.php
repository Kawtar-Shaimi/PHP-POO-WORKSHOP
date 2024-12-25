<?php
if(isset($_POST['addlivre'])){
    require_once "../Models/Livre.php";
    $livre = new Livre();
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $categorie = $_POST['categorie'];
    $date_ajout = $_POST['date_ajout'];
    $disponible = $_POST['disponible'];
    $result = $livre->addLivre($titre, $auteur, $categorie, $date_ajout, $disponible);
    if($result){
        header("Location: ./afficherLivres.php");
    }else{
        echo "Failed to add Livre";
    }
}
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="./styles.css">
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body>
            <div>
                <div class="w-full min-h-[90vh] bg-FormBg bg-cover bg-center flex justify-center items-center bg-no-repeat">
                    <fieldset class="flex justify-center items-center w-4/5">
                        <div class="w-[90%] lg:w-[50%]" >
                    
                        <div class="library-container">
      <form method="post"   class="add-book-form">
        <h2 class="form-title">Ajouter un nouveau livre</h2>
        <div class="form-grid">
            <div class="form-group">
                <label class="form-label">Titre</label>
                <input name="titre" type="text" class="form-input">
            </div>
            <div class="form-group">
                <label class="form-label">Auteur</label>
                <input name="auteur" type="text" class="form-input">
            </div>
            <div class="form-group">
                <label class="form-label">Catégorie</label>
                <select name="categorie" class="form-select">
                    <option value="" disapled selected>Sélectionner une catégorie</option>
                    <option value="Roman">Roman</option>
                    <option value="Littérature">Littérature</option>
                    <option value="Conte">Conte</option>
                    <option value="Poésie">Poésie</option>
                    <option value="Science">Science</option>
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Date d'ajout</label>
                <input name="date_ajout" type="date" class="form-input">
            </div>
        </div>
        <div class="form-group"></div>
        <label class="form-label">Disponiblity</label>
                <select name="disponible" class="form-select">
                    <option value="" disapled selected>Sélectionner dispo</option>
                    <option value="1">Disponible</option>
                    <option value="2">Indisponible</option>
                    
                </select>
</div>
        <button name="addlivre" type="submit" class="submit-btn">Ajouter le livre</button>
    </form>
    </div>
                        </div>         
                    </fieldset>
                </div>
            </div>
        </body>
</html>