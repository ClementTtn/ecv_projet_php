DELETE FROM user;
ALTER TABLE user AUTO_INCREMENT = 1;

INSERT INTO user(name, email, password) VALUES
    ("Clément Tutin", "clement.tutin@mail-ecv.fr", "31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66"),
    ("Maxime Senecat", "maxime.senecat@mail-ecv.fr", "96b4d8a57cf4d76ee047e308c61a493900ebc954c5771b544448dbd683bead69");


DELETE FROM product;
ALTER TABLE product AUTO_INCREMENT = 1;

INSERT INTO product(name, description, price, img) VALUES
    ("Table", "Une table en bois.", 95.0, 'img/table.png'),
    ("Chaise", "Une chaise en bois.", 30.0, 'img/chaise.png'),
    ("Tapis", "Un tapis en coton.", 60.0, 'img/tapis.png'),
    ("Meuble télé", "Un meublé télé pour des grandes télés.", 153.0, 'img/meuble_tv.png'),
    ("Canapé", "Un canapé pour regarder la grande télé.", 470.0, 'img/canape.png'),
    ("Lampe", "Une grande lampe pour mettre à côté du canapé.", 112.0, 'img/lampe.png'),
    ("Plante", "Une plante pour mettre sur la table en bois.", 29.0, 'img/plante.png')
