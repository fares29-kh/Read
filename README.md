this is the SQL script for this website 

-- Table for user accounts (common for students and admins)
CREATE TABLE `compte` (
    `id_compte` INT AUTO_INCREMENT PRIMARY KEY,
    `login` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `profile` ENUM('etudiant', 'admin') NOT NULL,
    UNIQUE(`login`),
    UNIQUE(`email`)
);

-- Table for student information
CREATE TABLE `etudiant` (
    `id_etudiant` INT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `date_naiss` DATE NOT NULL,
    `sexe` ENUM('M', 'F') NOT NULL,
    `statut` ENUM('C', 'M') NOT NULL, -- C = Celibataire, M = Marié
    FOREIGN KEY (`id_etudiant`) REFERENCES `compte`(`id_compte`) ON DELETE CASCADE
);

-- Table for admin information
CREATE TABLE `admin` (
    `id_admin` INT PRIMARY KEY,
    `nom` VARCHAR(255) NOT NULL,
    `prenom` VARCHAR(255) NOT NULL,
    `date_naiss` DATE NOT NULL,
    `sexe` ENUM('M', 'F') NOT NULL,
    `statut` ENUM('C', 'M') NOT NULL,
    FOREIGN KEY (`id_admin`) REFERENCES `compte`(`id_compte`) ON DELETE CASCADE
);

-- Table for books
CREATE TABLE `livre` (
    `id_livre` INT AUTO_INCREMENT PRIMARY KEY,
    `titre` VARCHAR(255) NOT NULL,
    `quantite` INT NOT NULL,
    `image_lien` VARCHAR(255),
    `etat` ENUM('disponible', 'indisponible') NOT NULL,
    `auteur` VARCHAR(255) NOT NULL,
    `edition` VARCHAR(255) NOT NULL
);

-- Table for reservations
CREATE TABLE `reservations` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `reservation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `status` ENUM('en attente', 'confirmée', 'annulée') DEFAULT 'en attente',
    `user_id` INT,
    `book_id` INT,
    FOREIGN KEY (`user_id`) REFERENCES `etudiant`(`id_etudiant`) ON DELETE CASCADE,
    FOREIGN KEY (`book_id`) REFERENCES `livre`(`id_livre`) ON DELETE CASCADE
);

