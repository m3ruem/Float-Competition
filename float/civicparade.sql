CREATE TABLE `contestant` (
  `id` int(11) NOT NULL,
'name' varchar(255) NOT NULL,
  `contestant_num` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT curdate()
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
        `role` int(11) NOT NULL DEFAULT 1,
        `status` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT curdate()
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `score`(
  `id` int(11) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `contestant_id` int(100) NOT NULL,
  `score` int(100) NOT NULL,
    `created_at` date NOT NULL DEFAULT curdate()
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,


) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

