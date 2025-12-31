-- ============================================
-- Base de datos: concursos
-- Proyecto: Gestión de Concursos y Sorteos
-- ============================================

CREATE DATABASE IF NOT EXISTS concursos
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE concursos;

-- ============================================
-- Tabla: users
-- ============================================
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- Tabla: contests
-- ============================================
CREATE TABLE contests (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    rules TEXT NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    created_by BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_contests_user
        FOREIGN KEY (created_by) REFERENCES users(id)
        ON DELETE CASCADE
);

-- ============================================
-- Tabla: participations
-- ============================================
CREATE TABLE participations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    contest_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_participations_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_participations_contest
        FOREIGN KEY (contest_id) REFERENCES contests(id)
        ON DELETE CASCADE,

    CONSTRAINT unique_participation
        UNIQUE (user_id, contest_id)
);

-- ============================================
-- Tabla: prizes
-- ============================================
CREATE TABLE prizes (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    contest_id BIGINT UNSIGNED NOT NULL,
    description VARCHAR(255) NOT NULL,
    winner_user_id BIGINT UNSIGNED NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    CONSTRAINT fk_prizes_contest
        FOREIGN KEY (contest_id) REFERENCES contests(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_prizes_winner
        FOREIGN KEY (winner_user_id) REFERENCES users(id)
        ON DELETE SET NULL
);

