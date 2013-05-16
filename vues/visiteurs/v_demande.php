<h2>Création d'une nouvelle demande</h2>
    
    <form method="POST" action="#" enctype="multipart/form-data">
        <table cellspacing="15" align="center">
            <tr>
                <td>Type de produit :  </td>
                <td><input type="text" name="type" required></td>
            </tr>
            <tr>
                <td>Prix du produit : </td>
                <td><input type="text" name="prix" required></td>
            </tr>
            <tr>
                <td>Raison d'achat :</td>
                <td><input type="text" name="raison" required></td>
            </tr>
            <tr>
                <td>Preuve d'achat : </td>
                <td><input type="file" name="preuve" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="creerDemande" value="Confirmer"></td>
            </tr>
        </table>
    </form>