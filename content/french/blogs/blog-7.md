---
title: "Construire ShareBin : Comment j'ai créé une alternative à Pastebin pour le Hackathon de Railway"
date: 2025-08-10T00:00:00+00:00
image: "images/blogs/sharebin.png"
draft: false
description: "L'histoire de la création de ShareBin - une plateforme moderne de partage de fichiers et de texte - pour le Hackathon 2025 de Railway. Apprenez comment j'ai construit et déployé un SaaS complet en un weekend."
---

# Construire ShareBin : Mon aventure au Hackathon Railway 🚀

La semaine dernière, je suis tombé sur l'annonce du Hackathon Utilisateur de Railway. 1000$ de prix pour construire quelque chose de cool ? Défi accepté ! Avec seulement un weekend pour construire quelque chose de significatif, j'ai décidé de créer **ShareBin** - une alternative à pastebin axée sur la confidentialité que tout le monde peut auto-héberger. Voici l'histoire de comment tout s'est assemblé.

## L'Idée 💡

Nous sommes tous passés par là - vous devez rapidement partager un extrait de code avec un collègue, envoyer un fichier de configuration à un ami, ou coller quelques logs pour le débogage. Bien sûr, il existe de nombreux pastebins, mais la plupart d'entre eux sont :
- Encombrés de publicités
- Suivent tous vos mouvements
- Nécessitent des inscriptions pour les fonctionnalités de base
- Ne vous donnent pas le contrôle sur vos données

Je voulais quelque chose de différent. Quelque chose de propre, rapide et auto-hébergé. Quelque chose qui respecte la vie privée et qui fonctionne tout simplement. C'est ainsi que ShareBin est né.

## Le Défi ⏰

Le hackathon de Railway avait des exigences spécifiques :
- Construire quelque chose entre le 6 et le 11 août
- Créer un modèle déployable
- Écrire du contenu détaillé à ce sujet
- Le rendre suffisamment sophistiqué pour impressionner

Avec un temps limité et de grandes ambitions, je devais être stratégique. Pas de sur-ingénierie, pas de dérive fonctionnelle - juste un MVP solide qui résout un vrai problème.

## Construire ShareBin 🛠️

### Jour 1 : Architecture et Configuration

