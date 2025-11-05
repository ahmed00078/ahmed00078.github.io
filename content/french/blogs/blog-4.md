---
title: "Raisons Pour Lesquelles les Employés Démissionnent | Analytique des Ressources Humaines"
date: 2020-03-14T15:40:24+06:00
# talks thumb
image : "images/blogs/blog4.jpg"
draft: true
# description
description: "Exemple de formatage Markdown pour démonstration"
---

#### Exemple de titres

Voici un exemple de titres. Vous pouvez utiliser ces titres en suivant les règles de markdown. Par exemple : utilisez `#` pour le titre 1 et `######` pour le titre 6.

# Heading 1
## Heading 2
### Heading 3
#### Heading 4
##### Heading 5
###### Heading 6

<hr>

##### Emphase

Emphase, aussi appelée italique, avec des *astérisques* ou _underscores_.

Emphase forte, aussi appelée gras, avec des **astérisques** ou __underscores__.

Emphase combinée avec **astérisques et _underscores_**.

Barré utilise deux tildes. ~~Rayez ceci.~~

<hr>

##### Lien
[Je suis un lien en ligne](https://www.google.com)

[Je suis un lien en ligne avec titre](https://www.google.com "Page d'accueil de Google")

[Je suis un lien de style référence][Texte de référence arbitraire insensible à la casse]

[Je suis une référence relative à un fichier du dépôt](../blob/master/LICENSE)

[Vous pouvez utiliser des nombres pour les définitions de liens de style référence][1]

Ou laissez-le vide et utilisez le [texte du lien lui-même].

Les URLs et les URLs entre crochets angulaires seront automatiquement transformées en liens.
http://www.example.com ou <http://www.example.com> et parfois
example.com (mais pas sur Github, par exemple).

Texte pour montrer que les liens de référence peuvent suivre plus tard.

[arbitrary case-insensitive reference text]: https://www.themefisher.com
[1]: https://gethugothemes.com
[link text itself]: https://www.getjekyllthemes.com

<hr>

##### Paragraphe

Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam nihil enim maxime corporis cumque totam aliquid nam sint inventore optio modi neque laborum officiis necessitatibus, facilis placeat pariatur! Voluptatem, sed harum pariatur adipisci voluptates voluptatum cumque, porro sint minima similique magni perferendis fuga! Optio vel ipsum excepturi tempore reiciendis id quidem? Vel in, doloribus debitis nesciunt fugit sequi magnam accusantium modi neque quis, vitae velit, pariatur harum autem a! Velit impedit atque maiores animi possimus asperiores natus repellendus excepturi sint architecto eligendi non, omnis nihil. Facilis, doloremque illum. Fugit optio laborum minus debitis natus illo perspiciatis corporis voluptatum rerum laboriosam.

<hr>

##### Liste Ordonnée

1. Élément de liste
2. Élément de liste
3. Élément de liste
4. Élément de liste
5. Élément de liste

<hr>

##### Liste Non Ordonnée

* Élément de liste
* Élément de liste
* Élément de liste
* Élément de liste
* Élément de liste

<hr>

#### Notice

{{< notice "note" >}}
  Ceci est une simple note.
{{< /notice >}}

{{< notice "tip" >}}
  Ceci est un simple conseil.
{{< /notice >}}

{{< notice "info" >}}
  Ceci est une simple information.
{{< /notice >}}

<hr>

#### Onglet

{{< tabs >}}

  {{< tab "premier" >}}
   Ceci est le premier onglet
  {{< /tab >}}

  {{< tab "deuxième" >}}
  ceci est le deuxième onglet
  {{< /tab >}}

  {{< tab "troisième" >}}
  ceci est le troisième onglet
  {{< /tab >}}

{{</ tabs >}}

<hr>

### Collapse

{{< collapse "collapse 1" >}}
  Ceci est un collapse simple
{{< /collapse >}}

{{< collapse "collapse 2" >}}
  Ceci est un collapse simple
{{< /collapse >}}

{{< collapse "collapse 3" >}}
  Ceci est un collapse simple
{{< /collapse >}}

<hr>

##### Code et Coloration Syntaxique

Le `code` en ligne a des `back-ticks autour` de lui.

```javascript
var s = "Coloration syntaxique JavaScript";
alert(s);
```

```python
s = "Coloration syntaxique Python"
print s
```

<hr>

##### Citation

> Ceci est un exemple de citation.

<hr>

##### HTML Inline

Vous pouvez également utiliser du HTML brut dans votre Markdown, et cela fonctionnera plutôt bien.

<dl>
  <dt>Liste de définition</dt>
  <dd>C'est quelque chose que les gens utilisent parfois.</dd>

  <dt>Markdown dans HTML</dt>
  <dd>Ne fonctionne *pas* **très** bien. Utilisez des <em>balises</em> HTML.</dd>
</dl>


<hr>

##### Tableaux

Les deux-points peuvent être utilisés pour aligner les colonnes.

| Tableaux      | Sont          | Cool  |
| ------------- |:-------------:| -----:|
| col 3 est     | alignée à droite | 1600$ |
| col 2 est     | centrée       |   12$ |
| rayures zébrées | sont élégantes |    1$ |

Il doit y avoir au moins 3 tirets séparant chaque cellule d'en-tête.
Les barres externes (|) sont optionnelles, et vous n'avez pas besoin de rendre
le Markdown brut bien aligné. Vous pouvez également utiliser du Markdown inline.

Markdown | Moins | Joli
--- | --- | ---
*Toujours* | `rendu` | **joliment**
1 | 2 | 3

<hr>

##### Image

![image](../../images/blogs/blog2.jpg)

<hr>

##### Vidéo Youtube

{{< youtube C0DPdy98e4c >}}
