# conception de la base de données
# admin
    - id
    - nom
    - prenom
    - email
    -mot_de_passe

# adherents
    - id
    - nom
    - prenom
    - numero_adherent (unique)
    - email


# livres
    - id
    - isbn (unqiue)
    - titre
    - auteur_id
    - annee_de_sortie


# auteurs
    - id
    - nom
    - prenom
    - nationalite


# emprunts
    - id 
    - date_debut
    - date_fin
    - adherent_id
    - livre_id