J'ai commencé avec une architecture simple mais robuste :
- **Frontend** : Next.js 14 (parce que qui n'aime pas React avec des super pouvoirs ?)
- **Backend** : Express.js (simple, rapide, éprouvé)
- **Base de données** : PostgreSQL (base de données native de Railway)

La beauté de cette pile ? C'est une technologie ennuyeuse qui fonctionne tout simplement. Pas de nouveaux frameworks fantaisistes à apprendre, pas de configurations complexes - juste des outils solides qui font le travail.

### Jour 2 : Fonctionnalités Principales

Le MVP devait maîtriser les bases :

```javascript
// Le cœur de ShareBin - générer des IDs uniques
function generateId() {
  return crypto.randomBytes(4).toString('hex');
}
```

Simple, non ? Mais cette petite fonction alimente tout le mécanisme de partage. Chaque partage obtient un ID unique de 8 caractères qui est pratiquement impossible à deviner.

J'ai implémenté :
- **Partage de texte** : Collez n'importe quoi, obtenez un lien
- **Téléchargements de fichiers** : Jusqu'à 10MB, stockés directement dans PostgreSQL
- **Expiration automatique** : 1 heure à jamais - votre choix
- **Comptage de vues** : Sachez combien de fois votre partage a été consulté

### Jour 3 : Le Rendre Beau

Un outil n'est aussi bon que son interface. J'ai opté pour un design glassmorphisme moderne - ces beaux effets de verre dépoli qui donnent un aspect premium à tout. Thème sombre par défaut parce que, soyons honnêtes, nous sommes tous des développeurs ici.

```css
/* La magie du glassmorphisme */
.card {
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.2);
}
```

Le résultat ? Une interface qui semble appartenir à 2025, pas 2005.

### Jour 4 : Déploiement Railway

C'est là que Railway brille vraiment. Le déploiement était littéralement :
1. Pousser vers GitHub
2. Se connecter à Railway
3. Ajouter des variables d'environnement
4. Terminé

Pas de configs Docker, pas de yamls Kubernetes, pas de gestion de serveur. Juste du pur bonheur de développeur.

## La Plongée Technique Approfondie 🔧

### Conception de Base de Données

J'ai gardé les choses simples avec une seule table :

```sql
CREATE TABLE shares (
  id VARCHAR(8) PRIMARY KEY,
  content TEXT,
  filename VARCHAR(255),
  mimetype VARCHAR(100),
  file_data BYTEA,
  is_file BOOLEAN DEFAULT false,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  expires_at TIMESTAMP,
  views INTEGER DEFAULT 0
);
```

Les fichiers sont stockés en tant que BYTEA directement dans PostgreSQL. Est-ce la solution la plus évolutive ? Non. Est-ce que ça fonctionne parfaitement pour un pastebin auto-hébergé ? Absolument.

### Considérations de Sécurité

La sécurité n'était pas une réflexion après coup :
- **Prévention de l'injection SQL** : Requêtes paramétrées partout
- **Validation des fichiers** : Vérification stricte du type et de la taille
- **Configuration CORS** : Correctement configurée pour le frontend
- **Assainissement des entrées** : Ne jamais faire confiance aux entrées utilisateur

```javascript
// Exemple de requête paramétrée
await pool.query(
  'INSERT INTO shares (id, content, expires_at) VALUES ($1, $2, $3)',
  [id, text, expiresAt]
);
```

### Optimisations de Performance

Même si c'est un projet de hackathon, je n'ai pas pu m'empêcher d'optimiser :
- **Nettoyage automatique** : Tâche de fond qui supprime les partages expirés
- **Requêtes indexées** : Index de base de données sur les champs fréquemment interrogés
- **Gestion efficace des fichiers** : Streaming pour les gros fichiers
- **Optimisation Next.js** : Génération statique où possible

## Le Résultat 🎉

ShareBin est maintenant en ligne et prêt pour que quiconque puisse le déployer. Avec le système de templates de Railway, vous pouvez avoir votre propre instance en marche en littéralement 5 minutes :

[![Deploy on Railway](https://railway.app/button.svg)](https://railway.com/deploy/Qq-IIH?referralCode=_QheAl)

### Qu'est-ce qui le Rend Spécial ?

1. **Confidentialité d'abord** : Vos données, votre serveur, vos règles
2. **Pas de superflu** : Juste les fonctionnalités dont vous avez besoin, rien de plus
3. **Design magnifique** : Une interface qui suscite la joie
4. **Déploiement en un clic** : Railway rend cela ridiculement facile
5. **Open Source** : Forkez-le, modifiez-le, faites-en le vôtre

## Leçons Apprises 📚

### Ce qui a Bien Marché

- **Choisir une technologie ennuyeuse** : Next.js + Express + PostgreSQL = pas de surprises
- **Commencer simple** : MVP d'abord, fonctionnalités après
- **Plateforme de Railway** : Le déploiement n'a jamais été un goulot d'étranglement
- **Gestion du temps** : Fixer des objectifs quotidiens m'a gardé sur la bonne voie

### Ce que je Ferais Différemment

- **Commencer avec TypeScript** : La sécurité des types aurait économisé du temps de débogage
- **Ajouter des tests plus tôt** : Même des tests basiques auraient aidé avec la confiance
- **Meilleure gestion des erreurs** : Certains cas limites nécessitent plus d'attention
- **Mise en cache Redis** : Améliorerait les performances pour les partages populaires

## Et Maintenant ? 🚀

ShareBin ne fait que commencer. Voici ce qui est sur la feuille de route :

- **Coloration syntaxique** : Détection automatique de langage pour le code
- **Protection par mot de passe** : Chiffrement optionnel pour les partages sensibles
- **Intégration S3** : Pour le support de fichiers plus volumineux
- **Accès API** : Laisser les développeurs intégrer ShareBin
- **Thèmes personnalisés** : Parce que tout le monde aime la personnalisation

## Le Parcours Open Source

Le code est open source et disponible sur GitHub :
- [Dépôt Frontend](https://github.com/ahmed00078/sharebin-frontend)
- [Dépôt Backend](https://github.com/ahmed00078/sharebin-backend)

Les contributions sont les bienvenues ! Que ce soit pour corriger des bugs, ajouter des fonctionnalités, ou améliorer la documentation - chaque PR aide.

## Essayez-le Vous-même !

Vous voulez voir ShareBin en action ? Vous pouvez :

1. **Déployer votre propre instance** : [Déploiement en un clic sur Railway](https://railway.com/deploy/Qq-IIH?referralCode=_QheAl)
2. **Vérifier le code source** : Dépôts liés ci-dessus
3. **Contribuer** : Ouvrir des issues, soumettre des PRs, partager des idées

## Réflexions Finales 💭

Construire ShareBin pour le hackathon de Railway a été une expérience incroyable. En seulement 4 jours, je suis passé d'une idée à un produit déployé avec de vrais utilisateurs. Cela m'a rappelé pourquoi j'aime construire des choses - le frisson de créer quelque chose d'utile à partir de rien d'autre que du code et de la créativité.

La plateforme de Railway a rendu l'impossible possible. Pas de lutte avec les déploiements, pas de cauchemars de configuration de serveur - juste une concentration pure sur la construction. Si vous êtes un développeur qui n'a pas encore essayé Railway, vous passez à côté de quelque chose.

ShareBin ne gagnera peut-être pas le hackathon, mais c'est déjà un gagnant dans mon livre. Il résout un vrai problème, il est beau, et surtout - c'est quelque chose dont je suis fier d'avoir construit.

## Merci 🙏

Un grand merci à :
- **Railway** pour avoir organisé ce hackathon génial
- **La communauté open source** pour les outils incroyables
- **Tous ceux qui essaient ShareBin** - vous en valez la peine

---

*Vous avez des questions ou des commentaires ? Contactez-moi sur [ahmedsidimohammed78@gmail.com](ahmedsidimohammed78@gmail.com
) ou ouvrez une issue sur GitHub. Bon partage !*

**#Railway #Hackathon #NextJS #NodeJS #PostgreSQL #OpenSource #WebDev #SaaS**