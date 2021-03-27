CREATE TABLE `table_don`  (
  `don_id` int NOT NULL AUTO_INCREMENT,
  `masv` varchar(7) NOT NULL,
  `maudon_id` int NOT NULL,
  `thoigiantao` date NULL,
  `thoigianduyet` date NULL,
  `trangthai` int NULL,
  PRIMARY KEY (`don_id`)
);

CREATE TABLE `table_don_chitiet`  (
  `id` int NOT NULL,
  `don_id` int NOT NULL,
  `truong_id` int NOT NULL,
  `noidung` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `table_maudon`  (
  `maudon_id` int NOT NULL,
  `tendon` varchar(150) NOT NULL,
  PRIMARY KEY (`maudon_id`)
);

CREATE TABLE `table_maudon_chitiet`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `maudon_id` int NOT NULL,
  `truong` varchar(30) NOT NULL,
  `tentruong` varchar(255) NULL,
  `ghichutruong` varchar(1000) NULL,
  PRIMARY KEY (`id`)
);

