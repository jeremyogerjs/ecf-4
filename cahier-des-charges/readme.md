# ecf-4 Le pays
 
> Le projet a été réalisé en HTML,CSS et PHP (Wordpress ) en respectant la demande client.  
              
### Besoin fonctionnelle
 
Selon la demande client voici une liste de besoin fonctionnelle que j'en ai retirer :
 
- Mettre en avant les dernière publications et celles a venir
- Le site doit être responsive
- Afficher les derniers articles dans l'ordre chronologique
- Facile d'utilisation
- Mettre en avant les articles a la une
- Accés rapide aux différentes catégories
- Sécuriser le site
 
***
### Choix technique
 
Concernant les technologies utilisées j'ai préferé rester sur le framework CSS bootstrap pour faciliter le développement car j'ai deja développer un  thème avec ce framework. 
Au niveau de la une je n'ai pas réussi a enlever l'article que j'ai mis a la une car si je l'enlevai, la pagination en fonctionne plus. Pour le design je me suis inspiré de [futura science](https://www.futura-sciences.com/) et [LNC](https://www.lnc.nc/). 
 
Au niveau du maquettage finalement je n'ai réussi a faire comme la maquette car après réflexion je trouvais que sa ne répondai pas a la demande client,ni que sa allait être simple d'utilisation alors je me suis adaptais en repensant le layout de façon a être plus harmonieux et répondant au besoin fonctionnelle. 
 
Pour faciliter le développement de ce thème j'ai utilisé un plugins [FakerPress](https://fr.wordpress.org/plugins/fakerpress/) pour génerer des articles aléatoires, aussi j'ai utilisé [event calendar](https://fr.wordpress.org/plugins/the-events-calendar/) pour générer plus facilement des événements a venir comme indiqué dans la demande client.

### Sécurité
 
Au niveau de l'aspect sécurité j'ai suivi ce [tutoriel](https://www.codeur.com/tuto/wordpress/proteger-wordpress-attaques/#2_utiliser_des_identifiants_de_connexion_complexes)
Et aussi [celui ci](https://capitainewp.io/formations/developper-theme-wordpress/analyse-wp-config/) 
 
Voici les actions effectuer:
 
- Cacher la version de wordpress en ajoutant cette ligne dans `functions.php` : `remove_action("wp_head", "wp_generator");`
- Suppression des rapports d'erreur généré par wordpress en ajoutant cette ligne dans le fichier `wp-config.php` : 
  - `error_reporting(0); 
       @ini_set('display_errors', 0);
     `
- Changement du compte administrateur par défault
- Désactivez l'édition de fichier pour éviter les mauvaises manipulations grâce a cette ligne dans `wp-config.php` : `define( 'DISALLOW_FILE_EDIT', true );`
- Changement du préfixe des tables
 
### Performance
 
Au niveau des performances voici les actions effectuer : 
 
- Allongez la durée des sauvegardes automatiques avec `define( 'AUTOSAVE_INTERVAL', 300 );` dans le fichier `wp-config.php` 
- Allongement du temps de revision en ajoutant cette ligne `define( 'WP_POST_REVISIONS', 5 );` au fichier `wp-config.php`
