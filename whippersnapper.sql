-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2014 at 05:20 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whippersnapper`
--

-- --------------------------------------------------------

--
-- Table structure for table `comps`
--

CREATE TABLE IF NOT EXISTS `comps` (
  `comps_ID` int(11) NOT NULL AUTO_INCREMENT,
  `comps_TITLE` varchar(250) DEFAULT NULL,
  `comps_DESCRIPTION` varchar(950) DEFAULT NULL,
  `comps_THUMBNAIL` varchar(150) DEFAULT NULL,
  `comps_CLOSINGDATE` timestamp NULL DEFAULT NULL,
  `comps_FIRSTPRIZE` varchar(450) NOT NULL,
  `comps_RUNNERSUPPRIZES` varchar(450) DEFAULT NULL,
  `comps_WINNERTEXT` varchar(150) DEFAULT NULL,
  `comps_BANNERIMG` varchar(250) DEFAULT NULL,
  `COMPS_ENTRYINSTRUCTIONS` varchar(450) DEFAULT NULL,
  `comps_GALLERYLINK` int(1) DEFAULT NULL,
  PRIMARY KEY (`comps_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comps`
--

INSERT INTO `comps` (`comps_ID`, `comps_TITLE`, `comps_DESCRIPTION`, `comps_THUMBNAIL`, `comps_CLOSINGDATE`, `comps_FIRSTPRIZE`, `comps_RUNNERSUPPRIZES`, `comps_WINNERTEXT`, `comps_BANNERIMG`, `COMPS_ENTRYINSTRUCTIONS`, `comps_GALLERYLINK`) VALUES
(1, 'Win XXX with Power Rangers Sumarai', 'description', 'treefutom_thmb.jpg', '2014-01-08 14:24:30', 'first prize', 'second prize', 'winner text', 'sectionHeaderTest.png', 'For your chance to win a fantastic set of Tree Fu Tom books, plus a copy of the new &quot;Tree Fu Snow&quot; DVD and an Adventure Castle Playset, all you have to do is draw, paint or colour a picture of a winter garden!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `create`
--

CREATE TABLE IF NOT EXISTS `create` (
  `create_ID` int(11) NOT NULL AUTO_INCREMENT,
  `create_TITLE` varchar(250) NOT NULL,
  `create_DESCRIPTION` varchar(450) NOT NULL,
  `create_THUMB` varchar(250) NOT NULL,
  `create_BANNERIMG` varchar(250) NOT NULL,
  `create_TIME` varchar(2) DEFAULT NULL,
  `create_DIFFICULTY` int(1) DEFAULT NULL,
  `create_MAKE` int(2) DEFAULT NULL,
  `create_BAKE` int(2) DEFAULT NULL,
  `create_QUANTITY` int(2) DEFAULT NULL,
  PRIMARY KEY (`create_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `create`
--

