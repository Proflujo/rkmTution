TRUNCATE `codelist_master`;
INSERT INTO `codelist_master` (`codelist_id`, `codelist_name`, `user_editable`, `active_status`, `date_created`, `user_created`, `date_modified`, `user_modified`) VALUES
(1, 'branch', 1,  1,  '2022-07-24', 1,  NULL, NULL);

TRUNCATE `codelist_details`;
INSERT INTO `codelist_details` (`codelist_detail_id`, `fkcodelist_id`, `codelist_value`, `codelist_description`, `additional_info`, `user_editable`, `active_status`, `date_created`, `user_created`, `date_modified`, `user_modified`) VALUES
(1, 1,  '1',  'DCE',  NULL, 2,  1,  '2022-07-24', 1,  NULL, NULL),
(2, 1,  '2',  'DAE',  NULL, 2,  1,  '2022-07-24', 1,  NULL, NULL),
(3, 1,  '3',  'DME',  NULL, 2,  1,  '2022-07-24', 1,  NULL, NULL);
(4, 2, '1', 'January', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(5, 2, '2', 'February', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(6, 2, '3', 'March', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(7, 2, '4', 'April', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(8, 2, '5', 'May', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(9, 2, '6', 'June', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(10, 2, '7', 'July', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(11, 2, '8', 'Augest', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(12, 2, '9', 'September', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(13, 2, '10', 'Octobar', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(14, 2, '11', 'Novembar', NULL, 2, 1, '2022-07-24', 1, NULL, NULL),
(15, 2, '12', 'December', NULL, 2, 1, '2022-07-24', 1, NULL, NULL);