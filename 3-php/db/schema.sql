CREATE TABLE `files` (
                         `id` bigint NOT NULL AUTO_INCREMENT,
                         `file_data` mediumblob NOT NULL,
                         `is_deleted` tinyint(1) DEFAULT '0',
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `me` (
                      `id` bigint NOT NULL AUTO_INCREMENT,
                      `name` varchar(25) DEFAULT NULL,
                      `quote` varchar(50) DEFAULT NULL,
                      `is_deleted` tinyint(1) DEFAULT '0',
                      `files_id` bigint DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `me_files_null_fk` (`files_id`),
                      CONSTRAINT `me_files_null_fk` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `certificates` (
                                `id` bigint NOT NULL AUTO_INCREMENT,
                                `description` varchar(100) DEFAULT NULL,
                                `is_deleted` tinyint(1) DEFAULT '0',
                                `id_me` bigint DEFAULT NULL,
                                PRIMARY KEY (`id`),
                                KEY `certificates_me_null_fk` (`id_me`),
                                CONSTRAINT `certificates_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `certificate_infos` (
                                     `id` bigint NOT NULL AUTO_INCREMENT,
                                     `name` varchar(25) DEFAULT NULL,
                                     `is_deleted` tinyint(1) DEFAULT '0',
                                     `id_certificates` bigint DEFAULT NULL,
                                     `id_files` bigint DEFAULT NULL,
                                     PRIMARY KEY (`id`),
                                     KEY `certificate_infos_certificates_null_fk` (`id_certificates`),
                                     KEY `certificate_infos_files_null_fk` (`id_files`),
                                     CONSTRAINT `certificate_infos_certificates_null_fk` FOREIGN KEY (`id_certificates`) REFERENCES `certificates` (`id`),
                                     CONSTRAINT `certificate_infos_files_null_fk` FOREIGN KEY (`id_files`) REFERENCES `files` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `contact_requests` (
                                    `id` bigint NOT NULL AUTO_INCREMENT,
                                    `email` varchar(50) DEFAULT NULL,
                                    `subject` varchar(50) DEFAULT NULL,
                                    `description` varchar(200) DEFAULT NULL,
                                    `is_deleted` tinyint(1) DEFAULT '0',
                                    `id_me` bigint DEFAULT NULL,
                                    PRIMARY KEY (`id`),
                                    KEY `contact_requests_me_null_fk` (`id_me`),
                                    CONSTRAINT `contact_requests_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `educations` (
                              `id` bigint NOT NULL AUTO_INCREMENT,
                              `name` varchar(50) DEFAULT NULL,
                              `duration` varchar(50) DEFAULT NULL,
                              `is_deleted` tinyint(1) DEFAULT '0',
                              `id_me` bigint DEFAULT NULL,
                              PRIMARY KEY (`id`),
                              KEY `educations_me_null_fk` (`id_me`),
                              CONSTRAINT `educations_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `education_infos` (
                                   `id` bigint NOT NULL AUTO_INCREMENT,
                                   `description` varchar(100) DEFAULT NULL,
                                   `is_deleted` tinyint(1) DEFAULT '0',
                                   `id_educations` bigint DEFAULT NULL,
                                   PRIMARY KEY (`id`),
                                   KEY `education_infos_educations_null_fk` (`id_educations`),
                                   CONSTRAINT `education_infos_educations_null_fk` FOREIGN KEY (`id_educations`) REFERENCES `educations` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `languages` (
                             `id` bigint NOT NULL,
                             `description` varchar(100) DEFAULT NULL,
                             `is_deleted` tinyint(1) DEFAULT '0',
                             `id_me` bigint DEFAULT NULL,
                             PRIMARY KEY (`id`),
                             KEY `languages_me_null_fk` (`id_me`),
                             CONSTRAINT `languages_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `me_infos` (
                            `id` bigint NOT NULL AUTO_INCREMENT,
                            `description` varchar(100) NOT NULL,
                            `is_deleted` tinyint(1) DEFAULT '0',
                            `id_me` bigint DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            KEY `informations_me_null_fk` (`id_me`),
                            CONSTRAINT `informations_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `roles` (
                         `id` bigint NOT NULL AUTO_INCREMENT,
                         `type` varchar(25) DEFAULT NULL,
                         `is_deleted` tinyint(1) DEFAULT '0',
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `roles_type_unique` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `skills` (
                          `id` bigint NOT NULL AUTO_INCREMENT,
                          `description` varchar(200) DEFAULT NULL,
                          `is_deleted` tinyint(1) DEFAULT '0',
                          `id_me` bigint DEFAULT NULL,
                          PRIMARY KEY (`id`),
                          KEY `skills_me_null_fk` (`id_me`),
                          CONSTRAINT `skills_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `skill_infos` (
                               `id` bigint NOT NULL AUTO_INCREMENT,
                               `name` varchar(25) DEFAULT NULL,
                               `is_deleted` tinyint(1) DEFAULT '0',
                               `id_files` bigint DEFAULT NULL,
                               `id_skills` bigint DEFAULT NULL,
                               PRIMARY KEY (`id`),
                               KEY `skill_infos_files_null_fk` (`id_files`),
                               KEY `skill_infos_skills_null_fk` (`id_skills`),
                               CONSTRAINT `skill_infos_files_null_fk` FOREIGN KEY (`id_files`) REFERENCES `files` (`id`),
                               CONSTRAINT `skill_infos_skills_null_fk` FOREIGN KEY (`id_skills`) REFERENCES `skills` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `social_medias` (
                                 `id` bigint NOT NULL AUTO_INCREMENT,
                                 `name` varchar(25) DEFAULT NULL,
                                 `url` varchar(100) DEFAULT NULL,
                                 `is_deleted` tinyint(1) DEFAULT '0',
                                 `id_me` bigint DEFAULT NULL,
                                 `id_files` bigint DEFAULT NULL,
                                 PRIMARY KEY (`id`),
                                 KEY `social_medias_files_null_fk` (`id_files`),
                                 KEY `social_medias_me_null_fk` (`id_me`),
                                 CONSTRAINT `social_medias_files_null_fk` FOREIGN KEY (`id_files`) REFERENCES `files` (`id`),
                                 CONSTRAINT `social_medias_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `stats` (
                         `id` bigint NOT NULL AUTO_INCREMENT,
                         `device_type` varchar(25) DEFAULT NULL,
                         `is_deleted` tinyint(1) DEFAULT '0',
                         `id_me` bigint DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         KEY `stats_me_null_fk` (`id_me`),
                         CONSTRAINT `stats_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
                         `id` bigint NOT NULL AUTO_INCREMENT,
                         `name` varchar(25) DEFAULT NULL,
                         `username` varchar(25) DEFAULT NULL,
                         `password` varchar(500) DEFAULT NULL,
                         `is_deleted` tinyint(1) DEFAULT '0',
                         `id_me` bigint DEFAULT NULL,
                         `id_roles` bigint DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `users_username_unique` (`username`),
                         KEY `users_me_null_fk` (`id_me`),
                         KEY `users_roles_null_fk` (`id_roles`),
                         CONSTRAINT `users_me_null_fk` FOREIGN KEY (`id_me`) REFERENCES `me` (`id`),
                         CONSTRAINT `users_roles_null_fk` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


