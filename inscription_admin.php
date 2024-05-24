<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Welcome to Read Library</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <style>
            .f{
                padding: 50px;
            }
            /* Full-width inputs */
            input[type=text]{
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            input[type=password] {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            input[type=email] {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }
            /* Set a style for all buttons */
            input[type=submit] {
                background-color: #53af57;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 50%;
            }
            input[type=submit]:hover {
                background-color: white;
                color: #53af57;
                border: 1px solid #53af57;
            }
            input[type=button] {
                background-color: #53af57;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 50%;
            }
            input[type=reset] {
                background-color: #53af57;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                cursor: pointer;
                width: 50%;
            }
            input[type=reset]:hover {
                background-color: white;
                color: #53af57;
                border: 1px solid #53af57;
            }
            
        </style>

    </head>

    <body>
        <form action="insc_admin.php" method="POST">
            <div class="f">
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>your account is created</p>";
                    } elseif ($err==2) {
                        echo "<p style='color:red'>Error:</p>";
                    }
                }
                ?>
            <h1>Connexion</h1>

            <label><b>Nom d'utilisateur</b></label>
            <br><input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>
            <br><label><b>Nom</b></label>
            <br><input type="text" placeholder="Entrer le nom" name="nom" required>
            <br><label><b>Prenom</b></label>
            <br><input type="text" placeholder="Entrer le prenom" name="prenom" required>
            <br><label><b>Adresse E_mail</b></label>
            <br><input type="email" placeholder="Entrer l'adresse E_mail" name="email" required>
            <br><label><b>Mot de passe</b></label>
            <br><input type="password" placeholder="Entrer le mot de passe" name="password" required>
            <br><label><b>Date de naissance</b></label>
            <label for="start"></label>
            <input type="date" id="start" name="date"
                   value=""
                   min="1970-01-01" max="2020-12-31">
            <br><label><b>Sexe</b></label>
            <INPUT TYPE ="radio" NAME ="sexe"  VALUE="F">Feminin 
            <INPUT TYPE ="radio" NAME ="sexe"  VALUE="M">Masculin
            <br><label><b>Etat civil</b></label>
            <SELECT NAME="etat" >
                <OPTION VALUE="C"> célibataire
                <OPTION VALUE="M"> Marié
            </SELECT>
            <br><br><br><input type="submit" value="S'inscrire">
            <br><INPUT TYPE="reset" VALUE="Annuler">
            </div>
        </form>
    </body>
</html>