<?php
	// Test si email est valide
	
	// 1.Primo, comme tout à l'heure, on ne veut QUE l'adresse e-mail ; on va donc demander à ce que ça soit un début et une fin de chaîne : #^$# 
	// 2.Ensuite, on a des lettres, chiffres, tirets, points, underscores, au moins une fois. On utilise donc la classe[a-z0-9._-]
	//   à la suite de laquelle on rajoute le signe+pour demander à ce qu'il y en ait au moins un : #^[a-z0-9._-]+$# 
	// 3.Vient ensuite l'arobase (là ce n'est pas compliqué, on a juste à taper le caractère) : #^[a-z0-9._-]+@$#
	// 4.Puis encore une suite de lettres, chiffres, points, tirets, un domaine est composé d'au moins deux caractères. On tape donc{2,}pour dire « deux fois ou plus » : #^[a-z0-9._-]+@[a-z0-9._-]{2,}$# 
	// 5.Ensuite vient le point (de « .fr » par exemple). Ici, on veut le symbole point dans notre regex. On va donc mettre un antislash devant : #^[a-z0-9._-]+@[a-z0-9._-]{2,}\.$# 
	// 6.Enfin, pour terminer, il nous faut deux à quatre lettres. Ce sont forcément des lettres minuscules, et cette fois pas de chiffre ou de tiret, etc. On écrit donc : #^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#

if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
    }
    else
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>

<form method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" />
</p>
</form>