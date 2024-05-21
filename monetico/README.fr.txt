Ce projet contient des exemples montrant comment appeler la page de paiment Monetico ainsi que traiter les réponses envoyées
par la plateforme Monetico à l'interface retour.

Le dossier "Examples" contient des classes montrant comment appeler la page de paiement dans différents scenarii.
N'hésitez pas à éditer ces exemples en utilisant l'objet PaymentRequest et observez comment le formulaire HTML généré inclut les changements effectués.
Le sous dossier "Response" contient des exemples d'appels de la plateforme Monetico à votre interface retour.

Le dossier "Monetico" contient un exemple d'implémentation de l'interface de la page de paiement. Il inclut des classes
représentant les paramètres qui peuvent être fournis à la plateforme Monetico, prenant en charge la majeure partie du formatage
et le calcul dynamique du sceau MAC.

La page "ResponseInterface.php" est un exemple d'implémentation de l'interface retour.

Pour voir ces exemples en action, démarrez le site et naviguez jusqu'aux pages "PaymentRequestDemo.php" and "PaymentResponseDemo.php".

La configuration de votre numéro de TPE, clé MAC et code site est définie dans le fichier MoneticoConfig.php.