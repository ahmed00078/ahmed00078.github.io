---
title: "Hack the Box — Point de Départ — Solution de la Machine Meow"
date: 2024-04-17T15:40:24+06:00
# talks thumb
image : "images/blogs/meowpwnd.png"
draft: false
# description
description: "Guide complet pour résoudre la machine Meow sur Hack the Box"
---

Bienvenue dans mon premier guide sur Hack the Box ! Dans cet article, je vous guiderai à travers les étapes pour conquérir la machine "Meow", qui fait partie des laboratoires 'Point de Départ' avec une difficulté classée comme 'Très Facile'.

<hr>


Pour commencer, connectez-vous au portail Hack the Box et dirigez-vous vers la page Point de Départ. Vous aurez le choix entre une connexion `PWNBOX` ou `OVPN` (OpenVPN). J'ai opté pour la méthode `OVPN`, en utilisant Kali Linux via VirtualBox. Il suffit de télécharger le fichier de configuration VPN (.ovpn) et d'exécuter la commande suivante dans votre terminal :\

<hr>

```bash
sudo openvpn [nomfichier].ovpn
```
<hr>

N'oubliez pas de remplacer `"[nomfichier]"` par le nom réel de votre fichier `.ovpn` téléchargé pour le laboratoire Point de Départ. Recherchez la ligne `"Initialization Sequence Completed"` dans le terminal, confirmant votre connexion réussie à la machine Meow.

<hr>

Actualisez la page du navigateur pour voir la nouvelle connexion et activez la machine en cliquant sur le bouton `'Spawn Machine'`. Une fois la machine active, notez l'adresse IP cible.

<hr>

Maintenant, procédez aux tâches fournies par la machine Meow. J'ai résumé les réponses à chaque tâche ci-dessous :

> **Acronyme de VM :** <br>
> Machine Virtuelle

> **Outil pour l'Interaction en Ligne de Commande :** <br>
> Terminal

> **Service pour la Connexion VPN aux Labs HTB :** <br>
> OpenVPN

> **Nom Abrégé pour 'Interface Tunnel' :** <br>
> tun

> **Outil pour les Requêtes d'Écho ICMP :** <br>
> Ping

> **Outil Commun pour Trouver les Ports Ouverts :** <br>
> Nmap

> **Service sur le Port 23/tcp :** <br>
> Telnet

> **Nom d'Utilisateur pour la Connexion Telnet (Mot de Passe Vide) :** <br>
> root (Essayez admin ou administrator si root échoue)

> **Soumettre le Flag Root :** <br>
> Effectuez un scan nmap sur l'IP cible, identifiant un port ouvert 23/tcp avec le service Telnet. Utilisez la commande `telnet [IP_Cible]` dans le terminal, en fournissant "root" comme nom d'utilisateur. Exécutez la commande `ls` pour lister les répertoires/fichiers disponibles, localisez "flag.txt", et utilisez `cat flag.txt` pour voir son contenu. Copiez la valeur du flag et soumettez-la dans le navigateur.

Une fois terminé avec succès, vous recevrez un message `"Meow has been Pwned"`.

En conclusion, en exécutant un scan nmap sur `[ip_cible]`, nous avons découvert un port ouvert 23/tcp avec le service Telnet. En nous connectant au serveur cible avec telnet `[ip_cible]` en utilisant le nom d'utilisateur "root", nous avons navigué dans les répertoires, trouvé "flag.txt", et résolu le défi. Bon hacking !