INSERT INTO `create` (`create_ID`, `create_TITLE`, `create_DESCRIPTION`, `create_THUMB`, `create_BANNERIMG`, `create_TIME`, `create_DIFFICULTY`, `create_MAKE`, `create_BAKE`, `create_QUANTITY`) VALUES
(1, 'Create a Sock Puppet', 'Create a Sock Puppet blah blah blah', 'sockpuppet_thmb.png', 'sockpuppet.png', '60', 1, NULL, NULL, NULL),
(2, 'Fishing Game', 'description here', 'thmb_fishinggame.jpg', 'fishingame.png', '60', 1, NULL, NULL, NULL),
(3, 'Paper Chains', 'description', 'thmb_paperchains.jpg', 'paperchains.png', '30', 1, NULL, NULL, NULL),
(4, 'Superhero Outfit', 'description here', 'thmb_superhero.jpg', 'superhero.png', '60', 4, NULL, NULL, NULL),
(5, 'Chocolate Cornflake Cakes', '', 'thmb_chocolatecakes.jpg', 'chocolatecakes.png', NULL, 1, 10, 5, 12),
(6, 'Fairy Wand Biscuits', '', 'thmb_fairywand.jpg', 'fairywandbiscuits.png', '', 2, 15, 15, 20),
(7, 'Ginger Bread Man', '', 'thmb_gingerbread.jpg', 'gingerbread.png', NULL, 2, 15, 15, 8),
(8, 'Make your own lollies', '', 'thmb_lollies.jpg', 'lollies.png', NULL, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `create_SHOPPINGLIST`
--

CREATE TABLE IF NOT EXISTS `create_SHOPPINGLIST` (
  `create_shoppinglist_ID` int(11) NOT NULL AUTO_INCREMENT,
  `create_shoppinglist_TEXT` varchar(450) NOT NULL,
  `create_shoppinglist_CREATEID` int(5) NOT NULL,
  PRIMARY KEY (`create_shoppinglist_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `create_SHOPPINGLIST`
--

INSERT INTO `create_SHOPPINGLIST` (`create_shoppinglist_ID`, `create_shoppinglist_TEXT`, `create_shoppinglist_CREATEID`) VALUES
(1, 'A Sock - The brighter the better', 1),
(2, 'Fabric Glue', 1),
(3, 'Googly Eyes', 1),
(4, 'Anything else you want to stick on', 1),
(5, 'Pom Poms', 1),
(6, 'Feathers', 1),
(7, 'Felt (for stripes/tongues)', 1),
(9, 'A4 Coloured Card', 2),
(10, 'A4 White Card', 2),
(11, 'Small magnetic discs', 2),
(12, 'Wooden sticks - no sharp edges', 2),
(13, 'Crayons/felt-tips', 2),
(14, 'String', 2),
(15, 'Small piece of fabric (best to use organza)', 2),
(16, 'Coloured card', 3),
(17, 'Crayons/felt tips or pencils to decorate', 3),
(18, 'Paper Glue', 3),
(19, 'Scissors', 3),
(20, 'Ribbon', 3),
(21, 'Three colours of Fleece fabric. Main colour plus 2 colours for the superhero logo. (will need the main colour fleece to be atleast 20&quot; x 28&quot; for a 4 year old. ', 4),
(22, 'Self stick velcro', 4),
(23, '50g Butter', 5),
(24, '200g Milk chocolate - Break into bits.', 5),
(25, '3 Tbsp Golden Syrup', 5),
(26, '100g cornflakes', 5),
(27, 'Chocolate eggs or sweets to go on top', 5),
(29, '280 grams plain white flour', 6),
(30, '200 grams butter diced', 6),
(31, '100 grams Icing Sugar ', 6),
(32, '2 egg yolks', 6),
(33, '250 grams Fondant Icing ', 6),
(34, '45ml Warm Water', 6),
(35, 'Fairy Sprinkles to decorate', 6),
(36, '20 lolly sticks', 6),
(37, '150g golden syrup', 7),
(38, '100g light soft brown sugar', 7),
(39, '120g butter', 7),
(40, '300g plain flour', 7),
(41, '1 tsp bicarbonate of soda', 7),
(42, '2 tsp ground ginger, or to taste', 7),
(43, '1 tsp mixed spice', 7),
(44, 'Plastic Lolly Moulds', 8),
(45, 'Lolly Sticks', 8),
(46, 'Fruit Juice, Squash or Yogurt', 8);

-- --------------------------------------------------------

--
-- Table structure for table `create_STEPS`
--

CREATE TABLE IF NOT EXISTS `create_STEPS` (
  `create_steps_ID` int(11) NOT NULL AUTO_INCREMENT,
  `create_steps_TEXT` varchar(650) NOT NULL,
  `create_steps_CREATEID` int(5) NOT NULL,
  `create_steps_ORDER` int(5) NOT NULL,
  PRIMARY KEY (`create_steps_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `create_STEPS`
--

INSERT INTO `create_STEPS` (`create_steps_ID`, `create_steps_TEXT`, `create_steps_CREATEID`, `create_steps_ORDER`) VALUES
(1, 'Lay the sock flat onto a table', 1, 1),
(2, 'Stick some googly eyes on to the top of the sock to make your monster&apos;s eyes. ', 1, 2),
(3, 'Add other fun decorations like feathers and pom-poms to make your monster&apos;s hair, scales and other fun things.', 1, 3),
(4, 'Put sock onto one hand, pushing in the end between thumb and your other four fingers to form a mouth.', 1, 4),
(5, 'Move your fingers and thumb up and down to move your monster&apos;s mouth, and go scare some people with your scary monster sock puppet!', 1, 5),
(6, '<strong>Fish:</strong> Little Ones : Draw patterns onto the white card', 2, 1),
(7, 'Grown ups: Cut fish shapes out of the coloured card (could include a template). Cut out small circles for an eye. Once your little one has finished colouring cut out the coloured card to make the fish&apos;s patterned gills.', 2, 1),
(8, 'Little Ones: Stick on the coloured card onto the fish, and stick on white eye.', 2, 3),
(9, 'Grown Ups: Stick the magnet on top of the white eye - Make sure this is secure.', 2, 4),
(10, '<strong>Fishing Rod:</strong> Grown up: Put three of the magnets into the organza fabric and tie the end with string so the magnets won&apos;t fall out. ', 2, 5),
(11, 'Grown up: Tie string to one end of the wooden stick and secure with some glue. Tie the other end of this string to the fabric containing the magnets.', 2, 6),
(12, 'Make more rods for multiple players.', 2, 7),
(13, '<strong>Playtime:</strong> Hold the fishing rod out and try to catch as many fish as you can in one minute. or - multiplayer - see who can catch more fish in one minute. ', 2, 8),
(14, 'Get a Grown up to cut out strips of paper - different colours will make it look better.', 3, 1),
(15, 'Take a strip of paper and make a circle so that the ends of the paper are together. Glue in place. Then take another strip of paper and put through the middle of the first one. Glue together like before.', 3, 2),
(16, 'Keep doing this until you have a long chain.', 3, 3),
(17, 'When you have enough get a grown up to cut two pieces of ribbon and stick these to each end of the paper chain. This can be used to hang your paper chain up. ', 3, 4),
(18, 'Cut 20&quot; x 28&quot; of main colour fabric', 4, 1),
(19, 'Fold in half and put the template on it (Fold on right - thin bit of template to top of material)', 4, 2),
(20, 'Cut around edges of template - can pin so it doesn&quot;t move.', 4, 3),
(21, 'Add two bits of self stick velcro to each end of the skinny part at the top. (1&quot; x 1&quot;) one needs to go on upside and one needs to go on the other side underneath', 4, 4),
(35, '<strong>Logo:</strong> Cut any shape that you want to appear on the back of the cape. Square/kapow logo etc Stick on with Permanent fabric glue - This will take 24 hours to stick properly', 4, 5),
(36, 'Next cut out the letter of your choice from the third fabric colour. Could just do S for superman, or choose the  first letter of your child&apos;s name. Again stick on with Permanent fabric glue. ', 4, 6),
(37, 'Get a grown up to measure the ingredients and put the chocolate, butter and golden syrup  into a bowl and put in Microwave for 2 Minutes or until melted. ', 5, 1),
(38, 'Don&apos;t touch until the bowl has cooled down', 5, 2),
(39, 'Put cornflakes into another bowl and get a grown up to pour the chocolatey mixture over the top. ', 5, 3),
(40, 'Stir all the mixture together using a wooden spoon', 5, 4),
(41, 'Put 12 cupcakes cases onto a baking tray and spoon the mixture into the cupcake cases.', 5, 5),
(42, 'Put chocolate eggs and/or sweets on top', 5, 6),
(43, 'Put in the fridge for at least an hour to set', 5, 7),
(44, 'Get Mum or Dad to Set the oven to 200&deg;C/180&deg;C fan/gas 6', 6, 1),
(45, 'Put the flour and butter in a bowl and mix with your hands until it turns into crumbs', 6, 2),
(46, 'Mix in the icing sugar then add the egg yolks and start squeezing the mixture together until it all binds to a dough', 6, 3),
(47, 'Roll out on a lightly floured work surface and cut into about 20 stars about 8-9 cm across at widest point', 6, 4),
(48, 'Place on a baking sheet and carefully push a lolly pop stick through the thickness of the dough Bake for 6-8 mins until just turning golden brown at the edges.', 6, 5),
(49, 'Allow to cool then ice the biscuits with glaze or fondant icing and sugar sprinkles', 6, 6),
(50, 'Melt the syrup, sugar and butter in a small saucepan.', 7, 1),
(51, 'Sieve the flour, bicarbonate of soda, ginger and mixed spiced into a mixing bowl. Pour over the melted ingredients and mix together to form a soft dough', 7, 2),
(52, 'Tip the dough onto a sheet of cling film and wrap tightly. Refrigerate for 1 hour, or until the dough is firm.', 7, 3),
(53, 'Preheat the oven to 180&deg;C/gas mark 4. Lightly dust a clean work surface with flour and roll the dough out to 3mm thick. Using a cutter or a small knife, cut out your family. Mums, dads, cats and dogs &ndash; you could even make a house for them all to live in.', 7, 4),
(54, 'Using a spatula, carefully transfer the gingerbread family to a non-stick baking tray and bake for 10-15 minutes, or until golden and firm.', 7, 5),
(56, '<strong>One Flavour</strong> Pour the juice into a mould and add the wooden stick - Leave in the fridge overnight', 8, 1),
(57, '<strong>Traffic Light Lollies:  </strong> Pour one juice into the mould about a third of the way up and put into the freezer. Once frozen take out and add another juice then freeze again. Repeat for more colours/flavours.', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_CATEGORIES`
--

CREATE TABLE IF NOT EXISTS `gallery_CATEGORIES` (
  `gallery_categories_ID` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_categories_TEXT` varchar(350) NOT NULL,
  `gallery_categories_THMB` varchar(150) NOT NULL,
  `gallery_categories_HEADERBANNER` varchar(150) NOT NULL,
  PRIMARY KEY (`gallery_categories_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_CATEGORIES`
--

INSERT INTO `gallery_CATEGORIES` (`gallery_categories_ID`, `gallery_categories_TEXT`, `gallery_categories_THMB`, `gallery_categories_HEADERBANNER`) VALUES
(1, 'Power Rangers Samurai Entries', 'powerrangers_thmb.jpg', 'galleryitem.png');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_ENTRIES`
--

CREATE TABLE IF NOT EXISTS `gallery_ENTRIES` (
  `gallery_entries_ID` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_entries_NAME` varchar(150) NOT NULL,
  `gallery_entries_THUMB` varchar(150) NOT NULL,
  `gallery_entries_LARGE` varchar(150) NOT NULL,
  PRIMARY KEY (`gallery_entries_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `gallery_ENTRIES`
--

INSERT INTO `gallery_ENTRIES` (`gallery_entries_ID`, `gallery_entries_NAME`, `gallery_entries_THUMB`, `gallery_entries_LARGE`) VALUES
(1, 'Dean in Hastings', 'sample1.jpg', 'sample1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `sections_ID` int(11) NOT NULL AUTO_INCREMENT,
  `sections_NAME` varchar(250) NOT NULL,
  `sections_BGIMAGE` varchar(250) NOT NULL,
  `sections_ICON` varchar(150) NOT NULL,
  `sections_IMAGE` varchar(150) NOT NULL,
  `sections_TEXT` varchar(350) DEFAULT NULL,
  `sections_HEX` varchar(6) NOT NULL,
  PRIMARY KEY (`sections_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sections_ID`, `sections_NAME`, `sections_BGIMAGE`, `sections_ICON`, `sections_IMAGE`, `sections_TEXT`, `sections_HEX`) VALUES
(1, 'win', 'bg-win.jpg', 'icon_win.png', 'sectionHeaderTest.png', '<p>Get your parents permission to enter our latest competition. Don&apos;t forget to see all of our competitions below!</p>', '00a991'),
(2, 'watch', 'bg-watch.jpg', 'icon_watch.png', 'sampleHeader.png', NULL, 'fbc311'),
(3, 'create', 'bg-create.jpg', 'icon_create.png', 'sockpuppet.png', 'Get your parents permission to try these projects. You could even get them to help! Don&apos;t forget to see all of the other things you can create below!', 'ff4700'),
(4, 'gallery', '', 'icon_gallery.png', 'tempbg.png', 'Here are this months winners! Congratulations! Don’t forget to check out all of our other competition entries below!', '00a991');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE IF NOT EXISTS `watch` (
  `watch_ID` int(5) DEFAULT NULL,
  `watch_TITLE` varchar(150) NOT NULL,
  `watch_THUMB` varchar(35) NOT NULL,
  `watch_SRC` varchar(15) NOT NULL,
  `watch_FEATURED` int(1) DEFAULT NULL,
  `watch_TYPE` int(1) DEFAULT NULL COMMENT '1 = episode, 2=trailer',
  `watch_PUBLISHED` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`watch_ID`, `watch_TITLE`, `watch_THUMB`, `watch_SRC`, `watch_FEATURED`, `watch_TYPE`, `watch_PUBLISHED`) VALUES
(NULL, 'Freebirds', 'freebirds.jpg', 'UhxSOkTFGvo', 1, 2, NULL),
(NULL, 'Tickty Tock', 'ticktytock.jpg', 'Ra_iiMdo0Ms', NULL, 1, NULL),
(NULL, 'Justin and the Knights of Valour', 'justin.jpg', 'c9R9x9RfyGE', NULL, 2, NULL),
(NULL, 'Nativity 2', 'nativity2.jpg', 'MmqB5ZRhWA0', NULL, 2, NULL),
(NULL, 'Alpha', 'thumb.jpg', 'dfsldjlfks', NULL, 1, NULL),
(NULL, 'asdsd', 'sadsd', 'asds', NULL, 1, 1),
(NULL, 'asdsd', 'sadsd', 'asds', NULL, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
