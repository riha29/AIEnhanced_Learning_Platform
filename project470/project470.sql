-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 07:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project470`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`) VALUES
(1, 'English - Beginner', 'This is a beginner course for learning English.'),
(2, 'English - Intermediate', 'This is an intermediate course for learning English. It is recommended that you complete English - Beginner before starting this course.'),
(5, 'English - Advanced', 'This is an advanced english course. It is recommended to complete English - beginner and English - intermediate before starting this course\r\n'),
(7, 'Japanese - Beginner', 'This is a Japanese course for beginners.'),
(8, 'Bangla - Short Course', 'This is course is suitable for those that are travelling to Bangladesh.');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `player_one_id` int(11) NOT NULL,
  `player_two_id` int(11) NOT NULL,
  `player_one_points` int(11) NOT NULL,
  `player_two_points` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `winner` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `player_one_id`, `player_two_id`, `player_one_points`, `player_two_points`, `status`, `winner`, `datetime`) VALUES
(20, 21, 18, 2885, 1950, 'complete', 21, '2024-04-22 00:37:15'),
(21, 21, 15, 945, 4930, 'complete', 15, '2024-04-22 00:30:26'),
(22, 15, 16, 910, 3940, 'complete', 16, '2024-04-22 23:21:09'),
(23, 21, 15, 4925, 0, 'pending', NULL, '2024-04-22 00:35:35'),
(24, 16, 15, 4915, 0, 'pending', NULL, '2024-04-22 23:22:12'),
(25, 16, 17, 4950, 1950, 'complete', 16, '2024-04-22 23:29:31');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) NOT NULL,
  `option_d` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `question` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `category`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`, `question`) VALUES
(1, 'history', '1492', '1498', '1501', '1510', '1492', 'What year did Christopher Columbus first set foot in the Americas?'),
(2, 'history', 'Julius Caesar', 'Augustus', 'Nero', 'Constantine', 'Augustus', 'Who was the first Emperor of Rome?'),
(3, 'entertainment', '300', 'Oceans 13', 'Burn After Reading', 'Troy', '300', 'Which movie does NOT have Brad Pitt in it?'),
(4, 'entertainment', 'Dark Knight', 'Lord of the Rings: The Fellow Ship of the Ring', 'Harry Potter and the Sorcerers Stone', 'Titanic', 'Titanic', 'Which one is the highest-grossing film ever?'),
(5, 'sports', 'Scotland', 'Canada', 'Sweden', 'Norway', 'Scotland', 'In which country was the sport of curling invented?'),
(6, '', 'Pakistan', 'England', 'Australia', 'West Indies', 'West Indies', 'Which country won the first ever Cricket World Cup in 1975?'),
(7, 'Arts and Culture', 'Shape', 'Color', 'Value', 'Texture', 'Value', 'This is the lightness or darkness of a color.'),
(8, 'Arts and Culture', 'Surrealism', 'Renaissance', 'Cubism', 'Baroque', 'Surrealism', 'Which artistic movement emerged in the early 20th century, characterized by abstract forms, bold colors, and a focus on expressing emotion and inner experiences?'),
(9, 'Geography', 'Nile', 'Mississippi', 'Yangtze', 'Amazon', 'Nile', 'Which of the following is the longest river in the world?'),
(10, 'Geography', 'Mount McKinley (Denali)', 'Mount Everest', 'Mount Kilimanjaro', 'K2', 'Mount Everest', 'Which of the following is the tallest mountain in the world?');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `req_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`req_id`, `sender_id`, `receiver_id`, `date`, `status`) VALUES
(32, 17, 18, '2024-04-02 19:04:29', 'friends'),
(34, 17, 15, '2024-04-02 19:04:33', 'friends'),
(35, 15, 16, '2024-04-02 19:05:04', 'friends'),
(38, 16, 18, '2024-04-02 19:24:27', 'pending'),
(42, 21, 18, '2024-04-22 00:17:56', 'friends'),
(44, 21, 15, '2024-04-22 00:35:12', 'pending'),
(45, 21, 17, '2024-04-22 00:35:14', 'friends'),
(46, 16, 21, '2024-04-22 23:20:39', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `course` int(11) NOT NULL,
  `content` mediumtext DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `course`, `content`, `priority`, `video`) VALUES
