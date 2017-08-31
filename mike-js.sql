--
-- Base de données :  `mike-js`
--

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `mike`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `mike` (
`MD5('Mike')` varchar(32)
);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `age` varchar(5) NOT NULL,
  `poste` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `age`, `poste`) VALUES
(1, 'yjyt', 'yutjy', 'yj', 'tyjdty'),
(2, 'thh', 'thr', 'ht', 'thr'),
(3, 'gn', 'ng', 'ng', '');

-- --------------------------------------------------------

--
-- Structure de la vue `mike`
--
DROP TABLE IF EXISTS `mike`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mike`  AS  select md5('Mike') AS `MD5('Mike')` ;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;
