# Documentation (Epapphrodite-framework)
## Procédure de configuration
 - Créer la base de données de votre projet ```( la base de données par défaut est : epaphrodite_bd```)<br>
 Si vous voulez de changer le  nom de la base de données, faites le dans le fichier suivant : ``` config.ini ```<br>
 L'un des gros avantages avec epaphrodite-framework est qu'elle est multi-bases de données. Vous pouvez le connecté &agrave; X databases.
    ```
      bin\database\datas\config.ini
    ```
 

 - Configuerez fichier ``` config.php ```<br>
     ```
      bin\epaphrodite\define\config.php
    ```
 - Choisissez la langue a utiliser ``` fr ou eng ```<br>
 - Choisissez Type de fichier a utiliser dans le front ``` .html ou .php ou .twig ```
 - Remplacez "_ep" l'extension des fichiers que vous souhaiter ``` _pl ou _dhs ... ```
 - En local Remplacez ``` epaphrodite-framework ``` par le nom de votre projet

 - Lancer l'aplication a partir de votre navigateur
 - Entrez le login et le mot de passe. Les acces par defaut sont les suivants :
      ```
      Login : admin
      Password : admin
    ``` 
    A la premiere authentification, le framework va vérifier l'existence de certaines tables pour son fonctionnement.<br> 
    Si non, ces tables seront automatiquement générées

## Front-end
Les fonctions dans le front-end sont essentiellement en ``` Twig ```<br>
epaphrodite-framework dispose de ses propres fonctions et filtres en dehors de celles fournis par la documentation officiel de Twig.
- Pour appeler un template, vous taper le code suivant :
    ```
      {% extends layouts %}
    ```
- Pour appeler une forme, vous taper le code suivant :
    ```
      {% from forms import input_field , submit  %}
    ```    
``` forms ``` est le layout des forms<br>``` input_field ``` est un champ de type input<br>``` submit ``` est un champ de type buttom

- Pour ajouter un chemin ou lien, vous taper le code suivant :
    ```
      {{ __path('login') }}
    ```
    ``` users ``` est le nom du dossier que nous pointons<br>``` login ``` est le nom de page que nous avons choisi

- Pour ajouter une image, vous taper le code suivant :
    ```
      {{ __img('logo.png') }}
    ```
