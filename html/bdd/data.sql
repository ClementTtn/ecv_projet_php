# Suppression des données existantes de user
DELETE FROM user;
ALTER TABLE user AUTO_INCREMENT = 1;

# Insertion des données par défaut
INSERT INTO user(name, email, password) VALUES
    ("Clément Tutin", "clement.tutin@mail-ecv.fr", "$2y$10$9GU54ykukEd3gLtiZQllYOqWpUXZ089rfdtz4sHkWomu6ekDBCERy"),     # Password -> toto
    ("Maxime Senecat", "maxime.senecat@mail-ecv.fr", "$2y$10$9gSLShNt1FOdjI6TK5aOV.MGDw9hxJHctOk9R8abVpq76iiP5ExJW");   # Password -> vivelephp


# Suppression des données existantes de product
DELETE FROM product;
ALTER TABLE product AUTO_INCREMENT = 1;

# Insertion des données par défaut
INSERT INTO product(name, description, price, img) VALUES
    ("Table", "Une table en bois.", 95.0, 'img/table.png'),
    ("Chaise", "Une chaise en bois.", 30.0, 'img/chaise.png'),
    ("Tapis", "Un tapis en coton.", 60.0, 'img/tapis.png'),
    ("Meuble télé", "Un meublé télé pour des grandes télés.", 153.0, 'img/meuble_tv.png'),
    ("Canapé", "Un canapé pour regarder la grande télé.", 470.0, 'img/canape.png'),
    ("Lampe", "Une grande lampe pour mettre à côté du canapé.", 112.0, 'img/lampe.png'),
    ("Plante", "Une plante pour mettre sur la table en bois.", 29.0, 'img/plante.png')
