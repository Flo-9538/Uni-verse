Snippet de code à intégrer:

```php
<?php
$destinataire = "Gdepardieu@gmail.com"; // mail du user qui sign up (pas restreint qu'au gmail)
$sujet = "Verification blabla"; // sujet du mail
$message = "contenu message"; // contenu à savoir lien d'anthen et un petit message qui indique qu'il le cliquer
$headers = "From: AdLaurent@gmail"; // boite mail à partir de laquelle l'email d'anthen sera envoyé (en-tête) 
mail($destinataire,$sujet,$message,$headers)
//fonction mail pour l'envoi de l'email de verif
?>
```

Ensuite tu vas modifier le fichier php.ini
(dans le control panel de xampp tu cliques sur 'config' pour le module apache).
Dans le fichier tu recherches avec ctrl-F 'mail function' et tu modifies comme suit:


```
[mail function]
; For Win32 only.
; http://php.net/smtp
;SMTP-localhost
; http://php.net/smtp-port
;smtp_port=25

SMTP=smtp/gmail.com
smtp_port=587
sendmail_from = tu entres ici l'adress email du headers 
sendmail_path = "\"C:\xampp\sendmail\sendmail.exe\" -t"
Enfait tu copies colles ici le chemin du fichier sendmail.exe (qui est dans le dossier sendmail de xampp) 

```


Le reste du fichier tu y touches pas.
Tu redémarre xampp et tu relances Apache MySQL et tout ce qui va avec. 

Après dans le dossier sendmail, tu ouvres le fichier sendmail.ini et tu modifies come suit:


```
[sendmail]
smtp_server=smtp.gmail.com
smtp_port=587
error_lockfile=error.log
debug_lockfile=debug.log
auth_username= tu entres ici l'email du headers comme avant
auth_password= son motde passe ici
force_sender= adress mail du headers

; you must must change mail.mydomain.com to your smtp server,
; or to IIS's "pickup" directory. (generally C:\Inetpub\mailroot\Pickup)
; emails delivered via IIS's pickup directory cause sendmail to
; run quicker, but you won't get error messages back to the calling
; application
```

Le reste du fichier t'y touches pas.
Ensuite dans tu vas dans les réglages de la boite mail gmail de laquelle seront envoyés les mail d'anthen.
Tu vas sur 'Gérer votre compte' ensuite sur 'Sécurité', tu actives 'Accès moins sécurisé des applications' pour permettre à des applications tierces d'utiliser le compte gmail compte pour l'envoi d'emails.

Normalement il manque plus qu'a incorporer le snippet de code php pour le mail et à tester les envoies/receptions d'emails.