(1, 'Pre-English Alphabets', 1, 'How to form the letter:	\r\nCapital A: Draw an angled vertical line facing right: /. Draw another angled vertical line facing left: \\, both lines should touch at the top: /\\. Draw a horizontal line in the middle of the two lines -.\r\nThis is A.	ai	\r\nCapital B: Draw a vertical line: | . On its right side, draw two half-bubbles, going down the line. \r\nThis is B.	bee	\r\nCapital C: Draw a half-moon, with an opening on the right.\r\nThis is C.     see	\r\nCapital D: Draw a vertical line: |. Then, starting at its top right, draw a backwards C (step 3).\r\nThis is D.	dee	\r\nCapital E: Draw one vertical line: |. Draw three horizontal lines -, on the right side of this, each 1/3rd shorter than the original (but the middle line is shorter than the lines on the top and bottom). One goes on top, one in the middle, one on bottom.\r\nThis is E.	ee	\r\nCapital F: Draw an E (step 5), but omit the bottom horizontal line.\r\nThis is F.  ef	\r\nCapital G: Draw a C. Then, draw a horizontal line -, beginning at the base of the bottom tip, half-way through the C. \r\nThis is G.	gee	\r\nCapital H: Draw two vertical lines next to each other: | |. Then, draw a horizontal line in the middle, connecting them -.\r\nThis is H.	aitch	\r\nCapital I: Draw one vertical line: |.\r\nThis is I.	eye	\r\nCapital J: Draw an I with a hook on it. Like a backward-facing fish hook.\r\nThis is J.	jay	\r\nCapital K: Draw a vertical line: |. Then, draw two lines, starting from the right hand side, each from the middle. One angles up, the other down.\r\nThis is K.	kay	\r\nCapital L: Draw a vertical line: |. Then, draw a shorter, horizontal line: _ on the bottom right.\r\nThis is L.	el	\r\nCapital M: Draw two vertical lines next to another: | |. Then, starting from the inner, top tips, draw two shorter angled lines that touch 1/2 way in the middle.\r\nThis is M.	em	\r\nCapital N: Draw two horizontal lines close to each other: | |. Then, draw an angled line: \\ that starts from the inner top tip of the left line, angled so that it touches the other line, on the inner bottom tip.\r\nThis is N.	en	\r\nCapital O: Draw a full circle.\r\nThis is O.	oh	\r\nCapital P: Draw a vertical line: |. Then, draw a 1/2 bubble on the right side upper tip, and touching the middle of the vertical line: P.\r\nThis is P.	pee	\r\nCapital Q: Draw a full circle: O. Then, on the near-bottom right, draw a vertical line angling right, partly in the O, and partly out of it.\r\nThis is Q.	cue	\r\nCapital R: Draw a P. Then, starting from where the bottom 1/2 bubble touches the vertical line, draw a small line angled to the right.\r\nThis is R.	ar	\r\nCapital S: In one stroke, draw a wavy line going left, then right, then left.\r\nThis is S.	es	\r\nCapital T: Draw a vertical line: |. Then, draw a shorter, horizontal line: _ on top.\r\nThis is T.	tee	\r\nCapital U: Draw a circle, but, leave part of the top open.\r\nThis is U.	you	\r\nCapital V: Draw two vertical lines next to each other, but, angle the left one to the right and down: \\, and the right one to the left and down: /.\r\nThis is V.	vee	\r\nCapital W: Draw two V\'s next to another: \r\nThis is W.  double-you	\r\nCapital X: Draw one vertical line headed up and right /. Draw another vertical line up and leaning left: \\, crossing in the middle.\r\nThis is X.	ex	\r\nCapital Y: Draw a small v. Then, where the two lines meet, draw a vertical line | .\r\nThis is Y.	wi	\r\nCapital Z: In one stroke, draw a horizontal line:_, then a vertical line that angles downward left /, then a horizontal line to the right _.\r\nThis is Z.   zee', 1, 'https://www.youtube.com/watch?v=Mpa9TYUpxgs'),
(2, 'Pre-English Numbers', 1, 'The english number are:\r\n1-One\r\n2-Two\r\n3-Three\r\n4-Four\r\n5-Five\r\n6-Six\r\n7-Seven\r\n8-Eight\r\n9-Nine\r\n10-Ten', 2, 'https://www.youtube.com/watch?v=t8zetbzeGt8'),
(3, 'Articles - a/an/the', 1, 'There are only three articles in the English language: a, an and the.\r\nTheir actual use is a complex one especially when you get into the advanced use of English. Quite often you have to work by what sounds right, which can be frustrating for a learner.\r\nWe usually use no article to talk about things in general - the doesn\'t mean all.\r\nFor example:	\r\n\"Books are expensive.\" = (All books are expensive.)\r\n\"The books are expensive.\" = (Not all books are expensive, just the ones I\'m talking about.)\r\nA AND AN\r\nA and an are the indefinite articles. They refer to something not specifically known to the person you are communicating with.\r\nYou use a when the noun you are referring to begins with a consonant.\r\nYou use an when the noun you are referring to begins with a vowel.\r\nFor example:	\r\n\"I saw an elephant at the zoo.\"\r\n\"I ate a banana for lunch.\"\r\nTHE\r\nYou use the when you know that the listener knows or can work out what particular person/thing you are talking about.\r\nFor example:	\r\n\"The apple you ate was rotten.\"\r\n\"Did you lock the car?\"\r\nYou should also use the when you have already mentioned the thing you are talking about.\r\nFor example:	\r\n\"She\'s got two children; a girl and a boy. The girl\'s eight and the boy\'s fourteen.\"\r\nWe also use the when we know there is only one of a particular thing.\r\nFor example:	\r\nthe sun, the wind, the world, the North Pole etc..\r\nHowever if you want to describe a particular instance of these you should use a/an.\r\n\r\nFor example:	\r\n\"I could hear the wind.\" / \"There\'s a cold wind blowing.\"\r\n\r\n\"What are your plans for the future?\" / \"She has a promising future ahead of her.\"', 3, NULL),
(4, 'Basic Introduction and Questions', 1, 'INTRODUCTIONS AND SHORT FORMS:\r\nI am	= I\'m\r\nyou are	=you\'re\r\nhe is	= he\'s\r\nshe is	= she\'s\r\nit is	= it\'s\r\nare not	= aren\'t\r\nis not	= isn\'t\r\n\r\nQUESTION - WHAT/WHO IS IT?\r\nWhat ....? = things\r\nWho .....? = people\r\n\"What\'s\" = What is\r\n\"It\'s\" = It is\r\n\"Who\'s\" = Who is', 4, NULL),
(5, 'Why Bangla?', 8, '3 Great Reasons to Learn the Bengali Language\r\n1. Bengali is Consistently a Top-10 Language\r\nAs of 2022, Bengali has the seventh-largest number of total speakers and the fifth largest number of native speakers of any language in the world.\r\n\r\nAccording to a 2011 survey, it is the second most spoken language in India. Bengali is an official language in West Bengal, Tripura, and Assam in India, and the national language of Bangladesh.\r\n\r\nSurprisingly, it is also an honorary official language of Sierra Leone! This is because the Sierra Leone government wanted to thank the Bangladeshi peacekeepers who helped the country during the 1991-2002 civil war.\r\n\r\nThe Bengali diaspora is also massive. There are millions of people from Bangladesh and the Bengali regions of India abroad, so you can surely find Bengali speakers in just about any country.\r\n\r\n2. Bengali Has a Rich Literary Culture\r\nThroughout India, Bengali has a reputation as the language of beautiful written works. It has a rich history of poetry, and many works from Sanskrit, Hindi, Arabic, and Persian languages have also been translated in Bengali.\r\n\r\nHave you heard of Rabindranath Tagore? This Bengali writer from Kolkata, India was the first lyricist and also the first non-European to win the Nobel Prize in Literature. He also was a major figure in the Bengali resistance against the British Raj. The Indian national anthem, “Jana Gana Mana,” was adapted from one of Tagore’s Bengali poems.\r\n\r\nTagore translated many of his own works into English, but there are noticeable differences from the original Bengali. This gives you even more reason to read them in the original!\r\n\r\n3. The Bengali Language Movement Inspired the UN International Mother Language Day\r\nAs we can see, Bengali has not only been a literary language—it has also been politically significant. When India gained independence from Britain, the province of East Bengal (now Bangladesh) joined Pakistan. It became known as “East Pakistan,” and modern-day Pakistan was known as “West Pakistan.”\r\n\r\nHowever, people in West Pakistan had a very different culture from the people in East Pakistan. They didn’t even speak the same language: people in West Pakistan spoke Urdu, not Bengali! This led to many social tensions. Even though Bengali speakers formed the majority of the population of Pakistan, the political leaders tried to replace Bengali with Urdu in East Pakistan.\r\n\r\nOn February 21, 1952, students at the University of Dhaka gathered to protest to make Bengali an official language of Pakistan. Police fired on the demonstrators, killing many of them. This sparked larger civil unrest, strengthened the Bengali people’s unity, and ultimately led to the Bangladesh Independence War. In 1999, UNESCO declared February 21 to be International Mother Language Day as a tribute.\r\n\r\nIt’s no exaggeration to say that Bengali speakers take great pride in their language, even now!', 1, 'https://www.youtube.com/watch?v=c6-o4XgNWlM&t=17s'),
(6, 'Bangla Greetings', 8, 'Basic Bengali Greetings\r\nBengali has invariably been influenced by geography and religion.\r\n\r\nIf you are in India, which has mostly Hindu Bengali speakers, you would usually greet someone with the Hindu phrase নমস্কার (nɔmɔshkar). The recipient would repeat the same phrase back.\r\n\r\nOn the other hand, if you are in Bangladesh, you would usually greet someone with the Muslim phrase আসসালাম ওয়ালাইকুম (assalam walaikum). If someone greets you this way, respond with ওয়ালাইকুম আসসালাম (walaikum assalam).\r\n\r\nUnsure of which to use? Don’t worry. Regardless of the listener’s religion, you can always ask, “How are you?”:\r\n\r\nকেমন আছেন? (kæmon achhen?) for people you don’t know well or you would show respect to,\r\nকেমন আছো? (kæmon achho?) for friends or people of a lower rank than you.\r\nAnother similar greeting is কি অবস্থা? (ki ɔbɔstha?, “What’s the situation?”). You can reply with ভালো আছি (bhalo achhi, “I’m fine”).\r\n\r\nDone with your conversation? It’s time to say goodbye! You have a few choices here:\r\n\r\nপরে দেখা হবে (Pɔre dekha hɔbe) – “See you later”\r\nভালো থেকো (Bhalo theko) – “Take care” (casual)\r\nভালো থাকবেন (Bhalo thakben) – “Take care” (respectful)', 2, NULL),
(7, 'Introduction', 8, 'Introducing Yourself\r\nNow that we’ve greeted our speaking partner, it’s time to share more about yourself! You can do so with the following phrases:\r\n\r\nআমার নাম … (Amar nam…) – “My name is…”\r\nআমি … থেকে এসেছি (Ami … theke eshechhi) – “I’m from…”\r\n(Note: most countries’ names in Bengali sound much like their English equivalent.)\r\n\r\nTherefore, I would introduce myself as:\r\n\r\nআমার নাম খেলসি। (Amar nam Khelsi.) – “My name is Kelsey.”\r\nআমি আমেরিকা থেকে এসেছি। (Ami Amerika theke eshechhi.) – “I’m from America.”\r\nTo ask the listener about themselves, use the following questions:\r\n\r\nআপনার নাম কী (Apnar nam ki?) – “What is your name?”\r\nআপনি কোথা থেকে এসেছেন (Apni kotha theke eshechhen?) – “Where are you from?”', 3, NULL),
(8, 'Pronouns', 8, 'Know Who’s Talking – A.K.A. Let’s Talk Pronouns and Conjugation\r\nLet’s learn to break down a bit of the above.\r\n\r\nAs mentioned earlier, there are four main categories of nouns and pronouns in Bengali, and each has its own way to conjugate verbs. The four categories are:\r\n\r\nFirst person – I আমি ami, we আমরা amra\r\nSecond person, casual – you (singular) তুমি tumi, you (plural) তোমরা tomra\r\nThird person, casual – he/she/it/they (see below)\r\nHonorific – you, he/she/they (see below)\r\nThird person, casual: There are several different words for the third person singular: এ, ও, সে (e, o, she). They all have plural versions: এরা, ওরা, তারা (era, ora, tara).\r\n\r\nAll words can be used with people or objects. They carry different nuances with them depending on how close the pronoun is to the speaker.\r\n\r\nFor example, you could use the same pronoun এ (e) and conjugation for “he,” “she,” (if they are close to the speaker), and “this.”\r\n\r\nHonorific: The honorific conjugation can be used for both the second person (আপনি apni) or third person (ইনি ini, উনি uni, or তিনি tini – here again you have your choice depending on proximity to the speaker) that you want to show respect to. The verb conjugation is the same for all of them.\r\n\r\nThe plural form of আপনি (apni) is আপনারা (apnara). The plural forms of ইনি (ini), উনি (uni), and তিনি (tini) are এঁরা (ẽra), ওঁরা (õra), and তাঁরা (tãra) respectively, each pronounced more nasally than their casual counterparts above.\r\n\r\nNote: Gender and singular vs. plural do not affect conjugation.', 4, 'https://www.youtube.com/watch?v=bsKrzPVfcYI&t=2s'),
(9, 'Conjugation', 8, 'Conjugating in Bengali\r\nNow that we have established pronouns, I’ll show you how to conjugate verbs. This is very easy!\r\n\r\nTo conjugate in the present tense, simply add the following to the end of the verb stem:\r\n\r\nFirst person: i\r\nSecond person, casual: o\r\nThird person, casual: e\r\nHonorific: en\r\nTherefore, to say that someone or something “am/are/is,” change the verb আছ (achh, “to be”) as follows:\r\n\r\nFirst person: আছি (achhi)\r\nSecond person, casual: আছো (achho)\r\nThird person, casual: আছে (achhe)\r\nHonorific: আছেন (achhen)\r\nFun fact: There is an added fifth category to conjugate for: তুই (tui). This is an even more casual version of তুমি tumi. It is only used when talking to extremely close friends, younger siblings, small children, and animals.\r\n\r\nBe careful: it can be extremely rude if you use it wrongly!\r\n\r\nThe four cases already introduced will suffice, so you don’t need to worry about this one as a beginner.', 5, NULL),
(10, 'Survival Phrases', 8, 'Taking a trip to a Bengali-speaking area soon? Here are a few more key phrases to help you navigate your way. For questions, remember to use rising intonation at the end.\r\n\r\nআপনি ইংরেজি বলতে পারেন? (Apni Ingreji bolte paren?) – “Do you speak English?”\r\nটয়লেট কোথায়? (Ʈoyleʈ kothae?) – “Where is the bathroom?” (Note: For asking the location of anything else, just say the word and add কোথায়? kothae?.)\r\nদাম কত? (Dam kɔto?) – “How much is it?”\r\nএটা কী? (Eʈa ki?) – “What is this?”\r\nকয়টা বাজে? (Kɔyʈa baje?) – “What time is it?”\r\nআমি একটু বাংলা বলতে পারি। (Ami ækʈu Bangla bolte pari.) – “I speak a little Bengali.”\r\nআমি বাংলা বলতে পারি না। (Ami Bangla bolte pari na.) – “I don’t speak Bengali.”\r\nআমি বাংলা পড়তে পারি না। (Ami Bangla poɽte pari na.) – “I can’t read Bengali.”\r\nআবার বলেন? (Abar bolen?) – “Could you repeat that?”\r\n… মানে কী? (… mane ki?) – “What does … mean?”\r\nওটা দিন (Oʈa din) / ওটা দেন। (Oʈa den) – “Give me that.” (Note: The verb conjugation depends on the dialect.)', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `course_list` varchar(500) NOT NULL,
  `score` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `date`, `email`, `password`, `image`, `country`, `course_list`, `score`) VALUES
