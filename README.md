# DOMOTIC 
Ces dernières années, la domotique a fait son apparition dans
le langage commun et dans nos maisons. Télévision, stores,
chauffage, climatisation, éclairage..., on peut désormais
contrôler l’ensemble de l’intérieur de nos maisons grâce à nos
smartphones ou notre ordinateur à l’aide d’une centrale de
commande (notre cas c’est la Raspberry Pi). De plus, grâce à
l’informatique et la programmation, les systèmes embarqués
ont pris de l’ampleur et se sont attaqués à tous les domaines
notamment la Smart house. Le problème qui se pose est
comment rendre nos maisons intelligentes et autonomes grâce
aux systèmes embarqués et comment cela pourrait améliorer
notre quotidien.
Le cœur de ce système est une carte Raspberry Pi, elle fonctionne comme un élément
central responsable de l’intelligence et la prise de décision pour contrôler
les périphériques de la maison connectée. L’un des nœuds est chargé
d’acquérir des lectures sur la température après chaque instant, et un
module de contrôle qui agit sur le système de climatisation central
(ventilateur). Ces périphériques, ce sont des nœuds communicants sans-
fils (par wifi) conçus autour le matériel.
## Partie client 

Temperature.py ===>pour l'acquisition de temperature et enregistrement dans la BD 

write_to_file.py ===> ce fichier permet d'enregistrer le seuil dans la BD

write_to_file2.py ===> ce fichier permet d'enregistrer l'état de vantilateur dans la BD

POUR LES PAGES WEB :

1- index.php ==> Dans cette page on peut trouver : la dernière ligne insérée dans la table de base de
                  données, l’état de Led et combien de temps reste pour la nouvelle valeur, on peut encore changer le seuil.

2-table.php ==>C’est une page qui donne des informations détaillées sur la température de la maison. On
                  faire la consultation des 20 dernières valeurs afficher leurs max min et le moyen 

3-chart.php ==> Dans cette page on a présenté les valeurs sous forme du courbe

4-control.php ==>  Dans cette page j’ai créé une table dans la base de données qui doit conserver le dernier état
                    du ventilateur, pour faciliter et sécurisé le control à distance.

## Partie serveur 
1- script.py ==> c'est un fichier qui responsable de consulter la base de données pour la temperature / seui
 
2- web_led ==> c'est un fichier executable crée à l'aide d'un driver (voir dossier driver)

3- servo.c => c'est script qui fait le control sur le moteur pas 
