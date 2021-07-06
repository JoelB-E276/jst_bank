# jst_bank
A Symfony banking application developed as a team.  
Samir-bas https://github.com/samir-bas  
Tbo https://github.com/trobillard  
JoelB-E276 https://github.com/JoelB-E276

- L’application n’est accessible qu’aux seuls utilisateurs connectés
- Quand un utilisateur non connecté va sur l’application il est redirigé vers une page de connexion
avec un formulaire
- Un utilisateur se connecte à l’aide d’une adresse mail et d’un mot de passe
- Un utilisateur connecté peut se déconnecter
- Une fois connecté, l’utilisateur voit uniquement ses comptes en banque personnels.
- Quand l’utilisateur clique sur un compte en banque, il arrive sur une page dédié au compte où il
voit les informations du compte mais aussi les dernières opérations effectuées sur le compte
- Via une page dédiée un utilisateur peut créer un nouveau compte personnel à l’aide d’un
formulaire. Une fois créé le compte apparaît sur la page d’accueil. Attention le compte doit
respecter les conditions minimum de création de compte (bon type et bon montant)
- L’utilisateur peut effectuer des dépôts ou des retraits sur le compte de son choix. Le montant du
compte est alors mis à jour et une nouvelle opération est enregistrée sur le compte.