(15, 'adiba', 22, '2024-03-26 21:15:27', 'adiba@mail.com', '$2y$10$e31yliq1Sal9sE5QSNUlM.mewzYsyN2.KdsMKfLGH42UJMig8ka.G', 'uploads/1711524370download.png', 'Bangladesh', '8', 4930),
(16, 'pika', 15, '2024-04-01 12:19:26', 'pika@mail.com', '$2y$10$wWv5J6Pelkckr4WLenS34.JVYhY/pPHmRecKRghhh0iP3eekMvuUq', 'uploads/17119539187a1cb2039c84ad740c575c128c905509.jpg', 'Japan', '8, 7', 8890),
(17, 'melody', 25, '2024-04-01 12:20:12', 'melo@mail.com', '$2y$10$AU6GmllIXH4Ji1VtdE1UnO6EMgglsrAYTw3XRX7LiFB0Q.J8W.qCS', 'uploads/1711953951cute_sanrio_my_melody_by_pokefan276_dfzehd3-fullview.jpg', 'Japan', '', 0),
(18, 'bob', 134, '2024-04-02 16:37:13', 'bob@mail.com', '$2y$10$i74VRDfKl50NquJSTxEfi.9ovTSGW7zGXjLnOYLw/URsjjjzs5p6m', 'uploads/1712054302F9xhN65WQAATLoU.jpg', 'Sea', '', 0),
(21, 'Po', 23, '2024-04-22 00:09:07', 'po@mail.com', '$2y$10$VSiooUwcVAyUWMbPkeNHBe0pjobMiuMdVSlmQdSa/bNhdwYVIm7O2', 'uploads/1713723302images.jpg', 'Japan', '8, 1', 2885);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `history_ibfk_1` (`player_one_id`),
  ADD KEY `history_ibfk_2` (`player_two_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `receiver_id` (`receiver_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`player_one_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`player_two_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `relations`
--
ALTER TABLE `relations`
  ADD CONSTRAINT `relations_ibfk_1` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relations_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
